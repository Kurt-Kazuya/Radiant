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

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 16px; height: 100%; }

        :root {
            --navy:       #0d1b2a;
            --navy-mid:   #1a2d42;
            --gold:       #c8a96e;
            --gold-light: #dfc18e;
            --gold-pale:  #f5ecd8;
            --white:      #ffffff;
            --text-dark:  #1a1a2e;
            --text-mid:   #4a5568;
            --text-light: #718096;
            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body:    'Outfit', sans-serif;
        }

        body {
            font-family: var(--font-body);
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* ── LEFT: Background image panel ── */
        .login-image {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: none; /* hidden on mobile */
        }
        @media (min-width: 900px) {
            .login-image { display: block; }
        }

        .login-image img {
            width: 100%; height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .login-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                135deg,
                rgba(13, 27, 42, 0.60) 0%,
                rgba(13, 27, 42, 0.25) 60%,
                rgba(13, 27, 42, 0.50) 100%
            );
        }

        /* Hotel branding overlay on image */
        .login-image-brand {
            position: absolute;
            bottom: 3rem;
            left: 3rem;
            right: 3rem;
        }
        .login-image-eyebrow {
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--gold-light);
            display: block;
            margin-bottom: 0.75rem;
        }
        .login-image-title {
            font-family: var(--font-display);
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            font-weight: 300;
            line-height: 1.1;
            color: var(--white);
            margin-bottom: 1rem;
        }
        .login-image-title em {
            color: var(--gold-light);
            font-style: italic;
        }
        .login-image-divider {
            display: block;
            width: 48px;
            height: 1px;
            background: var(--gold);
            margin-bottom: 1rem;
        }
        .login-image-desc {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.65);
            line-height: 1.7;
            max-width: 340px;
        }

        /* Package badge */
        .pkg-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            padding: 0.45rem 1rem;
            background: rgba(200, 169, 110, 0.2);
            border: 1px solid rgba(200, 169, 110, 0.45);
            backdrop-filter: blur(6px);
        }
        .pkg-badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--gold);
            animation: pulse 2s infinite;
        }
        .pkg-badge-text {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold-light);
            font-weight: 500;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.85); }
        }

        /* ── RIGHT: Login form panel ── */
        .login-panel {
            width: 100%;
            max-width: 480px;
            background: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem 3.5rem;
            position: relative;
            z-index: 2;
        }
        @media (max-width: 899px) {
            .login-panel {
                max-width: 100%;
                min-height: 100vh;
                padding: 2.5rem 2rem;
                /* On mobile show the image as background */
                background-image: url('{{ asset("images/Island-Summer-Package.jpg") }}');
                background-size: cover;
                background-position: center;
            }
            .login-panel::before {
                content: '';
                position: absolute;
                inset: 0;
                background: rgba(13, 27, 42, 0.75);
                z-index: 0;
            }
            .login-panel > * { position: relative; z-index: 1; }
            .login-form-box {
                background: rgba(255,255,255,0.97) !important;
            }
        }

        /* Brand mark */
        .login-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            margin-bottom: 2.5rem;
        }
        .login-logo-mark {
            width: 48px; height: 48px;
            background: var(--navy);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .login-logo-monogram {
            font-family: var(--font-display);
            color: var(--gold);
            font-size: 1.3rem;
            font-weight: 400;
            line-height: 1;
            display: flex;
            align-items: baseline;
        }
        .login-logo-text {
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 400;
            color: var(--text-dark);
            line-height: 1.2;
        }
        .login-logo-sub {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            font-family: var(--font-body);
            display: block;
        }

        /* Form heading */
        .login-heading {
            margin-bottom: 2.25rem;
        }
        .login-eyebrow {
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
            margin-bottom: 0.6rem;
        }
        .login-title {
            font-family: var(--font-display);
            font-size: 2.2rem;
            font-weight: 300;
            line-height: 1.15;
            color: var(--text-dark);
        }
        .login-title em {
            color: var(--gold);
            font-style: italic;
        }
        .login-sub {
            font-size: 0.875rem;
            color: var(--text-light);
            margin-top: 0.5rem;
            line-height: 1.6;
        }

        /* Gold accent line */
        .gold-line {
            display: block;
            width: 40px;
            height: 1px;
            background: var(--gold);
            margin-block: 1.25rem;
        }

        /* Error alert */
        .login-error {
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
            padding: 0.85rem 1rem;
            background: #fff5f5;
            border-left: 3px solid #e03131;
            margin-bottom: 1.5rem;
            font-size: 0.82rem;
            color: #c53030;
            line-height: 1.5;
        }

        /* Form fields */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            margin-bottom: 1.25rem;
        }
        .form-label {
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--text-mid);
        }
        .form-input {
            padding: 0.9rem 1rem;
            border: 1px solid rgba(0,0,0,0.14);
            font-family: var(--font-body);
            font-size: 0.9rem;
            color: var(--text-dark);
            background: var(--white);
            outline: none;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
            border-radius: 0;
            width: 100%;
        }
        .form-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200,169,110,0.12);
        }
        .form-input::placeholder { color: var(--text-light); }

        /* Remember me */
        .form-remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.82rem;
            color: var(--text-mid);
            cursor: pointer;
        }
        .remember-checkbox {
            width: 15px; height: 15px;
            accent-color: var(--gold);
            flex-shrink: 0;
        }

        /* Submit button */
        .login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
            padding: 1rem;
            background: var(--navy);
            color: var(--white);
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background 0.3s ease;
            margin-bottom: 1.5rem;
        }
        .login-btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gold);
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.16,1,0.3,1);
            z-index: 0;
        }
        .login-btn:hover { color: var(--navy); }
        .login-btn:hover::after { transform: translateX(0); }
        .login-btn span { position: relative; z-index: 1; }

        /* Back to site link */
        .login-back {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            color: var(--text-light);
            text-decoration: none;
            margin-top: 0.5rem;
            transition: color 0.2s ease;
            justify-content: center;
        }
        .login-back:hover { color: var(--gold); }
        .login-back svg { flex-shrink: 0; }

        /* Footer note */
        .login-footer-note {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.07);
            font-size: 0.72rem;
            color: var(--text-light);
            text-align: center;
            line-height: 1.6;
        }

        /* Fade-in animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .login-logo    { animation: fadeUp 0.6s cubic-bezier(0.16,1,0.3,1) forwards; }
        .login-heading { animation: fadeUp 0.6s cubic-bezier(0.16,1,0.3,1) 0.08s both; }
        .login-form    { animation: fadeUp 0.6s cubic-bezier(0.16,1,0.3,1) 0.16s both; }
    </style>
</head>
<body>

    <!-- ── LEFT: Image Panel ── -->
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

    <!-- ── RIGHT: Login Form Panel ── -->
    <div class="login-panel">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="login-logo" aria-label="Back to Radiant Hotel">
            <div class="login-logo-mark">
                <div class="login-logo-monogram">RH</div>
            </div>
            <div class="login-logo-text">
                Radiant Hotel
                <span class="login-logo-sub">Lingayen, Pangasinan</span>
            </div>
        </a>

        <!-- Heading -->
        <div class="login-heading">
            <span class="login-eyebrow">Admin Portal</span>
            <h1 class="login-title">Sign <em>In</em></h1>
            <p class="login-sub">Enter your credentials to access the hotel management dashboard.</p>
            <span class="gold-line"></span>
        </div>

        <!-- Error alert -->
        @if($errors->any())
            <div class="login-error">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
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
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
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

        <!-- Back to site -->
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

</body>
</html>
