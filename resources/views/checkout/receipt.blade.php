<x-layout title="Reservation Receipt – Radiant Hotel">
    <section class="section-gap" style="background: url('{{ asset('images/Superior-Rooms.jpg') }}') center/cover no-repeat; min-height: 100vh; display: flex; align-items: center; padding-top: 100px; padding-bottom: 50px; position: relative;" aria-label="Receipt">
        <div style="position: absolute; inset: 0; background: rgba(10, 25, 47, 0.85); backdrop-filter: blur(8px);"></div>
        
        <div class="container" style="position: relative; z-index: 1;">
            
            <div class="coupon-wrapper">
                <!-- Top / Header of Coupon -->
                <div class="coupon-header">
                    <div class="hotel-logo">
                        <span style="font-family: var(--font-heading); font-size: 1.5rem; letter-spacing: 2px;">RADIANT</span>
                    </div>
                    <h1 class="display-sm" style="color: var(--navy); margin-bottom: 0.25rem;">Reservation Confirmed</h1>
                    <p class="body-sm" style="color: var(--text-light);">Thank you for choosing us, <strong style="background: rgba(0,0,0,0.05); padding: 2px 6px; border-radius: 4px; color: var(--navy);">{{ $reservation->user->name }}</strong>!</p>
                </div>

                <!-- Official Seal Watermark -->
                <div class="official-seal">
                    <div class="seal-inner">
                        <span>Approved</span>
                        <strong>RADIANT</strong>
                        <span>Hotel</span>
                    </div>
                </div>

                <!-- Middle / Details of Coupon -->
                <div class="coupon-body">
                    <div class="coupon-notice">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--gold); flex-shrink: 0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Please present this receipt along with a valid ID at the reception.</span>
                    </div>

                    <div class="coupon-grid">
                        <div class="c-col">
                            <span class="c-label">Guest Name</span>
                            <span class="c-value">{{ $reservation->user->name }}</span>
                        </div>
                        <div class="c-col">
                            <span class="c-label">Reservation #</span>
                            <span class="c-value" style="font-family: monospace; font-size: 1.1rem; letter-spacing: 1px;">{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <div class="c-col">
                            <span class="c-label">Check-In</span>
                            <span class="c-value">{{ \Carbon\Carbon::parse($reservation->check_in_date)->format('M d, Y') }}</span>
                        </div>
                        <div class="c-col">
                            <span class="c-label">Check-Out</span>
                            <span class="c-value">{{ \Carbon\Carbon::parse($reservation->check_out_date)->format('M d, Y') }}</span>
                        </div>

                        <div class="c-col">
                            <span class="c-label">Room Details</span>
                            <span class="c-value">{{ $reservation->room ? $reservation->room->name : 'Standard Room' }} &middot; {{ $reservation->total_nights }} {{ $reservation->total_nights == 1 ? 'Night' : 'Nights' }}</span>
                        </div>
                        <div class="c-col">
                            <span class="c-label">Payment Method</span>
                            <span class="c-value">
                                {{ $reservation->payment ? str_replace('_', ' ', Str::title($reservation->payment->payment_method)) : 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>



                <!-- Bottom / Total of Coupon -->
                <div class="coupon-footer">
                    <div class="c-total-label">Total Amount</div>
                    <div class="c-total-value">PHP {{ number_format($reservation->total_price, 2) }}</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="receipt-actions">
                <a href="{{ route('reservations') }}" class="btn btn-outline" style="border-color: rgba(255,255,255,0.3); color: white;">← Back to Reservations</a>
                <a href="{{ route('checkout.receipt.pdf', $reservation->id) }}" class="btn btn-gold" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.5rem;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    Download as PDF
                </a>
            </div>

        </div>
    </section>

    <x-slot name="styles">
        <style>
            .coupon-wrapper {
                max-width: 500px;
                margin: 0 auto;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 20px 50px rgba(0,0,0,0.3);
                position: relative;
                overflow: hidden;
            }
            .coupon-header {
                text-align: center;
                padding: 2.5rem 2rem 1.5rem;
                background: linear-gradient(to bottom, #fcfaf5, #fff);
                border-bottom: 1px solid rgba(0,0,0,0.05);
                position: relative;
                z-index: 2;
            }
            .hotel-logo {
                display: inline-block;
                color: var(--gold);
                margin-bottom: 1rem;
                border: 2px solid var(--gold);
                padding: 0.5rem 1rem;
                border-radius: 4px;
            }
            .coupon-body {
                padding: 2rem;
                position: relative;
                z-index: 2;
            }
            .official-seal {
                position: absolute;
                bottom: 60px;
                right: 30px;
                width: 130px;
                height: 130px;
                border: 4px double var(--gold);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transform: rotate(-15deg);
                opacity: 0.15;
                pointer-events: none;
                z-index: 1;
            }
            .seal-inner {
                text-align: center;
                color: var(--gold);
                font-family: var(--font-heading, serif);
                text-transform: uppercase;
            }
            .seal-inner span {
                font-size: 0.65rem;
                display: block;
                letter-spacing: 2px;
            }
            .seal-inner strong {
                font-size: 1.4rem;
                display: block;
                border-top: 1px solid var(--gold);
                border-bottom: 1px solid var(--gold);
                padding: 4px 0;
                margin: 4px 0;
            }
            .coupon-notice {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                background: rgba(212, 175, 55, 0.08);
                border: 1px solid rgba(212, 175, 55, 0.3);
                padding: 1rem;
                border-radius: 6px;
                margin-bottom: 2rem;
                font-size: 0.9rem;
                color: var(--navy);
            }
            .coupon-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }
            .c-col {
                display: flex;
                flex-direction: column;
                gap: 0.3rem;
            }
            .c-label {
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: #888;
                font-weight: 600;
            }
            .c-value {
                font-size: 1.05rem;
                font-weight: 600;
                color: var(--navy);
                background-color: #f5f5f5;
                padding: 4px 8px;
                border-radius: 4px;
                border: 1px solid rgba(0,0,0,0.05);
                display: inline-block;
            }
            


            .coupon-footer {
                padding: 1.5rem 2rem 2.5rem;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                background: #fafafa;
                border-top: 1px solid rgba(0,0,0,0.05);
            }
            .c-total-label {
                font-size: 1rem;
                color: var(--text-light);
                font-weight: 500;
            }
            .c-total-value {
                font-family: var(--font-heading);
                font-size: 2rem;
                font-weight: 700;
                color: var(--gold);
                line-height: 1;
            }

            .receipt-actions {
                max-width: 420px;
                margin: 2rem auto 0;
                display: flex;
                justify-content: center;
                gap: 1rem;
            }
            
            @media (max-width: 640px) {
                .coupon-grid {
                    grid-template-columns: 1fr;
                    gap: 1.25rem;
                }
                .receipt-actions {
                    flex-direction: column;
                }
                .receipt-actions .btn {
                    width: 100%;
                    text-align: center;
                    justify-content: center;
                }
            }
        </style>
    </x-slot>
</x-layout>
