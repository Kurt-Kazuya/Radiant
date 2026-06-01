<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'room_id'        => 'nullable',
            'room_type'      => 'nullable|string',
            'check_in_date'  => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_nights'   => 'required|integer|min:1',
            'total_price'    => 'required|numeric|min:0',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'payment_method' => 'nullable|string',
        ]);

        // Find or create a user account for this guest
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'password' => bcrypt(Str::random(16)),
                'role' => 'user'
            ]
        );

        // Find a room ID if it wasn't provided directly
        $roomId = $validated['room_id'];
        if (empty($roomId)) {
            $typeMap = [
                'Deluxe Room' => 'single',
                'Superior Room' => 'double',
                'Junior Suite' => 'suite',
                'Penthouse Suite' => 'suite'
            ];
            $type = $typeMap[$validated['room_type'] ?? ''] ?? 'double';
            $room = Room::where('type', $type)->where('status', 'available')->first();
            if (!$room) $room = Room::first();
            $roomId = $room ? $room->id : 1;
        }

        // Create the reservation
        $reservation = Reservation::create([
            'user_id'        => Auth::id() ?? $user->id,
            'room_id'        => $roomId,
            'check_in_date'  => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'total_nights'   => $validated['total_nights'],
            'total_price'    => $validated['total_price'],
            'status'         => 'pending',
        ]);

        // Create the payment record
        $paymentMethod = $validated['payment_method'] ?? 'pay_at_hotel';
        Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $validated['total_price'],
            'payment_method' => $paymentMethod === 'pay_online' ? 'credit_card' : 'cash',
            'payment_status' => $paymentMethod === 'pay_online' ? 'paid' : 'unpaid',
        ]);

        // If guest is not logged in, we can log them in automatically so they can see their bookings
        if (!Auth::check()) {
            Auth::login($user);
        }

        return redirect()->route('my-bookings')
            ->with('success', "Your reservation #" . $reservation->id . " has been submitted! We will confirm it within 24 hours.");
    }
}
