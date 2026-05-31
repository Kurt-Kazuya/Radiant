<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Payments</title>
</head>
<body>
    <h2>Manage Payments</h2>
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
                <th>Reservation ID</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Paid At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->reservation->user->name ?? 'N/A' }}</td>
                <td>#{{ $p->reservation_id }}</td>
                <td>&#8369;{{ number_format($p->amount, 2) }}</td>
                <td>{{ ucfirst($p->payment_method) }}</td>
                <td>{{ ucfirst($p->payment_status) }}</td>
                <td>{{ $p->paid_at ? \Carbon\Carbon::parse($p->paid_at)->format('M d, Y') : 'N/A' }}</td>
                <td>
                    @if($p->payment_status !== 'paid')
                        <form action="{{ route('admin.payments.markPaid', $p->id) }}" method="POST" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit">Mark Paid</button>
                        </form> |
                    @endif
                    <form action="{{ route('admin.payments.destroy', $p) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Delete this payment?')">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="8">No payments found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>
    {{ $payments->links() }}
</body>
</html>