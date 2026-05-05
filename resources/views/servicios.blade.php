@extends('layouts.master')

@section('title', 'Nuestros Servicios')

@section('styles')
<style>
.carousel-track {
    transition: transform 0.5s ease-in-out;
}
.carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}
.carousel-dot.active {
    background: var(--color-acento);
    transform: scale(1.2);
}
.carousel-dot:hover {
    background: var(--color-acento);
}
</style>
@endsection

@section('content')
<h1 class="mb-12 text-center font-titulos text-[clamp(28px,5vw,36px)] font-semibold text-[var(--color-acento)]">Nuestros Servicios</h1>

<!-- Carousel -->
<div class="relative mx-auto max-w-2xl overflow-hidden px-4">
    <div class="carousel-track flex" id="carouselTrack">
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de móviles">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">📱</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de ordenadores">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">💻</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de consolas">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">🎮</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de electrodomésticos">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">🔧</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de tablets">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">📲</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
        <div class="w-full flex-shrink-0">
            <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="Reparación de audífonos">
                <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                    <span class="text-[80px]">🎧</span>
                </div>
                <div class="p-5">
                    <div class="mb-2.5 font-titulos text-[12px] font-semibold uppercase text-[var(--color-acento)]">Entrega en oficina</div>
                    <div class="mb-4 font-parrafos text-[9px] leading-relaxed text-[var(--color-texto)]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                    </div>
                </div>
                <div class="flex justify-end border-t border-white/20 px-5 pb-5 pt-2.5">
                    <button class="add-button flex size-[50px] items-center justify-center rounded-full bg-[var(--color-acento)] text-[30px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">+</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flechas -->
    <button id="prevBtn" class="absolute left-0 top-1/2 z-10 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)] hover:text-[var(--color-fondo)] hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button id="nextBtn" class="absolute right-0 top-1/2 z-10 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)] hover:text-[var(--color-fondo)] hover:shadow-[0_0_15px_rgba(241,255,94,0.5)]">
        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Dots -->
    <div class="mt-8 flex justify-center gap-3" id="carouselDots">
        <button class="carousel-dot active"></button>
        <button class="carousel-dot"></button>
        <button class="carousel-dot"></button>
        <button class="carousel-dot"></button>
        <button class="carousel-dot"></button>
        <button class="carousel-dot"></button>
    </div>
</div>
@endsection

@section('scripts')
<script>
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

// Service cards interaction
document.querySelectorAll('.service-card').forEach((card, index) => {
    card.style.animationDelay = `${index * 0.1}s`;

    const addButton = card.querySelector('.add-button');
    addButton.addEventListener('click', (e) => {
        e.stopPropagation();
        const serviceName = card.getAttribute('data-service') || 'Servicio';
        alert(`✨ ${serviceName} añadido a tu solicitud. Pronto nos pondremos en contacto.`);
    });

    card.addEventListener('click', () => {
        const serviceName = card.getAttribute('data-service') || 'Servicio';
        alert(`🔧 Información sobre ${serviceName}. ¿En qué podemos ayudarte?`);
    });
});
</script>
@endsection
