@extends('layouts.master')

@section('title', 'Reparaciones profesionales')

@php($hideFooter = true)
@php($frameClass = 'home')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
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
                @foreach($categorias as $categoria)
                <div class="w-full flex-shrink-0">
                    <div class="cursor-pointer rounded-[24px] border-2 border-[var(--color-primario)] bg-[var(--color-secundario)]/60 p-8 sm:p-10 text-center backdrop-blur-sm transition-all duration-400 hover:border-[var(--color-acento)] hover:bg-[var(--color-secundario)]/90 hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                        <div class="mb-5 mx-auto size-24 sm:size-28 overflow-hidden rounded-full border-2 border-[var(--color-primario)]">
                            <img src="{{ asset($categoria->imagen) }}" alt="{{ $categoria->nombre }}" class="size-full object-cover">
                        </div>
                        <h3 class="mb-4 font-titulos text-xl sm:text-2xl font-black text-[var(--color-acento)]">{{ $categoria->nombre }}</h3>
                        <p class="font-parrafos text-base sm:text-lg leading-relaxed text-[var(--color-texto)]">{{ $categoria->descripcion }}</p>
                    </div>
                </div>
                @endforeach
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
                @foreach($categorias as $i => $categoria)
                <button class="carousel-dot {{ $i === 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/welcome.js') }}" defer></script>
@endsection
