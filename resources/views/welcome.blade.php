<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Hotel Booking</h1>
        <div>
            @auth
                <span class="mr-4">Hi, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-blue-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline mr-4">Login</a>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
            @endauth
        </div>
    </header>

    <main class="p-8">
        <div class="text-center">
            <h2 class="text-3xl font-semibold mb-4">Welcome to Hotel Booking</h2>
            <p class="text-lg">Book your ideal room now!</p>
        </div>
    </main>

</body>
</html>