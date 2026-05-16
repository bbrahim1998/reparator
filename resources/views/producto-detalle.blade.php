@extends('layouts.master')

@section('title', $producto->nombre)

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6">
    <a href="{{ route('servicios') }}"
       class="group mb-8 inline-flex items-center gap-2 font-titulos text-sm text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)]">
        <svg class="size-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Volver a servicios
    </a>

    <div class="flex flex-col gap-8 lg:flex-row lg:items-start">
        <div class="w-full lg:w-1/2 lg:sticky lg:top-8">
            <div class="overflow-hidden rounded-[20px] bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                     class="h-[300px] w-full object-cover sm:h-[400px] lg:h-[500px]">
            </div>
        </div>

        <div class="flex w-full flex-col gap-6 lg:w-1/2">
            @if($producto->categoria)
            <span class="inline-block w-fit rounded-full border border-[var(--color-acento)]/30 px-4 py-1.5 font-titulos text-xs font-semibold uppercase tracking-wider text-[var(--color-acento)]">
                {{ $producto->categoria->nombre }}
            </span>
            @endif

            <h1 class="font-titulos text-[clamp(28px,4vw,42px)] font-black leading-tight text-[var(--color-acento)]">
                {{ $producto->nombre }}
            </h1>

            <p class="font-parrafos text-base leading-relaxed text-[var(--color-texto)] sm:text-lg">
                {{ $producto->descripcion }}
            </p>

            <div class="h-px w-full bg-white/10"></div>

            <div class="font-titulos text-[clamp(32px,5vw,48px)] font-bold text-[var(--color-acento)]">
                {{ number_format($producto->precio, 2) }} €
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-3 py-2">
                    <button class="qty-btn qty-minus flex size-[36px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[20px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                    <span class="qty-value min-w-[32px] text-center font-titulos text-[20px] font-bold text-[var(--color-texto)]">1</span>
                    <button class="qty-btn qty-plus flex size-[36px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[20px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                </div>
                <button class="add-to-cart-btn h-[48px] rounded-[24px] bg-[var(--color-acento)] px-8 font-titulos text-[16px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">
                    Añadir al carrito
                </button>
            </div>

            <div class="h-px w-full bg-white/10"></div>

            <div class="rounded-[16px] border border-white/10 bg-[var(--color-primario)]/50 p-6">
                <h3 class="mb-1 font-titulos text-sm font-semibold text-[var(--color-texto)]/60 uppercase tracking-wider">Detalles del servicio</h3>
                <ul class="mt-3 space-y-2 font-parrafos text-sm text-[var(--color-texto)]">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 size-5 shrink-0 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Presupuesto sin compromiso</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 size-5 shrink-0 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Servicio técnico especializado</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 size-5 shrink-0 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Garantía en todas las reparaciones</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-16 border-t border-white/10 pt-12">
        <div class="rounded-[20px] border border-dashed border-white/20 bg-[var(--color-primario)]/30 p-8 text-center sm:p-12">
            <h2 class="mb-4 font-titulos text-2xl font-bold text-[var(--color-acento)]">¿Necesitas más información?</h2>
            <p class="mx-auto max-w-lg font-parrafos text-base text-[var(--color-texto)]">
                Si necesitas ayuda adicional o quieres consultar algo antes de contratar el servicio, rellena el siguiente formulario y te responderemos lo antes posible.
            </p>
            <div class="mt-8 h-32 rounded-xl border border-dashed border-white/10 bg-white/5 flex items-center justify-center">
                <span class="font-parrafos text-sm text-[var(--color-texto)]/40">[Formulario de contacto — próximo paso]</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/servicios.js') }}" defer></script>
@endsection