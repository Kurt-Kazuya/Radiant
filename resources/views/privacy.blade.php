<x-layout title="Privacy Policy - Radiant Hotel Pangasinan">
    <!-- PAGE HERO BANNER -->
    <section class="page-hero page-hero--legal" aria-label="Privacy Policy Hero">
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
                <em>Privacy Policy</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>Privacy Policy</span>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="section-gap" style="background: var(--cream);" aria-label="Privacy Policy Content">
        <div class="container" style="max-width: 800px; line-height: 1.8; color: var(--text-dark);">
            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Introduction</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                Welcome to Radiant Hotel Pangasinan. We value your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and share information when you use our services.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Information We Collect</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                We may collect personal details such as your name, email address, phone number, and payment details when you make a reservation. We also collect non-personal data like browser type and IP address.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">How We Use Your Information</h2>
            <ul class="body-sm" style="margin-bottom: 2rem; padding-left: 1.5rem;">
                <li>To process reservations and payments.</li>
                <li>To send booking confirmations and updates.</li>
                <li>To improve our services and website user experience.</li>
                <li>To comply with legal obligations.</li>
            </ul>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Sharing Your Information</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                We do not sell your personal data. We only share it with trusted third-party service providers (like payment gateways) necessary to complete your booking.
            </p>

            <h2 style="font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 1rem; color: var(--navy);">Your Rights</h2>
            <p class="body-sm" style="margin-bottom: 2rem;">
                You have the right to access, correct, or delete your personal data. If you have any concerns regarding your privacy, please contact us at privacy@radianthotel.com.
            </p>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1);">
                <a href="{{ route('reservations') }}" class="btn btn-gold">Back to Reservations</a>
            </div>
        </div>
    </section>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
    </x-slot>
</x-layout>
