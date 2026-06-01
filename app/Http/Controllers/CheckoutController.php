<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     * Requires authentication — guests must log in first.
     */
    public function show(Request $request)
    {
        $checkIn  = $request->get('check_in',  date('Y-m-d'));
        $checkOut = $request->get('check_out', date('Y-m-d', strtotime('+1 day')));
        $nights   = max(1, Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut)));

        return view('checkout', compact('nights'));
    }

    /**
     * Handle the reservation booking form submission.
     * Saves the reservation to the database as 'pending'.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id'        => 'required|exists:rooms,id',
            'check_in_date'  => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_nights'   => 'required|integer|min:1',
            'total_price'    => 'required|numeric|min:0',
        ]);

        $reservation = Reservation::create([
            'user_id'        => Auth::id(),
            'room_id'        => $validated['room_id'],
            'check_in_date'  => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'total_nights'   => $validated['total_nights'],
            'total_price'    => $validated['total_price'],
            'status'         => 'pending',
        ]);

        // Mark the room as occupied (optional — admin may prefer to control this)
        // Room::find($validated['room_id'])->update(['status' => 'occupied']);

        return redirect()->route('my-bookings')
            ->with('success', "Your reservation #" . $reservation->id . " has been submitted! We will confirm it within 24 hours.");
    }
}
