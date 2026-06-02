<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d1b2a">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Radiant Hotel Pangasinan' }}</title>
    <meta name="description" content="{{ $description ?? 'Experience luxury and comfort at Radiant Hotel Pangasinan, Lingayen.' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Vite / App CSS -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <style>
        /* ============================================
           CSS CUSTOM PROPERTIES
        ============================================ */
        :root {
            --navy:       #0d1b2a;
            --navy-mid:   #1a2d42;
            --navy-light: #243b55;
            --gold:       #c8a96e;
            --gold-light: #dfc18e;
            --gold-pale:  #f5ecd8;
            --cream:      #faf7f2;
            --white:      #ffffff;
            --text-dark:  #1a1a2e;
            --text-mid:   #4a5568;
            --text-light: #718096;

            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body:    'Outfit', sans-serif;

            --max-w: 1260px;
            --header-h: 80px;

            --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
            --ease-in-out: cubic-bezier(0.87, 0, 0.13, 1);
        }

        /* ============================================
           RESET & BASE
        ============================================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; font-size: 16px; }

        body {
            font-family: var(--font-body);
            background: var(--cream);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        img { max-width: 100%; height: auto; display: block; }
        a { color: inherit; text-decoration: none; }
        ul { list-style: none; }
        button { cursor: pointer; border: none; background: none; font-family: inherit; }

        /* ============================================
           TYPOGRAPHY UTILITIES
        ============================================ */
        .display-xl {
            font-family: var(--font-display);
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 300;
            line-height: 1.05;
            letter-spacing: -0.01em;
        }
        .display-lg {
            font-family: var(--font-display);
            font-size: clamp(2rem, 5vw, 3.8rem);
            font-weight: 300;
            line-height: 1.1;
        }
        .display-md {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 3vw, 2.4rem);
            font-weight: 400;
            line-height: 1.2;
        }
        .eyebrow {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
        }
        .body-lg { font-size: 1.05rem; line-height: 1.75; color: var(--text-mid); }
        .body-sm { font-size: 0.875rem; line-height: 1.6; color: var(--text-light); }

        /* ============================================
           LAYOUT UTILITIES
        ============================================ */
        .container {
            width: 100%;
            max-width: var(--max-w);
            margin-inline: auto;
            padding-inline: clamp(1.25rem, 5vw, 3rem);
        }

        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
        .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }

        .flex { display: flex; }
        .flex-center { display: flex; align-items: center; justify-content: center; }
        .flex-between { display: flex; align-items: center; justify-content: space-between; }

        .section-gap { padding-block: clamp(4rem, 10vw, 8rem); }
        .section-gap-sm { padding-block: clamp(2.5rem, 6vw, 5rem); }

        /* ============================================
           BUTTON COMPONENTS
        ============================================ */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.85rem 2rem;
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.35s var(--ease-out);
            position: relative;
            overflow: hidden;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--navy);
        }
        .btn-gold::after {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--navy);
            transform: translateX(-100%);
            transition: transform 0.4s var(--ease-out);
            z-index: 0;
        }
        .btn-gold:hover { color: var(--white); }
        .btn-gold:hover::after { transform: translateX(0); }
        .btn-gold span { position: relative; z-index: 1; }

        .btn-outline {
            border: 1px solid var(--gold);
            color: var(--gold);
            background: transparent;
        }
        .btn-outline:hover {
            background: var(--gold);
            color: var(--navy);
        }

        .btn-ghost {
            color: var(--white);
            border: 1px solid rgba(255,255,255,0.4);
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.12);
            border-color: rgba(255,255,255,0.7);
        }

        /* ============================================
           DECORATIVE ELEMENTS
        ============================================ */
        .gold-line {
            display: block;
            width: 48px;
            height: 1px;
            background: var(--gold);
            margin-block: 1.25rem;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .section-label::before {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--gold);
            flex-shrink: 0;
        }

        /* ============================================
           CARD COMPONENT
        ============================================ */
        .card {
            background: var(--white);
            overflow: hidden;
            position: relative;
        }
        .card-img {
            width: 100%;
            aspect-ratio: 4/3;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .card:hover .card-img { transform: scale(1.05); }
        .card-body { padding: 1.75rem; }
        .card-tag {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 0.6rem;
        }
        .card-title {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 400;
            line-height: 1.25;
            margin-bottom: 0.75rem;
        }

        /* ============================================
           DIVIDER ORNAMENT
        ============================================ */
        .ornament {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--gold);
            font-size: 0.9rem;
        }
        .ornament::before,
        .ornament::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gold));
        }
        .ornament::after { background: linear-gradient(to left, transparent, var(--gold)); }

        /* ============================================
           HEADER / NAV BASE
        ============================================ */
        #site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            height: var(--header-h);
            display: flex;
            align-items: center;
            transition: background 0.4s ease, box-shadow 0.4s ease;
        }
        #site-header.scrolled {
            background: var(--navy);
            box-shadow: 0 4px 30px rgba(0,0,0,0.25);
        }
        #site-header .header-inner {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
        }
        .logo-mark {
            width: 58px;
            height: 58px;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            padding: 6px 8px;
        }
        .logo-mark-monogram {
            font-family: var(--font-display);
            color: var(--navy);
            line-height: 1;
            display: flex;
            align-items: baseline;
            letter-spacing: 0;
        }
        .logo-mark-monogram .lm-R {
            font-size: 2.1rem;
            font-weight: 400;
            line-height: 1;
        }
        .logo-mark-monogram .lm-H {
            font-size: 1.5rem;
            font-weight: 400;
            margin-left: -0.08em;
            line-height: 1;
        }
        .logo-text {
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 400;
            color: var(--white);
            line-height: 1.2;
        }
        .logo-sub {
            font-size: 0.65rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold-light);
            font-family: var(--font-body);
            display: block;
        }

        /* ============================================
           MOBILE MENU
        ============================================ */
        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 6px;
            cursor: pointer;
        }
        .nav-toggle span {
            display: block;
            width: 24px;
            height: 1.5px;
            background: var(--white);
            transition: all 0.3s ease;
        }
        .nav-toggle.active span:nth-child(1) { transform: rotate(45deg) translate(4.5px, 4.5px); }
        .nav-toggle.active span:nth-child(2) { opacity: 0; }
        .nav-toggle.active span:nth-child(3) { transform: rotate(-45deg) translate(4.5px, -4.5px); }

        @media (max-width: 1024px) {
            .nav-toggle { display: flex; }
            #main-nav {
                position: fixed;
                top: var(--header-h);
                left: 0; right: 0;
                background: var(--navy);
                padding: 2rem;
                transform: translateY(-120%);
                transition: transform 0.45s var(--ease-out);
                border-top: 1px solid rgba(255,255,255,0.08);
            }
            #main-nav.open { transform: translateY(0); }
            #main-nav ul { flex-direction: column; gap: 0; }
        }

        /* ============================================
           FOOTER BASE
        ============================================ */
        #site-footer {
            background: var(--navy);
            color: rgba(255,255,255,0.75);
        }
        .footer-top {
            padding-block: 5rem 3.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 3rem;
        }
        .footer-brand .logo-text { color: var(--white); font-size: 1.15rem; }
        .footer-desc {
            margin-top: 1rem;
            font-size: 0.875rem;
            line-height: 1.75;
            color: rgba(255,255,255,0.55);
            max-width: 280px;
        }
        .footer-heading {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 400;
            color: var(--white);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255,255,255,0.12);
        }
        .footer-links { display: flex; flex-direction: column; gap: 0.6rem; }
        .footer-links a {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.55);
            transition: color 0.25s ease;
        }
        .footer-links a:hover { color: var(--gold-light); }
        .footer-bottom {
            padding-block: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .footer-copy {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.35);
        }
        .social-links { display: flex; gap: 1rem; }
        .social-link {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.5);
            font-size: 0.75rem;
            transition: all 0.25s ease;
        }
        .social-link:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        /* ============================================
           ANIMATIONS
        ============================================ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        .animate-fade-up { animation: fadeUp 0.7s var(--ease-out) forwards; }
        .delay-1 { animation-delay: 0.15s; opacity: 0; }
        .delay-2 { animation-delay: 0.3s;  opacity: 0; }
        .delay-3 { animation-delay: 0.45s; opacity: 0; }
        .delay-4 { animation-delay: 0.6s;  opacity: 0; }

        /* ============================================
           RESPONSIVE GRID BREAKPOINTS
        ============================================ */
        @media (max-width: 1024px) {
            .grid-4 { grid-template-columns: repeat(2, 1fr); }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
        }
        @media (max-width: 768px) {
            .grid-2, .grid-3 { grid-template-columns: 1fr; }
            .grid-4 { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
            .footer-bottom { flex-direction: column; align-items: flex-start; }
        }
    </style>

    {{ $styles ?? '' }}
</head>
<body>

    <!-- ======= HEADER ======= -->
    <header id="site-header">
        <div class="container">
            <div class="header-inner">
                <!-- Logo -->
                <a href="/" class="logo" aria-label="Radiant Hotel">
                    <div class="logo-mark">
                        <div class="logo-mark-monogram">
                            <span class="lm-R">R</span><span class="lm-H">H</span>
                        </div>
                    </div>
                    <div class="logo-text">
                        Radiant Hotel
                        <span class="logo-sub">Lingayen, Pangasinan</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav id="main-nav" aria-label="Main navigation">
                    <ul class="flex" style="gap: 0; align-items: center;">
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/accommodations" :active="request()->is('accommodations')">Accommodations</x-nav-link>
                        <x-nav-link href="/dining" :active="request()->routeIs('dining')">Dining</x-nav-link>
                        <x-nav-link href="/amenities" :active="request()->routeIs('amenities')">Amenities</x-nav-link>
                        <x-nav-link href="/offers" :active="request()->routeIs('offers')">Offers</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->routeIs('contact')">Contact</x-nav-link>
                        <li style="position: relative; margin-left: 0.75rem;">
                            <a href="/reservations" class="btn btn-gold" style="font-size: 0.75rem; padding: 0.65rem 1.4rem;">
                                <span>Book Now</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex" style="align-items: center; gap: 1.25rem;">
                    <!-- Hamburger -->
                    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- ======= MAIN CONTENT ======= -->
    <main id="main-content">
        {{ $slot }}
    </main>

    <!-- ======= FOOTER ======= -->
    <footer id="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- Brand -->
                    <div class="footer-brand">
                        <a href="/" class="logo" aria-label="Radiant Hotel">
                            <div class="logo-mark">
                                <div class="logo-mark-monogram">
                                    <span class="lm-R">R</span><span class="lm-H">H</span>
                                </div>
                            </div>
                            <div class="logo-text">
                                Radiant Hotel
                                <span class="logo-sub">Lingayen, Pangasinan</span>
                            </div>
                        </a>
                        <p class="footer-desc">
                            Set just minutes from Lingayen Gulf and the Lingayen city center — your perfect Pangasinan base for unforgettable adventures.
                        </p>
                        <div class="social-links" style="margin-top: 1.5rem;">
                            <a href="#" class="social-link" aria-label="Facebook">F</a>
                            <a href="#" class="social-link" aria-label="Instagram">IG</a>
                            <a href="#" class="social-link" aria-label="Twitter">T</a>
                        </div>
                    </div>

                    <!-- Navigate -->
                    <div>
                        <h3 class="footer-heading">Navigate</h3>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/accommodations">Accommodations</a></li>
                            <li><a href="/dining">Dining</a></li>
                            <li><a href="/amenities">Amenities</a></li>
                            <li><a href="/offers">Latest Offers</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/checkout">Checkout</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="footer-heading">Contact</h3>
                        <ul class="footer-links">
                            <li> Lingayen, Pangasinan</li>
                            <li style="margin-top: 0.5rem;"><a href="tel:+63905602635">+63 930 560 2635</a></li>
                            <li><a href="mailto:info@radianthotellingayen.com">RadiantHotel@gmail.com</a></li>
                        </ul>
                    </div>

                    
                    <div>
                        <h3 class="footer-heading">Reservations</h3>
                        <p style="font-size: 0.875rem; color: rgba(255,255,255,0.5); margin-bottom: 1.25rem; line-height: 1.65;">
                            Ready to experience Radiant Hotel? Reserve your stay directly for the best rates.
                        </p>
                        <a href="/reservations" class="btn btn-gold">
                            <span>Book Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-bottom">
                <p class="footer-copy">&copy; {{ date('Y') }} Radiant Hotel Pangasinan. All Rights Reserved.</p>
                <div style="display:flex; gap: 1.5rem;">
                    <a href="/privacy" style="font-size: 0.8rem; color: rgba(255,255,255,0.35); transition: color 0.2s;" onmouseover="this.style.color='#c8a96e'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">Privacy Policy</a>
                    <a href="/terms"   style="font-size: 0.8rem; color: rgba(255,255,255,0.35); transition: color 0.2s;" onmouseover="this.style.color='#c8a96e'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ======= GLOBAL SCRIPTS ======= -->
    <script>
        // Sticky header
        const header = document.getElementById('site-header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 60);
        }, { passive: true });

        // Mobile nav toggle
        const toggle = document.getElementById('nav-toggle');
        const nav    = document.getElementById('main-nav');
        if (toggle && nav) {
            toggle.addEventListener('click', () => {
                const open = nav.classList.toggle('open');
                toggle.classList.toggle('active', open);
                toggle.setAttribute('aria-expanded', open);
                document.body.style.overflow = open ? 'hidden' : '';
            });
        }

        // Close nav on link click (mobile)
        nav?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('open');
                toggle?.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    </script>

    {{ $scripts ?? '' }}
</body>
</html>
