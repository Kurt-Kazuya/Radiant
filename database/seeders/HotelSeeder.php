<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@hotel.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        // rooms
        $deluxe    = Room::create(['room_number' => '101', 'name' => 'Deluxe Room',     'type' => 'single', 'price_per_night' => 3500,  'status' => 'available']);
        $superior  = Room::create(['room_number' => '102', 'name' => 'Superior Room',   'type' => 'double', 'price_per_night' => 5500,  'status' => 'available']);
        $junior    = Room::create(['room_number' => '201', 'name' => 'Junior Suite',    'type' => 'suite',  'price_per_night' => 9000,  'status' => 'available']);
        $penthouse = Room::create(['room_number' => '301', 'name' => 'Penthouse Suite', 'type' => 'suite',  'price_per_night' => 18000, 'status' => 'available']);

        // // Create guest users
        // $guest1 = User::create([
        //     'name'     => 'Maria Santos',
        //     'email'    => 'maria@email.com',
        //     'password' => bcrypt('password'),
        //     'role'     => 'guest',
        // ]);
        // $guest2 = User::create([
        //     'name'     => 'Juan Dela Cruz',
        //     'email'    => 'juan@email.com',
        //     'password' => bcrypt('password'),
        //     'role'     => 'guest',
        // ]);

        
        // // Sample reservations
        // $res1 = Reservation::create([
        //     'user_id'        => $guest1->id,
        //     'room_id'        => $deluxe->id,
        //     'check_in_date'  => '2025-06-01',
        //     'check_out_date' => '2025-06-05',
        //     'total_nights'   => 4,
        //     'total_price'    => 15680,
        //     'status'         => 'confirmed',
        // ]);
        // $res2 = Reservation::create([
        //     'user_id'        => $guest2->id,
        //     'room_id'        => $superior->id,
        //     'check_in_date'  => '2025-06-10',
        //     'check_out_date' => '2025-06-12',
        //     'total_nights'   => 2,
        //     'total_price'    => 12320,
        //     'status'         => 'pending',
        // ]);

        // // Payments
        // Payment::create(['reservation_id' => $res1->id, 'amount' => 15680, 'payment_method' => 'gcash', 'payment_status' => 'paid']);
        // Payment::create(['reservation_id' => $res2->id, 'amount' => 12320, 'payment_method' => 'cash',  'payment_status' => 'unpaid']);
    }
}