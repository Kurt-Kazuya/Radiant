<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class ReservationController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('reservations', compact('rooms'));
    }

    public function myBookings()
    {
        $reservations = auth()->user()->reservations()->with('room')->latest()->get();
        return view('my-bookings', compact('reservations'));
    }
}