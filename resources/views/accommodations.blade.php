<x-layout title="Accommodations – Radiant Hotel Pangasinan">

    <!-- 
         PAGE HERO BANNER
     -->
    <section class="page-hero" aria-label="Accommodations hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Accommodations.png') }}" alt="Radiant Hotel Accommodations"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                Our <em>Accommodations</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Accommodations</span>
            </div>
        </div>
    </section>


    <!-- 
         INTRO + ALL ROOMS INCLUDE
     -->
    <section class="section-gap" style="background: var(--white);" aria-label="Room overview">
        <div class="container">
            <div style="text-align: center; max-width: 740px; margin-inline: auto;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">82 Beautifully Appointed Rooms</span>
                </div>
                <h2 class="display-lg">A Comfortable <em>Home Away From Home</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg">
                    Radiant Hotel boasts 82 beautifully appointed rooms that reflect the true essence of Pangasinense hospitality. Escape to any of our rooms and discover a comfortable home away from home.
                </p>
            </div>

            <!-- All rooms include -->
            <div class="includes-wrap">
                <h3 class="includes-title">
                    <span class="gold-line" style="display: inline-block; width: 32px; height: 1px; vertical-align: middle; margin-right: 0.75rem;"></span>
                    All Rooms Include
                    <span class="gold-line" style="display: inline-block; width: 32px; height: 1px; vertical-align: middle; margin-left: 0.75rem;"></span>
                </h3>
                <div class="includes-grid">
                    @foreach ([
                        ['', 'Flat Screen TV'],
                        ['', 'Air Conditioning'],
                        ['', 'Unlimited Wi-Fi'],
                        ['', 'Safety Deposit Box'],
                        ['', 'Mini Fridge'],
                        ['', 'Writing Desk & Chair'],
                        ['', 'Coffee & Tea Facilities'],
                        ['', 'Hot & Cold Shower'],
                        ['', 'Complete Bath Amenities'],
                    ] as $inc)
                    <div class="include-item">
                        <span class="include-icon">{{ $inc[0] }}</span>
                        <span class="include-label">{{ $inc[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- 
         ROOM FILTER TABS
     -->
    <div class="room-filter-bar">
        <div class="container">
            <div class="filter-tabs" id="filter-tabs">
                <button class="filter-tab active" data-filter="all">All Rooms</button>
                <button class="filter-tab" data-filter="standard">Standard</button>
                <button class="filter-tab" data-filter="deluxe">Deluxe</button>
                <button class="filter-tab" data-filter="suite">Suites</button>
                <button class="filter-tab" data-filter="penthouse">Penthouses</button>
            </div>
        </div>
    </div>


    <!-- 
         ROOMS LISTING
     -->
    <section class="section-gap" style="background: var(--cream);" aria-label="Room listings">
        <div class="container">
            <div class="rooms-listing" id="rooms-listing">

                <!-- STANDARD ROOM -->
                <article class="room-listing-card" data-category="standard" id="standard-room">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/Standard-Room.jpg') }}"
                            alt="Standard Room"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/Standard-Room.jpg') }}'"
                        >
                        <div class="room-badge">Standard</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">Standard Room</h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Modern and stylish, our Standard Room offers everything you need to make the most out of your stay.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">34 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2 Double Beds</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">1</span><span class="spec-label">En Suite Bath</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- DELUXE ROOM -->
                <article class="room-listing-card room-listing-card--reverse" data-category="deluxe" id="deluxe-room">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/Delux-Room.jpg') }}"
                            alt="Deluxe Room"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/Delux-Room.jpg') }}'"
                        >
                        <div class="room-badge">Deluxe</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">Deluxe Room</h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Our Deluxe Room provides guests with spacious interiors and modern amenities designed to soothe both body and mind.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">34 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2 Double Beds</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Veranda</span><span class="spec-label">Extra</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- DELUXE POOL VIEW -->
                <article class="room-listing-card" data-category="deluxe" id="deluxe-pool-view">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/Delux-Room-Pool-View.jpg') }}"
                            alt="Deluxe Room Pool View"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/Delux-Room-Pool-View.jpg') }}'"
                        >
                        <div class="room-badge">Deluxe</div>
                        <div class="room-badge room-badge--accent">Pool View</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">Deluxe Room<br><em>Pool View</em></h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Our Deluxe Room Pool View provides guests with spacious interiors, modern amenities, and a relaxing pool view.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">34 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Pool View</span><span class="spec-label">View</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Veranda</span><span class="spec-label">Extra</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- ONE BEDROOM SUITE -->
                <article class="room-listing-card room-listing-card--reverse" data-category="suite" id="one-bedroom-suite">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/One-Bedroom-Suite.jpg') }}"
                            alt="One Bedroom Suite"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/One-Bedroom-Suite.jpg') }}'"
                        >
                        <div class="room-badge">Suite</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">One Bedroom <em>Suite</em></h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Our One Bedroom Suites are the perfect choice for guests who value style and elegance in a private atmosphere.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">61 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Queen Bed</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Living & Dining</span><span class="spec-label">Extra</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- JUNIOR PENTHOUSE -->
                <article class="room-listing-card" data-category="penthouse" id="junior-penthouse">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/Penthouse-Room.avif') }}"
                            alt="Junior Penthouse"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/Penthouse-Room.avif') }}'"
                        >
                        <div class="room-badge">Penthouse</div>
                        <div class="room-badge room-badge--accent">Junior</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">Junior <em>Penthouse</em></h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Escape to our Junior Penthouse and enter a haven that exudes an ambiance of true tranquility and sophistication.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">91 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">2</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">King Bed</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Kitchenette + Veranda</span><span class="spec-label">Extra</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- PENTHOUSE -->
                <article class="room-listing-card room-listing-card--reverse" data-category="penthouse" id="penthouse">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/The-Penthouse-3beds-Room.avif') }}"
                            alt="Penthouse"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/The-Penthouse-3beds-Room.avif') }}'"
                        >
                        <div class="room-badge">Penthouse</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">The <em>Penthouse</em></h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Experience a new, elevated level of leisure in our Penthouse, offering 184 sqm of unequivocal relaxation.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">184 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">6</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">3 King Beds</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Living, Dining & Veranda</span><span class="spec-label">Extra</span></div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- GRAND PENTHOUSE -->
                <article class="room-listing-card" data-category="penthouse" id="grand-penthouse">
                    <div class="room-listing-img-wrap">
                        <img
                            src="{{ asset('images/The-Grand-Penthouse-Room.avif') }}"
                            alt="Grand Penthouse"
                            class="room-listing-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('images/The-Grand-Penthouse-Room.avif') }}'"
                        >
                        <div class="room-badge">Penthouse</div>
                        <div class="room-badge room-badge--accent">Grand</div>
                    </div>
                    <div class="room-listing-body">
                        <div class="room-listing-header">
                            <div>
                                <span class="eyebrow">Room Type</span>
                                <h2 class="display-md room-listing-title">Grand <em>Penthouse</em></h2>
                            </div>
                            <a href="/reservations"
                               class="btn btn-gold room-book-btn">
                                <span>Book Now</span>
                            </a>
                        </div>
                        <span class="gold-line"></span>
                        <p class="body-lg room-listing-desc">
                            Our Grand Penthouse is the definition of luxury in Lingayen and tastefully designed to embody the best of Pangasinense hospitality.
                        </p>
                        <div class="room-specs">
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">197 SQM</span><span class="spec-label">Room Size</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">6</span><span class="spec-label">Adults</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">3 King Beds</span><span class="spec-label">Bed Type</span></div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon"></span>
                                <div><span class="spec-value">Premium Suite</span><span class="spec-label">Category</span></div>
                            </div>
                        </div>
                    </div>
                </article>

            </div><!-- end rooms-listing -->
        </div>
    </section>


    <!-- 
         CTA BANNER
     -->
    <section class="accom-cta" aria-label="Book your room">
        <div class="accom-cta-overlay"></div>
        <img
            src="{{ asset('images/Ready-to-Experience-Radiant.png') }}" alt=""
            class="accom-cta-bg"
            aria-hidden="true"
        >
        <div class="container accom-cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Best Rate Guaranteed</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Ready to <em>Experience</em> Radiant?
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 500px; margin-bottom: 2.5rem;">
                Book directly with us for the best available rates and enjoy exclusive perks only available through our website.
            </p>
            <a
                href="/reservations"
                class="btn btn-gold"
            >
                <span>Reserve Your Room</span>
            </a>
        </div>
    </section>


    <!-- 
         PAGE-SPECIFIC STYLES
     -->
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

        /* INCLUDES */
        .includes-wrap {
            margin-top: 4rem;
            padding: 3rem;
            background: var(--cream);
            border-top: 2px solid var(--gold);
        }
        .includes-title {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 400;
            text-align: center;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-dark);
            margin-bottom: 2rem;
        }
        .includes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1.25rem;
        }
        .include-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.75rem 1rem;
            background: var(--white);
            border-left: 2px solid var(--gold);
        }
        .include-icon { font-size: 1.1rem; flex-shrink: 0; }
        .include-label {
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            color: var(--text-dark);
        }

        /* FILTER BAR */
        .room-filter-bar {
            background: var(--navy);
            padding-block: 0;
            position: sticky;
            top: var(--header-h);
            z-index: 50;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .filter-tabs {
            display: flex;
            align-items: center;
            gap: 0;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .filter-tabs::-webkit-scrollbar { display: none; }
        .filter-tab {
            padding: 1.1rem 1.5rem;
            font-family: var(--font-body);
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            white-space: nowrap;
            border-bottom: 2px solid transparent;
            transition: all 0.25s ease;
        }
        .filter-tab:hover { color: var(--white); }
        .filter-tab.active {
            color: var(--gold);
            border-bottom-color: var(--gold);
        }

        /* ROOMS LISTING */
        .rooms-listing {
            display: flex;
            flex-direction: column;
            gap: 3.5rem;
        }
        .room-listing-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--white);
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            transition: box-shadow 0.35s ease, transform 0.35s ease;
        }
        .room-listing-card:hover {
            box-shadow: 0 12px 48px rgba(0,0,0,0.12);
            transform: translateY(-3px);
        }
        .room-listing-card--reverse .room-listing-img-wrap { order: 2; }
        .room-listing-card--reverse .room-listing-body   { order: 1; }

        .room-listing-img-wrap {
            position: relative;
            overflow: hidden;
        }
        .room-listing-img {
            width: 100%;
            height: 100%;
            min-height: 380px;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .room-listing-card:hover .room-listing-img { transform: scale(1.06); }

        .room-badge {
            position: absolute;
            top: 1.25rem;
            left: 1.25rem;
            padding: 0.3rem 0.85rem;
            background: var(--gold);
            color: var(--navy);
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            z-index: 2;
        }
        .room-badge--accent {
            left: auto;
            right: 1.25rem;
            background: var(--navy);
            color: var(--gold);
        }

        .room-listing-body {
            padding: 2.5rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .room-listing-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 0.25rem;
        }
        .room-listing-title { color: var(--text-dark); }
        .room-listing-title em { color: var(--gold); font-style: italic; }
        .room-listing-desc { margin-bottom: 1.75rem; }

        .room-book-btn { flex-shrink: 0; }

        /* SPECS GRID */
        .room-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 0.5rem;
        }
        .spec-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            background: var(--cream);
            border-left: 2px solid var(--gold);
        }
        .spec-icon { font-size: 1.1rem; flex-shrink: 0; }
        .spec-value {
            display: block;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-dark);
            line-height: 1.2;
        }
        .spec-label {
            display: block;
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-light);
        }

        /* HIDDEN ROOM (filter) */
        .room-listing-card.hidden {
            display: none;
        }

        /* CTA */
        .accom-cta {
            position: relative;
            padding-block: clamp(5rem, 12vw, 9rem);
            overflow: hidden;
        }
        .accom-cta-bg {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
        }
        .accom-cta-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to right, rgba(13,27,42,0.9) 30%, rgba(13,27,42,0.5) 100%);
            z-index: 1;
        }
        .accom-cta-content {
            position: relative; z-index: 2;
        }
        .accom-cta-content h2 em { color: var(--gold-light); font-style: italic; }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .room-listing-card,
            .room-listing-card--reverse .room-listing-img-wrap,
            .room-listing-card--reverse .room-listing-body {
                grid-template-columns: 1fr;
                order: unset;
            }
            .room-listing-card { grid-template-columns: 1fr; }
            .room-listing-img { min-height: 280px; }
            .room-listing-body { padding: 2rem 1.5rem; }
            .room-specs { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 600px) {
            .includes-grid { grid-template-columns: 1fr 1fr; }
            .room-specs { grid-template-columns: 1fr; }
            .includes-wrap { padding: 2rem 1rem; }
        }
    </style>
    </x-slot>


    <!-- 
         PAGE-SPECIFIC SCRIPTS
     -->
    <x-slot name="scripts">
    <script>
        // Room filter tabs
        const tabs  = document.querySelectorAll('.filter-tab');
        const cards = document.querySelectorAll('.room-listing-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const filter = tab.dataset.filter;
                cards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // Smooth scroll to first visible card
                const first = [...cards].find(c => !c.classList.contains('hidden'));
                if (first) first.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    </script>
    </x-slot>

</x-layout>
