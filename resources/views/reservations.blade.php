<x-layout title="Book Now – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Reservations hero">
        <div class="page-hero-bg">
            <img
                src=asset('images/hotel-room-wide.jpg')alt="Reserve your stay at Radiant Hotel"
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


    {{-- ============================================================
         AVAILABILITY SEARCH BAR
    ============================================================ --}}
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
                <button type="submit" class="btn btn-gold search-btn">
                    <span>Check Availability</span>
                </button>
            </form>
        </div>
    </section>


    {{-- ============================================================
         MAIN BOOKING LAYOUT
    ============================================================ --}}
    <section class="section-gap booking-section" style="background: var(--cream);" aria-label="Room availability">
        <div class="container">
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
                                src=asset('images/hotel-room-wide.jpg')alt="Deluxe Room"
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
                                src=asset('images/deluxe-room-2.jpg')alt="Superior Room"
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
                                src=asset('images/standard-room.jpg')alt="Junior Suite"
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
                                src=asset('images/deluxe-room.jpg')alt="Penthouse Suite"
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


    {{-- ============================================================
         WHY BOOK DIRECT STRIP
    ============================================================ --}}
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


    {{-- ============================================================
         CTA BANNER
    ============================================================ --}}
    <section class="cta-banner" aria-label="Need help with your reservation?">
        <div class="cta-overlay"></div>
        <img
            src=asset('images/hotel-facade.jpg')alt=""
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


    {{-- ============================================================
         PAGE-SPECIFIC STYLES
    ============================================================ --}}
    <x-slot name="styles">
    <style>
        /* PAGE HERO */
        .page-hero {
            position: relative;
            height: 55vh;
            min-height: 420px;
            display: flex;
            align-items: flex-end;
            overflow: hidden;
        }
        .page-hero-bg { position: absolute; inset: 0; }
        .page-hero-img {
            width: 100%; height: 100%;
            object-fit: cover;
            object-position: center 40%;
        }
        .page-hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(
                to top,
                rgba(13,27,42,0.85) 0%,
                rgba(13,27,42,0.4)  60%,
                rgba(13,27,42,0.2)  100%
            );
        }
        .page-hero-content {
            position: relative;
            z-index: 2;
            padding-bottom: 4rem;
        }
        .page-hero-title {
            color: var(--white);
            margin-block: 0.75rem 1.25rem;
        }
        .page-hero-title em { color: var(--gold-light); font-style: italic; }
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.78rem;
            letter-spacing: 0.08em;
            color: rgba(255,255,255,0.55);
        }
        .breadcrumb a { color: var(--gold-light); }
        .breadcrumb a:hover { color: var(--white); }

        /* ---- SEARCH BAR ---- */
        .search-bar-section {
            background: var(--navy);
            padding-block: 0;
            position: sticky;
            top: var(--header-h);
            z-index: 50;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .search-bar {
            display: flex;
            align-items: stretch;
            gap: 0;
        }
        .search-field {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            padding: 1rem 1.5rem;
            flex: 1;
        }
        .search-label {
            font-size: 0.65rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
        }
        .search-input {
            background: transparent;
            border: none;
            outline: none;
            font-family: var(--font-body);
            font-size: 0.9rem;
            color: var(--white);
            cursor: pointer;
            padding: 0;
        }
        .search-input option { background: var(--navy); color: var(--white); }
        .search-select { appearance: none; -webkit-appearance: none; }
        .search-input::-webkit-calendar-picker-indicator { filter: invert(1) opacity(0.5); cursor: pointer; }
        .search-divider {
            width: 1px;
            background: rgba(255,255,255,0.1);
            align-self: stretch;
            margin-block: 0.5rem;
        }
        .search-btn {
            margin: 0.75rem 1.25rem 0.75rem 1rem;
            white-space: nowrap;
            flex-shrink: 0;
            align-self: center;
        }

        /* ---- BOOKING LAYOUT ---- */
        .booking-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 3rem;
            align-items: start;
        }

        /* ---- ROOMS HEADING ---- */
        .rooms-heading { margin-bottom: 2.5rem; }

        /* ---- ROOM CARD ---- */
        .room-card {
            background: var(--white);
            margin-bottom: 2rem;
            overflow: hidden;
        }
        .room-card-img-wrap {
            overflow: hidden;
            height: 280px;
        }
        .room-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .room-card:hover .room-card-img { transform: scale(1.04); }
        .room-card-body { padding: 2rem 2rem 0; }
        .room-card-title { margin-bottom: 0.5rem; }
        .room-card-title em { color: var(--gold); font-style: italic; }

        .room-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }
        .room-meta-item {
            font-size: 0.8rem;
            color: var(--text-mid);
            letter-spacing: 0.04em;
        }
        .room-meta-sep { color: var(--gold); font-size: 0.7rem; }

        /* ---- AMENITY TAGS ---- */
        .room-amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-top: 1rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.07);
        }
        .amenity-tag {
            font-size: 0.7rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-mid);
            border: 1px solid rgba(0,0,0,0.12);
            padding: 0.3rem 0.65rem;
        }

        /* ---- RATE ROWS ---- */
        .room-rates { padding-bottom: 0.5rem; }
        .rate-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.06);
            flex-wrap: wrap;
        }
        .rate-row--alt { background: transparent; }
        .rate-info {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .rate-name {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 400;
            color: var(--text-dark);
        }
        .rate-note {
            font-size: 0.75rem;
            color: var(--text-light);
            letter-spacing: 0.03em;
        }
        .rate-price-wrap {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-shrink: 0;
        }
        .rate-price {
            display: flex;
            align-items: baseline;
            gap: 0.2rem;
        }
        .rate-currency {
            font-size: 0.75rem;
            color: var(--text-light);
            letter-spacing: 0.05em;
        }
        .rate-amount {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 300;
            color: var(--text-dark);
            line-height: 1;
        }
        .rate-per {
            font-size: 0.72rem;
            color: var(--text-light);
            white-space: nowrap;
        }
        .rate-select-btn {
            padding: 0.65rem 1.35rem;
            font-size: 0.75rem;
        }

        /* ---- BOOKING SUMMARY SIDEBAR ---- */
        .booking-summary {
            position: sticky;
            top: calc(var(--header-h) + 70px);
            background: var(--navy);
        }
        .summary-inner { padding: 2rem; }
        .summary-header {
            padding-bottom: 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1.25rem;
        }
        .summary-header .display-md em { color: var(--gold-light); font-style: italic; }

        .summary-dates { margin-bottom: 0.75rem; }
        .summary-date-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 0.75rem;
            padding-block: 0.5rem;
        }
        .summary-date-label {
            font-size: 0.68rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--gold);
        }
        .summary-date-value {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.8);
            text-align: right;
        }
        .summary-date-divider {
            height: 1px;
            background: rgba(255,255,255,0.08);
        }

        .summary-meta-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .summary-meta-item {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.55);
        }
        .summary-meta-sep { color: var(--gold); font-size: 0.65rem; }

        /* Selected state */
        .summary-room-name {
            font-family: var(--font-display);
            font-size: 1.15rem;
            color: var(--white);
            margin-bottom: 0.25rem;
        }
        .summary-rate-name {
            font-size: 0.78rem;
            color: var(--gold);
            letter-spacing: 0.08em;
            margin-bottom: 1.25rem;
        }
        .summary-price-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding-block: 0.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .summary-price-row--tax .summary-price-label,
        .summary-price-row--tax .summary-price-value {
            color: rgba(255,255,255,0.45);
            font-size: 0.8rem;
        }
        .summary-price-label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.55);
            letter-spacing: 0.05em;
        }
        .summary-price-value {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.8);
        }
        .summary-total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding-block: 1rem;
        }
        .summary-total-label {
            font-size: 0.72rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
        }
        .summary-total-value {
            font-family: var(--font-display);
            font-size: 1.5rem;
            color: var(--white);
            font-weight: 300;
        }
        .summary-book-btn {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.75rem;
        }
        .summary-clear-btn {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.35);
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.2s ease;
            background: none;
            border: none;
            font-family: var(--font-body);
            letter-spacing: 0.05em;
        }
        .summary-clear-btn:hover { color: rgba(255,255,255,0.65); }

        .summary-policy {
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            font-size: 0.72rem;
            color: rgba(255,255,255,0.3);
            line-height: 1.65;
        }
        .summary-policy a { color: var(--gold); }
        .summary-policy a:hover { color: var(--gold-light); }

        /* ---- WHY BOOK DIRECT ---- */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2.5rem;
        }
        .benefit-item { padding-top: 1.25rem; }
        .benefit-line {
            width: 32px;
            height: 2px;
            background: var(--gold);
            margin-bottom: 1rem;
        }
        .benefit-title {
            font-family: var(--font-display);
            font-size: 1.15rem;
            font-weight: 400;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        /* ---- CTA BANNER ---- */
        .cta-banner {
            position: relative;
            padding-block: clamp(5rem, 12vw, 9rem);
            overflow: hidden;
        }
        .cta-bg {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
        }
        .cta-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(
                to right,
                rgba(13,27,42,0.9) 30%,
                rgba(13,27,42,0.5) 100%
            );
            z-index: 1;
        }
        .cta-content { position: relative; z-index: 2; }
        .cta-content h2 em { color: var(--gold-light); font-style: italic; }

        /* ---- RESPONSIVE ---- */
        @media (max-width: 1200px) {
            .benefits-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 1024px) {
            .booking-layout {
                grid-template-columns: 1fr;
            }
            .booking-summary {
                position: static;
                order: -1;
            }
            .search-bar {
                flex-wrap: wrap;
            }
            .search-field { min-width: 140px; }
        }
        @media (max-width: 640px) {
            .search-bar { flex-direction: column; }
            .search-divider { width: 100%; height: 1px; margin-block: 0; margin-inline: 1rem; }
            .search-btn { margin: 0.75rem 1.25rem; width: calc(100% - 2.5rem); justify-content: center; }
            .room-card-img-wrap { height: 200px; }
            .rate-row { flex-direction: column; align-items: flex-start; gap: 0.75rem; }
            .rate-price-wrap { width: 100%; justify-content: space-between; }
            .benefits-grid { grid-template-columns: 1fr; gap: 1.5rem; }
        }
    </style>
    </x-slot>


    {{-- ============================================================
         PAGE-SPECIFIC SCRIPTS
    ============================================================ --}}
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
            alert('Booking flow coming soon. Please call or email us directly to complete your reservation.');
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