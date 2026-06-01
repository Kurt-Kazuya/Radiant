<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomApiController extends Controller
{
// GET /api/rooms
    public function index() {
        $rooms = Room::all();
        return response()->json(['success' => true, 'data' => $rooms], 200);
    }




// GET /api/rooms/{id}
    public function show($id) {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['success' => false, 'message' => 'Room not found'], 404);
        }
        return response()->json(['success' => true, 'data' => $room], 200);
    }

// POST /api/rooms
    public function store(Request $request) {
        $validated = $request->validate([
            'room_number'     => 'required|unique:rooms',
            'type'            => 'required|in:single,double,suite',
            'price_per_night' => 'required|numeric',
            'status'          => 'required|in:available,occupied,maintenance',
            'description'     => 'nullable|string',
        ]);
        $room = Room::create($validated);
        return response()->json(['success' => true, 'data' => $room], 201);
    }

// PUT /api/rooms/{id}
    public function update(Request $request, $id) {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['success' => false, 'message' => 'Room not found'], 404);
        }
        $room->update($request->all());
        return response()->json(['success' => true, 'data' => $room], 200);
    }

// DELETE /api/rooms/{id}
    public function destroy($id) {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['success' => false, 'message' => 'Room not found'], 404);
        }
        $room->delete();
        return response()->json(['success' => true, 'message' => 'Room deleted'], 200);
    }

// GET /api/available-rooms
    public function available() {
        $rooms = Room::where('status', 'available')->get();
        return response()->json(['success' => true, 'data' => $rooms], 200);
    }
}