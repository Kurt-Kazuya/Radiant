<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Imports\ReservationsImport;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Show reports dashboard page
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

    // Export PDF
    public function exportPDF()
    {
        $reservations = Reservation::with(['user', 'room'])->get();
        $pdf = Pdf::loadView('reports.pdf', compact('reservations'));
        return $pdf->download('reservations-report.pdf');
    }

    // Export Excel
    public function exportExcel()
    {
        return Excel::download(new ReservationsExport, 'reservations.xlsx');
    }

    // Export CSV
    public function exportCSV()
    {
        return Excel::download(new ReservationsExport, 'reservations.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    // Import CSV/Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        Excel::import(new ReservationsImport, $request->file('file'));
        return back()->with('success', 'Data imported successfully!');
    }
}