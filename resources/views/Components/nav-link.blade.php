@props([
    'href'   => '#',
    'active' => false,
])

{{--
    x-nav-link
    -----------
    A styled navigation anchor that reflects the active route.

    Usage:
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
            Home
        </x-nav-link>
--}}

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