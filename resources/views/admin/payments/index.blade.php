{{-- resources/views/admin/payments/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manage Payments')
@section('topbar-title', 'Payments')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Finance</span>
        <h1 class="page-header-title">Manage <em>Payments</em></h1>
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
                setTimeout(() => alert.remove(), 300);
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
                    <th>Reservation</th>
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
                    <td style="color:var(--text-light);">{{ $p->id }}</td>
                    <td style="font-weight:500;color:var(--text-dark);">{{ $p->reservation->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.reservations.index') }}"
                           style="color:var(--gold);font-weight:500;text-decoration:none;">
                            #{{ $p->reservation_id }}
                        </a>
                    </td>
                    <td style="font-weight:600;">₱{{ number_format($p->amount, 2) }}</td>
                    <td>{{ ucfirst($p->payment_method) }}</td>
                    <td>
                        <span class="badge badge--{{ $p->payment_status === 'paid' ? 'paid' : 'unpaid' }}">
                            {{ ucfirst($p->payment_status) }}
                        </span>
                    </td>
                    <td>{{ $p->paid_at ? \Carbon\Carbon::parse($p->paid_at)->format('M d, Y') : '—' }}</td>
                    <td>
                        <div class="table-actions">
                            @if($p->payment_status !== 'paid')
                                <form action="{{ route('admin.payments.markPaid', $p->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-gold btn-sm">Paid</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.payments.destroy', $p) }}" method="POST"
                                  onsubmit="return confirm('Delete this payment record?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No payments found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($payments->hasPages())
    <div class="pagination-wrap">
        {{ $payments->links() }}
    </div>
    @endif
</div>

<script>
    // Auto-refresh 3s
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
            .catch(error => console.error('Error fetching payments:', error));
    }, 3000);
</script>

@endsection