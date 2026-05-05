@extends('layouts.master')

@section('title', 'Reparaciones profesionales')

@php($hideFooter = true)
@php($frameClass = 'home')

@section('styles')
<style>
.bg-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('/images/landing_page.png') center/cover no-repeat;
    opacity: 0.1;
    pointer-events: none;
    z-index: 0;
    animation: slowZoom 30s ease-in-out forwards;
    transform-origin: center center;
}

@keyframes slowZoom {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.15);
    }
}

.landing-hero {
    flex: 0 0 auto;
}

.carousel-section {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    min-height: 0;
}

.carousel-track {
    transition: transform 0.5s ease-in-out;
}

.carousel-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255,255,255,0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}
.carousel-dot.active {
    background: var(--color-acento);
    transform: scale(1.3);
}
.carousel-dot:hover {
    background: var(--color-acento);
}

@media (max-width: 768px) {
    .carousel-dot {
        width: 8px;
        height: 8px;
    }
}
</style>
@endsection

@section('content')
<div class="bg-image"></div>

<div class="relative z-10 flex flex-col h-full w-full p-5 gap-6 sm:gap-8">
    <!-- Hero - Top -->
    <div class="landing-hero text-center">
        <h1 class="animate-fade-in-up mb-4 sm:mb-6 font-titulos text-[clamp(32px,6vw,72px)] font-black leading-tight tracking-tight text-[var(--color-acento)] drop-shadow-lg">
            Nunca nada es demasiado viejo
        </h1>
        <button id="ctaBtn" class="rounded-full border-2 border-[var(--color-acento)] bg-transparent px-10 py-4 sm:px-14 sm:py-4 font-titulos text-[clamp(16px,2.5vw,24px)] font-black tracking-wide text-[var(--color-acento)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-acento)] hover:text-[var(--color-fondo)] hover:shadow-[0_0_20px_rgba(241,255,94,0.5)]">
            🔧 Solicita tu reparación
        </button>
    </div>

    <!-- Carousel - Bottom, fills remaining space -->
    <div class="carousel-section w-full mx-auto max-w-2xl">
        <h2 class="animate-fade-in-up mb-4 sm:mb-6 font-titulos text-[clamp(26px,4vw,44px)] font-bold tracking-tight text-[var(--color-texto)]" style="animation-delay: 0.2s;">
            Nuestros servicios
        </h2>

        <div class="relative overflow-hidden px-4 sm:px-8">
            <div class="carousel-track flex" id="carouselTrack">
                <div class="w-full flex-shrink-0">
                    <div class="cursor-pointer rounded-[24px] border-2 border-[var(--color-primario)] bg-[var(--color-secundario)]/60 p-8 sm:p-10 text-center backdrop-blur-sm transition-all duration-400 hover:border-[var(--color-acento)] hover:bg-[var(--color-secundario)]/90 hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                        <div class="mb-5 inline-block text-6xl sm:text-7xl transition-transform duration-300 hover:scale-110">📱</div>
                        <h3 class="mb-4 font-titulos text-xl sm:text-2xl font-black text-[var(--color-acento)]">Móviles</h3>
                        <p class="font-parrafos text-base sm:text-lg leading-relaxed text-[var(--color-texto)]">Reparación de pantallas, baterías y componentes internos. Calidad garantizada.</p>
                    </div>
                </div>
                <div class="w-full flex-shrink-0">
                    <div class="cursor-pointer rounded-[24px] border-2 border-[var(--color-primario)] bg-[var(--color-secundario)]/60 p-8 sm:p-10 text-center backdrop-blur-sm transition-all duration-400 hover:border-[var(--color-acento)] hover:bg-[var(--color-secundario)]/90 hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                        <div class="mb-5 inline-block text-6xl sm:text-7xl transition-transform duration-300 hover:scale-110">💻</div>
                        <h3 class="mb-4 font-titulos text-xl sm:text-2xl font-black text-[var(--color-acento)]">Ordenadores</h3>
                        <p class="font-parrafos text-base sm:text-lg leading-relaxed text-[var(--color-texto)]">Diagnóstico y reparación de portátiles y sobremesas. Hardware y software.</p>
                    </div>
                </div>
                <div class="w-full flex-shrink-0">
                    <div class="cursor-pointer rounded-[24px] border-2 border-[var(--color-primario)] bg-[var(--color-secundario)]/60 p-8 sm:p-10 text-center backdrop-blur-sm transition-all duration-400 hover:border-[var(--color-acento)] hover:bg-[var(--color-secundario)]/90 hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                        <div class="mb-5 inline-block text-6xl sm:text-7xl transition-transform duration-300 hover:scale-110">🎮</div>
                        <h3 class="mb-4 font-titulos text-xl sm:text-2xl font-black text-[var(--color-acento)]">Consolas</h3>
                        <p class="font-parrafos text-base sm:text-lg leading-relaxed text-[var(--color-texto)]">Reparación de PS5, Xbox, Nintendo Switch. Limpieza y mantenimiento.</p>
                    </div>
                </div>
                <div class="w-full flex-shrink-0">
                    <div class="cursor-pointer rounded-[24px] border-2 border-[var(--color-primario)] bg-[var(--color-secundario)]/60 p-8 sm:p-10 text-center backdrop-blur-sm transition-all duration-400 hover:border-[var(--color-acento)] hover:bg-[var(--color-secundario)]/90 hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                        <div class="mb-5 inline-block text-6xl sm:text-7xl transition-transform duration-300 hover:scale-110">🔧</div>
                        <h3 class="mb-4 font-titulos text-xl sm:text-2xl font-black text-[var(--color-acento)]">Electrodomésticos</h3>
                        <p class="font-parrafos text-base sm:text-lg leading-relaxed text-[var(--color-texto)]">Lavadoras, frigoríficos, microondas. Servicio técnico especializado.</p>
                    </div>
                </div>
            </div>

            <!-- Flechas -->
            <button id="prevBtn" class="absolute left-0 top-1/2 z-10 flex size-11 -translate-y-1/2 items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)] hover:text-[var(--color-fondo)] hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button id="nextBtn" class="absolute right-0 top-1/2 z-10 flex size-11 -translate-y-1/2 items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)] hover:text-[var(--color-fondo)] hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Dots -->
            <div class="mt-5 sm:mt-7 flex justify-center gap-3" id="carouselDots">
                <button class="carousel-dot active"></button>
                <button class="carousel-dot"></button>
                <button class="carousel-dot"></button>
                <button class="carousel-dot"></button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('ctaBtn').addEventListener('click', () => {
    alert('📞 ¡Gracias por tu interés! Pronto nos pondremos en contacto contigo.');
});

// Carousel
const track = document.getElementById('carouselTrack');
const dots = document.querySelectorAll('.carousel-dot');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let current = 0;
const total = dots.length;

function goTo(index) {
    if (index < 0) index = total - 1;
    if (index >= total) index = 0;
    current = index;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

prevBtn.addEventListener('click', () => goTo(current - 1));
nextBtn.addEventListener('click', () => goTo(current + 1));
dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

// Auto-play cada 4 segundos
let autoplay = setInterval(() => goTo(current + 1), 4000);

// Pausar al hover
track.addEventListener('mouseenter', () => clearInterval(autoplay));
track.addEventListener('mouseleave', () => {
    autoplay = setInterval(() => goTo(current + 1), 4000);
});

// Soporte táctil (swipe)
let startX = 0;
track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
track.addEventListener('touchend', e => {
    const diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
        diff > 0 ? goTo(current + 1) : goTo(current - 1);
    }
});
</script>
@endsection
