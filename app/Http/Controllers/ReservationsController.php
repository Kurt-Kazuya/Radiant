<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
        $checkIn  = $request->get('check_in',  date('Y-m-d'));
        $checkOut = $request->get('check_out', date('Y-m-d', strtotime('+1 day')));

        // Room names used in the static reservation cards
        $roomNames = ['Deluxe Room', 'Superior Room', 'Junior Suite', 'Penthouse Suite'];

        $availability = [];
        foreach ($roomNames as $name) {
            $total = Room::where('name', $name)->count();

            // Count rooms of this name that have an overlapping confirmed/pending reservation
            $booked = Room::where('name', $name)
                ->whereHas('reservations', function ($q) use ($checkIn, $checkOut) {
                    $q->whereIn('status', ['confirmed', 'pending'])
                      ->where('check_in_date',  '<', $checkOut)
                      ->where('check_out_date', '>', $checkIn);
                })
                ->count();

            $available = max(0, $total - $booked);

            $availability[$name] = [
                'total'        => $total,
                'available'    => $available,
                'is_available' => $available > 0,
            ];
        }

        return view('reservations', compact('availability'));
    }
}
