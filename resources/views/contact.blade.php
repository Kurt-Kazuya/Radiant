<x-layout title="Contact Us – Radiant Hotel Pangasinan">

    {{-- ============================================================
         PAGE HERO BANNER
    ============================================================ --}}
    <section class="page-hero" aria-label="Contact hero">
        <div class="page-hero-bg">
            <img
                src="{{ asset('images/Contact-us.png') }}" alt="Contact Radiant Hotel"
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
                <div class="contact-form-wrap" id="contact-form-wrap">
                    <div class="contact-form-header">
                        <div class="section-label">
                            <span class="eyebrow">Send a Message</span>
                        </div>
                        <h2 class="display-md">Leave Us a <em>Message</em></h2>
                        <span class="gold-line"></span>
                    </div>

                    @if(session('success'))
                        <div id="contact-success-block" style="padding: 2.5rem; background: var(--white); border: 1px solid var(--gold); text-align: center; margin-bottom: 2rem; transition: opacity 0.5s ease;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="1.5" style="margin-bottom: 1rem;">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <h3 class="display-md" style="color: var(--text-dark); margin-bottom: 0.75rem;">Message Sent!</h3>
                            <p class="body-lg" style="color: var(--text-mid); margin-bottom: 2rem;">{{ session('success') }}</p>
                            
                            @if(session('sent_data'))
                                @php $data = session('sent_data'); @endphp
                                <div style="text-align: left; background: var(--cream); padding: 1.5rem; border: 1px solid rgba(0,0,0,0.05); font-size: 0.9rem; margin-bottom: 2rem; max-height: 50vh; overflow-y: auto; overflow-x: hidden; word-wrap: break-word; word-break: break-word;">
                                    <div style="margin-bottom: 0.5rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Name:</strong> {{ $data['name'] }}</div>
                                    <div style="margin-bottom: 0.5rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Email:</strong> {{ $data['email'] }}</div>
                                    @if(!empty($data['company']))
                                        <div style="margin-bottom: 0.5rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Company:</strong> {{ $data['company'] }}</div>
                                    @endif
                                    @if(!empty($data['phone']))
                                        <div style="margin-bottom: 0.5rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Phone:</strong> {{ $data['phone'] }}</div>
                                    @endif
                                    @if(!empty($data['subject']))
                                        <div style="margin-bottom: 0.5rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Subject:</strong> {{ $data['subject'] }}</div>
                                    @endif
                                    <div style="margin-top: 1rem;"><strong style="color:var(--text-dark); letter-spacing:0.05em;">Message:</strong><br><span style="white-space: pre-line; color: var(--text-mid); display:block; margin-top:0.5rem;">{{ $data['message'] }}</span></div>
                                </div>
                            @endif
                            
                            <div style="margin-top: 1rem;">
                                <a href="/contact" class="btn btn-gold">Send Another Message</a>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const formWrap = document.getElementById('contact-form-wrap');
                                if (formWrap) {
                                    formWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            });
                        </script>
                    @endif

                    <form id="contact-form-element" class="contact-form" method="POST" action="/contact" novalidate style="{{ session('success') ? 'display: none;' : 'display: block;' }}">
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
            src="{{ asset('images/Footer-Image-1.png') }}" alt=""
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
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/shared/cta-banner.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/pages/contact.css') }}">
    </x-slot>

</x-layout>