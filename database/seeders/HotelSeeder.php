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

        // Seed 15 Rooms
        $roomTypes = [
            ['prefix' => '1', 'name' => 'Deluxe Room',     'type' => 'single', 'price' => 3500,  'count' => 6],
            ['prefix' => '2', 'name' => 'Superior Room',   'type' => 'double', 'price' => 5500,  'count' => 5],
            ['prefix' => '3', 'name' => 'Junior Suite',    'type' => 'suite',  'price' => 9000,  'count' => 3],
            ['prefix' => '4', 'name' => 'Penthouse Suite', 'type' => 'suite',  'price' => 18000, 'count' => 1],
        ];

        foreach ($roomTypes as $category) {
            for ($i = 1; $i <= $category['count']; $i++) {
                $roomNumber = $category['prefix'] . str_pad($i, 2, '0', STR_PAD_LEFT);
                Room::create([
                    'room_number'     => $roomNumber,
                    'name'            => $category['name'],
                    'type'            => $category['type'],
                    'price_per_night' => $category['price'],
                    'status'          => 'available'
                ]);
            }
        }

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