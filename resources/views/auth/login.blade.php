<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In — Radiant Hotel Pangasinan</title>
    <meta name="description" content="Sign in to access your Radiant Hotel account or the admin portal.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>

    {{-- ── LEFT: Image Panel ── --}}
    <div class="login-image">
        <img src="{{ asset('images/Island-Summer-Package.jpg') }}"
             alt="Radiant Hotel — Island Summer Package"
             fetchpriority="high">
        <div class="login-image-overlay"></div>
        <div class="login-image-brand">
            <div class="pkg-badge">
                <span class="pkg-badge-dot"></span>
                <span class="pkg-badge-text">Island Summer Package</span>
            </div>
            <h2 class="login-image-title">
                Welcome Back<br>to <em>Radiant Hotel</em>
            </h2>
            <span class="login-image-divider"></span>
            <p class="login-image-desc">
                Linger along the shores of Lingayen Gulf. Sign in to manage your reservations, explore our latest offers, and continue your luxury experience.
            </p>
        </div>
    </div>

    {{-- ── RIGHT: Login Form Panel ── --}}
    <div class="login-panel">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="login-logo" aria-label="Back to Radiant Hotel">
            <div class="login-logo-mark">
                <div class="login-logo-monogram">RH</div>
            </div>
            <div class="login-logo-text">
                Radiant Hotel
                <span class="login-logo-sub">Lingayen, Pangasinan</span>
            </div>
        </a>

        {{-- Heading --}}
        <div class="login-heading">
            <span class="login-eyebrow">Admin Portal</span>
            <h1 class="login-title">Sign <em>In</em></h1>
            <p class="login-sub">Enter your credentials to access the hotel management dashboard.</p>
            <span class="gold-line"></span>
        </div>

        {{-- Error alert --}}
        @if($errors->any())
            <div class="login-error">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form --}}
        <form class="login-form" action="{{ route('login.post') }}" method="POST" novalidate>
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    value="{{ old('email') }}"
                    placeholder="admin@radianthotel.com"
                    required
                    autocomplete="email"
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="password-toggle-wrapper" style="position: relative; display: flex; align-items: center; width: 100%;">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                        style="padding-right: 2.75rem;"
                    >
                    <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 1rem; border: none; background: none; color: var(--text-light); display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0.25rem;">
                        <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="form-remember">
                <label class="remember-label">
                    <input type="checkbox" name="remember" class="remember-checkbox">
                    Remember me
                </label>
            </div>

            <button type="submit" class="login-btn">
                <span>Sign In to Dashboard</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="position:relative;z-index:1">
                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                </svg>
            </button>
        </form>

        {{-- Back to site --}}
        <a href="{{ route('home') }}" class="login-back">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
            </svg>
            Back to Hotel Website
        </a>

        <p class="login-footer-note">
            © {{ date('Y') }} Radiant Hotel Pangasinan · All rights reserved<br>
            <span style="color: rgba(0,0,0,0.3);">Authorized personnel only</span>
        </p>

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
    </script>

</body>
</html>