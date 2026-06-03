{{-- resources/views/admin/profile/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'My Profile')
@section('topbar-title', 'Account Settings')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Settings</span>
        <h1 class="page-header-title">My <em>Profile</em></h1>
    </div>
</div>

@if(session('success'))
    <div id="success-alert" class="alert alert--success">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
        </svg>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if($errors->any())
    <div class="alert alert--error">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:0.3rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="card-title">Profile <em>Details</em></div>
    </div>
    <div class="form-wrap">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid-2">

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" class="form-input" value="{{ $user->name }}" disabled style="background:#faf7f2; color:var(--text-light); cursor:not-allowed;">
                    <span style="font-size:0.75rem; color:var(--text-light); margin-top:0.25rem;">Only email and password can be updated.</span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="role">Role</label>
                    <input type="text" id="role" class="form-input" value="{{ ucfirst($user->role) }}" disabled style="background:#faf7f2; color:var(--text-light); cursor:not-allowed;">
                </div>

                <div class="form-group form-group--full">
                    <label class="form-label" for="email">Email Address <span class="req" style="color:#e03131">*</span></label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">New Password</label>
                    <div class="password-toggle-wrapper" style="position: relative; display: flex; align-items: center; width: 100%;">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Leave blank to keep current password" style="padding-right: 2.75rem;">
                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 1rem; border: none; background: none; color: var(--text-light); display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0.25rem;">
                            <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm New Password</label>
                    <div class="password-toggle-wrapper" style="position: relative; display: flex; align-items: center; width: 100%;">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm your new password" style="padding-right: 2.75rem;">
                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password_confirmation', this)" style="position: absolute; right: 1rem; border: none; background: none; color: var(--text-light); display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0.25rem;">
                            <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-gold">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Update Profile
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility(fieldId, buttonEl) {
        const passwordInput = document.getElementById(fieldId);
        const eyeIcon = buttonEl.querySelector('svg');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
            `;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
        }
    }

    // Auto-dismiss success notif 2s
    document.addEventListener('DOMContentLoaded', () => {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                successAlert.style.opacity = '0';
                successAlert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 500);
            }, 2000);
        }
    });
</script>

@endsection
