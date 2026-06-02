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
            'payment_method' => 'nullable|string',
        ]);

        // Find or create a user account for this guest
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'password' => bcrypt(Str::random(16)),
                'role' => 'guest'
            ]
        );

        // Find a room ID if it wasn't provided directly, or if it's invalid
        $roomId = $validated['room_id'] ?? null;
        if ($roomId && !\App\Models\Room::where('id', $roomId)->exists()) {
            $roomId = null;
        }

        if (empty($roomId)) {
            $roomType = $validated['room_type'] ?? '';

            // Try to match by exact room name first (e.g. "Deluxe Room", "Junior Suite")
            $room = Room::where('name', $roomType)->where('status', 'available')->first();

            // Fallback: match by type category
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

            // Last resort: any room at all
            if (!$room) $room = Room::first();
            $roomId = $room ? $room->id : null;
        }


        if (!$roomId) {
            return back()->with('error', 'Sorry, there are no rooms available in the system to book right now.');
        }

        // Always attach the reservation to the user whose email was submitted,
        // never the currently-logged-in session (which may be a different guest).
        $userId = $user->id;

        // Exception: if an ADMIN is logged in, keep their ID so they can test bookings.
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Admin test booking — redirect to admin panel after saving
            $reservation = Reservation::create([
                'user_id'        => $userId,
                'room_id'        => $roomId,
                'check_in_date'  => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'total_nights'   => $validated['total_nights'],
                'total_price'    => $validated['total_price'],
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

        // Create the reservation under the submitted-email user
        $reservation = Reservation::create([
            'user_id'        => $userId,
            'room_id'        => $roomId,
            'check_in_date'  => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'total_nights'   => $validated['total_nights'],
            'total_price'    => $validated['total_price'],
            'status'         => 'pending',
        ]);

        // Create the payment record
        $paymentMethod = $validated['payment_method'] ?? 'pay_at_hotel';
        Payment::create([
            'reservation_id' => $reservation->id,
            'amount'         => $validated['total_price'],
            'payment_method' => $paymentMethod === 'pay_online' ? 'credit_card' : 'cash',
            'payment_status' => $paymentMethod === 'pay_online' ? 'paid' : 'unpaid',
        ]);

        // Guests do not get a login session. They just submit the form.
        // Only admins have login sessions.


        return redirect()->route('reservations')
            ->with('success', "Thank you! Your reservation #{$reservation->id} has been submitted! We will confirm it within 24 hours.");
    }
}

