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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/autenticacion.js') }}" defer></script>
    <script src="{{ asset('js/carrito.js') }}" defer></script>
    <script src="{{ asset('js/favoritos.js') }}" defer></script>
    @yield('scripts')

    <!-- Modales de autenticación -->
    @guest
        @include('auth.login')
        @include('auth.register')
    @endguest

    @yield('modal')

    <!-- Modal del carrito -->
    <div id="cartModal" class="fixed inset-0 z-[300] hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="cartOverlay"></div>
        <div class="relative w-full max-w-lg mx-4 bg-[var(--color-secundario)] rounded-2xl shadow-[0_0_30px_rgba(241,255,94,0.3)] border border-[var(--color-acento)]/30 overflow-hidden max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--color-acento)]/30 sticky top-0 bg-[var(--color-secundario)] z-10">
                <h2 class="font-titulos text-xl font-bold text-[var(--color-acento)]">Carrito</h2>
                <button type="button" id="closeCartModal" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:bg-[var(--color-acento)]/20 hover:scale-110">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="text-[var(--color-acento)]">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Contenido -->
            <div class="px-6 py-6" id="cartItemsContainer">
                <div id="cartEmpty" class="py-12 text-center">
                    <p class="font-parrafos text-base text-[var(--color-texto)]">Tu carrito está vacío.</p>
                    <p class="mt-1 font-parrafos text-sm text-[var(--color-texto)]/60">Explora nuestros servicios para añadir productos.</p>
                </div>
                <div id="cartItemsList" class="hidden"></div>
            </div>
            <!-- Footer -->
            <div id="cartFooter" class="hidden sticky bottom-0 bg-[var(--color-secundario)] border-t border-[var(--color-acento)]/30 px-6 py-4">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-titulos text-sm text-[var(--color-texto)]">Total</span>
                    <span id="cartTotal" class="font-titulos text-xl font-bold text-[var(--color-acento)]">0,00 €</span>
                </div>
                @auth
                    <a href="{{ route('checkout') }}" class="block w-full rounded-lg bg-[var(--color-acento)] py-3 font-titulos text-sm font-bold text-[var(--color-fondo)] text-center transition-all duration-300 hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
                        Finalizar compra
                    </a>
                @else
                    <button type="button" id="finalizarCompraGuest" class="w-full rounded-lg bg-[var(--color-acento)] py-3 font-titulos text-sm font-bold text-[var(--color-fondo)] transition-all duration-300 hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
                        Finalizar compra
                    </button>
                @endauth
            </div>
        </div>
    </div>

    <script>
        @if($errors->any())
            window.hasValidationErrors = true;
        @endif

        document.addEventListener('DOMContentLoaded', function () {
            var guestBtn = document.getElementById('finalizarCompraGuest');
            if (guestBtn) {
                guestBtn.addEventListener('click', function () {
                    alert('Debes registrarte o iniciar sesión para finalizar la compra.');
                    if (typeof openRegisterModal === 'function') {
                        openRegisterModal();
                    }
                });
            }
        });
    </script>
</body>
</html>
