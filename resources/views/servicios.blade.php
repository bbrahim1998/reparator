@extends('layouts.master')

@section('title', 'Nuestros Servicios')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
                <div class="service-footer flex items-center justify-between border-t border-white/20 px-5 pb-5 pt-2.5">
                    <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-2.5 py-1">
                        <button class="qty-btn qty-minus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                        <span class="qty-value min-w-[24px] text-center font-titulos text-[16px] font-bold text-[var(--color-texto)]">1</span>
                        <button class="qty-btn qty-plus flex size-[30px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[18px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                    </div>
                    <button class="add-to-cart-btn h-[40px] rounded-[20px] bg-[var(--color-acento)] px-5 font-titulos text-[14px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
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
<script src="{{ asset('js/servicios.js') }}" defer></script>
@endsection
