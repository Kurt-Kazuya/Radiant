@extends('layouts.admin')

@section('title', 'Reports')
@section('topbar-title', 'Reports & Analytics')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Analytics</span>
        <h1 class="page-header-title">Reports <em>Dashboard</em></h1>
    </div>
</div>

@if(session('success'))
    <div class="alert alert--success">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
            <polyline points="20 6 9 17 4 12"/>
        </svg>
        {{ session('success') }}
    </div>
@endif

{{-- Stats --}}
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
</div>

{{-- Export Actions --}}
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-header">
        <div class="card-title">Export <em>Reports</em></div>
    </div>
    <div class="card-body" style="padding: 1.5rem 2rem; display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
        <a href="{{ route('admin.reports.pdf') }}" class="btn btn-outline">
            📄 Export PDF
        </a>
        <a href="{{ route('admin.reports.excel') }}" class="btn btn-outline">
            📊 Export Excel
        </a>
        <a href="{{ route('admin.reports.csv') }}" class="btn btn-outline">
            📋 Export CSV
        </a>
        <div style="margin-left: auto;">
            <form action="{{ route('admin.reports.import') }}" method="POST" enctype="multipart/form-data"
                  style="display: flex; gap: 0.75rem; align-items: center;">
                @csrf
                <input type="file" name="file" accept=".csv,.xlsx,.xls" required
                       style="font-size: 0.85rem; color: var(--text-mid);">
                <button type="submit" class="btn btn-gold btn-sm">Import</button>
                @error('file')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
</div>

{{-- Recent Reservations --}}
<div class="card">
    <div class="card-header">
        <div class="card-title">Recent <em>Reservations</em> (Last 10)</div>
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
                    <th>Nights</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $r)
                <tr>
                    <td style="color:var(--text-light);">{{ $r->id }}</td>
                    <td style="font-weight:500;color:var(--text-dark);">{{ $r->user->name ?? 'N/A' }}</td>
                    <td>Room {{ $r->room->room_number ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->check_in_date)->format('M d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->check_out_date)->format('M d, Y') }}</td>
                    <td style="text-align:center;">{{ $r->total_nights }}</td>
                    <td style="font-weight:500;">₱{{ number_format($r->total_price, 2) }}</td>
                    <td>
                        <span class="badge badge--{{ strtolower($r->status) }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No reservations yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
