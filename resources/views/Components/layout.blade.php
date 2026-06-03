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

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Radiant-Hotels.png') }}">

    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/site/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site/nav-link.css') }}">


    {{ $styles ?? '' }}
</head>
<body>

    {{-- ======= HEADER ======= --}}
    <header id="site-header">
        <div class="container">
            <div class="header-inner">
                {{-- Logo --}}
                <a href="/" class="logo" aria-label="Radiant Hotel">
                    <img src="{{ asset('images/Radiant-Hotels.png') }}" alt="Radiant Hotel Logo" class="logo-img" style="height: 48px; width: 48px; border-radius: 50%; object-fit: cover;">
                    <div class="logo-text">
                        Radiant Hotel
                        <span class="logo-sub">Lingayen, Pangasinan</span>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
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
                    {{-- Hamburger --}}
                    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- ======= MAIN CONTENT ======= --}}
    <main id="main-content">
        {{ $slot }}
    </main>

    {{-- ======= FOOTER ======= --}}
    <footer id="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    {{-- Brand --}}
                    <div class="footer-brand">
                        <a href="/" class="logo" aria-label="Radiant Hotel">
                            <img src="{{ asset('images/Radiant-Hotels.png') }}" alt="Radiant Hotel Logo" class="logo-img" style="height: 48px; width: 48px; border-radius: 50%; object-fit: cover;">
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

                    {{-- Navigate --}}
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

                    {{-- Contact --}}
                    <div>
                        <h3 class="footer-heading">Contact</h3>
                        <ul class="footer-links">
                            <li> Lingayen, Pangasinan</li>
                            <li style="margin-top: 0.5rem;"><a href="tel:+63905602635">+63 930 560 2635</a></li>
                            @php $hotelEmail = \App\Models\User::where('role', 'admin')->value('email') ?? 'radianthotel2026@gmail.com'; @endphp
                            <li><a href="mailto:{{ $hotelEmail }}">{{ $hotelEmail }}</a></li>
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

    {{-- ======= GLOBAL SCRIPTS ======= --}}
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