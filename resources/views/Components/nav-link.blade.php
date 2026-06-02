@props([
    'href'   => '#',
    'active' => false,
])

<!--
    x-nav-link
    -----------
    A styled navigation anchor that reflects the active route.

    Usage:
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
            Home
        </x-nav-link>
-->

<li style="position: relative;">
    <a
        href="{{ $href }}"
        {{ $attributes }}
        class="nav-link {{ $active ? 'nav-link--active' : '' }}"
        @if($active) aria-current="page" @endif
    >
        {{ $slot }}
    </a>
</li>

<style>
    /* Scoped nav-link styles — safe to include once; duplicates collapse */
    .nav-link {
        display: block;
        padding: 0.5rem 1.1rem;
        font-family: var(--font-body, 'Outfit', sans-serif);
        font-size: 0.78rem;
        font-weight: 400;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.82);
        position: relative;
        transition: color 0.25s ease;
        white-space: nowrap;
    }

    /* Animated underline */
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 1.1rem;
        right: 1.1rem;
        height: 1px;
        background: var(--gold, #c8a96e);
        transform: scaleX(0);
        transform-origin: left center;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .nav-link:hover {
        color: var(--white, #ffffff);
    }
    .nav-link:hover::after {
        transform: scaleX(1);
    }

    /* Active state */
    .nav-link--active {
        color: var(--gold, #c8a96e) !important;
    }
    .nav-link--active::after {
        transform: scaleX(1) !important;
    }

    /* Mobile overrides */
    @media (max-width: 1024px) {
        .nav-link {
            padding: 0.9rem 0.5rem;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }
        .nav-link::after {
            display: none;
        }
    }
</style>
