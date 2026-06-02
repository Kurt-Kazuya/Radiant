{{-- resources/views/admin/contact-messages/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('topbar-title', 'Contact Messages')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Communications</span>
        <h1 class="page-header-title">Guest <em>Messages</em></h1>
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
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr style="{{ $msg->is_read ? 'opacity: 0.7;' : 'font-weight: 500;' }}">
                    <td>{{ $msg->created_at->format('M d, Y g:i A') }}</td>
                    <td style="color:var(--text-dark);">
                        {{ $msg->name }}
                        @if($msg->company)
                            <br><span style="font-size: 0.7rem; color: var(--text-light); font-weight: 400;">{{ $msg->company }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="mailto:{{ $msg->email }}" style="color:var(--gold);text-decoration:none;">{{ $msg->email }}</a>
                        @if($msg->phone)
                            <br><span style="font-size: 0.7rem; color: var(--text-light); font-weight: 400;">{{ $msg->phone }}</span>
                        @endif
                    </td>
                    <td>{{ $msg->subject ?: '—' }}</td>
                    <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $msg->message }}">
                        {{ Str::limit($msg->message, 50) }}
                    </td>
                    <td>
                        @if($msg->is_read)
                            <span class="badge badge--maintenance">Read</span>
                        @else
                            <span class="badge badge--pending">Unread</span>
                        @endif
                    </td>
                    <td>
                        <div class="table-actions">
                            <button 
                                type="button" 
                                class="btn btn-outline btn-sm"
                                data-id="{{ $msg->id }}"
                                data-subject="{{ $msg->subject ?: 'No Subject' }}"
                                data-sender="{{ $msg->name }} &lt;{{ $msg->email }}&gt;"
                                data-message="{{ $msg->message }}"
                                data-isread="{{ $msg->is_read }}"
                                onclick="openMessageModal(this)"
                            >
                                View
                            </button>
                            <form action="{{ route('admin.contact-messages.destroy', $msg->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this message?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:3rem;color:var(--text-light);">
                        No contact messages found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($messages->hasPages())
    <div class="pagination-wrap">
        {{ $messages->links() }}
    </div>
    @endif
</div>

<!-- Message Modal -->
<div id="message-modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; padding: 1rem;">
    <div style="background: var(--white); padding: 2.5rem; border-radius: 8px; width: 100%; max-width: 800px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <h3 id="modal-subject" style="margin-bottom: 0.5rem; font-family: var(--font-display); font-size: 1.75rem; color: var(--navy);"></h3>
        <p style="font-size: 0.9rem; color: var(--text-light); margin-bottom: 1.5rem;">
            From: <strong id="modal-sender" style="color: var(--text-dark);"></strong>
        </p>
        <div id="modal-body" style="font-size: 1rem; color: var(--text-mid); line-height: 1.6; margin-bottom: 2rem; white-space: pre-wrap; word-wrap: break-word; word-break: break-word; overflow-x: hidden; background: var(--cream); padding: 1.5rem; border: 1px solid rgba(0,0,0,0.05); border-radius: 4px; max-height: 65vh; overflow-y: auto;"></div>
        
        <div style="text-align: right;">
            <button onclick="closeMessageModal()" class="btn btn-gold">Done</button>
        </div>
    </div>
</div>

<script>
    function openMessageModal(btn) {
        const id = btn.getAttribute('data-id');
        const subject = btn.getAttribute('data-subject');
        const sender = btn.getAttribute('data-sender');
        const message = btn.getAttribute('data-message');
        const isRead = btn.getAttribute('data-isread');

        document.getElementById('modal-subject').textContent = subject;
        document.getElementById('modal-sender').innerHTML = sender; // using innerHTML to decode &lt;
        document.getElementById('modal-body').textContent = message;
        document.getElementById('message-modal').style.display = 'flex';

        if (isRead === "0" || isRead === "") {
            fetch(`/admin/contact-messages/${id}/mark-read`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            // Update UI locally immediately
            btn.setAttribute('data-isread', '1');
            const row = btn.closest('tr');
            if (row) row.style.opacity = '0.7';
            const badge = row.querySelector('.badge');
            if (badge) {
                badge.className = 'badge badge--maintenance';
                badge.textContent = 'Read';
            }
        }
    }

    function closeMessageModal() {
        document.getElementById('message-modal').style.display = 'none';
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
            .catch(error => console.error('Error fetching new messages:', error));
    }, 10000);
</script>

@endsection
