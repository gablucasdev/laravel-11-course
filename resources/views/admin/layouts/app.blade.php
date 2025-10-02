<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle') -Laravel 11 specialization</title>

     <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>HEADER</header>
    @yield('content')
    <footer>FOOTER</footer>
</body>
</html>