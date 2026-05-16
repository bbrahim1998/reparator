@php
$currentPage = $currentPage ?? 'home';
$headerBg = $currentPage === 'home' ? 'fondo' : 'secundario';
@endphp

<!-- Header -->
<header class="relative flex h-20 w-full items-center justify-between bg-[var(--color-{{$headerBg}})] px-5 sm:px-[5%]">
    <!-- Logo -->
    <a href="/" class="flex items-center gap-4">
        <div class="flex size-[51px] items-center justify-center rounded-full bg-[var(--color-acento)] transition-all duration-300 hover:scale-105 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
            <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="51" height="51" rx="25.5" fill="url(#grad)" />
                <defs>
                    <radialGradient id="grad" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#f1ff5e"/>
                        <stop offset="100%" stop-color="#3a9aff"/>
                    </radialGradient>
                </defs>
            </svg>
        </div>
        <span class="font-titulos text-[clamp(22px,4vw,37px)] font-black tracking-wide text-[var(--color-acento)] transition-all duration-300 hover:text-shadow-[0_0_8px_rgba(241,255,94,0.6)]">REPARATOR</span>
    </a>

    <!-- Navegación desktop -->
    <nav class="hidden items-center gap-6 lg:flex">
        <a href="/" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'home' ? 'active text-[var(--color-acento)]' : '' }}">Home</a>
        <a href="/presentacion" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'presentacion' ? 'active text-[var(--color-acento)]' : '' }}">Presentación</a>
        <a href="/servicios" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'servicios' ? 'active text-[var(--color-acento)]' : '' }}">Servicios</a>
        <a href="/rrss" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'rrss' ? 'active text-[var(--color-acento)]' : '' }}">RRSS</a>
        <a href="/consultasyreclamaciones" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'consultasyreclamaciones' ? 'active text-[var(--color-acento)]' : '' }}">Consultas y reclamaciones</a>
        <a href="/onsom" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'onsom' ? 'active text-[var(--color-acento)]' : '' }}">On som</a>
        <a href="/faqs" class="nav-link-desktop font-titulos text-sm text-[var(--color-texto)] transition-colors duration-300 hover:text-[var(--color-acento)] hover:-translate-y-0.5 {{ $currentPage === 'faqs' ? 'active text-[var(--color-acento)]' : '' }}">FAQs</a>
    </nav>

    <!-- Iconos y menú hamburguesa -->
    <div class="flex items-center gap-2.5">
        <div class="flex items-center gap-4">
            @auth
                <!-- User Dropdown Menu -->
                <div class="relative hidden lg:block">
                    <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 transition-all duration-300 hover:scale-105 hover:bg-[var(--color-acento)]/20 hover:shadow-[0_0_12px_rgba(241,255,94,0.4)] lg:size-auto" id="userDropdownBtn" onclick="toggleUserDropdown()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--color-acento)]">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M5 20v-2a7 7 0 0 1 14 0v2"/>
                        </svg>
                        <span class="font-titulos text-sm text-[var(--color-acento)] font-semibold hidden sm:inline">{{ Auth::user()->name }}</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-[var(--color-secundario)] border border-[var(--color-acento)]/30 rounded-lg shadow-lg hidden z-50" id="userDropdownMenu">
                        <div class="px-4 py-3 border-b border-[var(--color-acento)]/30">
                            <p class="font-titulos text-sm text-[var(--color-acento)] font-semibold">{{ Auth::user()->name }}</p>
                            <p class="font-parrafos text-xs text-[var(--color-texto)]/70">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('mi-cuenta') }}" class="block px-4 py-2 text-sm text-[var(--color-texto)] hover:bg-[var(--color-acento)]/10 hover:text-[var(--color-acento)] transition-colors font-parrafos">Mi Cuenta</a>
                        <a href="{{ route('mis-pedidos') }}" class="block px-4 py-2 text-sm text-[var(--color-texto)] hover:bg-[var(--color-acento)]/10 hover:text-[var(--color-acento)] transition-colors font-parrafos">Mis Pedidos</a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-[var(--color-texto)] hover:bg-red-500/10 hover:text-red-500 transition-colors font-parrafos">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login Button (solo desktop) -->
                <button class="hidden lg:flex size-[55px] items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/20 hover:shadow-[0_0_12px_rgba(241,255,94,0.4)] lg:size-[45px]" id="userIcon" onclick="openLoginModal()">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--color-acento)]">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M5 20v-2a7 7 0 0 1 14 0v2"/>
                </svg>
                </button>
            @endauth

            <!-- Favoritos icon (solo desktop) -->
            <a href="{{ route('favoritos') }}" class="hidden lg:flex relative size-[55px] items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:scale-110 hover:bg-red-500/20 hover:shadow-[0_0_12px_rgba(239,68,68,0.4)] lg:size-[45px]" id="favIcon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--color-acento)]">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
                <span id="favBadge" class="absolute -top-0.5 -right-0.5 hidden size-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white leading-none">0</span>
            </a>
            <button class="relative flex size-[55px] items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/20 hover:shadow-[0_0_12px_rgba(241,255,94,0.4)] lg:size-[45px]" id="cartIcon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--color-acento)]">
                <circle cx="9" cy="21" r="1.5"/>
                <circle cx="18" cy="21" r="1.5"/>
                <path d="M2 2h3l2 10h12l2-8H6"/>
            </svg>
            <span id="cartBadge" class="absolute -top-0.5 -right-0.5 hidden size-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white leading-none">0</span>
        </button>
    </div>
    <!-- Menú hamburguesa (móvil) -->
    <button class="z-[200] flex flex-col gap-1 lg:hidden" id="menuToggle">
        <span class="h-[3px] w-7 rounded-sm bg-[var(--color-acento)] transition-all duration-300"></span>
        <span class="h-[3px] w-7 rounded-sm bg-[var(--color-acento)] transition-all duration-300"></span>
        <span class="h-[3px] w-7 rounded-sm bg-[var(--color-acento)] transition-all duration-300"></span>
    </button>
