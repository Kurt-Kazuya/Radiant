<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * List all reservations (with guest & room data).
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->latest()
            ->paginate(15);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Confirm a pending reservation.
     */
    public function confirm($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'confirmed']);

        return back()->with('success', "Reservation #{$id} has been confirmed.");
    }

    /**
     * Cancel a reservation.
     */
    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'cancelled']);

        if ($reservation->room_id) {
            $room = \App\Models\Room::find($reservation->room_id);
            if ($room) {
                $room->update(['status' => 'available']);
            }
        }

        return back()->with('success', "Reservation #{$id} has been cancelled.");
    }

    /**
     * Delete a reservation record permanently.
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        if ($reservation->room_id) {
            $room = \App\Models\Room::find($reservation->room_id);
            if ($room) {
                $room->update(['status' => 'available']);
            }
        }

        $reservation->delete();

        return redirect()->route('admin.reservations.index')
            ->with('success', "Reservation #{$id} has been deleted.");
    }
}