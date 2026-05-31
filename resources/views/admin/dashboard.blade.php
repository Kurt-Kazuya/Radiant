<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
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

    <h3>Overview</h3>
    <p>Total Reservations: {{ $totalReservations }}</p>
    <p>Confirmed: {{ $confirmed }}</p>
    <p>Pending: {{ $pending }}</p>
    <p>Cancelled: {{ $cancelled }}</p>
    <p>Total Revenue: &#8369;{{ number_format($totalRevenue, 2) }}</p>
    <p>Total Rooms: {{ $totalRooms }}</p>
    <p>Available Rooms: {{ $availableRooms }}</p>
    <p>Total Guests: {{ $totalGuests }}</p>
    <hr>

    <h3>Recent Reservations</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Guest</th>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentReservations as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name ?? 'N/A' }}</td>
                <td>Room {{ $r->room->room_number ?? 'N/A' }}</td>
                <td>{{ $r->check_in_date }}</td>
                <td>{{ $r->check_out_date }}</td>
                <td>&#8369;{{ number_format($r->total_price, 2) }}</td>
                <td>{{ ucfirst($r->status) }}</td>
            </tr>
            @empty
            <tr><td colspan="7">No reservations yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>