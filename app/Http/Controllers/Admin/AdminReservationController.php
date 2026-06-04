<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * List all reservations (with guest & room data).
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->notCompleted()
            ->latest()
            ->paginate(15);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * List completed reservations (history).
     */
    public function history()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->completed()
            ->notArchived()
            ->latest('completed_at')
            ->paginate(15);

        return view('admin.reservations.history', compact('reservations'));
    }

    /**
     * Clear all completed reservations from history (archive them).
     */
    public function clearAllHistory()
    {
        $count = Reservation::completed()->notArchived()->count();
        
        if ($count === 0) {
            return back()->with('info', "No completed reservations to clear.");
        }

        Reservation::completed()->notArchived()->update(['archived_at' => now()]);
        return back()->with('success', "History cleared! {$count} completed reservation(s) have been archived.");
    }

    /**
     * Confirm a pending reservation.
     */
    public function confirm($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'confirmed']);
        if ($reservation->room_id) {
            Room::whereKey($reservation->room_id)->update(['status' => 'occupied']);
        }

        return back()->with('success', "Reservation #{$id} has been confirmed.");
    }

    /**
     * Mark a confirmed reservation as completed (guest checked out).
     */
    public function markDone($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Only allow marking as done if the reservation is confirmed
        if ($reservation->status !== 'confirmed') {
            return back()->with('error', "Reservation #{$id} must be confirmed before marking as done.");
        }

        $reservation->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
        
        if ($reservation->room_id) {
            Room::whereKey($reservation->room_id)->update(['status' => 'available']);
        }

        return back()->with('success', "Reservation #{$id} has been marked as completed and moved to history.");
    }

    /**
     * Cancel a reservation.
     */
    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'cancelled']);
        if ($reservation->room_id) {
            Room::whereKey($reservation->room_id)->update(['status' => 'available']);
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
            Room::whereKey($reservation->room_id)->update(['status' => 'available']);
        }
        $reservation->delete();

        return redirect()->route('admin.reservations.index')
            ->with('success', "Reservation #{$id} has been deleted.");
    }
}
