<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pradana')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @yield('content')

</body>
</html>