<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     * Requires authentication — guests must log in first.
     */
    public function show(Request $request)
    {
        $checkIn  = $request->get('check_in',  date('Y-m-d'));
        $checkOut = $request->get('check_out', date('Y-m-d', strtotime('+1 day')));
        $nights   = max(1, Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut)));

        return view('checkout', compact('nights'));
    }

    /**
     * Handle the reservation booking form submission.
     * Saves the reservation to the database as 'pending'.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id'        => 'nullable',
            'room_type'      => 'nullable|string',
            'check_in_date'  => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_nights'   => 'required|integer|min:1',
            'total_price'    => 'required|numeric|min:0',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'nullable|string|max:255',
            'nationality'    => 'nullable|string|max:255',
            'address'        => 'nullable|string',
            'city'           => 'nullable|string|max:255',
            'country'        => 'nullable|string|max:255',
            'arrival_time'   => 'nullable|string|max:255',
            'special_requests'=> 'nullable|string',
            'preferences'    => 'nullable|array',
            'extras'         => 'nullable|array',
            'payment_method' => 'nullable|string',
        ]);

        // create user
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'password' => bcrypt(Str::random(16)),
                'role' => 'guest'
            ]
        );

        $addressParts = array_filter([$validated['address'] ?? null, $validated['city'] ?? null, $validated['country'] ?? null]);
        $fullAddress = implode(', ', $addressParts);

        $user->update([
            'phone' => $validated['phone'] ?? $user->phone,
            'nationality' => $validated['nationality'] ?? $user->nationality,
            'address' => $fullAddress ?: $user->address,
        ]);

        // find room
        $roomId = $validated['room_id'] ?? null;
        if ($roomId && !\App\Models\Room::where('id', $roomId)->exists()) {
            $roomId = null;
        }

        if (empty($roomId)) {
            $roomType = $validated['room_type'] ?? '';

            // exact room name
            $room = Room::where('name', $roomType)->where('status', 'available')->first();

            // fallback category
            if (!$room) {
                $typeMap = [
                    'Deluxe Room'     => 'single',
                    'Superior Room'   => 'double',
                    'Junior Suite'    => 'suite',
                    'Penthouse Suite' => 'suite',
                ];
                $type = $typeMap[$roomType] ?? 'double';
                $room = Room::where('type', $type)->where('status', 'available')->first();
            }

            // last resort
            if (!$room) $room = Room::first();
            $roomId = $room ? $room->id : null;
        }


        if (!$roomId) {
            return back()->with('error', 'Sorry, there are no rooms available in the system to book right now.');
        }

        $userId = $user->id;

        // admin bypass
        if (Auth::check() && Auth::user()->role === 'admin') {
            $reservation = Reservation::create([
                'user_id'        => $userId,
                'room_id'        => $roomId,
                'check_in_date'  => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'total_nights'   => $validated['total_nights'],
                'total_price'    => $validated['total_price'],
                'arrival_time'   => $validated['arrival_time'] ?? null,
                'special_requests'=> $validated['special_requests'] ?? null,
                'preferences'    => $validated['preferences'] ?? null,
                'extras'         => $validated['extras'] ?? null,
                'status'         => 'pending',
            ]);

            $paymentMethod = $validated['payment_method'] ?? 'pay_at_hotel';
            Payment::create([
                'reservation_id' => $reservation->id,
                'amount'         => $validated['total_price'],
                'payment_method' => $paymentMethod === 'pay_online' ? 'credit_card' : 'cash',
                'payment_status' => $paymentMethod === 'pay_online' ? 'paid' : 'unpaid',
            ]);

            return redirect()->route('admin.reservations.index')
                ->with('success', "Test reservation #{$reservation->id} created for {$user->name}.");
        }

        // create reservation
        $reservation = Reservation::create([
            'user_id'        => $userId,
            'room_id'        => $roomId,
            'check_in_date'  => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'total_nights'   => $validated['total_nights'],
            'total_price'    => $validated['total_price'],
            'arrival_time'   => $validated['arrival_time'] ?? null,
            'special_requests'=> $validated['special_requests'] ?? null,
            'preferences'    => $validated['preferences'] ?? null,
            'extras'         => $validated['extras'] ?? null,
            'status'         => 'pending',
        ]);

        // payment
        $paymentMethod = $validated['payment_method'] ?? 'pay_at_hotel';
        Payment::create([
            'reservation_id' => $reservation->id,
            'amount'         => $validated['total_price'],
            'payment_method' => $paymentMethod === 'pay_online' ? 'credit_card' : 'cash',
            'payment_status' => $paymentMethod === 'pay_online' ? 'paid' : 'unpaid',
        ]);



        return redirect()->route('reservations')
            ->with('success', "Thank you! Your reservation #{$reservation->id} has been submitted! We will confirm it within 24 hours.");
    }
}

