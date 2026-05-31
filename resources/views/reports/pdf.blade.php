<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservations Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 0; font-size: 20px; }
        .header p { margin: 4px 0; color: #666; }
        .stats { display: flex; gap: 10px; margin-bottom: 20px; }
        .stat-box { border: 1px solid #ddd; padding: 8px 14px; border-radius: 4px; text-align: center; flex: 1; }
        .stat-box h3 { margin: 0; font-size: 18px; color: #2563eb; }
        .stat-box p { margin: 0; font-size: 10px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #1e293b; color: white; padding: 8px; text-align: left; font-size: 11px; }
        td { padding: 7px 8px; border-bottom: 1px solid #eee; font-size: 11px; }
        tr:nth-child(even) { background-color: #f8fafc; }
        .badge { padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold; }
        .confirmed { background: #dcfce7; color: #166534; }
        .pending   { background: #fef9c3; color: #854d0e; }
        .cancelled { background: #fee2e2; color: #991b1b; }
        .footer { margin-top: 20px; text-align: center; font-size: 10px; color: #999; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <h1>🏨 Hotel Reservation System</h1>
        <p>Reservations Report — Generated on {{ now()->format('F d, Y h:i A') }}</p>
    </div>

    {{-- Summary --}}
    <table style="margin-bottom: 16px;">
        <tr>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <strong>Total</strong><br>
                <span style="font-size:18px; color:#2563eb;">{{ $reservations->count() }}</span>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <strong>Confirmed</strong><br>
                <span style="font-size:18px; color:#16a34a;">{{ $reservations->where('status','confirmed')->count() }}</span>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <strong>Pending</strong><br>
                <span style="font-size:18px; color:#d97706;">{{ $reservations->where('status','pending')->count() }}</span>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <strong>Cancelled</strong><br>
                <span style="font-size:18px; color:#dc2626;">{{ $reservations->where('status','cancelled')->count() }}</span>
            </td>
        </tr>
    </table>

    {{-- Table --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Room</th>
                <th>Type</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Nights</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name ?? 'N/A' }}</td>
                <td>{{ $r->room->room_number ?? 'N/A' }}</td>
                <td>{{ ucfirst($r->room->type ?? 'N/A') }}</td>
                <td>{{ $r->check_in_date }}</td>
                <td>{{ $r->check_out_date }}</td>
                <td>{{ $r->total_nights }}</td>
                <td>₱{{ number_format($r->total_price, 2) }}</td>
                <td>
                    <span class="badge {{ $r->status }}">
                        {{ ucfirst($r->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align:center; padding:20px; color:#999;">
                    No reservations found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer --}}
    <div class="footer">
        Hotel Reservation System — Confidential Report — {{ now()->format('Y') }}
    </div>

</body>
</html>