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
        // Admins have no business on the guest bookings page — send them to their dashboard
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $reservations = Auth::user()
            ->reservations()
            ->with('room')
            ->latest()
            ->get();

        return view('guest.my-bookings', compact('reservations'));
    }
}
