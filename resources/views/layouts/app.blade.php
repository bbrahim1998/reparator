<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="REPARATOR - Nunca nada es demasiado viejo. Somos la alternativa al 'usar y tirar'. Reparaciones asequibles con tecnología humana.">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[var(--color-fondo)]">
        <div class="relative w-full min-h-screen">
            @include('layouts.header')

            <!-- Page Content -->
            <main class="relative w-full text-center max-w-6xl mx-auto px-5 sm:px-[5%] py-16">
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>

        <script src="{{ asset('js/main.js') }}" defer></script>
        <script src="{{ asset('js/autenticacion.js') }}" defer></script>

        <!-- Modales de autenticación -->
        @guest
            @include('auth.login')
            @include('auth.register')
        @endguest

        <script>
            @if($errors->any())
                window.hasValidationErrors = true;
            @endif
        </script>
    </body>
</html>
