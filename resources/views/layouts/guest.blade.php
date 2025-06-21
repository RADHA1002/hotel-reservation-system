<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Milky Hotel')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    @yield('content')
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