</div>
</header>

<!-- Línea separadora -->
<div class="h-[7px] w-full bg-[var(--color-acento)]"></div>

<!-- Menú móvil -->
<div class="fixed right-[-100%] top-0 z-[150] h-screen w-[70%] max-w-[300px] flex-col gap-6 bg-[var(--color-{{$headerBg}})] px-8 pt-20 pb-8 shadow-[-5px_0_20px_rgba(0,0,0,0.3)] transition-all duration-300" id="navMobile">
    <a href="/" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'home' ? 'text-[var(--color-acento)]' : '' }}">Home</a>
    <a href="/presentacion" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'presentacion' ? 'text-[var(--color-acento)]' : '' }}">Presentación</a>
    <a href="/servicios" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'servicios' ? 'text-[var(--color-acento)]' : '' }}">Servicios</a>
    <a href="/rrss" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'rrss' ? 'text-[var(--color-acento)]' : '' }}">RRSS</a>
    <a href="/consultasyreclamaciones" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'consultasyreclamaciones' ? 'text-[var(--color-acento)]' : '' }}">Consultas y reclamaciones</a>
    <a href="/onsom" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'onsom' ? 'text-[var(--color-acento)]' : '' }}">On som</a>
    <a href="/faqs" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 border-b border-[var(--color-acento)]/30 pb-2.5 {{ $currentPage === 'faqs' ? 'text-[var(--color-acento)]' : '' }}">FAQs</a>
    <div class="mt-auto pt-4 border-t border-[var(--color-acento)]/30">
        <a href="{{ route('favoritos') }}" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 pb-2.5 block">❤ Favoritos</a>
        @auth
            <a href="{{ route('mi-cuenta') }}" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 pb-2.5 block">👤 Mi Cuenta</a>
            <a href="{{ route('mis-pedidos') }}" class="font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-2.5 pb-2.5 block">📦 Mis Pedidos</a>
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full text-left font-titulos text-[clamp(16px,4vw,20px)] text-red-400 transition-all duration-300 hover:text-red-300 hover:pl-2.5 pb-2.5">🚪 Cerrar Sesión</button>
            </form>
        @else
            <button onclick="openLoginModal()" class="w-full text-left font-titulos text-[clamp(16px,4vw,20px)] text-[var(--color-acento)] transition-all duration-300 hover:pl-2.5">🔐 Iniciar Sesión</button>
        @endauth
    </div>
</div>
<!-- Overlay -->
<div class="fixed inset-0 z-[140] hidden bg-black/70" id="overlay"></div>


