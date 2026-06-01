<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class GuestReservationController extends Controller
{
    /**
     * Show the authenticated guest's own reservations.
     */
    public function myBookings()
    {
        $reservations = Auth::user()
            ->reservations()
            ->with('room')
            ->latest()
            ->get();

        return view('guest.my-bookings', compact('reservations'));
    }
}
