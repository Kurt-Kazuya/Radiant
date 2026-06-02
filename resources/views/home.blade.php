<x-layout title="Radiant Hotel Pangasinan">


    <section id="hero" aria-label="Hero">
        <div class="hero-wrap">

            <!-- Background visual (replace src with actual asset) -->
            <div class="hero-bg">
                <img
                    src="{{ asset('images/Front-Image-Home.jpg') }}"
                    alt="Radiant Hotel exterior"
                    class="hero-img"
                    fetchpriority="high"
                >
                <div class="hero-overlay"></div>
            </div>

            <div class="container hero-content">
                <div class="hero-inner animate-fade-up">
                    <p class="eyebrow delay-1 animate-fade-up">Lingayen · Pangasinan</p>
                    <h1 class="display-xl hero-title delay-2 animate-fade-up">
                        Where Luxury<br>
                        <em>Meets Paradise</em>
                    </h1>
                    <p class="body-lg hero-desc delay-3 animate-fade-up">
                        At Radiant Hotel, every stay is crafted to deliver the warmth of Pangasinense hospitality alongside modern comforts — minutes from Lingayen Gulf and the heart of the city.
                    </p>
                    <div class="hero-actions delay-4 animate-fade-up">
                        <a href="/reservations" class="btn btn-gold"><span>Reserve Your Stay</span></a>
                        <a href="/accommodations" class="btn btn-ghost">Explore Rooms</a>
                    </div>
                </div>

                <!-- Floating stats -->
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-num">82</span>
                        <span class="stat-label">Rooms &amp; Suites</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat">
                        <span class="stat-num">4</span>
                        <span class="stat-label">Hotel Category</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat">
                        <span class="stat-num">2 min</span>
                        <span class="stat-label">To Lingayen Gulf</span>
                    </div>
                </div>
            </div>

            <!-- Scroll cue -->
            <div class="scroll-cue" aria-hidden="true">
                <span class="scroll-text">Scroll</span>
                <div class="scroll-line"></div>
            </div>
        </div>
    </section>


    <!-- 
         WELCOME / ABOUT STRIP
     -->
    <section class="section-gap" style="background: var(--white);" aria-label="About Radiant Hotel">
        <div class="container">
            <div class="about-grid">
                <div class="about-text">
                    <div class="section-label">
                        <span class="eyebrow">Welcome</span>
                    </div>
                    <h2 class="display-lg">
                        Radiant Hotel<br>
                        <em>at Lingayen Pangasinan</em>
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="margin-bottom: 1.25rem;">
                        Set just a few minutes away from Lingayen Gulf and the city center, Radiant Hotel is the destination in Lingayen for travelers and locals alike.
                    </p>
                    <p class="body-lg" style="margin-bottom: 2rem;">
                        Whether you're here to explore Pangasinan's breathtaking natural wonders or celebrate an important milestone, our stylish and contemporary amenities are sure to delight.
                    </p>
                    <a href="/accommodations" class="btn btn-outline">Discover Our Rooms</a>
                </div>
                <div class="about-imagery">
                    <div class="about-img-main">
                        <img src="{{ asset('images/radiantHotelHome.png') }}" alt="Radiant Hotel lobby" loading="lazy">
                    </div>
                    <div class="about-img-accent">
                        <img src="{{ asset('images/Hotel-Lobby.png') }}" alt="Radiant Hotel lobby" loading="lazy">
                        <div class="accent-badge">
                            <span class="eyebrow" style="color: var(--navy);">Est.</span>
                            <span style="font-family: var(--font-display); font-size: 2rem; color: var(--navy); font-weight: 300; line-height: 1;">2015</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- 
         ACCOMMODATIONS SECTION
     -->
    <section class="section-gap" style="background: var(--cream);" aria-label="Accommodations">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Where you'll rest</span>
                </div>
                <h2 class="display-lg">Our Accommodations</h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg" style="max-width: 560px; margin-inline: auto;">
                    Radiant Hotel has 82 beautifully appointed rooms that reflect the true essence of Pangasinense hospitality.
                </p>
            </div>

            <div class="rooms-grid">
                @foreach ([
                    ['Deluxe Room', 'Comfortable and thoughtfully designed for the discerning traveler seeking relaxation.', 'deluxe', asset('images/Delux-Rooms.jpg')],
                    ['Superior Room', 'Elevated amenities and generous space for a superior Pangasinan experience.', 'superior', asset('images/Superior-Rooms.jpg')],
                    ['Suite', 'Expansive suites designed for those who desire the pinnacle of comfort and style.', 'suite', asset('images/Suite-Rooms.jpg')],
                ] as $room)
                <article class="room-card card">
                    <div class="card-img-wrap">
                        <img src="{{ $room[3] }}" alt="{{ $room[0] }}" class="card-img" loading="lazy">
                        <div class="room-tag">{{ $room[2] }}</div>
                    </div>
                    <div class="card-body">
                        <span class="card-tag">Accommodation</span>
                        <h3 class="card-title">{{ $room[0] }}</h3>
                        <p class="body-sm" style="margin-bottom: 1.25rem;">{{ $room[1] }}</p>
                        <a href="/accommodations" class="btn btn-outline" style="padding: 0.6rem 1.25rem; font-size: 0.72rem;">View Details →</a>
                    </div>
                </article>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="/reservations" class="btn btn-gold"><span>Book a Room</span></a>
            </div>
        </div>
    </section>


    <!-- 
         DINING SECTION — Dark background, editorial feel
     -->
    <section class="section-gap dining-section" aria-label="Dining">
        <div class="container">
            <div class="dining-grid">
                <div class="dining-imagery">
                    <img src="{{ asset('images/Food-Home.jpg') }}" alt="Dining at Radiant Hotel" loading="lazy" class="dining-img">
                </div>
                <div class="dining-text">
                    <div class="section-label">
                        <span class="eyebrow" style="color: var(--gold);">Taste &amp; Savor</span>
                    </div>
                    <h2 class="display-lg" style="color: var(--white);">
                        Culinary <em>Excellence</em><br>In Every Bite
                    </h2>
                    <span class="gold-line"></span>
                    <p class="body-lg" style="color: rgba(255,255,255,0.65); margin-bottom: 1.5rem;">
                        Our restaurant and bar celebrate the rich flavors of Pangasinan and the Philippines, blending local ingredients with contemporary technique for a truly memorable dining experience.
                    </p>
                    <div class="dining-highlights">
                        @foreach(['Authentic Filipino Cuisine', 'International Favorites', 'Fresh Pangasinan Seafood', 'Craft Cocktail Bar'] as $item)
                        <div class="dining-highlight">
                            <div class="highlight-dot"></div>
                            <span>{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                    <a href="/dining" class="btn btn-gold" style="margin-top: 2rem;"><span>Explore Dining</span></a>
                </div>
            </div>
        </div>
    </section>


    <!-- 
         AMENITIES SECTION
     -->
    <section class="section-gap" style="background: var(--white);" aria-label="Amenities">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">What's included</span>
                </div>
                <h2 class="display-lg">Hotel Amenities</h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
            </div>

            <div class="amenities-grid">
                @foreach ([
                    ['', 'Swimming Pool', 'Unwind in our sparkling outdoor pool surrounded by lush tropical gardens.'],
                    ['', 'Restaurant & Bar', 'Savor Filipino and international cuisine in an elegant setting.'],
                    ['', 'Fitness Center', 'Maintain your wellness routine with our fully-equipped gym.'],
                    ['', 'Parking', 'Secure, on-site parking for the convenience of all guests.'],
                    ['', 'High-Speed WiFi', 'Complimentary high-speed internet throughout the property.'],
                    ['', 'Spa Services', 'Rejuvenate body and mind with our signature wellness treatments.'],
                    ['', 'Events & Banquets', 'Flexible spaces for weddings, meetings, and special occasions.'],
                    ['', '24-hr Front Desk', 'Our team is always on hand to assist with any request.'],
                ] as $amenity)
                <div class="amenity-item">
                    <div class="amenity-icon">{{ $amenity[0] }}</div>
                    <h3 class="amenity-title">{{ $amenity[1] }}</h3>
                    <p class="body-sm">{{ $amenity[2] }}</p>
                </div>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="/amenities" class="btn btn-outline">All Amenities</a>
            </div>
        </div>
    </section>


    <!-- 
         DESTINATIONS / EXPLORE SECTION
     -->
    <section class="section-gap" style="background: var(--cream);" aria-label="Nearby Destinations">
        <div class="container">
            <div class="explore-header">
                <div>
                    <div class="section-label">
                        <span class="eyebrow">Nearby Attractions</span>
                    </div>
                <h2 class="display-lg">Explore Pangasinan</h2>
                </div>
                <p class="body-lg" style="max-width: 400px;">
                    As the capital of Pangasinan, Lingayen offers a perfect mix of coastal living and provincial charm — and we're minutes from it all.
                </p>
            </div>
            <span class="gold-line"></span>

            <div class="destinations-grid">
                @foreach ([
                    ['Lingayen Gulf', 'Enjoy the calm, scenic waters of Lingayen Gulf — right at our doorstep.', asset('images/Serene-Lingayen-Beach-and-Baywalk_1.jpg')],
                    ['Hundred Islands', 'Explore 123 stunning islands inside the famous Hundred Islands National Park.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Hundred_Islands_National_Park,_Pangasinan.jpg/1280px-Hundred_Islands_National_Park,_Pangasinan.jpg'],
                    ['Bolinao Falls', 'Discover the breathtaking waterfalls and natural pools of Bolinao, Pangasinan.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Bolinao_Falls,_Pangasinan_(3).jpg/1280px-Bolinao_Falls,_Pangasinan_(3).jpg'],
                    ['Pangasinan Capitol', 'Visit the iconic Greek-inspired Pangasinan Provincial Capitol and Veterans Memorial Park.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Pangasinan_Provincial_Capitol.jpg/1280px-Pangasinan_Provincial_Capitol.jpg'],
                ] as $dest)
                <article class="dest-card">
                    <div class="dest-img-wrap">
                        <img src="{{ $dest[2] }}" alt="{{ $dest[0] }}" loading="lazy" class="dest-img" onerror="this.onerror=null;this.src='https://picsum.photos/seed/'+encodeURIComponent('{{ $dest[0] }}')+'/600/400'">
                        <div class="dest-overlay"></div>
                    </div>
                    <div class="dest-body">
                        <h3 class="dest-title">{{ $dest[0] }}</h3>
                        <p class="body-sm" style="margin-bottom: 1rem; color: var(--text-mid);">{{ $dest[1] }}</p>
                        <a href="#" class="dest-link">Learn more <span>→</span></a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>


    <!-- 
         CTA BANNER
     -->
    <section class="cta-banner" aria-label="Book your stay">
        <div class="cta-overlay"></div>
        <img src="{{ asset('images/Footer-Image.png') }}" alt="" class="cta-bg" aria-hidden="true">
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Your Adventure Awaits</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Start Your Radiant<br><em>Experience Today</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Book directly for the best available rates and enjoy exclusive perks available only through our website.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/reservations" class="btn btn-gold"><span>Reserve Now</span></a>
                <a href="/contact" class="btn btn-ghost">Contact Us</a>
            </div>
        </div>
    </section>


    <!-- 
         PAGE-SPECIFIC STYLES
     -->
    <x-slot name="styles">
    <style>
        /* HERO */
        .hero-wrap {
            position: relative;
            height: 100svh;
            min-height: 640px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .hero-bg { position: absolute; inset: 0; }
        .hero-img {
            width: 100%; height: 100%;
            object-fit: cover;
            object-position: center 30%;
            transform: scale(1.04);
            animation: heroZoom 12s ease-out forwards;
        }
        @keyframes heroZoom {
            from { transform: scale(1.08); }
            to   { transform: scale(1.0); }
        }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(
                135deg,
                rgba(13,27,42,0.82) 0%,
                rgba(13,27,42,0.45) 60%,
                rgba(13,27,42,0.2) 100%
            );
        }
        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding-top: var(--header-h);
        }
        .hero-inner { max-width: 700px; }
        .hero-title {
            color: var(--white);
            margin-block: 1.25rem;
        }
        .hero-title em { color: var(--gold-light); font-style: italic; }
        .hero-desc {
            color: rgba(255,255,255,0.78);
            max-width: 560px;
            margin-bottom: 2.25rem;
        }
        .hero-actions { display: flex; gap: 1rem; flex-wrap: wrap; }

        /* Stats bar */
        .hero-stats {
            position: absolute;
            bottom: 2.5rem;
            right: clamp(1.25rem, 5vw, 3rem);
            display: flex;
            align-items: center;
            gap: 2rem;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.12);
            padding: 1.25rem 2rem;
        }
        .stat { text-align: center; }
        .stat-num {
            display: block;
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 300;
            color: var(--gold-light);
            line-height: 1;
        }
        .stat-label {
            display: block;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.55);
            margin-top: 0.3rem;
        }
        .stat-divider {
            width: 1px;
            height: 40px;
            background: rgba(255,255,255,0.2);
        }

        /* Scroll cue */
        .scroll-cue {
            position: absolute;
            bottom: 2.5rem;
            left: clamp(1.25rem, 5vw, 3rem);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            z-index: 2;
        }
        .scroll-text {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.45);
            writing-mode: vertical-lr;
        }
        .scroll-line {
            width: 1px;
            height: 60px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scrollPulse 2s ease-in-out infinite;
        }
        @keyframes scrollPulse {
            0%, 100% { opacity: 0.4; transform: scaleY(1); }
            50%       { opacity: 1;   transform: scaleY(1.15); }
        }

        /* ABOUT GRID */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        .about-imagery {
            position: relative;
            height: 560px;
        }
        .about-img-main {
            position: absolute;
            top: 0; left: 0;
            width: 78%; height: 88%;
            overflow: hidden;
        }
        .about-img-main img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out);
        }
        .about-img-main:hover img { transform: scale(1.05); }
        .about-img-accent {
            position: absolute;
            bottom: 0; right: 0;
            width: 50%; height: 45%;
            overflow: hidden;
            border: 6px solid var(--white);
        }
        .about-img-accent img {
            width: 100%; height: 100%;
            object-fit: cover;
        }
        .accent-badge {
            position: absolute;
            top: -2rem; left: -2rem;
            width: 90px; height: 90px;
            background: var(--gold);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
        }

        /* ROOMS */
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.75rem;
        }
        .room-card .card-img-wrap {
            position: relative;
            overflow: hidden;
        }
        .room-card .card-img { height: 260px; }
        .room-tag {
            position: absolute;
            top: 1rem; left: 1rem;
            padding: 0.3rem 0.75rem;
            background: var(--gold);
            color: var(--navy);
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* DINING */
        .dining-section {
            background: var(--navy);
        }
        .dining-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        .dining-imagery { position: relative; }
        .dining-img {
            width: 100%; height: 520px;
            object-fit: cover;
        }
        .dining-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.85rem;
            margin-top: 1.5rem;
        }
        .dining-highlight {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: rgba(255,255,255,0.75);
            font-size: 0.9rem;
        }
        .highlight-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
        }

        /* AMENITIES */
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }
        .amenity-item {
            padding: 1.75rem 1.5rem;
            border: 1px solid rgba(200,169,110,0.15);
            text-align: center;
            transition: all 0.3s ease;
        }
        .amenity-item:hover {
            border-color: var(--gold);
            box-shadow: 0 8px 32px rgba(200,169,110,0.1);
            transform: translateY(-4px);
        }
        .amenity-icon {
            font-size: 1.8rem;
            margin-bottom: 0.85rem;
        }
        .amenity-title {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
        }

        /* DESTINATIONS */
        .explore-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: 2.5rem;
        }
        .dest-card { overflow: hidden; background: var(--white); }
        .dest-img-wrap {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .dest-img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.6s var(--ease-out);
        }
        .dest-card:hover .dest-img { transform: scale(1.08); }
        .dest-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(13,27,42,0.5), transparent);
        }
        .dest-body { padding: 1.25rem; }
        .dest-title {
            font-family: var(--font-display);
            font-size: 1.15rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
        }
        .dest-link {
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            transition: gap 0.2s ease;
            display: inline-flex;
            gap: 0.4rem;
        }
        .dest-link:hover { gap: 0.75rem; }

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
            .about-grid { grid-template-columns: 1fr; gap: 3rem; }
            .about-imagery { height: 400px; }
            .dining-grid { grid-template-columns: 1fr; gap: 3rem; }
            .rooms-grid { grid-template-columns: repeat(2, 1fr); }
            .amenities-grid { grid-template-columns: repeat(2, 1fr); }
            .destinations-grid { grid-template-columns: repeat(2, 1fr); }
            .hero-stats { display: none; }
        }
        @media (max-width: 640px) {
            .rooms-grid { grid-template-columns: 1fr; }
            .destinations-grid { grid-template-columns: 1fr; }
            .amenities-grid { grid-template-columns: 1fr 1fr; }
            .dining-highlights { grid-template-columns: 1fr; }
            .about-imagery { height: 300px; }
            .hero-actions { flex-direction: column; }
        }
    </style>
    </x-slot>

</x-layout>
