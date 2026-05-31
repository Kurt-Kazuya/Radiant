{{-- resources/views/admin/reservations/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manage Reservations')
@section('topbar-title', 'Reservations')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Bookings</span>
        <h1 class="page-header-title">Manage <em>Reservations</em></h1>
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

<div class="card">
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
                    <th>Actions</th>
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
                    <td>
                        <div class="table-actions">
                            @if($r->status === 'pending')
                                <form action="{{ route('admin.reservations.confirm', $r->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-gold btn-sm">Confirm</button>
                                </form>
                                <form action="{{ route('admin.reservations.cancel', $r->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-outline btn-sm">Cancel</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.reservations.destroy', $r) }}" method="POST"
                                  onsubmit="return confirm('Delete reservation #{{ $r->id }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No reservations found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($reservations->hasPages())
    <div class="pagination-wrap">
        {{ $reservations->links() }}
    </div>
    @endif
</div>

@endsection