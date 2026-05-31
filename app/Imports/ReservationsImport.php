<?php

namespace App\Imports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReservationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Reservation([
            'user_id'        => $row['user_id'],
            'room_id'        => $row['room_id'],
            'check_in_date'  => $row['check_in_date'],
            'check_out_date' => $row['check_out_date'],
            'total_nights'   => $row['total_nights'],
            'total_price'    => $row['total_price'],
            'status'         => $row['status'],
        ]);
    }
}