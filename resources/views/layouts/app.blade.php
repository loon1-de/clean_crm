<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- Sidebar -->
        <div class="w-60 bg-gray-900 text-white min-h-screen p-5">

            <h2 class="text-2xl font-bold mb-8">
                Clean CRM
            </h2>

            @php
            $route = Route::currentRouteName();
            @endphp

            <nav class="space-y-2 text-sm">

                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 rounded 
            {{ $route == 'dashboard' ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    📊 Dashboard
                </a>

                <a href="{{ route('contacts.index') }}"
                    class="block px-3 py-2 rounded 
            {{ str_contains($route, 'contacts') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    👤 Contacts
                </a>

                <a href="{{ route('deals.index') }}"
                    class="block px-3 py-2 rounded 
            {{ str_contains($route, 'deals') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    💰 Deals
                </a>

            </nav>

        </div>

        <!-- Content -->
        <div class="flex-1">

            <!-- Top bar -->
            <div class="bg-white shadow px-6 py-3 flex justify-between items-center">

                <div class="font-semibold">
                    {{ ucfirst(str_replace('.', ' ', Route::currentRouteName())) }}
                </div>

                <div class="flex items-center gap-4">

                    <span class="text-sm text-gray-600">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500 text-sm">
                            Logout
                        </button>
                    </form>

                </div>

            </div>
            @if(session('success'))
            <div class="p-4">
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded shadow">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>

    </div>

</body>


</html>