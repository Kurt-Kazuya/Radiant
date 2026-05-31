<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Reservations</title>
</head>
<body>
    <h2>Manage Reservations</h2>
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

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Guest</th>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Nights</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name ?? 'N/A' }}</td>
                <td>Room {{ $r->room->room_number ?? 'N/A' }}</td>
                <td>{{ $r->check_in_date }}</td>
                <td>{{ $r->check_out_date }}</td>
                <td>{{ $r->total_nights }}</td>
                <td>&#8369;{{ number_format($r->total_price, 2) }}</td>
                <td>{{ ucfirst($r->status) }}</td>
                <td>
                    @if($r->status === 'pending')
                        <form action="{{ route('admin.reservations.confirm', $r->id) }}" method="POST" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit">Confirm</button>
                        </form> |
                        <form action="{{ route('admin.reservations.cancel', $r->id) }}" method="POST" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit">Cancel</button>
                        </form> |
                    @endif
                    <form action="{{ route('admin.reservations.destroy', $r) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Delete this reservation?')">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="9">No reservations found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>
    {{ $reservations->links() }}
</body>
</html>