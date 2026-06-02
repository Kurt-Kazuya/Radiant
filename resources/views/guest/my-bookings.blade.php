<x-layout title="My Bookings – Radiant Hotel Pangasinan">

    {{-- Page Hero --}}
    <section class="page-hero page-hero--account" aria-label="My bookings hero">
        <div class="page-hero-bg">
            <img src="{{ asset('images/Superior-Rooms.jpg') }}" alt="My Reservations"
                 class="page-hero-img" fetchpriority="high">
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container page-hero-content">
            <p class="eyebrow animate-fade-up">Radiant Hotel</p>
            <h1 class="display-xl page-hero-title animate-fade-up delay-1">
                <em>My Bookings</em>
            </h1>
            <div class="breadcrumb animate-fade-up delay-2">
                <a href="/">Home</a>
                <span>/</span>
                <span>My Bookings</span>
            </div>
        </div>
    </section>


    {{-- Content --}}
    <section class="section-gap" style="background: var(--cream);">
        <div class="container" style="max-width: 900px;">

            <div style="margin-bottom: 2.5rem;">
                <div class="section-label">
                    <span class="eyebrow">Your Reservations</span>
                </div>
                <h2 class="display-md">Booking <em>History</em></h2>
                <span class="gold-line"></span>
                <p class="body-sm" style="margin-top: 0.25rem;">
                    Hello, <strong>{{ Auth::user()->name }}</strong>. Here are all your reservations at Radiant Hotel.
                </p>
            </div>

            {{-- Flash message --}}
            @if(session('success'))
                <div style="
                    background: #d3f9d8;
                    color: #1a6b2d;
                    border-left: 3px solid #2f9e44;
                    padding: 1rem 1.25rem;
                    margin-bottom: 2rem;
                    font-size: 0.9rem;
                    display: flex;
                    align-items: center;
                    gap: 0.75rem;
                ">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @forelse($reservations as $res)
                <div class="booking-card">
                    <div class="booking-card-header">
                        <div>
                            <div class="eyebrow" style="font-size:0.6rem; margin-bottom:0.3rem;">
                                Reservation #{{ $res->id }}
                            </div>
                            <div class="booking-room-name">
                                {{ $res->room->type ?? 'Room' }} — Room {{ $res->room->room_number ?? 'N/A' }}
                            </div>
                        </div>
                        <span class="booking-status booking-status--{{ strtolower($res->status) }}">
                            {{ ucfirst($res->status) }}
                        </span>
                    </div>

                    <div class="booking-card-body">
                        <div class="booking-detail">
                            <span class="booking-detail-label">Check-In</span>
                            <span class="booking-detail-value">
                                {{ \Carbon\Carbon::parse($res->check_in_date)->format('D, d M Y') }}
                            </span>
                        </div>
                        <div class="booking-detail">
                            <span class="booking-detail-label">Check-Out</span>
                            <span class="booking-detail-value">
                                {{ \Carbon\Carbon::parse($res->check_out_date)->format('D, d M Y') }}
                            </span>
                        </div>
                        <div class="booking-detail">
                            <span class="booking-detail-label">Nights</span>
                            <span class="booking-detail-value">{{ $res->total_nights }}</span>
                        </div>
                        <div class="booking-detail">
                            <span class="booking-detail-label">Total</span>
                            <span class="booking-detail-value" style="font-weight:600; color:var(--navy);">
                                ₱{{ number_format($res->total_price, 2) }}
                            </span>
                        </div>
                        <div class="booking-detail">
                            <span class="booking-detail-label">Booked On</span>
                            <span class="booking-detail-value">
                                {{ $res->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    @if($res->status === 'pending')
                        <div class="booking-card-note">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            Your reservation is <strong>pending confirmation</strong>. Our team will review and confirm within 24 hours.
                        </div>
                    @elseif($res->status === 'confirmed')
                        <div class="booking-card-note booking-card-note--confirmed">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Your reservation has been <strong>confirmed</strong>. We look forward to welcoming you!
                        </div>
                    @elseif($res->status === 'cancelled')
                        <div class="booking-card-note booking-card-note--cancelled">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                                <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                            </svg>
                            This reservation has been <strong>cancelled</strong>. Please contact us if you have questions.
                        </div>
                    @endif
                </div>
            @empty
                <div style="text-align:center; padding: 5rem 1rem;">
                    <p class="display-md" style="color: var(--text-light); margin-bottom: 1.5rem;">No reservations yet</p>
                    <p class="body-sm" style="margin-bottom: 2rem;">You haven't made any reservations at Radiant Hotel yet.</p>
                    <a href="{{ route('reservations') }}" class="btn btn-gold"><span>Book Your Stay</span></a>
                </div>
            @endforelse

            @if($reservations->isNotEmpty())
                <div style="margin-top: 2.5rem; text-align: center;">
                    <a href="{{ route('reservations') }}" class="btn btn-gold"><span>Make Another Booking</span></a>
                </div>
            @endif

        </div>
    </section>


    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/site/shared/page-hero.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/pages/my-bookings.css') }}">
    </x-slot>

</x-layout>
