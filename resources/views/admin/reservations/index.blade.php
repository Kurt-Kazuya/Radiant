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
    <div class="alert alert--success" id="admin-success-alert" style="transition: opacity 0.5s ease;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
            <polyline points="20 6 9 17 4 12"/>
        </svg>
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            const alert = document.getElementById('admin-success-alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
    </script>
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
                    <td style="font-weight:500;color:var(--text-dark);">{{ $r->user->name ?? 'Guest' }}</td>
                    <td>{{ $r->room->name ?? 'Room ' . ($r->room->room_number ?? 'N/A') }}<br><small style="color:var(--text-light);">Room {{ $r->room->room_number ?? 'N/A' }}</small></td>
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
                            <button type="button" class="btn btn-outline btn-sm"
                                data-id="{{ $r->id }}"
                                data-guest="{{ $r->user->name ?? 'Guest' }}"
                                data-room="{{ $r->room->name ?? 'Room ' . ($r->room->room_number ?? 'N/A') }} — Room {{ $r->room->room_number ?? 'N/A' }}"
                                data-checkin="{{ \Carbon\Carbon::parse($r->check_in_date)->format('M d, Y') }}"
                                data-checkout="{{ \Carbon\Carbon::parse($r->check_out_date)->format('M d, Y') }}"
                                data-nights="{{ $r->total_nights }}"
                                data-total="₱{{ number_format($r->total_price, 2) }}"
                                data-status="{{ ucfirst($r->status) }}"
                                onclick="openResModal(this)"
                            >View</button>
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

<!-- Reservation Modal -->
<div id="res-modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; padding: 1rem;">
    <div style="background: var(--white); padding: 2.5rem; border-radius: 8px; width: 100%; max-width: 600px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <h3 style="margin-bottom: 1.5rem; font-family: var(--font-display); font-size: 1.5rem; color: var(--navy);">Reservation Details <span id="modal-res-id" style="color: var(--gold);"></span></h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem; font-size: 0.95rem;">
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Guest Name:</strong><br><span id="modal-res-guest" style="color:var(--text-dark);font-weight:500;"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Room:</strong><br><span id="modal-res-room" style="color:var(--text-dark);"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Check-In:</strong><br><span id="modal-res-checkin" style="color:var(--text-dark);"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Check-Out:</strong><br><span id="modal-res-checkout" style="color:var(--text-dark);"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Nights:</strong><br><span id="modal-res-nights" style="color:var(--text-dark);"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Total Price:</strong><br><span id="modal-res-total" style="color:var(--gold);font-weight:500;"></span></div>
            <div><strong style="color:var(--text-light);font-size:0.8rem;text-transform:uppercase;">Status:</strong><br><span id="modal-res-status" style="color:var(--text-dark);font-weight:500;"></span></div>
        </div>
        
        <div style="text-align: right;">
            <button onclick="closeResModal()" class="btn btn-gold">Done</button>
        </div>
    </div>
</div>

<script>
    function openResModal(btn) {
        document.getElementById('modal-res-id').textContent = '#' + btn.getAttribute('data-id');
        document.getElementById('modal-res-guest').textContent = btn.getAttribute('data-guest');
        document.getElementById('modal-res-room').textContent = btn.getAttribute('data-room');
        document.getElementById('modal-res-checkin').textContent = btn.getAttribute('data-checkin');
        document.getElementById('modal-res-checkout').textContent = btn.getAttribute('data-checkout');
        document.getElementById('modal-res-nights').textContent = btn.getAttribute('data-nights');
        document.getElementById('modal-res-total').textContent = btn.getAttribute('data-total');
        document.getElementById('modal-res-status').textContent = btn.getAttribute('data-status');
        
        document.getElementById('res-modal').style.display = 'flex';
    }
    
    function closeResModal() {
        document.getElementById('res-modal').style.display = 'none';
    }

    // Auto-refresh the table every 10 seconds without reloading the page
    setInterval(() => {
        fetch(window.location.href)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newTable = doc.querySelector('.data-table');
                const currentTable = document.querySelector('.data-table');
                if (newTable && currentTable) {
                    currentTable.innerHTML = newTable.innerHTML;
                }
            })
            .catch(error => console.error('Error fetching new reservations:', error));
    }, 10000);
</script>

@endsection