@extends('layouts.master')

@section('title', 'Nuestros Servicios')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
@endsection

@section('content')
<div x-data="{ categoriaSeleccionada: new URLSearchParams(window.location.search).get('categoria') || '' }" class="space-y-8">
    <h1 class="text-center font-titulos text-[clamp(28px,5vw,36px)] font-semibold text-[var(--color-acento)]">Nuestros Servicios</h1>

    <!-- Filtro de categorías -->
    <div class="px-4 max-w-6xl mx-auto">
        <label for="filtro-categoria" class="mb-2 block text-left font-titulos text-sm font-semibold text-[var(--color-texto)] sm:sr-only">
            Filtrar por categoría
        </label>
        <select id="filtro-categoria" x-model="categoriaSeleccionada"
            class="w-full cursor-pointer rounded-xl border border-white/20 bg-[var(--color-primario)] px-4 py-3 font-titulos text-sm text-[var(--color-texto)] outline-none transition-all duration-300 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30">
            <option value="">Todas las categorías</option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Grid de servicios -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 max-w-6xl mx-auto">
        @forelse($productos as $producto)
        <div class="service-card cursor-pointer overflow-hidden rounded-[20px] bg-[var(--color-primario)] transition-all duration-400 hover:-translate-y-2.5 hover:shadow-[0_20px_35px_rgba(0,0,0,0.3)]"
             data-id="{{ $producto->id }}"
             data-nombre="{{ $producto->nombre }}"
             data-imagen="{{ asset($producto->imagen) }}"
             data-descripcion="{{ $producto->descripcion }}"
             data-precio="{{ $producto->precio }}"
             data-categoria="{{ $producto->categoria->nombre }}"
             x-show="categoriaSeleccionada === '' || categoriaSeleccionada === '{{ $producto->categoria->nombre }}'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-cloak>
            <div class="relative flex h-[190px] items-center justify-center bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)] overflow-hidden" data-open-modal>
                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="size-full object-cover transition-transform duration-500 hover:scale-110">
                <button class="fav-btn absolute top-3 right-3 flex size-9 items-center justify-center rounded-full bg-black/40 text-white/70 transition-all duration-300 hover:scale-110 hover:bg-black/60 hover:text-red-400 z-10" data-id="{{ $producto->id }}">
                    <svg class="fav-icon-heart" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
            </div>
            <div class="p-5">
                <h3 class="mb-2 block font-titulos text-lg font-black text-[var(--color-acento)] transition-colors duration-300 hover:text-white" data-open-modal>{{ $producto->nombre }}</h3>
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
        @empty
        <p class="col-span-full text-center font-parrafos text-base text-[var(--color-texto)]">No hay servicios disponibles en estos momentos.</p>
        @endforelse
    </div>
</div>
@endsection

