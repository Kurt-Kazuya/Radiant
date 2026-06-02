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

    <style>
        /* ── Variables ── */
        :root {
            --navy:       #0d1b2a;
            --navy-mid:   #1a2d42;
            --navy-light: #243b55;
            --gold:       #c8a96e;
            --gold-light: #dfc18e;
            --gold-pale:  #f5ecd8;
            --cream:      #faf7f2;
            --white:      #ffffff;
            --text-dark:  #1a1a2e;
            --text-mid:   #4a5568;
            --text-light: #718096;
            --sidebar-w:  260px;
            --topbar-h:   64px;
            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body:    'Outfit', sans-serif;
        }

        /* ── Reset ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 16px; }
        body { font-family: var(--font-body); background: #f0f2f5; color: var(--text-dark); }
        a { color: inherit; text-decoration: none; }
        button { cursor: pointer; border: none; background: none; font-family: inherit; }
        img { max-width: 100%; display: block; }

        /* ── Layout ── */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* ── Sidebar ── */
        .admin-sidebar {
            width: var(--sidebar-w);
            background: var(--navy);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-brand-mark {
            width: 44px; height: 44px;
            background: var(--gold);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-family: var(--font-display);
            font-size: 1.3rem;
            color: var(--navy);
        }
        .sidebar-brand-text {
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 400;
            color: var(--white);
            line-height: 1.2;
        }
        .sidebar-brand-sub {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold-light);
            font-family: var(--font-body);
            display: block;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
            flex: 1;
        }
        .sidebar-section-label {
            font-size: 0.6rem;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            padding: 0 1.25rem;
            margin-bottom: 0.5rem;
            margin-top: 1.25rem;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
            font-weight: 400;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.06);
            color: var(--white);
        }
        .sidebar-link.active {
            background: rgba(200,169,110,0.12);
            border-left-color: var(--gold);
            color: var(--gold-light);
        }
        .sidebar-link svg { flex-shrink: 0; opacity: 0.7; }
        .sidebar-link.active svg { opacity: 1; }

        .sidebar-footer {
            padding: 1.25rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        .sidebar-avatar {
            width: 36px; height: 36px;
            background: var(--gold);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-size: 1rem;
            color: var(--navy);
            flex-shrink: 0;
        }
        .sidebar-user-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--white);
            line-height: 1.2;
        }
        .sidebar-user-role {
            font-size: 0.7rem;
            color: var(--gold);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .sidebar-logout-form button {
            width: 100%;
            text-align: left;
            padding: 0.6rem 0.75rem;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.45);
            border-radius: 4px;
            transition: all 0.2s ease;
            letter-spacing: 0.05em;
        }
        .sidebar-logout-form button:hover {
            background: rgba(255,255,255,0.06);
            color: var(--white);
        }

        /* ── Main area ── */
        .admin-main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ── Topbar ── */
        .admin-topbar {
            height: var(--topbar-h);
            background: var(--white);
            border-bottom: 1px solid rgba(0,0,0,0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        .topbar-title {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 400;
            color: var(--text-dark);
        }
        .topbar-title em { color: var(--gold); font-style: italic; }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .topbar-guest-link {
            font-size: 0.8rem;
            color: var(--text-light);
            letter-spacing: 0.05em;
            padding: 0.5rem 0.75rem;
            border: 1px solid rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }
        .topbar-guest-link:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        /* ── Content ── */
        .admin-content {
            padding: 2.5rem;
            flex: 1;
        }

        /* ── Page header ── */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
        }
        .page-header-left {}
        .eyebrow {
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
            margin-bottom: 0.4rem;
        }
        .page-header-title {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 400;
            color: var(--text-dark);
        }
        .page-header-title em { color: var(--gold); font-style: italic; }

        /* ── Stats grid ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            margin-bottom: 2.5rem;
        }
        .stat-card {
            background: var(--white);
            padding: 1.5rem 1.75rem;
            border-top: 3px solid rgba(0,0,0,0.07);
        }
        .stat-card--navy  { border-top-color: var(--navy); }
        .stat-card--green { border-top-color: #2f9e44; }
        .stat-card--gold  { border-top-color: var(--gold); }
        .stat-card--red   { border-top-color: #e03131; }
        .stat-label {
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }
        .stat-value {
            font-family: var(--font-display);
            font-size: 2.2rem;
            font-weight: 300;
            color: var(--text-dark);
            line-height: 1;
        }
        .stat-value.mono { font-family: var(--font-body); font-size: 1.5rem; font-weight: 500; }

        /* ── Card ── */
        .card { background: var(--white); overflow: hidden; }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0,0,0,0.07);
        }
        .card-title {
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 400;
            color: var(--text-dark);
        }
        .card-title em { color: var(--gold); font-style: italic; }
        .card-body { padding: 0; }

        /* ── Data table ── */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        .data-table thead { background: #f8f9fb; }
        .data-table th {
            padding: 0.875rem 1.25rem;
            text-align: left;
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--text-light);
            font-weight: 500;
            border-bottom: 1px solid rgba(0,0,0,0.07);
        }
        .data-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            color: var(--text-mid);
        }
        .data-table tbody tr:last-child td { border-bottom: none; }
        .data-table tbody tr:hover td { background: #fafbfc; }

        /* ── Badge ── */
        .badge {
            display: inline-block;
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-weight: 600;
        }
        .badge--pending   { background: transparent; color: #7d6608; }
        .badge--confirmed { background: transparent; color: #1a6b2d; }
        .badge--cancelled { background: transparent; color: #9b2335; }
        .badge--available { background: transparent; color: #1a6b2d; }
        .badge--occupied  { background: transparent; color: #7d6608; }
        .badge--maintenance { background: transparent; color: #495057; }
        .badge--paid      { background: transparent; color: #1a6b2d; }
        .badge--unpaid    { background: transparent; color: #9b2335; }
        .badge--refunded  { background: transparent; color: #495057; }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-family: var(--font-body);
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            transition: all 0.25s ease;
        }
        .btn-sm { padding: 0.45rem 0.85rem; font-size: 0.7rem; }
        .btn-gold { background: var(--gold); color: var(--navy); }
        .btn-gold:hover { background: #b8943e; }
        .btn-outline { border: 1px solid rgba(0,0,0,0.15); color: var(--text-mid); background: transparent; }
        .btn-outline:hover { border-color: var(--gold); color: var(--gold); background: transparent; }
        .btn-danger { background: transparent; border: 1px solid #e03131; color: #e03131; }
        .btn-danger:hover { background: #e03131; color: var(--white); }

        /* ── Table actions ── */
        .table-actions { display: flex; gap: 0.5rem; flex-wrap: wrap; align-items: center; }

        /* ── Alerts ── */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        .alert--success { background: #d3f9d8; color: #1a6b2d; border-left: 3px solid #2f9e44; }
        .alert--error   { background: #ffe3e3; color: #9b2335; border-left: 3px solid #e03131; }

        /* ── Pagination ── */
        .pagination-wrap {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.06);
        }

        /* ── Form styles ── */
        .form-card { background: var(--white); padding: 2rem; max-width: 680px; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; margin-bottom: 1.25rem; }
        .form-label {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-mid);
        }
        .form-input {
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0,0,0,0.15);
            font-family: var(--font-body);
            font-size: 0.9rem;
            color: var(--text-dark);
            background: var(--white);
            outline: none;
            transition: border-color 0.2s ease;
            border-radius: 0;
            width: 100%;
        }
        .form-input:focus { border-color: var(--gold); }
        .form-actions { display: flex; gap: 1rem; margin-top: 1.5rem; }
        .form-error { font-size: 0.75rem; color: #e03131; }

        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<div class="admin-layout">

    {{-- ══════════════════════════════════════════════
         SIDEBAR
    ══════════════════════════════════════════════ --}}
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

    {{-- ══════════════════════════════════════════════
         MAIN
    ══════════════════════════════════════════════ --}}
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
