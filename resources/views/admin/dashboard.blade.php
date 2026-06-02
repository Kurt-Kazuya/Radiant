{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('topbar-title', 'Admin Dashboard')

@section('head')
    <!-- Automatically refresh the dashboard every 30 seconds -->
    <meta http-equiv="refresh" content="30">
@endsection

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Overview</span>
        <h1 class="page-header-title">Property <em>Dashboard</em></h1>
    </div>
</div>

{{-- Stats Grid --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Reservations</div>
        <div class="stat-value mono">{{ $totalReservations }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Confirmed</div>
        <div class="stat-value mono">{{ $confirmed }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Pending</div>
        <div class="stat-value mono">{{ $pending }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Cancelled</div>
        <div class="stat-value mono">{{ $cancelled }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Revenue</div>
        <div class="stat-value mono">₱{{ number_format($totalRevenue, 2) }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Rooms</div>
        <div class="stat-value mono">{{ $totalRooms }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Available Rooms</div>
        <div class="stat-value mono">{{ $availableRooms }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Guests</div>
        <div class="stat-value mono">{{ $totalGuests }}</div>
    </div>
</div>

{{-- Recent Reservations --}}
<div class="card">
    <div class="card-header">
        <div class="card-title">Recent <em>Reservations</em></div>
        <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline btn-sm">View All</a>
    </div>
    <div class="card-body">
        <table class="data-table">
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
                    <td style="color:var(--text-light);">{{ $r->id }}</td>
                    <td style="font-weight:500;color:var(--text-dark);">{{ $r->user->name ?? 'N/A' }}</td>
                    <td>Room {{ $r->room->room_number ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->check_in_date)->format('M d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->check_out_date)->format('M d, Y') }}</td>
                    <td style="font-weight:500;">₱{{ number_format($r->total_price, 2) }}</td>
                    <td>
                        <span class="badge badge--{{ strtolower($r->status) }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No reservations yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection