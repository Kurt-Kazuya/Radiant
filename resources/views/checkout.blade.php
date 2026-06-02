<x-layout title="Checkout – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero page-hero--checkout" aria-label="Checkout hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Superior-Rooms.jpg') }}" alt="Complete your reservation at Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Complete Booking</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <a href="/reservations">Reservations</a>
                <span>/</span>
                <span>Checkout</span>
            </div>
        </div>
    </section>


    {{-- ============================================================
         CHECKOUT BODY
    ============================================================ --}}
    <section class="section-gap checkout-section" style="background: var(--cream);" aria-label="Checkout">
        <div class="container">
            <div class="checkout-layout">

                {{-- ===== LEFT: MULTI-STEP FORM ===== --}}
                <div class="checkout-main">

                    {{-- Step indicator --}}
                    <div class="steps-bar">
                        <div class="step-item step-item--active" id="step-indicator-1">
                            <div class="step-num">1</div>
                            <span class="step-label">Your Details</span>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step-item" id="step-indicator-2">
                            <div class="step-num">2</div>
                            <span class="step-label">Extras</span>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step-item" id="step-indicator-3">
                            <div class="step-num">3</div>
                            <span class="step-label">Confirm &amp; Pay</span>
                        </div>
                    </div>


                    {{-- ============ STEP 1: GUEST DETAILS ============ --}}
                    <div class="checkout-step" id="step-1">
                        <div class="step-heading">
                            <span class="eyebrow">Step 1 of 3</span>
                            <h2 class="display-md" style="margin-top: 0.5rem;">Your <em>Details</em></h2>
                            <span class="gold-line"></span>
                        </div>

                        @if(session('error') || $errors->any())
                            <div class="alert alert--danger" style="background: rgba(229, 62, 62, 0.1); border: 1px solid #e53e3e; color: #e53e3e; padding: 1rem; border-radius: 4px; margin-bottom: 2rem;">
                                <strong style="display: block; margin-bottom: 0.5rem;">There was an issue with your booking:</strong>
                                <ul style="margin: 0; padding-left: 1.5rem; font-size: 0.9rem;">
                                    @if(session('error'))
                                        <li>{{ session('error') }}</li>
                                    @endif
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Real POST form that saves to the reservations table --}}
                        <form id="guest-form" class="checkout-form" method="POST" action="{{ route('checkout.store') }}" novalidate>
                            @csrf
                            {{-- Hidden fields required by CheckoutController@store --}}
                            <input type="hidden" name="room_id"        id="f_room_id"       value="{{ request('room_id', '') }}">
                            <input type="hidden" name="room_type"      id="f_room_type"     value="{{ request('room_type', '') }}">
                            <input type="hidden" name="rate_name"      id="f_rate_name"     value="{{ request('rate_name', '') }}">
                            <input type="hidden" name="price"          id="f_price"         value="{{ request('price', '') }}">
                            <input type="hidden" name="check_in_date"  id="f_check_in"      value="{{ request('check_in', date('Y-m-d')) }}">
                            <input type="hidden" name="check_out_date" id="f_check_out"     value="{{ request('check_out', date('Y-m-d', strtotime('+1 day'))) }}">
                            <input type="hidden" name="total_nights"   id="f_total_nights"  value="{{ $nights ?? 1 }}">
                            <input type="hidden" name="total_price"    id="f_total_price"   value="{{ (int) request('price', 3500) * ($nights ?? 1) }}">
                            <input type="hidden" name="guests"         id="f_guests"        value="{{ request('guests', 2) }}">
                            <input type="hidden" name="rooms"          id="f_rooms"         value="{{ request('rooms', 1) }}">

                            <div class="form-section">
                                <h3 class="form-section-title">Primary Guest</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name <span class="req">*</span></label>
                                        <input type="text" id="first_name" name="first_name" class="form-input" placeholder="Juan" required autocomplete="given-name">
                                        <span class="form-error" id="err-first_name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name <span class="req">*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="form-input" placeholder="dela Cruz" required autocomplete="family-name">
                                        <span class="form-error" id="err-last_name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address <span class="req">*</span></label>
                                        <input type="email" id="email" name="email" class="form-input" placeholder="juan@example.com" required autocomplete="email">
                                        <span class="form-error" id="err-email"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone Number <span class="req">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="+63 9XX XXX XXXX" required autocomplete="tel">
                                        <span class="form-error" id="err-phone"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="nationality">Nationality</label>
                                        <select id="nationality" name="nationality" class="form-input form-select">
                                            <option value="">Please select…</option>
                                            <option value="PH" selected>Filipino</option>
                                            <option value="US">American</option>
                                            <option value="GB">British</option>
                                            <option value="AU">Australian</option>
                                            <option value="JP">Japanese</option>
                                            <option value="KR">Korean</option>
                                            <option value="CN">Chinese</option>
                                            <option value="SG">Singaporean</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="arrival_time">Planned Arrival Time</label>
                                        <select id="arrival_time" name="arrival_time" class="form-input form-select">
                                            <option value="">Select time…</option>
                                            @for ($h = 6; $h <= 23; $h++)
                                                <option value="{{ sprintf('%02d:00', $h) }}">
                                                    {{ $h < 12 ? sprintf('%d:00 AM', $h) : ($h == 12 ? '12:00 PM' : sprintf('%d:00 PM', $h - 12)) }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">Address Details</h3>
                                <div class="form-grid">
                                    <div class="form-group form-group--full">
                                        <label class="form-label" for="address">Street Address</label>
                                        <input type="text" id="address" name="address" class="form-input" placeholder="123 Rizal Street" autocomplete="street-address">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="city">City / Municipality</label>
                                        <input type="text" id="city" name="city" class="form-input" placeholder="Lingayen" autocomplete="address-level2">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="country">Country</label>
                                        <input type="text" id="country" name="country" class="form-input" placeholder="Philippines" autocomplete="country-name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">Special Requests <span style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 400; color: var(--text-light);">(optional)</span></h3>
                                <div class="form-group form-group--full">
                                    <p class="body-sm" style="margin-bottom: 1rem;">We will do our best to accommodate your requests, subject to availability. Requests are not guaranteed.</p>
                                    <textarea id="special_requests" name="special_requests" class="form-input form-textarea" rows="4" placeholder="e.g. High floor, extra pillows, anniversary decoration…"></textarea>
                                </div>
                                <div class="form-checkboxes">
                                    @foreach([
                                        ['early_checkin',   'Early check-in (subject to availability)'],
                                        ['late_checkout',   'Late check-out (subject to availability)'],
                                        ['airport_pickup',  'Airport pick-up (additional charge may apply)'],
                                        ['no_smoking',      'Non-smoking room'],
                                        ['high_floor',      'High floor preference'],
                                        ['quiet_room',      'Quiet room'],
                                    ] as $pref)
                                    <label class="form-checkbox-label">
                                        <input type="checkbox" name="preferences[]" value="{{ $pref[0] }}" class="form-checkbox">
                                        <span>{{ $pref[1] }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-section">
                                <p class="body-sm" style="margin-bottom: 1.25rem;">
                                    For security purposes, please do not enter credit card details until the payment step.
                                </p>
                                <div class="form-group form-group--full">
                                    <label class="form-checkbox-label">
                                        <input type="checkbox" id="agree_terms" name="agree_terms" class="form-checkbox" required>
                                        <span>I agree to the <a href="/privacy" style="color: var(--gold);">Privacy Policy</a> and <a href="/terms" style="color: var(--gold);">Terms of Use</a>. <span class="req">*</span></span>
                                    </label>
                                    <span class="form-error" id="err-agree_terms"></span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="/reservations" class="btn btn-outline">← Back to Rooms</a>
                                <button type="submit" class="btn btn-gold">
                                    <span>Continue to Extras</span>
                                </button>
                            </div>
                        </form>
                    </div>{{-- /step-1 --}}


                    {{-- ============ STEP 2: EXTRAS ============ --}}
                    <div class="checkout-step" id="step-2" style="display:none;">
                        <div class="step-heading">
                            <span class="eyebrow">Step 2 of 3</span>
                            <h2 class="display-md" style="margin-top: 0.5rem;">Add <em>Extras</em></h2>
                            <span class="gold-line"></span>
                            <p class="body-sm">Enhance your stay with our curated add-ons. All extras are optional and billed at check-out.</p>
                        </div>

                        <div class="extras-grid">
                            @foreach([
                                ['breakfast',       'Breakfast Package',        'Daily buffet breakfast for 2 guests at our In-House Restaurant.',   '+ PHP 900 / night',  'breakfast'],
                                ['bouquet',         'Welcome Bouquet',          'A fresh floral arrangement placed in your room upon arrival.',       '+ PHP 750',          'bouquet'],
                                ['champagne',       'Champagne on Arrival',     'Chilled bottle of champagne waiting in your room.',                  '+ PHP 1,800',        'champagne'],
                                ['airport',         'Airport Transfer',         'Private van transfer from/to Clark or Manila airport.',              '+ PHP 2,500',        'airport'],
                                ['spa',             'Spa Credit (PHP 1,000)',   'PHP 1,000 credit toward any treatment at our partner spa.',           '+ PHP 750',          'spa'],
                                ['late',            'Late Check-Out (2 PM)',    'Guaranteed check-out until 2:00 PM instead of standard 12:00 PM.',   '+ PHP 800',          'late'],
                            ] as $extra)
                            <div class="extra-card" id="extra-{{ $extra[4] }}">
                                <div class="extra-card-inner">
                                    <div class="extra-body">
                                        <h4 class="extra-title">{{ $extra[1] }}</h4>
                                        <p class="body-sm">{{ $extra[2] }}</p>
                                        <span class="extra-price">{{ $extra[3] }}</span>
                                    </div>
                                    <label class="extra-toggle">
                                        <input type="checkbox" name="extras[]" value="{{ $extra[4] }}" class="extra-checkbox" onchange="toggleExtra(this, '{{ $extra[4] }}')">
                                        <span class="extra-toggle-ui"></span>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-actions" style="margin-top: 2.5rem;">
                            <button type="button" class="btn btn-outline" onclick="goToStep(1)">← Back</button>
                            <button type="button" class="btn btn-gold" onclick="goToStep(3)">
                                <span>Continue to Payment</span>
                            </button>
                        </div>
                    </div>{{-- /step-2 --}}


                    {{-- ============ STEP 3: CONFIRM & PAY ============ --}}
                    <div class="checkout-step" id="step-3" style="display:none;">
                        <div class="step-heading">
                            <span class="eyebrow">Step 3 of 3</span>
                            <h2 class="display-md" style="margin-top: 0.5rem;">Confirm &amp; <em>Pay</em></h2>
                            <span class="gold-line"></span>
                        </div>

                        {{-- Guest summary review --}}
                        <div class="review-block">
                            <div class="review-block-header">
                                <h3 class="review-block-title">Guest Details</h3>
                                <button type="button" class="review-edit-btn" onclick="goToStep(1)">Edit</button>
                            </div>
                            <div class="review-grid" id="review-guest"></div>
                        </div>

                        {{-- Extras review --}}
                        <div class="review-block" id="review-extras-block">
                            <div class="review-block-header">
                                <h3 class="review-block-title">Selected Extras</h3>
                                <button type="button" class="review-edit-btn" onclick="goToStep(2)">Edit</button>
                            </div>
                            <div id="review-extras-content"><p class="body-sm">No extras selected.</p></div>
                        </div>

                        {{-- Payment method --}}
                        <div class="review-block">
                            <div class="review-block-header">
                                <h3 class="review-block-title">Payment Method</h3>
                            </div>
                            <div class="payment-options">
                                <label class="payment-option" id="pay-hotel-label">
                                    <input type="radio" name="payment_method" value="pay_at_hotel" class="payment-radio" checked onchange="updatePaymentUI()">
                                    <div class="payment-option-body">
                                        <span class="payment-option-title">Pay at Hotel</span>
                                        <span class="payment-option-desc">No charge now. Present a valid ID at check-in. Free cancellation up to 24 hours before arrival.</span>
                                    </div>
                                </label>
                                <label class="payment-option" id="pay-online-label">
                                    <input type="radio" name="payment_method" value="pay_online" class="payment-radio" onchange="updatePaymentUI()">
                                    <div class="payment-option-body">
                                        <span class="payment-option-title">Pay Online (GCash / Credit Card)</span>
                                        <span class="payment-option-desc">Secure online payment via GCash, Visa, or Mastercard. Confirmation sent instantly.</span>
                                    </div>
                                </label>
                            </div>

                            {{-- Online payment placeholder --}}
                            <div id="online-payment-fields" style="display:none;" class="online-payment-panel">
                                <div class="secure-badge">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                    <span>Secure payment — your card details are encrypted and never stored on our servers.</span>
                                </div>
                                <div class="form-grid">
                                    <div class="form-group form-group--full">
                                        <label class="form-label" for="card_name">Name on Card</label>
                                        <input type="text" id="card_name" name="card_name" class="form-input" placeholder="JUAN DELA CRUZ" autocomplete="cc-name">
                                    </div>
                                    <div class="form-group form-group--full">
                                        <label class="form-label" for="card_number">Card Number</label>
                                        <input type="text" id="card_number" name="card_number" class="form-input" placeholder="•••• •••• •••• ••••" maxlength="19" autocomplete="cc-number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="card_expiry">Expiry</label>
                                        <input type="text" id="card_expiry" name="card_expiry" class="form-input" placeholder="MM / YY" maxlength="7" autocomplete="cc-exp">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="card_cvv">CVV</label>
                                        <input type="text" id="card_cvv" name="card_cvv" class="form-input" placeholder="•••" maxlength="4" autocomplete="cc-csc">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions" style="margin-top: 2.5rem;">
                            <button type="button" class="btn btn-outline" onclick="goToStep(2)">← Back</button>
                            <button type="button" class="btn btn-gold" id="confirm-btn" onclick="confirmBooking()">
                                <span>Confirm Reservation</span>
                            </button>
                        </div>
                    </div>{{-- /step-3 --}}


                    {{-- ============ STEP 4: SUCCESS ============ --}}
                    <div class="checkout-step" id="step-4" style="display:none;">
                        <div class="success-panel">
                            <div class="success-icon">✓</div>
                            <div class="section-label" style="justify-content: center;">
                                <span class="eyebrow">Booking Confirmed</span>
                            </div>
                            <h2 class="display-md" style="margin-top: 0.5rem;">Your Stay is <em>Reserved</em></h2>
                            <span class="gold-line" style="margin-inline: auto;"></span>
                            <p class="body-lg" style="max-width: 520px; margin: 0 auto 2rem;">
                                Thank you! A confirmation email has been sent to <strong id="confirm-email-display"></strong>.
                                Our team will reach out to confirm your reservation details within 24 hours.
                            </p>
                            <div class="confirm-ref">
                                <span class="eyebrow">Reservation Reference</span>
                                <div class="confirm-ref-num" id="confirm-ref"></div>
                            </div>
                            <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center; margin-top: 2.5rem;">
                                <a href="/" class="btn btn-gold"><span>Back to Home</span></a>
                                <a href="/accommodations" class="btn btn-outline">Explore More Rooms</a>
                            </div>
                        </div>
                    </div>{{-- /step-4 --}}

                </div>{{-- /checkout-main --}}


                {{-- ===== RIGHT: BOOKING SUMMARY SIDEBAR ===== --}}
                <aside class="checkout-sidebar" aria-label="Booking summary">
                    <div class="sidebar-inner">
                        <div class="sidebar-header">
                            <span class="eyebrow" style="color: var(--gold-light);">Your Reservation</span>
                            <h3 class="display-md" style="color: var(--white); margin-top: 0.5rem;">
                                Booking <em>Summary</em>
                            </h3>
                        </div>

                        {{-- Dates --}}
                        <div class="sidebar-dates">
                            <div class="sidebar-date-row">
                                <span class="sidebar-date-label">Check-In</span>
                                <span class="sidebar-date-value">
                                    {{ \Carbon\Carbon::parse(request('check_in', date('Y-m-d')))->format('D, d M Y') }}
                                </span>
                            </div>
                            <div class="sidebar-date-divider"></div>
                            <div class="sidebar-date-row">
                                <span class="sidebar-date-label">Check-Out</span>
                                <span class="sidebar-date-value">
                                    {{ \Carbon\Carbon::parse(request('check_out', date('Y-m-d', strtotime('+1 day'))))->format('D, d M Y') }}
                                </span>
                            </div>
                        </div>

                        @php
                            $nights = max(1, \Carbon\Carbon::parse(request('check_in', date('Y-m-d')))->diffInDays(\Carbon\Carbon::parse(request('check_out', date('Y-m-d', strtotime('+1 day'))))));
                            $pricePerNight = (int) request('price', 3500);
                            $subtotal = $pricePerNight * $nights;
                            $tax = $subtotal * 0.12;
                            $total = $subtotal + $tax;
                        @endphp

                        <div class="sidebar-meta">
                            <span>{{ request('guests', 2) }} {{ request('guests', 2) == 1 ? 'Guest' : 'Guests' }}</span>
                            <span class="sidebar-meta-sep">·</span>
                            <span>{{ $nights }} {{ $nights == 1 ? 'Night' : 'Nights' }}</span>
                        </div>

                        <div class="gold-line" style="margin-block: 1rem;"></div>

                        <div class="sidebar-room">
                            <span class="sidebar-room-type eyebrow" style="color: var(--gold-light);">
                                {{ request('room_type', 'Selected Room') }}
                            </span>
                            <span class="sidebar-rate-name">
                                {{ request('rate_name', 'Standard Rate') }}
                            </span>
                        </div>

                        <div class="sidebar-price-rows">
                            <div class="sidebar-price-row">
                                <span>Rate / Night</span>
                                <span>PHP {{ number_format($pricePerNight) }}</span>
                            </div>
                            <div class="sidebar-price-row">
                                <span>{{ $nights }} {{ $nights == 1 ? 'Night' : 'Nights' }}</span>
                                <span>PHP {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="sidebar-price-row" id="sidebar-extras-row" style="display:none;">
                                <span>Extras</span>
                                <span id="sidebar-extras-amount">PHP 0</span>
                            </div>
                            <div class="sidebar-price-row sidebar-price-row--tax">
                                <span>Taxes &amp; Fees (12%)</span>
                                <span id="sidebar-tax">PHP {{ number_format($tax, 2) }}</span>
                            </div>
                        </div>

                        <div class="sidebar-total">
                            <span class="sidebar-total-label">Total</span>
                            <span class="sidebar-total-value" id="sidebar-total">PHP {{ number_format($total, 2) }}</span>
                        </div>

                        <div class="sidebar-policy">
                            <p>Free cancellation on most rates up to 24 hours before arrival. By proceeding you agree to our <a href="/privacy">Privacy Policy</a>.</p>
                        </div>

                        <div class="sidebar-need-help">
                            <span class="eyebrow" style="color: var(--gold);">Need Help?</span>
                            <p style="font-size: 0.82rem; color: rgba(255,255,255,0.5); margin-top: 0.4rem;">
                                Call us: <a href="tel:+63930560263" style="color: var(--gold-light);">+63 930 560 2635</a><br>
                                Email: <a href="mailto:RadiantHotel@gmail.com" style="color: var(--gold-light);">RadiantHotel@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </aside>

            </div>{{-- /checkout-layout --}}
        </div>
    </section>


    {{-- ============================================================
         WHY BOOK DIRECT
    ============================================================ --}}
    <section class="section-gap" style="background: var(--navy); display: none;" id="why-book-direct" aria-label="Book direct benefits">
    </section>


    {{-- ============================================================
         PAGE-SPECIFIC STYLES
    ============================================================ --}}
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/pages/checkout.css') }}">
    </x-slot>


    {{-- ============================================================
         PAGE-SPECIFIC SCRIPTS
    ============================================================ --}}
    <x-slot name="scripts">
    <script>
        // ── State ──────────────────────────────────────────────────
        let currentStep = 1;
        const nights    = {{ $nights ?? 1 }};
        const basePrice = {{ (int) request('price', 3500) }};
        const baseTotal = basePrice * nights * 1.12;

        const extraPrices = {
            breakfast:  900 * nights,
            bouquet:    750,
            champagne:  1800,
            airport:    2500,
            spa:        750,
            late:       800,
        };
        let selectedExtras = {};

        // ── Step navigation (single definition) ───────────────────
        function goToStep(n) {
            if (n === 3) buildReview();
            document.getElementById('step-' + currentStep).style.display = 'none';
            document.getElementById('step-' + n).style.display = 'block';

            // Update step indicators
            [1, 2, 3, 4].forEach(i => {
                const el = document.getElementById('step-indicator-' + i);
                if (!el) return;
                el.classList.remove('step-item--active', 'step-item--done');
                if (i < n)  el.classList.add('step-item--done');
                if (i === n) el.classList.add('step-item--active');
            });

            currentStep = n;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // ── Step 1: Validate guest form ────────────────────────────
        document.getElementById('guest-form').addEventListener('submit', function(e) {
            e.preventDefault();
            let valid = true;

            ['first_name', 'last_name', 'email', 'phone'].forEach(field => {
                const input = document.getElementById(field);
                const err   = document.getElementById('err-' + field);
                if (!input.value.trim()) {
                    err.textContent = 'This field is required.';
                    input.classList.add('error');
                    valid = false;
                } else {
                    err.textContent = '';
                    input.classList.remove('error');
                }
            });

            const emailEl = document.getElementById('email');
            const emailErr = document.getElementById('err-email');
            if (emailEl.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value)) {
                emailErr.textContent = 'Please enter a valid email address.';
                emailEl.classList.add('error');
                valid = false;
            }

            const agree = document.getElementById('agree_terms');
            const agreeErr = document.getElementById('err-agree_terms');
            if (!agree.checked) {
                agreeErr.textContent = 'You must agree to the terms to continue.';
                valid = false;
            } else {
                agreeErr.textContent = '';
            }

            if (valid) goToStep(2);
        });

        // ── Step 2: Extras toggle ──────────────────────────────────
        function toggleExtra(checkbox, key) {
            const card = document.getElementById('extra-' + key);
            if (checkbox.checked) {
                selectedExtras[key] = extraPrices[key];
                card.classList.add('selected');
            } else {
                delete selectedExtras[key];
                card.classList.remove('selected');
            }
            updateSidebarTotal();
        }

        function updateSidebarTotal() {
            const extrasTotal = Object.values(selectedExtras).reduce((a, b) => a + b, 0);
            const subtotal    = basePrice * nights;
            const tax         = (subtotal + extrasTotal) * 0.12;
            const total       = subtotal + extrasTotal + tax;

            document.getElementById('sidebar-tax').textContent   = 'PHP ' + tax.toLocaleString('en-PH', { minimumFractionDigits: 2 });
            document.getElementById('sidebar-total').textContent = 'PHP ' + total.toLocaleString('en-PH', { minimumFractionDigits: 2 });

            const extrasRow = document.getElementById('sidebar-extras-row');
            if (extrasTotal > 0) {
                extrasRow.style.display = 'flex';
                document.getElementById('sidebar-extras-amount').textContent = 'PHP ' + extrasTotal.toLocaleString('en-PH');
            } else {
                extrasRow.style.display = 'none';
            }
        }

        // ── Step 3: Build review summary ──────────────────────────

        function buildReview() {
            const fields = [
                ['First Name',   document.getElementById('first_name').value],
                ['Last Name',    document.getElementById('last_name').value],
                ['Email',        document.getElementById('email').value],
                ['Phone',        document.getElementById('phone').value],
                ['Nationality',  document.getElementById('nationality').options[document.getElementById('nationality').selectedIndex].text],
                ['Arrival Time', document.getElementById('arrival_time').value || '—'],
                ['City',         document.getElementById('city').value || '—'],
                ['Country',      document.getElementById('country').value || '—'],
            ];
            const html = fields.map(f => `
                <div class="review-item">
                    <div class="review-item-label">${f[0]}</div>
                    <div class="review-item-value">${f[1]}</div>
                </div>
            `).join('');
            document.getElementById('review-guest').innerHTML = html;

            const extras = Object.keys(selectedExtras);
            const extrasBlock = document.getElementById('review-extras-content');
            if (extras.length > 0) {
                extrasBlock.innerHTML = extras.map(k =>
                    `<p class="body-sm" style="padding: 0.3rem 0; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        ✓ ${k.charAt(0).toUpperCase() + k.slice(1)} — PHP ${extraPrices[k].toLocaleString('en-PH')}
                    </p>`
                ).join('');
            } else {
                extrasBlock.innerHTML = '<p class="body-sm">No extras selected.</p>';
            }
        }

        // ── Payment toggle ─────────────────────────────────────────
        function updatePaymentUI() {
            const online = document.querySelector('input[name="payment_method"][value="pay_online"]').checked;
            document.getElementById('online-payment-fields').style.display = online ? 'block' : 'none';
        }

        // ── Confirm booking — submits the real form to the server ──
        function confirmBooking() {
            const btn = document.getElementById('confirm-btn');
            btn.disabled = true;
            btn.innerHTML = '<span>Saving…</span>';

            // Update the hidden total_price field dynamically (including extras)
            const extrasTotal = Object.values(selectedExtras).reduce((a, b) => a + b, 0);
            const subtotal    = basePrice * nights;
            const total       = subtotal + extrasTotal + (subtotal + extrasTotal) * 0.12;
            const totalField  = document.getElementById('f_total_price');
            if (totalField) totalField.value = Math.round(total);

            // Submit the real form to CheckoutController@store
            const form = document.getElementById('guest-form');
            if (form) {
                const pm = document.querySelector('input[name="payment_method"]:checked').value;
                const pmInput = document.createElement('input');
                pmInput.type = 'hidden';
                pmInput.name = 'payment_method';
                pmInput.value = pm;
                form.appendChild(pmInput);
                
                form.submit();
            } else {
                btn.disabled = false;
                btn.innerHTML = '<span>Confirm Reservation</span>';
                alert('Form not found. Please try again.');
            }
        }

        // Card number formatting
        const cardInput = document.getElementById('card_number');
        if (cardInput) {
            cardInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g,'').replace(/(.{4})/g,'$1 ').trim().substring(0,19);
            });
        }
        const expInput = document.getElementById('card_expiry');
        if (expInput) {
            expInput.addEventListener('input', function() {
                let v = this.value.replace(/\D/g,'');
                if (v.length >= 2) v = v.substring(0,2) + ' / ' + v.substring(2,4);
                this.value = v;
            });
        }
    </script>
    </x-slot>

</x-layout>