<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::with(['user', 'room'])->latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation) {
        $reservation->load(['user', 'room', 'payment']);
        return view('admin.reservations.show', compact('reservation'));
    }

    public function confirm($id) {
        Reservation::findOrFail($id)->update(['status' => 'confirmed']);
        return back()->with('success', 'Reservation confirmed!');
    }

    public function cancel($id) {
        Reservation::findOrFail($id)->update(['status' => 'cancelled']);
        return back()->with('success', 'Reservation cancelled!');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted!');
    }
}