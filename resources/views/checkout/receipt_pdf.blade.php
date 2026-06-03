<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reservation Receipt - {{ $reservation->id }}</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 40px;
            background: #f4f4f4;
        }
        .coupon-wrapper {
            width: 400px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            padding: 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            background-color: #fcfaf5;
            padding: 30px 20px 20px;
            border-bottom: 1px solid #eaeaea;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #D4AF37;
            border: 2px solid #D4AF37;
            display: inline-block;
            padding: 4px 10px;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }
        .header h1 {
            color: #0A192F;
            font-size: 20px;
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .header p {
            margin: 0;
            color: #666;
            font-size: 13px;
        }
        .header p strong {
            background-color: #eee;
            padding: 2px 6px;
            border-radius: 4px;
            color: #333;
            font-weight: bold;
        }
        .body-section {
            padding: 20px;
            position: relative;
        }
        .official-seal {
            position: absolute;
            top: 220px;
            left: 200px;
            width: 120px;
            height: 120px;
            border: 4px double #D4AF37;
            border-radius: 50%;
            opacity: 0.15;
            z-index: -1;
            text-align: center;
        }
        .seal-inner {
            margin-top: 32px;
            color: #D4AF37;
            font-family: serif;
            text-transform: uppercase;
        }
        .seal-inner span {
            font-size: 8px;
            display: block;
            letter-spacing: 2px;
        }
        .seal-inner strong {
            font-size: 16px;
            display: block;
            border-top: 1px solid #D4AF37;
            border-bottom: 1px solid #D4AF37;
            padding: 2px 0;
            margin: 2px 0;
        }
        .notice {
            background-color: #fcfaf5;
            border: 1px solid #eaeaea;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #0A192F;
            text-align: center;
            border-radius: 4px;
        }
        table.grid {
            width: 100%;
            border-collapse: collapse;
        }
        table.grid td {
            width: 50%;
            padding: 10px 0;
            vertical-align: top;
        }
        .label {
            font-size: 10px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 4px;
        }
        .value {
            font-size: 13px;
            color: #333;
            display: inline-block;
        }
        .highlight-box {
            background-color: #f5f5f5;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid #eaeaea;
            font-weight: bold;
        }
        .value.ref-number {
            font-family: monospace;
            font-size: 15px;
            letter-spacing: 1px;
        }
        .footer {
            background-color: #fafafa;
            padding: 20px;
            border-top: 1px solid #eaeaea;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        table.total-table {
            width: 100%;
        }
        table.total-table td.label-col {
            font-size: 14px;
            color: #666;
            font-weight: normal;
        }
        table.total-table td.val-col {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
            color: #D4AF37;
        }
    </style>
</head>
<body>
    <div class="coupon-wrapper">
        <div class="header">
            <div class="logo">RADIANT</div>
            <h1>Reservation Confirmed</h1>
            <p>Thank you for choosing us, <strong>{{ $reservation->user->name }}</strong>!</p>
        </div>

        <div class="body-section">
            <!-- Official Seal Watermark -->
            <div class="official-seal">
                <div class="seal-inner">
                    <span>Approved</span>
                    <strong>RADIANT</strong>
                    <span>Hotel</span>
                </div>
            </div>

            <div class="notice">
                Please present this receipt along with a valid ID at the reception.
            </div>

            <table class="grid">
                <tr>
                    <td>
                        <span class="label">Guest Name</span>
                        <span class="value highlight-box">{{ $reservation->user->name }}</span>
                    </td>
                    <td>
                        <span class="label">Reservation #</span>
                        <span class="value ref-number highlight-box">{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="label">Check-In</span>
                        <span class="value highlight-box">{{ \Carbon\Carbon::parse($reservation->check_in_date)->format('M d, Y') }}</span>
                    </td>
                    <td>
                        <span class="label">Check-Out</span>
                        <span class="value highlight-box">{{ \Carbon\Carbon::parse($reservation->check_out_date)->format('M d, Y') }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px;">
                        <span class="label">Room Details</span>
                        <span class="value highlight-box">{{ $reservation->room ? $reservation->room->name : 'Standard Room' }} &middot; {{ $reservation->total_nights }} {{ $reservation->total_nights == 1 ? 'Night' : 'Nights' }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px;">
                        <span class="label">Payment Method</span>
                        <span class="value highlight-box">{{ $reservation->payment ? str_replace('_', ' ', \Illuminate\Support\Str::title($reservation->payment->payment_method)) : 'N/A' }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <table class="total-table" style="margin-bottom: 20px;">
                <tr>
                    <td class="label-col">Total Amount</td>
                    <td class="val-col">PHP {{ number_format($reservation->total_price, 2) }}</td>
                </tr>
            </table>
            <div style="text-align: center; font-size: 11px; color: #999; margin-top: 10px;">
                Radiant Hotel &middot; 123 Resort Drive, Lingayen, Pangasinan<br>
                {{ \App\Models\User::where('role', 'admin')->value('email') ?? 'radianthotel2026@gmail.com' }} &middot; +63 930 560 2635
            </div>
        </div>
    </div>
</body>
</html>
