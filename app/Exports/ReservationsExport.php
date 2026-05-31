<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReservationsExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Reservation::with(['user', 'room'])->get()->map(function ($r) {
            return [
                'ID'            => $r->id,
                'Guest Name'    => $r->user->name ?? 'N/A',
                'Room Number'   => $r->room->room_number ?? 'N/A',
                'Room Type'     => $r->room->type ?? 'N/A',
                'Check In'      => $r->check_in_date,
                'Check Out'     => $r->check_out_date,
                'Total Nights'  => $r->total_nights,
                'Total Price'   => '₱' . number_format($r->total_price, 2),
                'Status'        => ucfirst($r->status),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Guest Name',
            'Room Number',
            'Room Type',
            'Check In',
            'Check Out',
            'Total Nights',
            'Total Price',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],  // Bold header row
        ];
    }
}