<style>
    .header {
        background-color: #ffffff !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
        border-bottom: 2px solid var(--secondary) !important;
    }
    .header .nav-link {
        color: var(--text-dark) !important;
        font-weight: 600;
    }
    .header .nav-link::after {
        background-color: var(--secondary) !important;
    }
    .header .nav-link:hover, 
    .header .nav-link.active {
        color: var(--secondary) !important;
    }
    .header .hamburger {
        background-color: var(--text-dark) !important;
    }

    /* Mobile Menu Sidebar Overrides */
    @media (max-width: 991px) {
        .header .nav-menu {
            background-color: #ffffff !important;
            border-left: 1px solid rgba(0,0,0,0.1) !important;
            box-shadow: -5px 0 15px rgba(0,0,0,0.05) !important;
        }
        .header .nav-menu.active {
            background-color: #ffffff !important;
        }
        .header .nav-menu .nav-link {
            color: var(--text-dark) !important;
            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
        }
        .header .nav-menu .nav-link:hover,
        .header .nav-menu .nav-link.active {
            color: var(--secondary) !important;
            background-color: rgba(8, 145, 178, 0.05) !important;
        }
    }

    /* Topbar Styles */
    .topbar {
        background-color: var(--secondary, #0891b2);
        color: #ffffff;
        font-size: 0.85rem;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .topbar .container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .topbar-contact {
        display: flex;
        gap: 20px;
        align-items: center;
    }
    .topbar-contact a, .topbar-contact span {
        color: #ffffff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: opacity 0.3s;
    }
    .topbar-contact a:hover {
        opacity: 0.8;
    }
    @media (max-width: 768px) {
        .topbar {
            display: none !important;
        }
    }
</style>

<header class="header">
    <div class="topbar">
        <div class="container">
            <div class="topbar-contact">
                @if(config('settings.contact.email'))
                <a href="mailto:{{ config('settings.contact.email') }}">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 6px;"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    {{ config('settings.contact.email') }}
                </a>
                @endif
                @if(config('settings.contact.phone'))
                <span>
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 6px;"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    @php $phones = explode(',', config('settings.contact.phone')); @endphp
                    @foreach($phones as $phone)
                        <a href="tel:{{ trim(str_replace(' ', '', $phone)) }}">{{ trim($phone) }}</a>@if(!$loop->last),&nbsp;@endif
                    @endforeach
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="{{ config('settings.company.name') }}" class="logo-image">
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav class="nav-menu" id="navMenu">
                <ul class="nav-list">
                    @foreach (config('settings.navigation.main_menu') as $menuItem)
                    <li class="nav-item">
                        <a href="{{ $menuItem['route'] ? route($menuItem['route']) : $menuItem['url'] }}" 
                           class="nav-link {{ in_array(Route::currentRouteName(), $menuItem['active_on']) ? 'active' : '' }}">
                            {{ $menuItem['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                <span class="hamburger"></span>
                <span class="hamburger"></span>
                <span class="hamburger"></span>
            </button>
        </div>
    </div>
</header>
