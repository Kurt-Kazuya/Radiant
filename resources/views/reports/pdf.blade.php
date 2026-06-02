<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservations Report</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; color: #334155; line-height: 1.5; }
        .header { text-align: center; margin-bottom: 24px; border-bottom: 1px solid #e2e8f0; padding-bottom: 16px; }
        .header h1 { margin: 0; font-size: 22px; font-weight: 600; color: #0f172a; letter-spacing: -0.5px; }
        .header p { margin: 6px 0 0 0; color: #64748b; font-size: 11px; letter-spacing: 0.2px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th { background-color: #f8fafc; color: #64748b; padding: 10px 8px; text-align: left; font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #cbd5e1; }
        td { padding: 10px 8px; border-bottom: 1px solid #f1f5f9; font-size: 11px; color: #334155; }
        .badge { font-weight: 600; font-size: 10px; letter-spacing: 0.3px; text-transform: uppercase; }
        .confirmed { color: #059669; }
        .pending   { color: #d97706; }
        .cancelled { color: #dc2626; }
        .footer { margin-top: 32px; text-align: center; font-size: 10px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 12px; }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <h1>Hotel Reservation System</h1>
        <p>Reservations Report - Generated on {{ now()->format('F d, Y h:i A') }}</p>
    </div>

    {{-- Summary --}}
    <table style="margin-bottom: 16px;">
        <tr>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <span style="color:#666; font-size:10px; text-transform:uppercase;">Total</span><br>
                <strong style="font-size:18px; color:#000000;">{{ $reservations->count() }}</strong>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <span style="color:#666; font-size:10px; text-transform:uppercase;">Confirmed</span><br>
                <strong style="font-size:18px; color:#000000;">{{ $reservations->where('status','confirmed')->count() }}</strong>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <span style="color:#666; font-size:10px; text-transform:uppercase;">Pending</span><br>
                <strong style="font-size:18px; color:#000000;">{{ $reservations->where('status','pending')->count() }}</strong>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                <span style="color:#666; font-size:10px; text-transform:uppercase;">Cancelled</span><br>
                <strong style="font-size:18px; color:#000000;">{{ $reservations->where('status','cancelled')->count() }}</strong>
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
                <td>PHP {{ number_format($r->total_price, 2) }}</td>
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
        Hotel Reservation System - Confidential Report - {{ now()->format('Y') }}
    </div>

</body>
</html>