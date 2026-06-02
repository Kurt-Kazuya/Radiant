{{-- resources/views/admin/rooms/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manage Rooms')
@section('topbar-title', 'Rooms')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Inventory</span>
        <h1 class="page-header-title">Manage <em>Rooms</em></h1>
    </div>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-gold">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Add New Room
    </a>
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
                    <th>Room No.</th>
                    <th>Type</th>
                    <th>Price / Night</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                <tr>
                    <td style="color:var(--text-light);">{{ $room->id }}</td>
                    <td style="font-weight:600;color:var(--navy);font-size:0.95rem;">{{ $room->room_number }}</td>
                    <td>{{ ucfirst($room->type) }}</td>
                    <td style="font-weight:500;">₱{{ number_format($room->price_per_night, 2) }}</td>
                    <td>
                        <span class="badge badge--{{ strtolower($room->status) }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-outline btn-sm">Edit</a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST"
                                  onsubmit="return confirm('Delete Room {{ $room->room_number }}? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No rooms found. <a href="{{ route('admin.rooms.create') }}" style="color:var(--gold);">Add the first room.</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($rooms->hasPages())
    <div class="pagination-wrap">
        {{ $rooms->links() }}
    </div>
    @endif
</div>

<script>
    // Auto-refresh 5s
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
            .catch(error => console.error('Error fetching new rooms:', error));
    }, 5000);
</script>

@endsection