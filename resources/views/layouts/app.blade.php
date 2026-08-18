<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        /*
        |--------------------------------------------------------------------------
        | Website Identity
        |--------------------------------------------------------------------------
        */
        $resolvedLogos = $logos ?? View::shared('logos') ?? collect();
        $siteLogo = $resolvedLogos->first();

        $siteTitle = $siteLogo?->nama ?: 'Pradana Nusa Energi';

        /*
        |--------------------------------------------------------------------------
        | Current Page SEO
        |--------------------------------------------------------------------------
        */
        $isHomepage = request()->is('/');

        /*
        | Homepage dibuat lebih fokus ke keyword brand:
        | SLO Pradana + nama perusahaan.
        */
        $pageTitle = trim($__env->yieldContent('title'));

        if (empty($pageTitle)) {
            $pageTitle = $isHomepage
                ? 'SLO Pradana | PRADANA NUSA ENERGI - Inspeksi & Sertifikasi Ketenagalistrikan'
                : $siteTitle;
        }

        /*
        |--------------------------------------------------------------------------
        | Meta Description
        |--------------------------------------------------------------------------
        */
        $pageDescription = trim($__env->yieldContent('meta_description'));

        if (empty($pageDescription)) {
            $pageDescription = $isHomepage
                ? 'SLO Pradana - PRADANA NUSA ENERGI menyediakan layanan inspeksi dan Sertifikasi Laik Operasi (SLO) ketenagalistrikan yang profesional, terpercaya, dan sesuai ketentuan yang berlaku.'
                : 'PRADANA NUSA ENERGI menyediakan informasi dan layanan inspeksi serta Sertifikasi Laik Operasi (SLO) ketenagalistrikan.';
        }

        /*
        |--------------------------------------------------------------------------
        | Canonical URL
        |--------------------------------------------------------------------------
        */
        $canonicalUrl = trim($__env->yieldContent('canonical'));

        if (empty($canonicalUrl)) {
            $canonicalUrl = url()->current();
        }

        /*
        |--------------------------------------------------------------------------
        | Open Graph Image
        |--------------------------------------------------------------------------
        */
        $faviconUrl = null;

        if (!empty(optional($siteLogo)->url_gambar)) {
            $faviconUrl = str_starts_with(optional($siteLogo)->url_gambar, 'http://')
                || str_starts_with(optional($siteLogo)->url_gambar, 'https://')
                ? optional($siteLogo)->url_gambar
                : asset('storage_public/' . ltrim(optional($siteLogo)->url_gambar, '/'));
        } elseif (!empty($siteLogo->logo_url)) {
            $faviconUrl = $siteLogo->logo_url;
        }

        /*
        | Gunakan logo sebagai fallback OG image.
        */
        $ogImage = $faviconUrl ?: asset('images/logo-pnusa.png');

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */
        $ogTitle = trim($__env->yieldContent('og_title'));

        if (empty($ogTitle)) {
            $ogTitle = $pageTitle;
        }

        $ogDescription = trim($__env->yieldContent('og_description'));

        if (empty($ogDescription)) {
            $ogDescription = $pageDescription;
        }

        /*
        |--------------------------------------------------------------------------
        | Robots
        |--------------------------------------------------------------------------
        */
        $robots = trim($__env->yieldContent('robots'));

        if (empty($robots)) {
            $robots = 'index, follow';
        }
    @endphp

    {{-- =========================================================
        BASIC SEO
    ========================================================== --}}

    <title>{{ $pageTitle }}</title>

    <meta name="description" content="{{ $pageDescription }}">

    <meta name="robots" content="{{ $robots }}">

    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- =========================================================
        WEBSITE / BRAND
    ========================================================== --}}

    <meta name="author" content="PRADANA NUSA ENERGI">

    <meta name="application-name" content="SLO Pradana">

    <meta name="theme-color" content="#ffffff">

    {{-- =========================================================
        OPEN GRAPH - Facebook / WhatsApp / LinkedIn
    ========================================================== --}}

    <meta property="og:type" content="website">

    <meta property="og:site_name" content="SLO Pradana - PRADANA NUSA ENERGI">

    <meta property="og:locale" content="id_ID">

    <meta property="og:title" content="{{ $ogTitle }}">

    <meta property="og:description" content="{{ $ogDescription }}">

    <meta property="og:url" content="{{ $canonicalUrl }}">

    <meta property="og:image" content="{{ $ogImage }}">

    <meta property="og:image:alt" content="SLO Pradana - PRADANA NUSA ENERGI">

    {{-- =========================================================
        TWITTER / X
    ========================================================== --}}

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="{{ $ogTitle }}">

    <meta name="twitter:description" content="{{ $ogDescription }}">

    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- =========================================================
        FAVICON
    ========================================================== --}}

    @if($faviconUrl)
        <link rel="icon" type="image/png" href="{{ $faviconUrl }}">
    @else
        <link rel="icon" href="{{ asset('images/logo-pnusa.png') }}">
    @endif

    {{-- =========================================================
        LIGHT MODE
    ========================================================== --}}

    <script>
        document.documentElement.classList.remove('dark');

        try {
            localStorage.setItem('theme', 'light');
        } catch (e) {}
    </script>

    {{-- =========================================================
        VITE ASSETS
    ========================================================== --}}

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- =========================================================
        AOS ANIMATION CSS
    ========================================================== --}}

    <link
        href="https://unpkg.com/aos@2.3.1/dist/aos.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        EXTRA HEAD CONTENT
        Bisa digunakan halaman tertentu.
    ========================================================== --}}

    @stack('head')

</head>

<body>

    @yield('content')

    {{-- =========================================================
        AOS ANIMATION JS
    ========================================================== --}}

    <script
        src="https://unpkg.com/aos@2.3.1/dist/aos.js"
    ></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50,
            });
        });
    </script>

    @stack('scripts')

</body>

</html>