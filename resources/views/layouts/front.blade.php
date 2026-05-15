<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ===== Core SEO Meta Tags ===== --}}
    <title>{{ $data['meta_title'] ?? 'Brahmani Industries - Precision Manufacturing Solutions' }}</title>
    <meta name="description" content="{{ $data['meta_description'] ?? 'Precision-engineered manufacturing solutions with over 12 years of excellence in quality and innovation.' }}">
    <meta name="keywords" content="{{ $data['meta_keywords'] ?? 'precision manufacturing, CNC machining, flanges, bushes, fasteners, industrial components, Ahmedabad Gujarat, ISO certified manufacturer, custom engineering' }}">
    <meta name="robots" content="{{ $data['meta_robots'] ?? 'index, follow' }}">
    <meta name="author" content="{{ config('settings.company.name', 'Brahmani Industries') }}">

    {{-- ===== Canonical URL ===== --}}
    <link rel="canonical" href="{{ $data['canonical_url'] ?? url()->current() }}">

    {{-- ===== Open Graph (Facebook / LinkedIn) ===== --}}
    <meta property="og:type" content="{{ $data['og_type'] ?? 'website' }}">
    <meta property="og:title" content="{{ $data['meta_title'] ?? 'Brahmani Industries - Precision Manufacturing Solutions' }}">
    <meta property="og:description" content="{{ $data['meta_description'] ?? 'Precision-engineered manufacturing solutions with over 12 years of excellence in quality and innovation.' }}">
    <meta property="og:url" content="{{ $data['canonical_url'] ?? url()->current() }}">
    <meta property="og:site_name" content="{{ config('settings.company.name', 'Brahmani Industries') }}">
    <meta property="og:image" content="{{ $data['og_image'] ?? asset('assets/img/hero-banner.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_IN">

    {{-- ===== Twitter / X Card ===== --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data['meta_title'] ?? 'Brahmani Industries - Precision Manufacturing Solutions' }}">
    <meta name="twitter:description" content="{{ $data['meta_description'] ?? 'Precision-engineered manufacturing solutions with over 12 years of excellence in quality and innovation.' }}">
    <meta name="twitter:image" content="{{ $data['og_image'] ?? asset('assets/img/hero-banner.png') }}">

    {{-- ===== Local / Geo SEO ===== --}}
    <meta name="geo.region" content="IN-GJ">
    <meta name="geo.placename" content="Ahmedabad, Gujarat, India">
    <meta name="geo.position" content="23.024349;72.667859">
    <meta name="ICBM" content="23.024349, 72.667859">

    {{-- ===== Performance: Preconnect ===== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://www.google.com">

    {{-- ===== Favicon ===== --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- ===== External CSS ===== --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- ===== Additional Page Styles ===== --}}
    @stack('styles')

    {{-- ===== Per-page meta overrides (OG image, og:type, etc.) ===== --}}
    @stack('head_meta')

    {{-- ===== Dynamic SEO Schema ===== --}}
    @stack('schema')
</head>
<body>
    <!-- Skip Navigation for Accessibility & SEO -->
    <a href="#main-content" class="skip-nav" style="position:absolute;top:-40px;left:0;background:#0891b2;color:#fff;padding:8px;z-index:9999;transition:top 0.3s;" onfocus="this.style.top='0'" onblur="this.style.top='-40px'">Skip to main content</a>

    <!-- Header -->
    @include('partials.front.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('partials.front.footer')

    <!-- Footer Scripts -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Additional Page Scripts -->
    @stack('scripts')
</body>
</html>
