<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $resolvedLogos = $logos ?? View::shared('logos') ?? collect();
        $siteLogo = $resolvedLogos->first();
        $siteTitle = $siteLogo?->nama ?: 'Pradana Nusa Energi';
        $faviconUrl = null;

        if (!empty($siteLogo->url_gambar)) {
            $faviconUrl = str_starts_with($siteLogo->url_gambar, 'http://') || str_starts_with($siteLogo->url_gambar, 'https://')
                ? $siteLogo->url_gambar
                : asset('storage/' . ltrim($siteLogo->url_gambar, '/'));
        } elseif (!empty($siteLogo->logo_url)) {
            $faviconUrl = $siteLogo->logo_url;
        }
    @endphp

    <title>@yield('title', $siteTitle)</title>

    @if($faviconUrl)
        <link rel="icon" type="image/png" href="{{ $faviconUrl }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @yield('content')

</body>
</html>