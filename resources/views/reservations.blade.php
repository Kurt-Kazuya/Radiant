<x-layout title="Book Now – Radiant Hotel Pangasinan">
<!-- sdf -->
    {{-- PAGE HERO BANNER --}}
    <section class="page-hero" aria-label="Reservations hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Front-Image-Home.jpg') }}" alt="Reserve your stay at Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Book Your Stay</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Reservations</span>
            </div>
        </div>
    </section>


    {{-- AVAILABILITY SEARCH BAR --}}
    <section class="search-bar-section" aria-label="Check availability">
        <div class="container">
            <form class="search-bar" method="GET" action="{{ route('reservations') }}" id="availability-form">
                <div class="search-field">
                    <label class="search-label" for="check_in">Check-In</label>
                    <input
                        type="date"
                        id="check_in"
                        name="check_in"
                        class="search-input"
                        value="{{ request('check_in', date('Y-m-d')) }}"
                        min="{{ date('Y-m-d') }}"
                    >
                </div>
                <div class="search-divider"></div>
                <div class="search-field">
                    <label class="search-label" for="check_out">Check-Out</label>
                    <input
                        type="date"
                        id="check_out"
                        name="check_out"
                        class="search-input"
                        value="{{ request('check_out', date('Y-m-d', strtotime('+1 day'))) }}"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    >
                </div>
                <div class="search-divider"></div>
                <div class="search-field">
                    <label class="search-label" for="guests">Guests</label>
                    <select id="guests" name="guests" class="search-input search-select">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" {{ request('guests', 2) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="search-divider"></div>
                <div class="search-field">
                    <label class="search-label" for="rooms">Rooms</label>
                    <select id="rooms" name="rooms" class="search-input search-select">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rooms', 1) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i === 1 ? 'Room' : 'Rooms' }}
                            </option>
                        @endfor
                    </select>
                </div>

            </form>
        </div>
    </section>


    {{-- MAIN BOOKING LAYOUT --}}
    <section class="section-gap booking-section" style="background: var(--cream);" aria-label="Room availability">
        <div class="container">

            @if(session('success'))
                <div id="success-alert" style="
                    background: #d3f9d8;
                    color: #1a6b2d;
                    border-left: 3px solid #2f9e44;
                    padding: 1rem 1.25rem;
                    margin-bottom: 2rem;
                    font-size: 0.95rem;
                    display: flex;
                    align-items: center;
                    gap: 0.75rem;
                    border-radius: 4px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
                    transition: opacity 0.6s ease, transform 0.6s ease;
                ">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    <strong>{{ session('success') }}</strong>
                </div>
                <script>
                    setTimeout(function () {
                        var el = document.getElementById('success-alert');
                        if (el) {
                            el.style.opacity = '0';
                            el.style.transform = 'translateY(-8px)';
                            setTimeout(function () { el.remove(); }, 500);
                        }
                    }, 5000);
                </script>
            @endif


            <div class="booking-layout">

                {{-- ===== LEFT: ROOM LISTINGS ===== --}}
                <div class="rooms-column">

                    {{-- Section heading --}}
                    <div class="rooms-heading">
                        <div class="section-label">
                            <span class="eyebrow">Available Rooms</span>
                        </div>
                        <h2 class="display-md">Choose Your <em>Room</em></h2>
                        <span class="gold-line"></span>
                        <p class="body-sm" style="margin-top: 0.25rem;">
                            Showing availability for
                            <strong id="stay-summary">
                                {{ \Carbon\Carbon::parse(request('check_in', date('Y-m-d')))->format('D, d M Y') }}
                                –
                                {{ \Carbon\Carbon::parse(request('check_out', date('Y-m-d', strtotime('+1 day'))))->format('D, d M Y') }}
                            </strong>
                            &nbsp;·&nbsp;
                            {{ request('guests', 2) }} {{ request('guests', 2) == 1 ? 'guest' : 'guests' }},
                            {{ request('rooms', 1) }} {{ request('rooms', 1) == 1 ? 'room' : 'rooms' }}
                        </p>
                    </div>

                    {{-- ---- ROOM CARD: Deluxe Room ---- --}}
                    <article class="room-card" id="room-deluxe">
                        <div class="room-card-img-wrap">
                            <img
                                src="{{ asset('images/Delux-Rooms.jpg') }}" alt="Deluxe Room"
                                class="room-card-img"
                                loading="lazy"
                            >
                        </div>
                        <div class="room-card-body">
                            <div class="room-card-top">
                                <div>
                                    <span class="card-tag">Deluxe</span>
                                    <h3 class="room-card-title display-md">Deluxe <em>Room</em></h3>
                                    <div class="room-meta">
                                        <span class="room-meta-item">Sleeps 2</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">1 Queen Bed</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">1 Bathroom</span>
                                    </div>
                                    <p class="body-sm" style="margin-top: 0.75rem; max-width: 480px;">
                                        A well-appointed deluxe room with garden or pool view, modern furnishings, and all essential amenities for a relaxing stay.
                                    </p>
                                    <div class="room-amenities">
                                        @foreach(['Air Conditioning','Free Wi-Fi','Flat-screen TV','Mini Fridge','Private Bathroom','Room Safe','Desk','Daily Housekeeping'] as $a)
                                            <span class="amenity-tag">{{ $a }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="room-rates">
                                <div class="rate-row">
                                    <div class="rate-info">
                                        <span class="rate-name">Standard Rate</span>
                                        <span class="rate-note">Book now, pay at hotel</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">3,500</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Deluxe Room', 'Standard Rate', 3500)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="rate-row rate-row--alt">
                                    <div class="rate-info">
                                        <span class="rate-name">Breakfast Included</span>
                                        <span class="rate-note">Daily breakfast for 2 guests</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">4,200</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Deluxe Room', 'Breakfast Included', 4200)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>


                    {{-- ---- ROOM CARD: Superior Room ---- --}}
                    <article class="room-card" id="room-superior">
                        <div class="room-card-img-wrap">
                            <img
                                src="{{ asset('images/Superior-Rooms.jpg') }}" alt="Superior Room"
                                class="room-card-img"
                                loading="lazy"
                            >
                        </div>
                        <div class="room-card-body">
                            <div class="room-card-top">
                                <div>
                                    <span class="card-tag">Superior</span>
                                    <h3 class="room-card-title display-md">Superior <em>Room</em></h3>
                                    <div class="room-meta">
                                        <span class="room-meta-item">Sleeps 3</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">1 King Bed</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">1 Bathroom</span>
                                    </div>
                                    <p class="body-sm" style="margin-top: 0.75rem; max-width: 480px;">
                                        Spacious superior room with sea or garden views, offering extra comfort with premium bedding and upgraded bathroom amenities.
                                    </p>
                                    <div class="room-amenities">
                                        @foreach(['Air Conditioning','Free Wi-Fi','Flat-screen TV','Mini Fridge','Private Bathroom','Balcony','Bathrobe & Slippers','Coffee Maker'] as $a)
                                            <span class="amenity-tag">{{ $a }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="room-rates">
                                <div class="rate-row">
                                    <div class="rate-info">
                                        <span class="rate-name">Standard Rate</span>
                                        <span class="rate-note">Book now, pay at hotel</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">5,500</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Superior Room', 'Standard Rate', 5500)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="rate-row rate-row--alt">
                                    <div class="rate-info">
                                        <span class="rate-name">Breakfast Included</span>
                                        <span class="rate-note">Daily breakfast for 2 guests</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">6,500</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Superior Room', 'Breakfast Included', 6500)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>


                    {{-- ---- ROOM CARD: Junior Suite ---- --}}
                    <article class="room-card" id="room-junior-suite">
                        <div class="room-card-img-wrap">
                            <img
                                src="{{ asset('images/Suite-Rooms.jpg') }}" alt="Junior Suite"
                                class="room-card-img"
                                loading="lazy"
                            >
                        </div>
                        <div class="room-card-body">
                            <div class="room-card-top">
                                <div>
                                    <span class="card-tag">Suite</span>
                                    <h3 class="room-card-title display-md">Junior <em>Suite</em></h3>
                                    <div class="room-meta">
                                        <span class="room-meta-item">Sleeps 4</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">1 King Bed + Sofa Bed</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">2 Bathrooms</span>
                                    </div>
                                    <p class="body-sm" style="margin-top: 0.75rem; max-width: 480px;">
                                        An elegant junior suite featuring a separate living area, panoramic views of Lingayen Gulf, and premium bathroom with soaking tub.
                                    </p>
                                    <div class="room-amenities">
                                        @foreach(['Air Conditioning','Free Wi-Fi','Smart TV','Mini Bar','Soaking Tub','Separate Living Area','Balcony','Butler Service'] as $a)
                                            <span class="amenity-tag">{{ $a }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="room-rates">
                                <div class="rate-row">
                                    <div class="rate-info">
                                        <span class="rate-name">Standard Rate</span>
                                        <span class="rate-note">Book now, pay at hotel</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">9,000</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Junior Suite', 'Standard Rate', 9000)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="rate-row rate-row--alt">
                                    <div class="rate-info">
                                        <span class="rate-name">Full Board</span>
                                        <span class="rate-note">Breakfast, lunch &amp; dinner included</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">12,500</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Junior Suite', 'Full Board', 12500)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>


                    {{-- ---- ROOM CARD: Penthouse Suite ---- --}}
                    <article class="room-card" id="room-penthouse">
                        <div class="room-card-img-wrap">
                            <img
                                src="{{ asset('images/The-Penthouse-3beds-Room.avif') }}" alt="Penthouse Suite"
                                class="room-card-img"
                                loading="lazy"
                            >
                        </div>
                        <div class="room-card-body">
                            <div class="room-card-top">
                                <div>
                                    <span class="card-tag">Penthouse</span>
                                    <h3 class="room-card-title display-md">Penthouse <em>Suite</em></h3>
                                    <div class="room-meta">
                                        <span class="room-meta-item">Sleeps 6</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">2 Queen Beds + Sofa Bed</span>
                                        <span class="room-meta-sep">·</span>
                                        <span class="room-meta-item">3 Bathrooms</span>
                                    </div>
                                    <p class="body-sm" style="margin-top: 0.75rem; max-width: 480px;">
                                        The crown jewel of Radiant Hotel. A sprawling penthouse with floor-to-ceiling windows, private terrace, chef's kitchen, and unrivaled Gulf views.
                                    </p>
                                    <div class="room-amenities">
                                        @foreach(['Private Terrace','Chef\'s Kitchen','Smart Home Controls','Private Bar','Jacuzzi','3 Smart TVs','Dedicated Butler','Airport Transfer'] as $a)
                                            <span class="amenity-tag">{{ $a }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="room-rates">
                                <div class="rate-row">
                                    <div class="rate-info">
                                        <span class="rate-name">Standard Rate</span>
                                        <span class="rate-note">Book now, pay at hotel</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">18,000</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Penthouse Suite', 'Standard Rate', 18000)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="rate-row rate-row--alt">
                                    <div class="rate-info">
                                        <span class="rate-name">All Inclusive</span>
                                        <span class="rate-note">Meals, transfers &amp; experiences</span>
                                    </div>
                                    <div class="rate-price-wrap">
                                        <div class="rate-price">
                                            <span class="rate-currency">PHP</span>
                                            <span class="rate-amount">24,000</span>
                                        </div>
                                        <span class="rate-per">per night</span>
                                        <button
                                            class="btn btn-gold rate-select-btn"
                                            onclick="selectRoom('Penthouse Suite', 'All Inclusive', 24000)"
                                        >
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>{{-- /rooms-column --}}


                {{-- ===== RIGHT: BOOKING SUMMARY SIDEBAR ===== --}}
                <aside class="booking-summary" id="booking-summary" aria-label="Booking summary">
                    <div class="summary-inner">
                        <div class="summary-header">
                            <span class="eyebrow" style="color: var(--gold-light);">Your Reservation</span>
                            <h3 class="display-md" style="color: var(--white); margin-top: 0.5rem;">
                                Booking <em>Summary</em>
                            </h3>
                        </div>

                        <div class="summary-dates">
                            <div class="summary-date-row">
                                <span class="summary-date-label">Check-In</span>
                                <span class="summary-date-value" id="sum-checkin">
                                    {{ \Carbon\Carbon::parse(request('check_in', date('Y-m-d')))->format('D, d M Y') }}
                                </span>
                            </div>
                            <div class="summary-date-divider"></div>
                            <div class="summary-date-row">
                                <span class="summary-date-label">Check-Out</span>
                                <span class="summary-date-value" id="sum-checkout">
                                    {{ \Carbon\Carbon::parse(request('check_out', date('Y-m-d', strtotime('+1 day'))))->format('D, d M Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="summary-meta-row">
                            <span class="summary-meta-item">
                                {{ request('guests', 2) }} {{ request('guests', 2) == 1 ? 'Guest' : 'Guests' }}
                            </span>
                            <span class="summary-meta-sep">·</span>
                            <span class="summary-meta-item" id="sum-nights">
                                @php
                                    $nights = max(1, \Carbon\Carbon::parse(request('check_in', date('Y-m-d')))->diffInDays(\Carbon\Carbon::parse(request('check_out', date('Y-m-d', strtotime('+1 day'))))));
                                @endphp
                                {{ $nights }} {{ $nights === 1 ? 'Night' : 'Nights' }}
                            </span>
                        </div>

                        {{-- Empty state --}}
                        <div class="summary-empty" id="summary-empty">
                            <p class="body-sm" style="text-align: center; color: rgba(255,255,255,0.45); padding: 1.5rem 0;">
                                Select a room and rate to continue
                            </p>
                        </div>

                        {{-- Selected room (shown after selection) --}}
                        <div class="summary-selected" id="summary-selected" style="display: none;">
                            <div class="gold-line" style="margin-block: 1rem;"></div>
                            <div class="summary-room-name" id="sum-room-name"></div>
                            <div class="summary-rate-name" id="sum-rate-name"></div>
                            <div class="summary-price-row">
                                <span class="summary-price-label">Rate / Night</span>
                                <span class="summary-price-value" id="sum-rate-price"></span>
                            </div>
                            <div class="summary-price-row">
                                <span class="summary-price-label" id="sum-nights-label"></span>
                                <span class="summary-price-value" id="sum-subtotal"></span>
                            </div>
                            <div class="summary-price-row summary-price-row--tax">
                                <span class="summary-price-label">Taxes &amp; Fees (12%)</span>
                                <span class="summary-price-value" id="sum-tax"></span>
                            </div>
                            <div class="summary-total-row">
                                <span class="summary-total-label">Total</span>
                                <span class="summary-total-value" id="sum-total"></span>
                            </div>
                            <button class="btn btn-gold summary-book-btn" id="summary-book-btn" onclick="proceedToBook()">
                                <span>Book Now</span>
                            </button>
                            <button class="summary-clear-btn" onclick="clearSelection()">Clear selection</button>
                        </div>

                        {{-- Policies note --}}
                        <div class="summary-policy">
                            <p>Free cancellation available on most rates. Payments processed securely. By booking you agree to our <a href="/privacy">Privacy Policy</a>.</p>
                        </div>
                    </div>
                </aside>

            </div>{{-- /booking-layout --}}
        </div>
    </section>


    {{-- WHY BOOK DIRECT STRIP --}}
    <section class="section-gap" style="background: var(--navy);" aria-label="Book direct benefits">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow" style="color: var(--gold);">Best Rate Guaranteed</span>
                </div>
                <h2 class="display-lg" style="color: var(--white);">Why Book <em>Direct?</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
            </div>
            <div class="benefits-grid">
                @foreach([
                    ['Best Rate Guaranteed',      'Book directly and we guarantee you the lowest available rate — no booking fees, no markups.'],
                    ['Flexible Cancellation',     'Most of our rates offer free cancellation up to 24 hours before check-in for peace of mind.'],
                    ['Exclusive Perks',           'Direct guests enjoy complimentary early check-in, late check-out, and room upgrade when available.'],
                    ['Priority Room Selection',   'Choose your preferred floor and view when booking direct — subject to availability at check-in.'],
                ] as $b)
                <div class="benefit-item">
                    <div class="benefit-line"></div>
                    <h3 class="benefit-title">{{ $b[0] }}</h3>
                    <p class="body-sm" style="color: rgba(255,255,255,0.55); margin-top: 0.5rem;">{{ $b[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- CTA BANNER --}}
    <section class="cta-banner" aria-label="Need help with your reservation?">
        <div class="cta-overlay"></div>
        <img
            src="{{ asset('images/Footer-Image-1.png') }}" alt=""
            class="cta-bg"
            aria-hidden="true"
        >
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Need Assistance?</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Our Team is Here<br><em>to Help You</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Have a special request or need help planning your stay? Get in touch with our reservations team.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/contact" class="btn btn-gold"><span>Contact Us</span></a>
                <a href="/accommodations" class="btn btn-ghost">View All Rooms</a>
            </div>
        </div>
    </section>


    {{-- PAGE-SPECIFIC STYLES --}}
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/shared/cta-banner.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/pages/reservations.css') }}">
    </x-slot>


    {{-- PAGE-SPECIFIC SCRIPTS --}}
    <x-slot name="scripts">
    <script>
        const nights = {{ $nights ?? 1 }};

        function formatPHP(amount) {
            return 'PHP ' + amount.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function selectRoom(roomName, rateName, pricePerNight) {
            const subtotal  = pricePerNight * nights;
            const tax       = subtotal * 0.12;
            const total     = subtotal + tax;

            document.getElementById('sum-room-name').textContent    = roomName;
            document.getElementById('sum-rate-name').textContent     = rateName;
            document.getElementById('sum-rate-price').textContent    = formatPHP(pricePerNight);
            document.getElementById('sum-nights-label').textContent  = nights + (nights === 1 ? ' Night' : ' Nights');
            document.getElementById('sum-subtotal').textContent      = formatPHP(subtotal);
            document.getElementById('sum-tax').textContent           = formatPHP(tax);
            document.getElementById('sum-total').textContent         = formatPHP(total);

            document.getElementById('summary-empty').style.display    = 'none';
            document.getElementById('summary-selected').style.display = 'block';

            // Highlight selected room card
            document.querySelectorAll('.room-card').forEach(c => c.style.outline = 'none');

            // Scroll to summary on mobile
            if (window.innerWidth < 1024) {
                document.getElementById('booking-summary').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function clearSelection() {
            document.getElementById('summary-empty').style.display    = 'block';
            document.getElementById('summary-selected').style.display = 'none';
            document.querySelectorAll('.room-card').forEach(c => c.style.outline = 'none');
        }

        function proceedToBook() {
            const roomName  = document.getElementById('sum-room-name').textContent;
            const rateName  = document.getElementById('sum-rate-name').textContent;
            const rawPrice  = document.getElementById('sum-rate-price').textContent.replace(/[^0-9.]/g, '');
            const checkIn   = document.getElementById('check_in')  ? document.getElementById('check_in').value  : '';
            const checkOut  = document.getElementById('check_out') ? document.getElementById('check_out').value : '';
            const guests    = document.getElementById('guests')    ? document.getElementById('guests').value    : '2';
            const rooms     = document.getElementById('rooms')     ? document.getElementById('rooms').value     : '1';
            const params = new URLSearchParams({
                room_type:  roomName,
                rate_name:  rateName,
                price:      rawPrice,
                check_in:   checkIn,
                check_out:  checkOut,
                guests:     guests,
                rooms:      rooms,
            });
            window.location.href = '/checkout?' + params.toString();
        }

        // Keep check-out min = check-in + 1
        const checkIn  = document.getElementById('check_in');
        const checkOut = document.getElementById('check_out');
        if (checkIn && checkOut) {
            checkIn.addEventListener('change', function () {
                const next = new Date(this.value);
                next.setDate(next.getDate() + 1);
                checkOut.min   = next.toISOString().split('T')[0];
                if (checkOut.value <= this.value) {
                    checkOut.value = next.toISOString().split('T')[0];
                }
            });
        }
    </script>
    </x-slot>

</x-layout>