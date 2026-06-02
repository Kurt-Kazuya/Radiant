<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $totalReservations  = Reservation::count();
        $confirmed          = Reservation::where('status', 'confirmed')->count();
        $cancelled          = Reservation::where('status', 'cancelled')->count();
        $pending            = Reservation::where('status', 'pending')->count();
        $totalRevenue       = Payment::where('payment_status', 'paid')->sum('amount');
        $totalRooms         = Room::count();
        $availableRooms     = Room::where('status', 'available')->count();
        $reservations       = Reservation::with(['user', 'room'])->latest()->take(10)->get();

        return view('reports.index', compact(
            'totalReservations',
            'confirmed',
            'cancelled',
            'pending',
            'totalRevenue',
            'totalRooms',
            'availableRooms',
            'reservations'
        ));
    }

    public function exportPDF()
    {
        $reservations = Reservation::with(['user', 'room'])->get();
        $pdf = Pdf::loadView('reports.pdf', compact('reservations'));

        return $pdf->download('reservations-report.pdf');
    }
}
