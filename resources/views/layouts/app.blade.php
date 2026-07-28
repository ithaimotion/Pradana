<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pradana')</title>

    @if(isset($logos) && $logos->count() > 0 && $logos->first()->url_gambar)
        <link rel="icon" type="image/png" href="{{ asset('public/storage/' . $logos->first()->url_gambar) }}">
    @elseif(isset($logos) && $logos->count() > 0 && $logos->first()->logo_url)
        <link rel="icon" type="image/png" href="{{ $logos->first()->logo_url }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @yield('content')

</body>
</html>