@section('modal')
<!-- Modal de detalle de producto -->
<div id="productoModal" class="fixed inset-0 z-[300] hidden items-center justify-center">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="productoOverlay"></div>

    <div class="relative w-full max-w-4xl mx-4 bg-[var(--color-secundario)] rounded-2xl shadow-[0_0_30px_rgba(241,255,94,0.3)] border border-[var(--color-acento)]/30 overflow-hidden max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--color-acento)]/30 sticky top-0 bg-[var(--color-secundario)] z-10">
            <h2 class="font-titulos text-xl font-bold text-[var(--color-acento)]" id="modalProductoTitle">Producto</h2>
            <div class="flex items-center gap-2">
                <button type="button" id="modalFavBtn" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:bg-red-500/20 hover:scale-110 text-white/70">
                    <svg class="fav-icon-heart" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
                <button type="button" id="closeProductoModal" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:bg-[var(--color-acento)]/20 hover:scale-110">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="text-[var(--color-acento)]">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Contenido -->
        <div class="px-6 py-6">
            <div class="flex flex-col gap-6 lg:flex-row">
                <!-- Imagen -->
                <div class="w-full lg:w-1/2">
                    <div class="overflow-hidden rounded-[20px] bg-gradient-to-br from-[var(--color-secundario)] to-[var(--color-fondo)]">
                        <img id="modalProductoImagen" src="" alt="" class="h-[250px] w-full object-cover sm:h-[350px]">
                    </div>
                </div>

                <!-- Detalles -->
                <div class="flex w-full flex-col gap-5 lg:w-1/2">
                    <span id="modalProductoCategoria" class="inline-block w-fit rounded-full border border-[var(--color-acento)]/30 px-4 py-1.5 font-titulos text-xs font-semibold uppercase tracking-wider text-[var(--color-acento)]"></span>
                    <h3 id="modalProductoNombre" class="font-titulos text-2xl font-black leading-tight text-[var(--color-acento)]"></h3>
                    <p id="modalProductoDescripcion" class="font-parrafos text-sm leading-relaxed text-[var(--color-texto)]"></p>
                    <div class="h-px w-full bg-white/10"></div>
                    <div id="modalProductoPrecio" class="font-titulos text-3xl font-bold text-[var(--color-acento)]"></div>
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="quantity-selector flex items-center gap-2 rounded-full bg-white/10 px-3 py-2">
                            <button class="qty-btn qty-minus flex size-[36px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[20px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:scale-100 disabled:hover:bg-[var(--color-acento)]/20" disabled>-</button>
                            <span class="qty-value min-w-[32px] text-center font-titulos text-[20px] font-bold text-[var(--color-texto)]">1</span>
                            <button class="qty-btn qty-plus flex size-[36px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[20px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:scale-110 hover:bg-[var(--color-acento)]/40">+</button>
                        </div>
                        <button class="add-to-cart-btn h-[48px] rounded-[24px] bg-[var(--color-acento)] px-8 font-titulos text-[16px] font-bold text-[var(--color-fondo)] transition-all duration-300 hover:scale-105 hover:bg-[var(--color-texto)] hover:shadow-[0_0_15px_rgba(241,255,94,0.7)]">Añadir al carrito</button>
                    </div>
                    <div class="h-px w-full bg-white/10"></div>
                    <div class="rounded-[16px] border border-white/10 bg-[var(--color-primario)]/50 p-6">
                        <h3 class="mb-1 font-titulos text-xs font-semibold text-[var(--color-texto)]/60 uppercase tracking-wider">Detalles del servicio</h3>
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

            <!-- Formulario de consulta -->
            <div class="mt-8 border-t border-white/10 pt-8">
                <div class="rounded-[20px] border border-white/10 bg-[var(--color-primario)]/30 p-8 sm:p-10">
                    <h2 class="mb-2 font-titulos text-xl font-bold text-[var(--color-acento)] text-center">¿Necesitas más información?</h2>
                    <p class="mx-auto mb-6 max-w-lg text-center font-parrafos text-sm text-[var(--color-texto)]">
                        Si necesitas ayuda adicional o quieres consultar algo antes de contratar el servicio, rellena el siguiente formulario y te responderemos lo antes posible.
                    </p>

                    @if(session('success'))
                    <div class="alert-success mb-6 rounded-xl border border-green-400/30 bg-green-400/10 px-5 py-4 text-center font-parrafos text-sm text-green-400">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('producto.consulta') }}" class="mx-auto max-w-2xl consulta-form">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @guest
                            <div>
                                <label for="consulta_nombre" class="mb-2 block font-titulos text-sm font-semibold text-[var(--color-texto)]">Nombre *</label>
                                <input id="consulta_nombre" type="text" name="nombre" value="{{ old('nombre') }}" required
                                       placeholder="Tu nombre"
                                       class="w-full rounded-lg border border-white/10 bg-[var(--color-fondo)] px-4 py-3 font-parrafos text-sm text-[var(--color-texto)] placeholder-white/30 transition-all duration-300 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:bg-[var(--color-fondo)] focus:outline-none focus:ring-2 focus:ring-[var(--color-acento)]/30">
                                @error('nombre')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="consulta_apellidos" class="mb-2 block font-titulos text-sm font-semibold text-[var(--color-texto)]">Apellidos *</label>
                                <input id="consulta_apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required
                                       placeholder="Tus apellidos"
                                       class="w-full rounded-lg border border-white/10 bg-[var(--color-fondo)] px-4 py-3 font-parrafos text-sm text-[var(--color-texto)] placeholder-white/30 transition-all duration-300 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:bg-[var(--color-fondo)] focus:outline-none focus:ring-2 focus:ring-[var(--color-acento)]/30">
                                @error('apellidos')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="consulta_email" class="mb-2 block font-titulos text-sm font-semibold text-[var(--color-texto)]">Email *</label>
                                <input id="consulta_email" type="email" name="email" value="{{ old('email') }}" required
                                       placeholder="correo@ejemplo.com"
                                       class="w-full rounded-lg border border-white/10 bg-[var(--color-fondo)] px-4 py-3 font-parrafos text-sm text-[var(--color-texto)] placeholder-white/30 transition-all duration-300 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:bg-[var(--color-fondo)] focus:outline-none focus:ring-2 focus:ring-[var(--color-acento)]/30">
                                @error('email')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                            @endguest

                            <div class="sm:col-span-2">
                                <label for="consulta_producto_id" class="mb-2 block font-titulos text-sm font-semibold text-[var(--color-texto)]">Producto *</label>
                                <select id="consulta_producto_id" name="producto_id" required
                                        class="w-full rounded-lg border border-white/10 bg-[var(--color-fondo)] px-4 py-3 font-parrafos text-sm text-[var(--color-texto)] transition-all duration-300 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:bg-[var(--color-fondo)] focus:outline-none focus:ring-2 focus:ring-[var(--color-acento)]/30">
                                    <option value="" disabled selected>Selecciona un producto</option>
                                    @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('producto_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="consulta_mensaje" class="mb-2 block font-titulos text-sm font-semibold text-[var(--color-texto)]">Mensaje *</label>
                                <textarea id="consulta_mensaje" name="mensaje" rows="4" required
                                          placeholder="Escribe aquí tu consulta sobre el servicio..."
                                          class="w-full resize-none rounded-lg border border-white/10 bg-[var(--color-fondo)] px-4 py-3 font-parrafos text-sm text-[var(--color-texto)] placeholder-white/30 transition-all duration-300 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:bg-[var(--color-fondo)] focus:outline-none focus:ring-2 focus:ring-[var(--color-acento)]/30">{{ old('mensaje') }}</textarea>
                                @error('mensaje')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <button type="submit" disabled
                                    class="rounded-lg bg-[var(--color-acento)] px-10 py-3 font-titulos text-sm font-bold text-[var(--color-fondo)] transition-all duration-300 hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:shadow-none">
                                Enviar consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/servicios.js') }}" defer></script>
@endsection
