<x-layout title="Amenities – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Amenities hero">
        <div class="page-hero-bg">
            <img
                src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1800&auto=format&fit=crop"
                alt="Amenities at Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Amenities</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Amenities</span>
            </div>
        </div>
    </section>


    {{-- ============================================================
         INTRO
    ============================================================ --}}
    <section class="section-gap" style="background: var(--white);" aria-label="Amenities intro">
        <div class="container">
            <div style="text-align: center; max-width: 740px; margin-inline: auto;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Crafted for Comfort</span>
                </div>
                <h2 class="display-lg">Everything You Need for a <em>Perfect Stay</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg">
                    At Radiant Hotel, every amenity is thoughtfully curated to enhance your experience — from invigorating morning swims to relaxing spa retreats and vibrant event spaces, all set within the heart of Lingayen, Pangasinan.
                </p>
            </div>
        </div>
    </section>


    {{-- ============================================================
         SWIMMING POOL — Feature Section
    ============================================================ --}}
    <section class="section-gap amenity-feature" aria-label="Swimming Pool">
        <div class="container">
            <div class="amenity-feature-grid">
                <div class="amenity-feature-img-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=900&auto=format&fit=crop"
                        alt="Outdoor Swimming Pool"
                        class="amenity-feature-img"
                        loading="lazy"
                    >
                    <div class="amenity-feature-badge">
                        <span class="eyebrow" style="color: var(--navy);">Open Daily</span>
                        <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--navy); font-weight: 400; display:block; margin-top:0.25rem;">6:00 AM – 9:00 PM</span>
                    </div>
                </div>
                <div class="amenity-feature-body">
                    <div class="section-label">
                        <span class="eyebrow">Recreation</span>
                    </div>
                    <h2 class="display-lg">
                        Swimming <em>Pool</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.5rem;">
                        Unwind in our sparkling outdoor pool, surrounded by lush tropical gardens and the warm Pangasinan breeze. Whether you're looking to swim laps at sunrise or simply lounge poolside with a refreshing drink, our pool area offers the perfect escape.
                    </p>
                    <div class="amenity-highlights">
                        @foreach(['Outdoor Tropical Setting', 'Lounge Chairs & Umbrellas', 'Pool Towels Provided', 'Children\'s Area Available'] as $item)
                        <div class="amenity-highlight">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         FITNESS CENTER — Dark background
    ============================================================ --}}
    <section class="section-gap amenity-dark" aria-label="Fitness Center">
        <div class="container">
            <div class="amenity-feature-grid amenity-feature-grid--reverse">
                <div class="amenity-feature-body">
                    <div class="section-label">
                        <span class="eyebrow" style="color: var(--gold);">Wellness</span>
                    </div>
                    <h2 class="display-lg" style="color: var(--white);">
                        Fitness <em>Center</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="color: rgba(255,255,255,0.65); margin-bottom: 1.5rem;">
                        Maintain your wellness routine without compromise. Our fully-equipped fitness center features modern cardio and strength-training equipment, perfect for guests who want to stay active throughout their stay.
                    </p>
                    <div class="amenity-highlights">
                        @foreach(['Cardio Machines', 'Free Weights & Racks', 'Air-Conditioned Space', 'Open 24 Hours'] as $item)
                        <div class="amenity-highlight" style="color: rgba(255,255,255,0.75);">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="amenity-feature-img-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=900&auto=format&fit=crop"
                        alt="Fitness Center"
                        class="amenity-feature-img"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         SPA SERVICES — Light background
    ============================================================ --}}
    <section class="section-gap amenity-feature" aria-label="Spa Services">
        <div class="container">
            <div class="amenity-feature-grid">
                <div class="amenity-feature-img-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=900&auto=format&fit=crop"
                        alt="Spa and Wellness"
                        class="amenity-feature-img"
                        loading="lazy"
                    >
                    <div class="amenity-feature-badge">
                        <span class="eyebrow" style="color: var(--navy);">By Appointment</span>
                        <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--navy); font-weight: 400; display:block; margin-top:0.25rem;">9:00 AM – 8:00 PM</span>
                    </div>
                </div>
                <div class="amenity-feature-body">
                    <div class="section-label">
                        <span class="eyebrow">Relaxation</span>
                    </div>
                    <h2 class="display-lg">
                        Spa <em>Services</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.5rem;">
                        Rejuvenate body and mind with our signature wellness treatments. Our trained therapists draw from traditional Filipino healing practices blended with contemporary spa techniques to offer a truly restorative experience.
                    </p>
                    <div class="amenity-highlights">
                        @foreach(['Full Body Massage', 'Facial Treatments', 'Aromatherapy Sessions', 'Couples Packages'] as $item)
                        <div class="amenity-highlight">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                    <a href="/reservations" class="btn btn-gold" style="margin-top: 2rem;"><span>Book a Treatment</span></a>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         EVENTS & BANQUETS — Dark background
    ============================================================ --}}
    <section class="section-gap amenity-dark" aria-label="Events and Banquets">
        <div class="container">
            <div class="amenity-feature-grid amenity-feature-grid--reverse">
                <div class="amenity-feature-body">
                    <div class="section-label">
                        <span class="eyebrow" style="color: var(--gold);">Gatherings</span>
                    </div>
                    <h2 class="display-lg" style="color: var(--white);">
                        Events &amp; <em>Banquets</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="color: rgba(255,255,255,0.65); margin-bottom: 1.5rem;">
                        Whether it's a grand wedding reception, a corporate gathering, or a milestone celebration, our flexible event spaces are designed to accommodate every occasion with elegance and professional service.
                    </p>
                    <div class="amenity-highlights">
                        @foreach(['Ballroom & Function Hall', 'AV & Sound Equipment', 'In-House Catering', 'Dedicated Events Team'] as $item)
                        <div class="amenity-highlight" style="color: rgba(255,255,255,0.75);">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                    <a href="/contact" class="btn btn-gold" style="margin-top: 2rem;"><span>Inquire Now</span></a>
                </div>
                <div class="amenity-feature-img-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=900&auto=format&fit=crop"
                        alt="Events and Banquet Hall"
                        class="amenity-feature-img"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         AMENITIES ICON GRID
    ============================================================ --}}
    <section class="section-gap" style="background: var(--cream);" aria-label="All Amenities">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">What's Included</span>
                </div>
                <h2 class="display-lg">All Hotel <em>Amenities</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
            </div>

            <div class="amenities-icon-grid">
                @foreach ([
                    ['Swimming Pool',     'Sparkling outdoor pool with lounge area and tropical gardens.'],
                    ['Fitness Center',    'Modern gym equipment open 24 hours for all fitness levels.'],
                    ['Spa & Wellness',    'Signature treatments from Filipino and contemporary therapies.'],
                    ['Restaurant & Bar',  'Filipino, Asian, and American cuisine from 6 AM to 10 PM.'],
                    ['Room Service',      'Full-menu in-room dining available from 6 AM to 10 PM.'],
                    ['Secure Parking',    'On-site parking available for all hotel guests.'],
                    ['High-Speed WiFi',   'Complimentary high-speed internet throughout the property.'],
                    ['Events & Banquets', 'Flexible function halls for weddings, meetings, and celebrations.'],
                    ['Laundry Service',   'Same-day laundry and dry-cleaning services upon request.'],
                    ['Airport Transfer',  'Comfortable transfers to and from Lingayen and nearby airports.'],
                    ['24-hr Front Desk',  'Our team is always on hand to assist with any request.'],
                    ['Garden Grounds',    'Lush, landscaped tropical gardens throughout the property.'],
                ] as $amenity)
                <div class="amenity-icon-card">
                    <h3 class="amenity-icon-title">{{ $amenity[0] }}</h3>
                    <p class="body-sm">{{ $amenity[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         CTA BANNER
    ============================================================ --}}
    <section class="cta-banner" aria-label="Book your stay">
        <div class="cta-overlay"></div>
        <img
            src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1600&auto=format&fit=crop"
            alt=""
            class="cta-bg"
            aria-hidden="true"
        >
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Best Rates Guaranteed</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Book Your Stay &amp;<br><em>Enjoy Every Amenity</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Reserve directly through our website and unlock exclusive perks, best-rate guarantees, and full access to all hotel amenities.
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

        /* AMENITY FEATURE SECTIONS */
        .amenity-feature { background: var(--white); }
        .amenity-dark    { background: var(--navy); }

        .amenity-feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        .amenity-feature-grid--reverse .amenity-feature-img-wrap { order: 2; }
        .amenity-feature-grid--reverse .amenity-feature-body     { order: 1; }

        .amenity-feature-img-wrap {
            position: relative;
            overflow: hidden;
        }
        .amenity-feature-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .amenity-feature-img-wrap:hover .amenity-feature-img { transform: scale(1.04); }

        .amenity-feature-badge {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            background: var(--gold);
            padding: 0.85rem 1.25rem;
        }

        .amenity-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 1.25rem;
        }
        .amenity-highlight {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-mid);
            font-size: 0.9rem;
        }
        .highlight-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
        }

        /* AMENITIES ICON GRID */
        .amenities-icon-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.75rem;
        }
        .amenity-icon-card {
            background: var(--white);
            padding: 2rem 1.5rem;
            text-align: center;
            transition: transform 0.3s var(--ease-out), box-shadow 0.3s ease;
        }
        .amenity-icon-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(13,27,42,0.10);
        }
        .amenity-icon-title {
            font-family: var(--font-display);
            font-size: 1.15rem;
            font-weight: 400;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        /* CTA BANNER */
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

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .amenity-feature-grid { grid-template-columns: 1fr; gap: 3rem; }
            .amenity-feature-grid--reverse .amenity-feature-img-wrap,
            .amenity-feature-grid--reverse .amenity-feature-body { order: unset; }
            .amenities-icon-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .amenities-icon-grid { grid-template-columns: 1fr; }
            .amenity-highlights  { grid-template-columns: 1fr; }
            .amenity-feature-img { height: 280px; }
        }
    </style>
    </x-slot>

</x-layout>