<x-layout title="Dining – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Dining hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Dining.png') }}" alt="Dining at Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Dining</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Dining</span>
            </div>
        </div>
    </section>


    {{-- ============================================================
         INTRO
    ============================================================ --}}
    <section class="section-gap" style="background: var(--white);" aria-label="Dining intro">
        <div class="container">
            <div style="text-align: center; max-width: 740px; margin-inline: auto;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Taste &amp; Savor</span>
                </div>
                <h2 class="display-lg">A Culinary <em>Experience</em> to Remember</h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg">
                    Our dining venues celebrate the rich flavors of Pangasinan and the Philippines, blending local ingredients with contemporary technique for a truly memorable experience — whether it's a casual breakfast or a celebratory dinner.
                </p>
            </div>
        </div>
    </section>


    {{-- ============================================================
         IN-HOUSE RESTAURANT
    ============================================================ --}}
    <section class="section-gap dining-feature" aria-label="In-House Restaurant">
        <div class="container">
            <div class="dining-feature-grid">
                <div class="dining-feature-img-wrap">
                    <img
                        src="{{ asset('images/In-House-Restaurant.png') }}" alt="In-House Restaurant"
                        class="dining-feature-img"
                        loading="lazy"
                    >
                    <div class="dining-feature-badge">
                        <span class="eyebrow" style="color: var(--navy);">Open Daily</span>
                        <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--navy); font-weight: 400; display:block; margin-top:0.25rem;">6:00 AM – 10:00 PM</span>
                    </div>
                </div>
                <div class="dining-feature-body">
                    <div class="section-label">
                        <span class="eyebrow">In-House</span>
                    </div>
                    <h2 class="display-lg">
                        In-House <em>Restaurant</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.5rem;">
                        Open from 6:00 AM to 10:00 PM, our In-House Restaurant is the perfect place to satisfy your cravings. Serving up American, Asian, and Filipino cuisines, every meal is crafted with care — from casual lunches to dinner celebrations.
                    </p>
                    <div class="dining-highlights">
                        @foreach(['Authentic Filipino Cuisine', 'American Favorites', 'Asian Dishes', 'Breakfast Buffet'] as $item)
                        <div class="dining-highlight">
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
         ROOM SERVICE — Dark background
    ============================================================ --}}
    <section class="section-gap dining-dark" aria-label="Room Service">
        <div class="container">
            <div class="dining-feature-grid dining-feature-grid--reverse">
                <div class="dining-feature-body">
                    <div class="section-label">
                        <span class="eyebrow" style="color: var(--gold);">In-Room</span>
                    </div>
                    <h2 class="display-lg" style="color: var(--white);">
                        Room <em>Service</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="color: rgba(255,255,255,0.65); margin-bottom: 1.5rem;">
                        Available from 6:00 AM to 10:00 PM. Bring the restaurant experience to the comfort of your room. Whether you want a sumptuous breakfast in bed or need a late dinner after a long day, our room service menu offers you the ultimate convenience.
                    </p>
                    <div class="dining-highlights">
                        @foreach(['Breakfast in Bed', 'Full Menu Available', 'Prompt Delivery', 'Elegantly Presented'] as $item)
                        <div class="dining-highlight" style="color: rgba(255,255,255,0.75);">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                    <a href="/reservations" class="btn btn-gold" style="margin-top: 2rem;"><span>Reserve a Room</span></a>
                </div>
                <div class="dining-feature-img-wrap">
                    <img
                        src="{{ asset('images/Room-Service.png') }}" alt="Room Service"
                        class="dining-feature-img"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
         CUISINE HIGHLIGHTS STRIP
    ============================================================ --}}
    <section class="section-gap" style="background: var(--cream);" aria-label="Cuisine highlights">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">What We Serve</span>
                </div>
                <h2 class="display-lg">Our Cuisine <em>Highlights</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
            </div>
            <div class="cuisine-grid">
                @foreach ([
                    ['Filipino Cuisine',    'Classic Pangasinense dishes and beloved Filipino comfort food, prepared with local ingredients.', asset('images/Filipino-Cuisine.png')],
                    ['Asian Selections',    'From savory stir-fries to steaming soups, our Asian menu draws from across the continent.', asset('images/Asian-Selections.png')],
                    ['American Favorites',  'Hearty burgers, grilled classics, and all-day breakfast staples for the international traveler.', asset('images/American-Favorites.png')],
                    ['Fresh Seafood',       'Sourced from the Lingayen Gulf, our fresh seafood selection is a true taste of Pangasinan.', asset('images/Fresh-Seafood.png')],
                ] as $cuisine)
                <article class="cuisine-card card">
                    <div class="card-img-wrap">
                        <img src="{{ $cuisine[2] }}" alt="{{ $cuisine[0] }}" class="card-img" loading="lazy">
                    </div>
                    <div class="card-body">
                        <span class="card-tag">Cuisine</span>
                        <h3 class="card-title">{{ $cuisine[0] }}</h3>
                        <p class="body-sm">{{ $cuisine[1] }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         CTA BANNER
    ============================================================ --}}
    <section class="cta-banner" aria-label="Reserve your dining experience">
        <div class="cta-overlay"></div>
        <img
            src="{{ asset('images/Dine-With-Us.png') }}" alt=""
            class="cta-bg"
            aria-hidden="true"
        >
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Best Rates Guaranteed</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Book Your Stay &amp;<br><em>Dine With Us</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Reserve your room directly and enjoy exclusive dining perks available only through our website.
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

        /* DINING FEATURE SECTIONS */
        .dining-feature { background: var(--white); }
        .dining-dark { background: var(--navy); }

        .dining-feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        .dining-feature-grid--reverse .dining-feature-img-wrap { order: 2; }
        .dining-feature-grid--reverse .dining-feature-body   { order: 1; }

        .dining-feature-img-wrap {
            position: relative;
            overflow: hidden;
        }
        .dining-feature-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .dining-feature-img-wrap:hover .dining-feature-img { transform: scale(1.04); }

        .dining-feature-badge {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            background: var(--gold);
            padding: 0.85rem 1.25rem;
        }

        .dining-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 1.25rem;
        }
        .dining-highlight {
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

        /* CUISINE CARDS */
        .cuisine-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.75rem;
        }
        .cuisine-card .card-img {
            height: 240px;
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
        .cta-content {
            position: relative;
            z-index: 2;
        }
        .cta-content h2 em { color: var(--gold-light); font-style: italic; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .dining-feature-grid,
            .dining-feature-grid--reverse .dining-feature-img-wrap,
            .dining-feature-grid--reverse .dining-feature-body {
                grid-template-columns: 1fr;
                order: unset;
            }
            .dining-feature-grid { gap: 3rem; }
            .cuisine-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .cuisine-grid { grid-template-columns: 1fr; }
            .dining-highlights { grid-template-columns: 1fr; }
            .dining-feature-img { height: 280px; }
        }
    </style>
    </x-slot>

</x-layout>