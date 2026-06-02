<x-layout title="Latest Offers – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Offers hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Latest-Offers.png') }}" alt="Latest Offers at Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                Latest <em>Offers</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Offers</span>
            </div>
        </div>
    </section>


    {{-- ============================================================
         INTRO
    ============================================================ --}}
    <section class="section-gap" style="background: var(--white);" aria-label="Offers intro">
        <div class="container">
            <div style="text-align: center; max-width: 740px; margin-inline: auto;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Exclusive Deals</span>
                </div>
                <h2 class="display-lg">Special Offers &amp; <em>Packages</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg">
                    Experience the best of Radiant Hotel at exceptional value. From flash sales to seasonal packages and curated dining deals, our latest offers are designed to make every stay more rewarding.
                </p>
            </div>
        </div>
    </section>


    {{-- ============================================================
         FLASH SALE — Light background
    ============================================================ --}}
    <section class="section-gap offers-feature" aria-label="Flash Sale">
        <div class="container">
            <div class="offer-feature-grid">
                <div class="offer-feature-img-wrap">
                    <img
                        src="{{ asset('images/Flash-Sale.jpg') }}" alt="Flash Sale Offer"
                        class="offer-feature-img"
                        loading="lazy"
                    >
                    <div class="offer-badge offer-badge--gold">
                        <span class="eyebrow" style="color: var(--navy);">Limited Time</span>
                        <span class="offer-badge-price">From ₱2,999 <small>/night</small></span>
                    </div>
                </div>
                <div class="offer-feature-body">
                    <div class="section-label">
                        <span class="eyebrow">Stay Offer</span>
                    </div>
                    <h2 class="display-lg">
                        Flash <em>Sale</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.5rem;">
                        Experience the heart of Pangasinan without the premium price tag. Whether it's a fun-filled family trip or a relaxing city break, Radiant Hotel is ready to welcome you with open arms and a warm breakfast.
                    </p>
                    <div class="offer-includes">
                        <p class="offer-includes-label">Your stay includes:</p>
                        @foreach([
                            'Complimentary breakfast for two',
                            'Free use of swimming pool',
                            'High-speed WiFi throughout',
                            'Welcome drink on arrival',
                        ] as $perk)
                        <div class="offer-perk">
                            <div class="perk-dot"></div>
                            <span>{{ $perk }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="offer-validity">Valid for a limited period only — book now!</div>
                    <div class="offer-meta">
                        <span class="offer-rate">₱2,999 <small>per night</small></span>
                        <span class="offer-note">*Non-refundable rate applies</span>
                    </div>
                    <a href="/reservations" class="btn btn-gold" style="margin-top: 2rem;"><span>Book Now</span></a>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         MOTHER'S DAY ESCAPE — Dark background, reversed
    ============================================================ --}}
    <section class="section-gap offers-dark" aria-label="Mother's Day Escape">
        <div class="container">
            <div class="offer-feature-grid offer-feature-grid--reverse">
                <div class="offer-feature-body">
                    <div class="section-label">
                        <span class="eyebrow" style="color: var(--gold);">Seasonal Package</span>
                    </div>
                    <h2 class="display-lg" style="color: var(--white);">
                        A Mother's Day <em>Escape in Paradise</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="color: rgba(255,255,255,0.65); margin-bottom: 1.5rem;">
                        Give Mom the tropical getaway she truly deserves. Whether she's looking to lounge by the pool or explore the beauty of Pangasinan, we've taken care of every detail so she can focus on relaxing.
                    </p>
                    <div class="offer-includes">
                        <p class="offer-includes-label" style="color: var(--gold-light);">Your stay includes:</p>
                        @foreach([
                            "Mother's Day welcome amenity",
                            'Free breakfast for two',
                            'Complimentary airport transfer for two',
                            'Early check-in or late check-out (subject to availability)',
                            '10% discount on F&B (min. order of ₱1,000)',
                        ] as $perk)
                        <div class="offer-perk" style="color: rgba(255,255,255,0.75);">
                            <div class="perk-dot"></div>
                            <span>{{ $perk }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="offer-bonus">BONUS: Additional 10% off the second night for a minimum 2-night stay!</div>
                    <div class="offer-validity" style="color: rgba(255,255,255,0.5);">Validity: May 1–31, 2026</div>
                    <div class="offer-meta">
                        <span class="offer-rate" style="color: var(--gold-light);">From ₱4,200 <small>per night</small></span>
                    </div>
                    <a href="/reservations" class="btn btn-gold" style="margin-top: 2rem;"><span>Book Now</span></a>
                </div>
                <div class="offer-feature-img-wrap">
                    <img
                        src="{{ asset('images/Mothers-Day-Escape.jpg') }}" alt="Mother's Day Escape"
                        class="offer-feature-img"
                        loading="lazy"
                    >
                    <div class="offer-badge offer-badge--dark">
                        <span class="eyebrow" style="color: var(--navy);">May 1–31, 2026</span>
                        <span class="offer-badge-price">From ₱4,200 <small>/night</small></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         ISLAND SUMMER PACKAGE — Light background
    ============================================================ --}}
    <section class="section-gap offers-feature" aria-label="Island Summer Package">
        <div class="container">
            <div class="offer-feature-grid">
                <div class="offer-feature-img-wrap">
                    <img
                        src="{{ asset('images/Island-Summer-Package.jpg') }}" alt="Island Summer Package"
                        class="offer-feature-img"
                        loading="lazy"
                    >
                    <div class="offer-badge offer-badge--gold">
                        <span class="eyebrow" style="color: var(--navy);">Summer Special</span>
                        <span class="offer-badge-price">₱4,999 <small>/night</small></span>
                    </div>
                </div>
                <div class="offer-feature-body">
                    <div class="section-label">
                        <span class="eyebrow">Stay Package</span>
                    </div>
                    <h2 class="display-lg">
                        Island Summer <em>Package</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.5rem;">
                        Escape to Pangasinan and enjoy our Island Summer Package. Wake up to breakfast for two, enjoy complimentary airport transfers, and savor exclusive dining discounts throughout your stay.
                    </p>
                    <div class="offer-includes">
                        <p class="offer-includes-label">Your stay includes:</p>
                        @foreach([
                            'Breakfast for two daily',
                            'Complimentary airport transfers',
                            'Exclusive dining discounts',
                            'Full access to pool & fitness center',
                        ] as $perk)
                        <div class="offer-perk">
                            <div class="perk-dot"></div>
                            <span>{{ $perk }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="offer-meta">
                        <span class="offer-rate">₱4,999 <small>per night</small></span>
                    </div>
                    <a href="/reservations" class="btn btn-gold" style="margin-top: 2rem;"><span>Book Now</span></a>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         DINING OFFERS STRIP
    ============================================================ --}}
    <section class="section-gap" style="background: var(--cream);" aria-label="Dining Offers">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">At Our Restaurant</span>
                </div>
                <h2 class="display-lg">Dining <em>Highlights</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg" style="max-width: 600px; margin-inline: auto; margin-top: 0.5rem;">
                    Beyond your room, Radiant Hotel's restaurant offers a rotating selection of seasonal menus, specialty cocktails, and irresistible limited-time promotions.
                </p>
            </div>

            <div class="dining-offers-grid">
                @foreach ([
                    [
                        'Signature Cocktails',
                        'From ₱380 per order',
                        'Expertly crafted cocktails using premium spirits and fresh local ingredients. The perfect way to unwind after a day of exploring Pangasinan.',
                        asset('images/Signature-Cocktails.png'),
                    ],
                    [
                        'Taste of Pangasinan',
                        'Curated local menu',
                        'A curated menu celebrating the bold and comforting flavors of Pangasinense cuisine — from bangus dishes to fresh Lingayen Gulf seafood.',
                        asset('images/Taste-of-Pangasinan.jpg'),
                    ],
                    [
                        'New Dessert Offerings',
                        'Available now',
                        'Dessert lovers rejoice! We are now serving Mango Sticky Rice, Churros, and Burnt Cheesecake. Sweeten your stay while it lasts.',
                        asset('images/New-Dessert-Offerings.png'),
                    ],
                    [
                        'Happy Hour Deal',
                        'Select hours daily',
                        'Enjoy our curated happy hour menu featuring discounted drinks and bar bites. The perfect way to kick off your evening at Radiant Hotel.',
                        asset('images/Margarita-Fiesta.png'),
                    ],
                    [
                        'Margarita Fiesta',
                        'Limited-time special',
                        'Celebrate with our festive Margarita selection — classic, frozen, and house-special variants crafted by our talented bartenders.',
                        asset('images/Rice-Bowl-Craze.png'),
                    ],
                    [
                        'Rice Bowl Craze',
                        'Complete set available',
                        'Our Rice Bowl sets come complete with a choice of protein, fresh toppings, and a savory sauce — a satisfying and hearty meal any time of day.',
                        asset('images/Happy-Hour-Deal.png'),
                    ],
                ] as $offer)
                <article class="dining-offer-card card">
                    <div class="card-img-wrap">
                        <img src="{{ $offer[3] }}" alt="{{ $offer[0] }}" class="card-img" loading="lazy">
                        <div class="dining-offer-price">{{ $offer[1] }}</div>
                    </div>
                    <div class="card-body">
                        <span class="card-tag">Dining Offer</span>
                        <h3 class="card-title">{{ $offer[0] }}</h3>
                        <p class="body-sm">{{ $offer[2] }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         CTA BANNER
    ============================================================ --}}
    <section class="cta-banner" aria-label="Book now">
        <div class="cta-overlay"></div>
        <img
            src="{{ asset('images/Book-Your-Stay-Today.png') }}" alt=""
            class="cta-bg"
            aria-hidden="true"
        >
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Best Rates Guaranteed</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Don't Miss Out —<br><em>Book Your Stay Today</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Reserve directly through our website to access exclusive offers, guaranteed best rates, and complimentary perks available only to direct guests.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/reservations" class="btn btn-gold"><span>Reserve Now</span></a>
                <a href="/contact" class="btn btn-ghost">Contact Us</a>
            </div>
        </div>
    </section>


    {{-- ============================================================
         PAGE-SPECIFIC STYLES
    ============================================================ --}}
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/shared/cta-banner.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/pages/offers.css') }}">
    </x-slot>

</x-layout>