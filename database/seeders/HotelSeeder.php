<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;

class HotelSeeder extends Seeder
{

    /////////////////////// FAKE DATA FOR TESTING PURPOSES /////////////////////
    public function run(): void
    {
        // Create users
        $user1 = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@hotel.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);
        $user2 = User::create([
            'name'     => 'Maria Santos',
            'email'    => 'maria@email.com',
            'password' => bcrypt('password'),
        ]);

        // Create rooms
        $room1 = Room::create(['room_number' => '101', 'type' => 'single',  'price_per_night' => 1500, 'status' => 'available']);
        $room2 = Room::create(['room_number' => '102', 'type' => 'double',  'price_per_night' => 2500, 'status' => 'occupied']);
        $room3 = Room::create(['room_number' => '201', 'type' => 'suite',   'price_per_night' => 5000, 'status' => 'available']);

        // Create reservations
        $res1 = Reservation::create([
            'user_id' => $user1->id, 'room_id' => $room1->id,
            'check_in_date' => '2025-06-01', 'check_out_date' => '2025-06-05',
            'total_nights' => 4, 'total_price' => 6000, 'status' => 'confirmed',
        ]);
        $res2 = Reservation::create([
            'user_id' => $user2->id, 'room_id' => $room2->id,
            'check_in_date' => '2025-06-10', 'check_out_date' => '2025-06-12',
            'total_nights' => 2, 'total_price' => 5000, 'status' => 'pending',
        ]);

        // Create payments
        Payment::create([
            'reservation_id' => $res1->id,
            'amount' => 6000, 'payment_method' => 'gcash', 'payment_status' => 'paid',
        ]);
        Payment::create([
            'reservation_id' => $res2->id,
            'amount' => 5000, 'payment_method' => 'cash', 'payment_status' => 'unpaid',
        ]);
    }
}