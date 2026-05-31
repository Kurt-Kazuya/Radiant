<x-layout title="Contact Us – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Contact hero">
        <div class="page-hero-bg">
            <img
                src=asset('images/hotel-lobby-office.jpg')alt="Contact Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Contact Us</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Contact Us</span>
            </div>
        </div>
    </section>


    {{-- ============================================================
         INTRO
    ============================================================ --}}
    <section class="section-gap" style="background: var(--white);" aria-label="Contact intro">
        <div class="container">
            <div style="text-align: center; max-width: 680px; margin-inline: auto;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Get In Touch</span>
                </div>
                <h2 class="display-lg">We Would Love to <em>Hear From You</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg">
                    Whether you have a question about reservations, amenities, or upcoming events, our team is ready to assist. Reach out and let us make your stay truly unforgettable.
                </p>
            </div>
        </div>
    </section>


    {{-- ============================================================
         CONTACT FORM + INFO SIDE BY SIDE
    ============================================================ --}}
    <section class="section-gap contact-main" style="background: var(--cream); padding-top: 0;" aria-label="Contact form and info">
        <div class="container">
            <div class="contact-grid">

                {{-- LEFT: Contact Form --}}
                <div class="contact-form-wrap">
                    <div class="contact-form-header">
                        <div class="section-label">
                            <span class="eyebrow">Send a Message</span>
                        </div>
                        <h2 class="display-md">Leave Us a <em>Message</em></h2>
                        <span class="gold-line"></span>
                    </div>

                    <form class="contact-form" method="POST" action="#" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="contact_name">Name <span class="form-required">*</span></label>
                                <input
                                    type="text"
                                    id="contact_name"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your full name"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="contact_company">Company</label>
                                <input
                                    type="text"
                                    id="contact_company"
                                    name="company"
                                    class="form-control"
                                    placeholder="Company (optional)"
                                >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="contact_email">E-mail Address <span class="form-required">*</span></label>
                                <input
                                    type="email"
                                    id="contact_email"
                                    name="email"
                                    class="form-control"
                                    placeholder="your@email.com"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="contact_phone">Contact Number</label>
                                <input
                                    type="tel"
                                    id="contact_phone"
                                    name="phone"
                                    class="form-control"
                                    placeholder="+63 XXX XXX XXXX"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="contact_subject">Subject</label>
                            <input
                                type="text"
                                id="contact_subject"
                                name="subject"
                                class="form-control"
                                placeholder="How can we help you?"
                            >
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="contact_message">Message <span class="form-required">*</span></label>
                            <textarea
                                id="contact_message"
                                name="message"
                                class="form-control form-textarea"
                                placeholder="Your message up to 500 characters..."
                                maxlength="500"
                                required
                            ></textarea>
                        </div>
                        <p class="form-policy">
                            By clicking Send Message, you agree with our <a href="/privacy">Privacy Policy</a>, including data use and Cookie use.
                        </p>
                        <button type="submit" class="btn btn-gold" style="width: 100%; justify-content: center;">
                            <span>Send Message</span>
                        </button>
                    </form>
                </div>

                {{-- RIGHT: Contact Info --}}
                <div class="contact-info-wrap">
                    <div class="section-label">
                        <span class="eyebrow">Have a Question?</span>
                    </div>
                    <h2 class="display-md">Our <em>Contact Details</em></h2>
                    <span class="gold-line"></span>

                    <div class="contact-details">

                        <div class="contact-detail-item">
                            <div class="contact-detail-label">Phone</div>
                            <div class="contact-detail-body">
                                <a href="tel:+639XXXXXXXXX">+63 9XX XXX XXXX</a><br>
                                <a href="tel:+639XXXXXXXXX">+63 9XX XXX XXXX</a>
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-label">Email</div>
                            <div class="contact-detail-body">
                                <a href="mailto:info@radianthotellingayen.com">info@radianthotellingayen.com</a><br>
                                <a href="mailto:reservations@radianthotellingayen.com">reservations@radianthotellingayen.com</a>
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-label">Address</div>
                            <div class="contact-detail-body">
                                Lingayen, Pangasinan,<br>
                                Philippines
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-label">Hours</div>
                            <div class="contact-detail-body">
                                Front Desk: Open 24 Hours<br>
                                Reservations: 8:00 AM – 8:00 PM
                            </div>
                        </div>

                    </div>

                    {{-- Quick CTA --}}
                    <div class="contact-cta-box">
                        <p class="eyebrow" style="color: var(--gold-light);">Best Rates Guaranteed</p>
                        <h3 class="display-md" style="color: var(--white); margin-block: 0.75rem 1rem;">
                            Ready to <em>Book Your Stay?</em>
                        </h3>
                        <p style="font-size: 0.9rem; color: rgba(255,255,255,0.65); margin-bottom: 1.5rem; line-height: 1.7;">
                            Reserve directly through our website and enjoy exclusive perks and best rate guarantees.
                        </p>
                        <a href="/reservations" class="btn btn-gold"><span>Book Now</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         MAP SECTION
    ============================================================ --}}
    <section class="contact-map-section" aria-label="Hotel location map">
        <div class="contact-map-header">
            <div class="container" style="text-align: center; padding-bottom: 3rem;">
                <div class="section-label" style="justify-content: center;">
                    <span class="eyebrow">Find Us</span>
                </div>
                <h2 class="display-lg">Our <em>Location</em></h2>
                <span class="gold-line" style="margin-inline: auto;"></span>
                <p class="body-lg" style="max-width: 520px; margin-inline: auto;">
                    Conveniently situated in Lingayen, Pangasinan — minutes away from the Lingayen Gulf and the heart of the city.
                </p>
            </div>
        </div>
        <div class="contact-map-embed">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15380.123456789!2d120.2289!3d16.0193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33918ee06a1b7ec3%3A0x0!2sLingayen%2C+Pangasinan!5e0!3m2!1sen!2sph!4v1234567890"
                width="100%"
                height="480"
                style="border: 0; display: block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Radiant Hotel Lingayen location map"
            ></iframe>
        </div>
    </section>


    {{-- ============================================================
         CTA BANNER
    ============================================================ --}}
    <section class="cta-banner" aria-label="Book your stay">
        <div class="cta-overlay"></div>
        <img
            src=asset('images/hotel-pool-aerial.jpg')alt=""
            class="cta-bg"
            aria-hidden="true"
        >
        <div class="container cta-content">
            <p class="eyebrow" style="color: var(--gold-light);">Radiant Hotel Pangasinan</p>
            <h2 class="display-lg" style="color: var(--white); margin-block: 1rem 1.5rem;">
                Experience the Best of<br><em>Pangasinan</em>
            </h2>
            <p class="body-lg" style="color: rgba(255,255,255,0.72); max-width: 520px; margin-bottom: 2.5rem;">
                Book directly and enjoy exclusive rates. We look forward to welcoming you.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/reservations" class="btn btn-gold"><span>Reserve Now</span></a>
                <a href="/accommodations" class="btn btn-ghost">View Rooms</a>
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

        /* ---- CONTACT GRID ---- */
        .contact-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 5rem;
            align-items: start;
        }

        /* ---- FORM ---- */
        .contact-form-wrap {
            background: var(--white);
            padding: 3rem;
        }
        .contact-form-header { margin-bottom: 2.25rem; }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }
        .form-label {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-dark);
        }
        .form-required { color: var(--gold); }
        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
            font-family: var(--font-body);
            font-size: 0.9rem;
            color: var(--text-dark);
            background: var(--cream);
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 0;
            outline: none;
            transition: border-color 0.25s ease, background 0.25s ease;
        }
        .form-control:focus {
            border-color: var(--gold);
            background: var(--white);
        }
        .form-control::placeholder { color: var(--text-light); }
        .form-textarea {
            min-height: 140px;
            resize: vertical;
        }
        .form-policy {
            font-size: 0.78rem;
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.65;
        }
        .form-policy a { color: var(--gold); }
        .form-policy a:hover { color: var(--navy); }

        /* ---- INFO SIDE ---- */
        .contact-info-wrap { padding-top: 0.25rem; }

        .contact-details {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0;
            border-top: 1px solid rgba(0,0,0,0.08);
        }
        .contact-detail-item {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 1rem;
            padding: 1.4rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.08);
            align-items: start;
        }
        .contact-detail-label {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            padding-top: 0.1rem;
        }
        .contact-detail-body {
            font-size: 0.9rem;
            color: var(--text-mid);
            line-height: 1.75;
        }
        .contact-detail-body a {
            color: var(--text-mid);
            transition: color 0.25s ease;
        }
        .contact-detail-body a:hover { color: var(--gold); }

        /* ---- CTA BOX inside info ---- */
        .contact-cta-box {
            margin-top: 2.5rem;
            background: var(--navy);
            padding: 2.25rem;
        }
        .contact-cta-box h3 em { color: var(--gold-light); font-style: italic; }

        /* ---- MAP ---- */
        .contact-map-section { background: var(--white); padding-top: clamp(4rem, 10vw, 8rem); }
        .contact-map-embed { line-height: 0; }
        .contact-map-embed iframe { filter: grayscale(15%); }

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
        .cta-content {
            position: relative;
            z-index: 2;
        }
        .cta-content h2 em { color: var(--gold-light); font-style: italic; }

        /* ---- RESPONSIVE ---- */
        @media (max-width: 1024px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }
        @media (max-width: 640px) {
            .form-row { grid-template-columns: 1fr; }
            .contact-form-wrap { padding: 2rem 1.5rem; }
            .contact-detail-item { grid-template-columns: 1fr; gap: 0.35rem; }
            .contact-map-embed iframe { height: 300px; }
        }
    </style>
    </x-slot>

</x-layout>