<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Rooms</title>
</head>
<body>
    <h2>Manage Rooms</h2>
    <hr>

    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('admin.rooms.index') }}">Rooms</a> |
        <a href="{{ route('admin.reservations.index') }}">Reservations</a> |
        <a href="{{ route('admin.payments.index') }}">Payments</a> |
        <a href="{{ route('reports.index') }}">Reports</a> |
        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <hr>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.rooms.create') }}">+ Add New Room</a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Room No.</th>
                <th>Type</th>
                <th>Price/Night</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ ucfirst($room->type) }}</td>
                <td>&#8369;{{ number_format($room->price_per_night, 2) }}</td>
                <td>{{ ucfirst($room->status) }}</td>
                <td>
                    <a href="{{ route('admin.rooms.edit', $room) }}">Edit</a> |
                    <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Delete this room?')">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6">No rooms found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>
    {{ $rooms->links() }}
</body>
</html>