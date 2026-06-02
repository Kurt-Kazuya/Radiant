<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Radiant Hotel — @yield('title', 'Admin') </title>
    @yield('head')
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
</head>
<body>

<div class="admin-layout">

    {{-- 
         SIDEBAR
     --}}
    <aside class="admin-sidebar">

        {{-- Brand --}}
        <div class="sidebar-brand">
            <div class="sidebar-brand-mark">RH</div>
            <div class="sidebar-brand-text">
                Radiant Hotel
                <span class="sidebar-brand-sub">Admin Panel</span>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="sidebar-nav">
            <div class="sidebar-section-label">Main</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                </svg>
                Dashboard
            </a>

            <div class="sidebar-section-label">Bookings</div>

            <a href="{{ route('admin.reservations.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                </svg>
                Reservations
            </a>

            <a href="{{ route('admin.payments.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                Payments
            </a>

            <div class="sidebar-section-label">Inventory</div>

            <a href="{{ route('admin.rooms.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Rooms
            </a>

            <div class="sidebar-section-label">Reports</div>

            <a href="{{ route('admin.reports.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6"  y1="20" x2="6"  y2="14"/>
                </svg>
                Reports
            </a>

            <div class="sidebar-section-label">Site</div>

            <a href="{{ route('admin.contact-messages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                Contact Messages
            </a>

            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                View Hotel Site
            </a>
        </nav>

        {{-- Sidebar footer: logged-in user + logout --}}
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="sidebar-user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
            </div>
            <form class="sidebar-logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">⟵ Sign Out</button>
            </form>
        </div>
    </aside>

    {{-- 
         MAIN
     --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <div class="admin-topbar">
            <div class="topbar-title">@yield('topbar-title', 'Admin Panel')</div>
            <div class="topbar-actions">
                <a href="{{ route('home') }}" class="topbar-guest-link" target="_blank">
                    View Hotel Site ↗
                </a>
            </div>
        </div>

        {{-- Page content --}}
        <main class="admin-content">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
