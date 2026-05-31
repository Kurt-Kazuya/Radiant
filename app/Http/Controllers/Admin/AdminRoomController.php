<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index() {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create() {
        return view('admin.rooms.create');
    }

    public function store(Request $request) {
        $request->validate([
            'room_number'     => 'required|unique:rooms',
            'type'            => 'required|in:single,double,suite',
            'price_per_night' => 'required|numeric|min:1',
            'status'          => 'required|in:available,occupied,maintenance',
            'description'     => 'nullable|string',
        ]);
        Room::create($request->all());
        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
    }

    public function edit(Room $room) {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room) {
        $request->validate([
            'room_number'     => 'required|unique:rooms,room_number,' . $room->id,
            'type'            => 'required|in:single,double,suite',
            'price_per_night' => 'required|numeric|min:1',
            'status'          => 'required|in:available,occupied,maintenance',
        ]);
        $room->update($request->all());
        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room) {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}