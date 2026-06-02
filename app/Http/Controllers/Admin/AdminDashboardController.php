<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalReservations = Reservation::count();
        $confirmed         = Reservation::where('status', 'confirmed')->count();
        $pending           = Reservation::where('status', 'pending')->count();
        $cancelled         = Reservation::where('status', 'cancelled')->count();
        $totalRooms        = Room::count();
        $availableRooms    = Room::where('status', 'available')->count();
        $totalRevenue      = Payment::where('payment_status', 'paid')->sum('amount');
        $totalGuests       = User::where('role', 'guest')->whereHas('reservations')->count();
        $recentReservations = Reservation::with(['user', 'room'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalReservations', 'confirmed', 'pending', 'cancelled',
            'totalRooms', 'availableRooms', 'totalRevenue',
            'totalGuests', 'recentReservations'
        ));
    }
}