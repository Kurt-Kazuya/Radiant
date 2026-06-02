<x-layout title="Terms of Use - Radiant Hotel Pangasinan">
    <!-- PAGE HERO BANNER -->
    <section class="page-hero" aria-label="Terms of Use Hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Front-Image-Home.jpg') }}" alt="Radiant Hotel"
                class="page-hero-img"
                fetchpriority="high"
            >
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Legal</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>Terms of Use</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Terms of Use</span>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="section-gap" style="background: var(--cream);" aria-label="Terms Content">
        <div class="container" style="max-width: 800px; line-height: 1.8; color: var(--text-dark);">
            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Acceptance of Terms</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                By accessing and using the Radiant Hotel Pangasinan website and making a reservation, you agree to comply with and be bound by the following Terms of Use.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Reservations and Payment</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                All reservations are subject to availability. By providing your payment information, you authorize us to charge the applicable fees. Any extra charges incurred during your stay must be settled at check-out.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Cancellation Policy</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                Free cancellation is available up to 24 hours prior to the standard check-in time. Cancellations made within 24 hours of arrival or no-shows will be charged for the first night's stay.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Hotel Rules and Conduct</h2>
            <ul class="body-sm" style="margin-bottom: 2rem; padding-left: 1.5rem;">
                <li>Standard Check-In time is 2:00 PM, and Check-Out is 12:00 PM.</li>
                <li>Smoking is prohibited in all indoor areas, including guest rooms.</li>
                <li>Guests are responsible for any damages caused to hotel property during their stay.</li>
                <li>Pets are generally not allowed unless otherwise specified.</li>
            </ul>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Limitation of Liability</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                Radiant Hotel is not responsible for loss or damage to your personal property. We recommend using the in-room safe for valuables.
            </p>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1);">
                <a href="/reservations" class="btn btn-gold">Back to Reservations</a>
            </div>
        </div>
    </section>

    <x-slot name="styles">
    <style>
        .page-hero {
            position: relative;
            height: 40vh;
            min-height: 350px;
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
    </style>
    </x-slot>
</x-layout>
