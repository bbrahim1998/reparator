<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="description" content="REPARATOR - Nunca nada es demasiado viejo. Somos la alternativa al 'usar y tirar'. Reparaciones asequibles con tecnología humana.">
    <title>REPARATOR | @yield('title', 'Inicio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @yield('styles')
</head>
<body>
    <div class="relative w-full {{ ($frameClass ?? 'default') === 'home' ? 'h-screen overflow-hidden flex flex-col' : 'min-h-screen' }} bg-[var(--color-fondo)]">
        @include('layouts.header')

        <main class="relative w-full text-center {{ ($frameClass ?? 'default') === 'home' ? 'flex-1 flex flex-col justify-between overflow-hidden' : 'max-w-6xl mx-auto px-5 sm:px-[5%] py-16' }}">
            @yield('content')
        </main>

        @if(!($hideFooter ?? false))
        @include('layouts.footer')
        @endif
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
