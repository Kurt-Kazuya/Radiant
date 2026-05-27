<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationApiController extends Controller
{
// GET /api/reservations
    public function index() {
        $reservations = Reservation::with(['user', 'room'])->get();
        return response()->json(['success' => true, 'data' => $reservations], 200);
    }

// GET /api/reservations/{id}
    public function show($id) {
        $reservation = Reservation::with(['user', 'room', 'payment'])->find($id);
        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Reservation not found'], 404);
        }
        return response()->json(['success' => true, 'data' => $reservation], 200);
    }

// POST /api/reservations
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'room_id'       => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date'=> 'required|date|after:check_in_date',
            'total_nights'  => 'required|integer|min:1',
            'total_price'   => 'required|numeric',
            'status'        => 'required|in:pending,confirmed,cancelled',
        ]);
        $reservation = Reservation::create($validated);
        return response()->json(['success' => true, 'data' => $reservation], 201);
    }

// PUT /api/reservations/{id}
    public function update(Request $request, $id) {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Reservation not found'], 404);
        }
        $reservation->update($request->all());
        return response()->json(['success' => true, 'data' => $reservation], 200);
    }

// DELETE /api/reservations/{id}
    public function destroy($id) {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Reservation not found'], 404);
        }
        $reservation->delete();
        return response()->json(['success' => true, 'message' => 'Reservation deleted'], 200);
    }
}