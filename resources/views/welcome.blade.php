<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="text-lg font-semibold text-gray-800">
                <a href="{{ url('/') }}">Abraham's Cuisine</a>
            </div>

            @if (Route::has('login'))
                <nav class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-500 font-medium">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500 font-medium">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500 font-medium">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
    <a href="/reservations"
        style="display: inline-block; margin-top: 1.5rem; padding: 0.75rem 1.5rem; background-color: #3B82F6; color: white; font-weight: 600; font-size: 1.125rem; border-radius: 0.375rem; text-align: center; text-decoration: none; transition: background-color 0.2s ease, transform 0.2s ease; float: right;"
        onmouseover="this.style.backgroundColor='#2563EB';" onmouseout="this.style.backgroundColor='#3B82F6';"
        onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px rgba(59, 130, 246, 0.5)';"
        onblur="this.style.boxShadow='none';">
        Reservation
    </a>
</body>

</html>
