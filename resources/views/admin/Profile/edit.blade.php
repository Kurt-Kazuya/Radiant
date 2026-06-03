{{-- resources/views/admin/profile/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Profile')
@section('topbar-title', 'Profile Settings')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Account</span>
        <h1 class="page-header-title">Profile <em>Settings</em></h1>
    </div>
</div>

{{-- Success / Error Alerts --}}
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
            if (alert) { alert.style.opacity = '0'; setTimeout(() => alert.remove(), 500); }
        }, 3000);
    </script>
@endif

@if(session('error'))
    <div class="alert alert--error">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        {{ session('error') }}
    </div>
@endif

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">

    {{-- ── Update Email & Name ── --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">Account <em>Information</em></div>
        </div>
        <div class="form-wrap">
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf @method('PUT')

                @if($errors->updateInfo->any())
                    <div class="alert alert--error" style="margin-bottom:1.25rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <ul style="list-style:none;display:flex;flex-direction:column;gap:0.3rem;">
                            @foreach($errors->updateInfo->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group" style="margin-bottom:1.25rem;">
                    <label class="form-label" for="name">Full Name <span class="req">*</span></label>
                    <input type="text" id="name" name="name"
                           class="form-input"
                           value="{{ old('name', Auth::user()->name) }}"
                           required>
                </div>

                <div class="form-group" style="margin-bottom:1.5rem;">
                    <label class="form-label" for="email">Email Address <span class="req">*</span></label>
                    <input type="email" id="email" name="email"
                           class="form-input"
                           value="{{ old('email', Auth::user()->email) }}"
                           required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                            <polyline points="17,21 17,13 7,13 7,21"/><polyline points="7,3 7,8 15,8"/>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ── Change Password ── --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">Change <em>Password</em></div>
        </div>
        <div class="form-wrap">
            <form action="{{ route('admin.profile.password') }}" method="POST">
                @csrf @method('PUT')

                @if($errors->updatePassword->any())
                    <div class="alert alert--error" style="margin-bottom:1.25rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <ul style="list-style:none;display:flex;flex-direction:column;gap:0.3rem;">
                            @foreach($errors->updatePassword->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group" style="margin-bottom:1.25rem;">
                    <label class="form-label" for="current_password">Current Password <span class="req">*</span></label>
                    <input type="password" id="current_password" name="current_password"
                           class="form-input"
                           placeholder="Enter current password"
                           required>
                </div>

                <div class="form-group" style="margin-bottom:1.25rem;">
                    <label class="form-label" for="password">New Password <span class="req">*</span></label>
                    <input type="password" id="password" name="password"
                           class="form-input"
                           placeholder="Min. 8 characters"
                           required>
                </div>

                <div class="form-group" style="margin-bottom:1.5rem;">
                    <label class="form-label" for="password_confirmation">Confirm New Password <span class="req">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-input"
                           placeholder="Repeat new password"
                           required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
