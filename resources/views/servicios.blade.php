@extends('layouts.master')

@section('title', 'Nuestros Servicios')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
@endsection

@section('content')
<h1 class="mb-12 text-center font-titulos text-[clamp(28px,5vw,36px)] font-semibold text-[var(--color-acento)]">Nuestros Servicios</h1>

<!-- Grid de servicios -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 max-w-6xl mx-auto">
    @foreach($productos as $producto)
    <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]" data-service="{{ $producto->nombre }}">
        <div class="flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)] overflow-hidden">
            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="size-full object-cover">
        </div>
        <div class="p-5">
            <h3 class="mb-2 font-titulos text-lg font-black text-[var(--color-acento)]">{{ $producto->nombre }}</h3>
            <p class="mb-3 font-parrafos text-sm leading-relaxed text-[var(--color-texto)]">
                {{ $producto->descripcion }}
            </p>
            <div class="font-titulos text-xl font-bold text-[var(--color-acento)]">
                {{ number_format($producto->precio, 2) }} €
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
    @endforeach
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/servicios.js') }}" defer></script>
@endsection
