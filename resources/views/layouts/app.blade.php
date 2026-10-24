<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Counter POS, a simple customer and user accounts application.">
    <title>@yield('title', 'Home') | Counter POS</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('home') }}" aria-label="Counter POS home">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M17.5 6.5a7.8 7.8 0 1 0 0 11M8.5 12h10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>
                </span>
                <span>Counter<span class="brand-pos"> POS</span></span>
            </a>
            <p class="nav-label">WORKSPACE</p>
            <nav class="navigation" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3 10 9-7 9 7v10H3V10Z"/><path d="M9 20v-7h6v7"/></svg>
                    <span>Home</span>
                </a>
                <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'is-active' : '' }}" @if(request()->routeIs('customers.*')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M16 5a3 3 0 0 1 0 6m2 4a5 5 0 0 1 3 5"/></svg>
                    <span>Customer Accounts</span>
                </a>
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'is-active' : '' }}" @if(request()->routeIs('users.*')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16a3 3 0 0 1 6 0m3-6h3m-3 4h3"/></svg>
                    <span>User Accounts</span>
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v6m0-10v.1"/></svg>
                    <span>About</span>
                </a>
            </nav>
            <div class="sidebar-note">
                <span class="small-dot" aria-hidden="true"></span>
                <div><strong>Keep the essentials close.</strong><p>A simple place for your accounts.</p></div>
            </div>
        </aside>

        <div class="main-shell">
            <header class="topbar">
                <div><span class="breadcrumb-brand">Counter POS</span><span class="breadcrumb-divider" aria-hidden="true">/</span><span>@yield('title', 'Home')</span></div>
                <span class="workspace-label"><span class="small-dot" aria-hidden="true"></span>Accounts workspace</span>
            </header>
            <main id="main-content" class="main-content" tabindex="-1">
                @yield('content')
            </main>
            <footer class="footer"><span>Counter POS</span><span>IT0049 &middot; Technical Formative Assessment 5</span></footer>
        </div>
    </div>
</body>
</html>
