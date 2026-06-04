<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\SimpleExcel\SimpleExcelWriter;

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

    public function exportCSV()
    {
        $reservations = Reservation::with(['user', 'room'])->get();
        $callback = function () use ($reservations) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'User', 'Room', 'Check In', 'Check Out', 'Status', 'Total Price']);
            foreach ($reservations as $res) {
                fputcsv($file, [
                    $res->id,
                    $res->user->name ?? 'N/A',
                    $res->room->name ?? 'N/A',
                    $res->check_in_date,
                    $res->check_out_date,
                    $res->status,
                    $res->total_price
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=reservations-report.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ]);
    }

    public function exportXLSX()
    {
        $reservations = Reservation::with(['user', 'room'])->get();
        
        $writer = SimpleExcelWriter::streamDownload('reservations-report.xlsx');
        
        foreach ($reservations as $res) {
            $writer->addRow([
                'ID' => $res->id,
                'User' => $res->user->name ?? 'N/A',
                'Room' => $res->room->name ?? 'N/A',
                'Check In' => $res->check_in_date,
                'Check Out' => $res->check_out_date,
                'Status' => $res->status,
                'Total Price' => $res->total_price,
            ]);
        }

        return $writer->toBrowser();
    }

    public function exportJSON()
    {
        $reservations = Reservation::with(['user', 'room'])->get();
        
        return response()->streamDownload(function () use ($reservations) {
            echo $reservations->toJson(JSON_PRETTY_PRINT);
        }, 'reservations-report.json', [
            'Content-Type' => 'application/json',
        ]);
    }
}
