@extends('layouts.master')

@section('title', 'Finalizar Compra')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection

@section('content')
<div class="max-w-5xl mx-auto">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">FINALIZAR COMPRA</h1>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
        {{-- Columna izquierda: productos del carrito --}}
        <div class="lg:col-span-3">
            <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">PRODUCTOS</h2>

                <div id="checkoutEmpty" class="hidden py-8 text-center">
                    <p class="font-parrafos text-base text-[var(--color-texto)]">Tu carrito está vacío.</p>
                    <a href="{{ route('servicios') }}" class="font-titulos inline-block mt-3 text-sm font-bold text-[var(--color-acento)] underline underline-offset-2 hover:text-white transition-colors">Ver servicios</a>
                </div>

                <div id="checkoutItems"></div>
            </div>

            {{-- Resumen --}}
            <div id="checkoutSummary" class="hidden mt-4 rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                <div class="flex items-center justify-between">
                    <span class="font-titulos text-base font-bold text-[var(--color-texto)]">Total</span>
                    <span id="checkoutTotal" class="font-titulos text-2xl font-black text-[var(--color-acento)]">0,00 €</span>
                </div>
            </div>
        </div>

        {{-- Columna derecha: datos personales y direcciones --}}
        <div class="lg:col-span-2">
            <form method="POST" action="{{ route('checkout.store') }}" id="checkoutForm" class="space-y-6">
                @csrf
                <input type="hidden" name="cart_data" id="cartDataInput" value="">

                {{-- Datos de facturación (nombre, apellidos, email) --}}
                <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                    <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">DATOS DE FACTURACIÓN</h2>

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="apellidos" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Apellidos</label>
                            <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos', Auth::user()->apellidos) }}"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('apellidos')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="telefono" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Teléfono</label>
                            <input id="telefono" type="tel" name="telefono" value="{{ old('telefono', Auth::user()->telefono) }}" required placeholder="612345678"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('telefono')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Dirección de envío --}}
                <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                    <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">DIRECCIÓN DE ENVÍO</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="envio_tipo_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Tipo de vía</label>
                            <select id="envio_tipo_via" name="envio_tipo_via"
                                    class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                                <option value="" disabled {{ old('envio_tipo_via', Auth::user()->envio_tipo_via) === null ? 'selected' : '' }}>Selecciona...</option>
                                @foreach(['Calle','Avenida','Plaza','Paseo','Carrera','Ronda','Travesía','Pasaje','Glorieta','Callejón','Camino','Carretera'] as $via)
                                <option value="{{ $via }}" {{ old('envio_tipo_via', Auth::user()->envio_tipo_via) === $via ? 'selected' : '' }}>{{ $via }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="envio_nombre_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre de la vía</label>
                            <input id="envio_nombre_via" type="text" name="envio_nombre_via" value="{{ old('envio_nombre_via', Auth::user()->envio_nombre_via) }}" placeholder="Ej: Gran Vía"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="envio_numero" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Número</label>
                            <input id="envio_numero" type="text" name="envio_numero" value="{{ old('envio_numero', Auth::user()->envio_numero) }}" placeholder="Ej: 12"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="envio_piso_puerta" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Piso / Puerta <span class="text-white/40 font-normal">(opcional)</span></label>
                            <input id="envio_piso_puerta" type="text" name="envio_piso_puerta" value="{{ old('envio_piso_puerta', Auth::user()->envio_piso_puerta) }}" placeholder="Ej: 4º B"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="envio_codigo_postal" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Código Postal</label>
                            <input id="envio_codigo_postal" type="text" name="envio_codigo_postal" value="{{ old('envio_codigo_postal', Auth::user()->envio_codigo_postal) }}" placeholder="Ej: 28001"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="envio_municipio" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Municipio</label>
                            <input id="envio_municipio" type="text" name="envio_municipio" value="{{ old('envio_municipio', Auth::user()->envio_municipio) }}" placeholder="Ej: Madrid"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="envio_provincia" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Provincia</label>
                        <select id="envio_provincia" name="envio_provincia"
                                class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                            <option value="" disabled {{ old('envio_provincia', Auth::user()->envio_provincia) === null ? 'selected' : '' }}>Selecciona una provincia...</option>
                            @foreach(['Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'] as $prov)
                            <option value="{{ $prov }}" {{ old('envio_provincia', Auth::user()->envio_provincia) === $prov ? 'selected' : '' }}>{{ $prov }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="envio_info_adicional" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Información adicional <span class="text-white/40 font-normal">(opcional)</span></label>
                        <textarea id="envio_info_adicional" name="envio_info_adicional" rows="2" placeholder="Ej: Porte 5, edificio torre"
                                  class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos resize-none">{{ old('envio_info_adicional', Auth::user()->envio_info_adicional) }}</textarea>
                    </div>
                </div>

                {{-- Checkbox misma dirección --}}
                <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="sameAddress" checked
                               class="w-5 h-5 rounded border-white/20 bg-[var(--color-fondo)]/50 text-[var(--color-acento)] hover:border-white/40 focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none cursor-pointer transition-all duration-300">
                        <span class="font-parrafos text-sm text-[var(--color-texto)]">La dirección de facturación es la misma que la de envío</span>
                    </label>
                </div>

                {{-- Dirección de facturación --}}
                <div id="facturacionDiv" class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6" style="display:none;">
                    <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">DIRECCIÓN DE FACTURACIÓN</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="facturacion_tipo_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Tipo de vía</label>
                            <select id="facturacion_tipo_via" name="facturacion_tipo_via"
                                    class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                                <option value="" disabled {{ old('facturacion_tipo_via', Auth::user()->facturacion_tipo_via) === null ? 'selected' : '' }}>Selecciona...</option>
                                @foreach(['Calle','Avenida','Plaza','Paseo','Carrera','Ronda','Travesía','Pasaje','Glorieta','Callejón','Camino','Carretera'] as $via)
                                <option value="{{ $via }}" {{ old('facturacion_tipo_via', Auth::user()->facturacion_tipo_via) === $via ? 'selected' : '' }}>{{ $via }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="facturacion_nombre_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre de la vía</label>
                            <input id="facturacion_nombre_via" type="text" name="facturacion_nombre_via" value="{{ old('facturacion_nombre_via', Auth::user()->facturacion_nombre_via) }}" placeholder="Ej: Gran Vía"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_numero" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Número</label>
                            <input id="facturacion_numero" type="text" name="facturacion_numero" value="{{ old('facturacion_numero', Auth::user()->facturacion_numero) }}" placeholder="Ej: 12"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_piso_puerta" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Piso / Puerta <span class="text-white/40 font-normal">(opcional)</span></label>
                            <input id="facturacion_piso_puerta" type="text" name="facturacion_piso_puerta" value="{{ old('facturacion_piso_puerta', Auth::user()->facturacion_piso_puerta) }}" placeholder="Ej: 4º B"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_codigo_postal" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Código Postal</label>
                            <input id="facturacion_codigo_postal" type="text" name="facturacion_codigo_postal" value="{{ old('facturacion_codigo_postal', Auth::user()->facturacion_codigo_postal) }}" placeholder="Ej: 28001"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_municipio" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Municipio</label>
                            <input id="facturacion_municipio" type="text" name="facturacion_municipio" value="{{ old('facturacion_municipio', Auth::user()->facturacion_municipio) }}" placeholder="Ej: Madrid"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="facturacion_provincia" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Provincia</label>
                        <select id="facturacion_provincia" name="facturacion_provincia"
                                class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                            <option value="" disabled {{ old('facturacion_provincia', Auth::user()->facturacion_provincia) === null ? 'selected' : '' }}>Selecciona una provincia...</option>
                            @foreach(['Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'] as $prov)
                            <option value="{{ $prov }}" {{ old('facturacion_provincia', Auth::user()->facturacion_provincia) === $prov ? 'selected' : '' }}>{{ $prov }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="facturacion_info_adicional" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Información adicional <span class="text-white/40 font-normal">(opcional)</span></label>
                        <textarea id="facturacion_info_adicional" name="facturacion_info_adicional" rows="2" placeholder="Ej: Porte 5, edificio torre"
                                  class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos resize-none">{{ old('facturacion_info_adicional', Auth::user()->facturacion_info_adicional) }}</textarea>
                    </div>
                </div>

                {{-- Distancia --}}
                <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                    <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">DISTANCIA</h2>
                    <select id="distancia" name="distancia"
                            class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                        <option value="" disabled {{ old('distancia', Auth::user()->distancia) === null ? 'selected' : '' }}>Selecciona una opción</option>
                        <option value="<5kms" {{ old('distancia', Auth::user()->distancia) === '<5kms' ? 'selected' : '' }}>< 5 kms</option>
                        <option value="<30kms" {{ old('distancia', Auth::user()->distancia) === '<30kms' ? 'selected' : '' }}>< 30 kms</option>
                        <option value="<100kms" {{ old('distancia', Auth::user()->distancia) === '<100kms' ? 'selected' : '' }}>< 100 kms</option>
                        <option value="<200kms" {{ old('distancia', Auth::user()->distancia) === '<200kms' ? 'selected' : '' }}>< 200 kms</option>
                    </select>
                </div>

                {{-- Datos de la tarjeta --}}
                <div class="rounded-2xl border border-[var(--color-acento)]/30 bg-[var(--color-secundario)] p-6">
                    <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)] mb-4">DATOS DE PAGO</h2>

                    <div class="space-y-4">
                        <div>
                            <label for="card_holder" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Titular de la tarjeta</label>
                            <input id="card_holder" type="text" name="card_holder" value="{{ old('card_holder') }}" required
                                   placeholder="Nombre del titular"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('card_holder')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="card_number" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Número de tarjeta</label>
                            <input id="card_number" type="text" name="card_number" value="{{ old('card_number') }}" required maxlength="19"
                                   placeholder="1234 5678 9012 3456"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                            @error('card_number')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="card_expiry" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Fecha de caducidad</label>
                                <input id="card_expiry" type="text" name="card_expiry" value="{{ old('card_expiry') }}" required maxlength="5"
                                       placeholder="MM/AA"
                                       class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                                @error('card_expiry')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="card_cvv" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">CVV</label>
                                <input id="card_cvv" type="text" name="card_cvv" value="{{ old('card_cvv') }}" required maxlength="4"
                                       placeholder="123"
                                       class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos">
                                @error('card_cvv')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Botón de finalizar --}}
                <button type="submit" id="finalizarCompraBtn"
                        class="w-full rounded-lg bg-[var(--color-acento)] py-4 font-titulos text-base font-bold text-[var(--color-fondo)] transition-all duration-300 hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_20px_rgba(241,255,94,0.5)]">
                    CONFIRMAR PEDIDO
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var sameAddressCheckbox = document.getElementById('sameAddress');
    var facturacionDiv = document.getElementById('facturacionDiv');

    if (sameAddressCheckbox && facturacionDiv) {
        sameAddressCheckbox.addEventListener('change', function () {
            facturacionDiv.style.display = this.checked ? 'none' : 'block';
        });
    }

    var form = document.getElementById('checkoutForm');
    var cartInput = document.getElementById('cartDataInput');

    if (form && cartInput) {
        form.addEventListener('submit', function () {
            if (typeof getCart === 'function') {
                cartInput.value = JSON.stringify(getCart());
            }
        });
    }
});
</script>
<script src="{{ asset('js/checkout.js') }}"></script>
@endsection
