<div id="registerModal" class="fixed inset-0 z-[300] hidden items-center justify-center">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="registerOverlay"></div>

    <!-- Modal -->
    <div class="relative w-full max-w-lg mx-4 bg-[var(--color-secundario)] rounded-2xl shadow-[0_0_30px_rgba(241,255,94,0.3)] border border-[var(--color-acento)]/30 overflow-hidden max-h-[90vh] overflow-y-auto">
        <!-- Header con botón X -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--color-acento)]/30 sticky top-0 bg-[var(--color-secundario)] z-10">
            <h2 class="font-titulos text-xl font-bold text-[var(--color-acento)]">REGISTRO</h2>
            <button type="button" id="closeRegisterModal" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:bg-[var(--color-acento)]/20 hover:scale-110">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="text-[var(--color-acento)]">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <div class="px-6 py-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <label for="name" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre *</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required
                           placeholder="Tu nombre"
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Apellidos -->
                <div class="mb-4">
                    <label for="apellidos" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Apellidos *</label>
                    <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required
                           placeholder="Tus apellidos"
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    @error('apellidos')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fecha de Nacimiento -->
                <div class="mb-4">
                    <label for="fecha_nacimiento" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Fecha de Nacimiento *</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                    @error('fecha_nacimiento')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teléfono con código internacional -->
                <div class="mb-4">
                    <label for="telefono" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Teléfono *</label>
                    <div class="flex gap-2">
                        <select id="telefono_codigo" name="telefono_codigo" class="w-24 px-3 py-3 bg-[var(--color-fondo)]/50 border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/70 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos text-sm [color-scheme:dark]">
                            <option value="+34">+34 🇪🇸</option>
                            <option value="+33">+33 🇫🇷</option>
                            <option value="+44">+44 🇬🇧</option>
                            <option value="+49">+49 🇩🇪</option>
                            <option value="+39">+39 🇮🇹</option>
                            <option value="+1">+1 🇺🇸</option>
                        </select>
                        <input id="telefono" type="tel" name="telefono" value="{{ old('telefono') }}" required placeholder="612345678"
                               class="flex-1 px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    </div>
                    @error('telefono')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Email *</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           placeholder="correo@ejemplo.com"
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dirección de Envío -->
                <div class="mb-6">
                    <h3 class="font-titulos text-base font-bold text-[var(--color-acento)] mb-3 border-b border-[var(--color-acento)]/20 pb-1">DIRECCIÓN DE ENVÍO</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="envio_tipo_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Tipo de vía *</label>
                            <select id="envio_tipo_via" name="envio_tipo_via" required
                                    class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                                <option value="" disabled {{ old('envio_tipo_via') === null ? 'selected' : '' }}>Selecciona...</option>
                                <option value="Calle" {{ old('envio_tipo_via') === 'Calle' ? 'selected' : '' }}>Calle</option>
                                <option value="Avenida" {{ old('envio_tipo_via') === 'Avenida' ? 'selected' : '' }}>Avenida</option>
                                <option value="Plaza" {{ old('envio_tipo_via') === 'Plaza' ? 'selected' : '' }}>Plaza</option>
                                <option value="Paseo" {{ old('envio_tipo_via') === 'Paseo' ? 'selected' : '' }}>Paseo</option>
                                <option value="Carrera" {{ old('envio_tipo_via') === 'Carrera' ? 'selected' : '' }}>Carrera</option>
                                <option value="Ronda" {{ old('envio_tipo_via') === 'Ronda' ? 'selected' : '' }}>Ronda</option>
                                <option value="Travesía" {{ old('envio_tipo_via') === 'Travesía' ? 'selected' : '' }}>Travesía</option>
                                <option value="Pasaje" {{ old('envio_tipo_via') === 'Pasaje' ? 'selected' : '' }}>Pasaje</option>
                                <option value="Glorieta" {{ old('envio_tipo_via') === 'Glorieta' ? 'selected' : '' }}>Glorieta</option>
                                <option value="Callejón" {{ old('envio_tipo_via') === 'Callejón' ? 'selected' : '' }}>Callejón</option>
                                <option value="Camino" {{ old('envio_tipo_via') === 'Camino' ? 'selected' : '' }}>Camino</option>
                                <option value="Carretera" {{ old('envio_tipo_via') === 'Carretera' ? 'selected' : '' }}>Carretera</option>
                            </select>
                            @error('envio_tipo_via')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="envio_nombre_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre de la vía *</label>
                            <input id="envio_nombre_via" type="text" name="envio_nombre_via" value="{{ old('envio_nombre_via') }}" required placeholder="Ej: Gran Vía"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                            @error('envio_nombre_via')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="envio_numero" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Número *</label>
                            <input id="envio_numero" type="text" name="envio_numero" value="{{ old('envio_numero') }}" required placeholder="Ej: 12"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                            @error('envio_numero')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="envio_piso_puerta" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Piso / Puerta <span class="text-white/40 font-normal">(opcional)</span></label>
                            <input id="envio_piso_puerta" type="text" name="envio_piso_puerta" value="{{ old('envio_piso_puerta') }}" placeholder="Ej: 4º B"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                            @error('envio_piso_puerta')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="envio_codigo_postal" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Código Postal *</label>
                            <input id="envio_codigo_postal" type="text" name="envio_codigo_postal" value="{{ old('envio_codigo_postal') }}" required placeholder="Ej: 28001"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                            @error('envio_codigo_postal')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="envio_municipio" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Municipio *</label>
                            <input id="envio_municipio" type="text" name="envio_municipio" value="{{ old('envio_municipio') }}" required placeholder="Ej: Madrid"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                            @error('envio_municipio')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="envio_provincia" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Provincia *</label>
                        <select id="envio_provincia" name="envio_provincia" required
                                class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                            <option value="" disabled {{ old('envio_provincia') === null ? 'selected' : '' }}>Selecciona una provincia...</option>
                            <option value="Álava" {{ old('envio_provincia') === 'Álava' ? 'selected' : '' }}>Álava</option>
                            <option value="Albacete" {{ old('envio_provincia') === 'Albacete' ? 'selected' : '' }}>Albacete</option>
                            <option value="Alicante" {{ old('envio_provincia') === 'Alicante' ? 'selected' : '' }}>Alicante</option>
                            <option value="Almería" {{ old('envio_provincia') === 'Almería' ? 'selected' : '' }}>Almería</option>
                            <option value="Asturias" {{ old('envio_provincia') === 'Asturias' ? 'selected' : '' }}>Asturias</option>
                            <option value="Ávila" {{ old('envio_provincia') === 'Ávila' ? 'selected' : '' }}>Ávila</option>
                            <option value="Badajoz" {{ old('envio_provincia') === 'Badajoz' ? 'selected' : '' }}>Badajoz</option>
                            <option value="Barcelona" {{ old('envio_provincia') === 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
                            <option value="Burgos" {{ old('envio_provincia') === 'Burgos' ? 'selected' : '' }}>Burgos</option>
                            <option value="Cáceres" {{ old('envio_provincia') === 'Cáceres' ? 'selected' : '' }}>Cáceres</option>
                            <option value="Cádiz" {{ old('envio_provincia') === 'Cádiz' ? 'selected' : '' }}>Cádiz</option>
                            <option value="Cantabria" {{ old('envio_provincia') === 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                            <option value="Castellón" {{ old('envio_provincia') === 'Castellón' ? 'selected' : '' }}>Castellón</option>
                            <option value="Ciudad Real" {{ old('envio_provincia') === 'Ciudad Real' ? 'selected' : '' }}>Ciudad Real</option>
                            <option value="Córdoba" {{ old('envio_provincia') === 'Córdoba' ? 'selected' : '' }}>Córdoba</option>
                            <option value="La Coruña" {{ old('envio_provincia') === 'La Coruña' ? 'selected' : '' }}>La Coruña</option>
                            <option value="Cuenca" {{ old('envio_provincia') === 'Cuenca' ? 'selected' : '' }}>Cuenca</option>
                            <option value="Gerona" {{ old('envio_provincia') === 'Gerona' ? 'selected' : '' }}>Gerona</option>
                            <option value="Granada" {{ old('envio_provincia') === 'Granada' ? 'selected' : '' }}>Granada</option>
                            <option value="Guadalajara" {{ old('envio_provincia') === 'Guadalajara' ? 'selected' : '' }}>Guadalajara</option>
                            <option value="Guipúzcoa" {{ old('envio_provincia') === 'Guipúzcoa' ? 'selected' : '' }}>Guipúzcoa</option>
                            <option value="Huelva" {{ old('envio_provincia') === 'Huelva' ? 'selected' : '' }}>Huelva</option>
                            <option value="Huesca" {{ old('envio_provincia') === 'Huesca' ? 'selected' : '' }}>Huesca</option>
                            <option value="Islas Baleares" {{ old('envio_provincia') === 'Islas Baleares' ? 'selected' : '' }}>Islas Baleares</option>
                            <option value="Jaén" {{ old('envio_provincia') === 'Jaén' ? 'selected' : '' }}>Jaén</option>
                            <option value="León" {{ old('envio_provincia') === 'León' ? 'selected' : '' }}>León</option>
                            <option value="Lérida" {{ old('envio_provincia') === 'Lérida' ? 'selected' : '' }}>Lérida</option>
                            <option value="Lugo" {{ old('envio_provincia') === 'Lugo' ? 'selected' : '' }}>Lugo</option>
                            <option value="Madrid" {{ old('envio_provincia') === 'Madrid' ? 'selected' : '' }}>Madrid</option>
                            <option value="Málaga" {{ old('envio_provincia') === 'Málaga' ? 'selected' : '' }}>Málaga</option>
                            <option value="Murcia" {{ old('envio_provincia') === 'Murcia' ? 'selected' : '' }}>Murcia</option>
                            <option value="Navarra" {{ old('envio_provincia') === 'Navarra' ? 'selected' : '' }}>Navarra</option>
                            <option value="Orense" {{ old('envio_provincia') === 'Orense' ? 'selected' : '' }}>Orense</option>
                            <option value="Palencia" {{ old('envio_provincia') === 'Palencia' ? 'selected' : '' }}>Palencia</option>
                            <option value="Las Palmas" {{ old('envio_provincia') === 'Las Palmas' ? 'selected' : '' }}>Las Palmas</option>
                            <option value="Pontevedra" {{ old('envio_provincia') === 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                            <option value="La Rioja" {{ old('envio_provincia') === 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                            <option value="Salamanca" {{ old('envio_provincia') === 'Salamanca' ? 'selected' : '' }}>Salamanca</option>
                            <option value="Santa Cruz de Tenerife" {{ old('envio_provincia') === 'Santa Cruz de Tenerife' ? 'selected' : '' }}>Santa Cruz de Tenerife</option>
                            <option value="Segovia" {{ old('envio_provincia') === 'Segovia' ? 'selected' : '' }}>Segovia</option>
                            <option value="Sevilla" {{ old('envio_provincia') === 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                            <option value="Soria" {{ old('envio_provincia') === 'Soria' ? 'selected' : '' }}>Soria</option>
                            <option value="Tarragona" {{ old('envio_provincia') === 'Tarragona' ? 'selected' : '' }}>Tarragona</option>
                            <option value="Teruel" {{ old('envio_provincia') === 'Teruel' ? 'selected' : '' }}>Teruel</option>
                            <option value="Toledo" {{ old('envio_provincia') === 'Toledo' ? 'selected' : '' }}>Toledo</option>
                            <option value="Valencia" {{ old('envio_provincia') === 'Valencia' ? 'selected' : '' }}>Valencia</option>
                            <option value="Valladolid" {{ old('envio_provincia') === 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                            <option value="Vizcaya" {{ old('envio_provincia') === 'Vizcaya' ? 'selected' : '' }}>Vizcaya</option>
                            <option value="Zamora" {{ old('envio_provincia') === 'Zamora' ? 'selected' : '' }}>Zamora</option>
                            <option value="Zaragoza" {{ old('envio_provincia') === 'Zaragoza' ? 'selected' : '' }}>Zaragoza</option>
                        </select>
                        @error('envio_provincia')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="envio_info_adicional" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Información adicional <span class="text-white/40 font-normal">(opcional)</span></label>
                        <textarea id="envio_info_adicional" name="envio_info_adicional" rows="2" placeholder="Ej: Porte 5, edificio torre"
                                  class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos resize-none">{{ old('envio_info_adicional') }}</textarea>
                        @error('envio_info_adicional')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Checkbox: Misma dirección para facturación -->
                <div class="mb-4">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="sameAddress" checked
                               class="w-5 h-5 rounded border-white/20 bg-[var(--color-fondo)]/50 text-[var(--color-acento)] hover:border-white/40 focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none cursor-pointer transition-all duration-300">
                        <span class="font-parrafos text-sm text-[var(--color-texto)]">La dirección de facturación es la misma que la de envío</span>
                    </label>
                </div>

                <!-- Dirección de Facturación -->
                <div class="mb-6" id="facturacionDiv" style="display: none;">
                    <h3 class="font-titulos text-base font-bold text-[var(--color-acento)] mb-3 border-b border-[var(--color-acento)]/20 pb-1">DIRECCIÓN DE FACTURACIÓN</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="facturacion_tipo_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Tipo de vía</label>
                            <select id="facturacion_tipo_via" name="facturacion_tipo_via"
                                    class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                                <option value="" disabled {{ old('facturacion_tipo_via') === null ? 'selected' : '' }}>Selecciona...</option>
                                <option value="Calle" {{ old('facturacion_tipo_via') === 'Calle' ? 'selected' : '' }}>Calle</option>
                                <option value="Avenida" {{ old('facturacion_tipo_via') === 'Avenida' ? 'selected' : '' }}>Avenida</option>
                                <option value="Plaza" {{ old('facturacion_tipo_via') === 'Plaza' ? 'selected' : '' }}>Plaza</option>
                                <option value="Paseo" {{ old('facturacion_tipo_via') === 'Paseo' ? 'selected' : '' }}>Paseo</option>
                                <option value="Carrera" {{ old('facturacion_tipo_via') === 'Carrera' ? 'selected' : '' }}>Carrera</option>
                                <option value="Ronda" {{ old('facturacion_tipo_via') === 'Ronda' ? 'selected' : '' }}>Ronda</option>
                                <option value="Travesía" {{ old('facturacion_tipo_via') === 'Travesía' ? 'selected' : '' }}>Travesía</option>
                                <option value="Pasaje" {{ old('facturacion_tipo_via') === 'Pasaje' ? 'selected' : '' }}>Pasaje</option>
                                <option value="Glorieta" {{ old('facturacion_tipo_via') === 'Glorieta' ? 'selected' : '' }}>Glorieta</option>
                                <option value="Callejón" {{ old('facturacion_tipo_via') === 'Callejón' ? 'selected' : '' }}>Callejón</option>
                                <option value="Camino" {{ old('facturacion_tipo_via') === 'Camino' ? 'selected' : '' }}>Camino</option>
                                <option value="Carretera" {{ old('facturacion_tipo_via') === 'Carretera' ? 'selected' : '' }}>Carretera</option>
                            </select>
                        </div>
                        <div>
                            <label for="facturacion_nombre_via" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Nombre de la vía</label>
                            <input id="facturacion_nombre_via" type="text" name="facturacion_nombre_via" value="{{ old('facturacion_nombre_via') }}" placeholder="Ej: Gran Vía"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_numero" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Número</label>
                            <input id="facturacion_numero" type="text" name="facturacion_numero" value="{{ old('facturacion_numero') }}" placeholder="Ej: 12"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_piso_puerta" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Piso / Puerta <span class="text-white/40 font-normal">(opcional)</span></label>
                            <input id="facturacion_piso_puerta" type="text" name="facturacion_piso_puerta" value="{{ old('facturacion_piso_puerta') }}" placeholder="Ej: 4º B"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_codigo_postal" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Código Postal</label>
                            <input id="facturacion_codigo_postal" type="text" name="facturacion_codigo_postal" value="{{ old('facturacion_codigo_postal') }}" placeholder="Ej: 28001"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                        <div>
                            <label for="facturacion_municipio" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Municipio</label>
                            <input id="facturacion_municipio" type="text" name="facturacion_municipio" value="{{ old('facturacion_municipio') }}" placeholder="Ej: Madrid"
                                   class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="facturacion_provincia" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Provincia</label>
                        <select id="facturacion_provincia" name="facturacion_provincia"
                                class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                            <option value="" disabled {{ old('facturacion_provincia') === null ? 'selected' : '' }}>Selecciona una provincia...</option>
                            <option value="Álava" {{ old('facturacion_provincia') === 'Álava' ? 'selected' : '' }}>Álava</option>
                            <option value="Albacete" {{ old('facturacion_provincia') === 'Albacete' ? 'selected' : '' }}>Albacete</option>
                            <option value="Alicante" {{ old('facturacion_provincia') === 'Alicante' ? 'selected' : '' }}>Alicante</option>
                            <option value="Almería" {{ old('facturacion_provincia') === 'Almería' ? 'selected' : '' }}>Almería</option>
                            <option value="Asturias" {{ old('facturacion_provincia') === 'Asturias' ? 'selected' : '' }}>Asturias</option>
                            <option value="Ávila" {{ old('facturacion_provincia') === 'Ávila' ? 'selected' : '' }}>Ávila</option>
                            <option value="Badajoz" {{ old('facturacion_provincia') === 'Badajoz' ? 'selected' : '' }}>Badajoz</option>
                            <option value="Barcelona" {{ old('facturacion_provincia') === 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
                            <option value="Burgos" {{ old('facturacion_provincia') === 'Burgos' ? 'selected' : '' }}>Burgos</option>
                            <option value="Cáceres" {{ old('facturacion_provincia') === 'Cáceres' ? 'selected' : '' }}>Cáceres</option>
                            <option value="Cádiz" {{ old('facturacion_provincia') === 'Cádiz' ? 'selected' : '' }}>Cádiz</option>
                            <option value="Cantabria" {{ old('facturacion_provincia') === 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                            <option value="Castellón" {{ old('facturacion_provincia') === 'Castellón' ? 'selected' : '' }}>Castellón</option>
                            <option value="Ciudad Real" {{ old('facturacion_provincia') === 'Ciudad Real' ? 'selected' : '' }}>Ciudad Real</option>
                            <option value="Córdoba" {{ old('facturacion_provincia') === 'Córdoba' ? 'selected' : '' }}>Córdoba</option>
                            <option value="La Coruña" {{ old('facturacion_provincia') === 'La Coruña' ? 'selected' : '' }}>La Coruña</option>
                            <option value="Cuenca" {{ old('facturacion_provincia') === 'Cuenca' ? 'selected' : '' }}>Cuenca</option>
                            <option value="Gerona" {{ old('facturacion_provincia') === 'Gerona' ? 'selected' : '' }}>Gerona</option>
                            <option value="Granada" {{ old('facturacion_provincia') === 'Granada' ? 'selected' : '' }}>Granada</option>
                            <option value="Guadalajara" {{ old('facturacion_provincia') === 'Guadalajara' ? 'selected' : '' }}>Guadalajara</option>
                            <option value="Guipúzcoa" {{ old('facturacion_provincia') === 'Guipúzcoa' ? 'selected' : '' }}>Guipúzcoa</option>
                            <option value="Huelva" {{ old('facturacion_provincia') === 'Huelva' ? 'selected' : '' }}>Huelva</option>
                            <option value="Huesca" {{ old('facturacion_provincia') === 'Huesca' ? 'selected' : '' }}>Huesca</option>
                            <option value="Islas Baleares" {{ old('facturacion_provincia') === 'Islas Baleares' ? 'selected' : '' }}>Islas Baleares</option>
                            <option value="Jaén" {{ old('facturacion_provincia') === 'Jaén' ? 'selected' : '' }}>Jaén</option>
                            <option value="León" {{ old('facturacion_provincia') === 'León' ? 'selected' : '' }}>León</option>
                            <option value="Lérida" {{ old('facturacion_provincia') === 'Lérida' ? 'selected' : '' }}>Lérida</option>
                            <option value="Lugo" {{ old('facturacion_provincia') === 'Lugo' ? 'selected' : '' }}>Lugo</option>
                            <option value="Madrid" {{ old('facturacion_provincia') === 'Madrid' ? 'selected' : '' }}>Madrid</option>
                            <option value="Málaga" {{ old('facturacion_provincia') === 'Málaga' ? 'selected' : '' }}>Málaga</option>
                            <option value="Murcia" {{ old('facturacion_provincia') === 'Murcia' ? 'selected' : '' }}>Murcia</option>
                            <option value="Navarra" {{ old('facturacion_provincia') === 'Navarra' ? 'selected' : '' }}>Navarra</option>
                            <option value="Orense" {{ old('facturacion_provincia') === 'Orense' ? 'selected' : '' }}>Orense</option>
                            <option value="Palencia" {{ old('facturacion_provincia') === 'Palencia' ? 'selected' : '' }}>Palencia</option>
                            <option value="Las Palmas" {{ old('facturacion_provincia') === 'Las Palmas' ? 'selected' : '' }}>Las Palmas</option>
                            <option value="Pontevedra" {{ old('facturacion_provincia') === 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                            <option value="La Rioja" {{ old('facturacion_provincia') === 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                            <option value="Salamanca" {{ old('facturacion_provincia') === 'Salamanca' ? 'selected' : '' }}>Salamanca</option>
                            <option value="Santa Cruz de Tenerife" {{ old('facturacion_provincia') === 'Santa Cruz de Tenerife' ? 'selected' : '' }}>Santa Cruz de Tenerife</option>
                            <option value="Segovia" {{ old('facturacion_provincia') === 'Segovia' ? 'selected' : '' }}>Segovia</option>
                            <option value="Sevilla" {{ old('facturacion_provincia') === 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                            <option value="Soria" {{ old('facturacion_provincia') === 'Soria' ? 'selected' : '' }}>Soria</option>
                            <option value="Tarragona" {{ old('facturacion_provincia') === 'Tarragona' ? 'selected' : '' }}>Tarragona</option>
                            <option value="Teruel" {{ old('facturacion_provincia') === 'Teruel' ? 'selected' : '' }}>Teruel</option>
                            <option value="Toledo" {{ old('facturacion_provincia') === 'Toledo' ? 'selected' : '' }}>Toledo</option>
                            <option value="Valencia" {{ old('facturacion_provincia') === 'Valencia' ? 'selected' : '' }}>Valencia</option>
                            <option value="Valladolid" {{ old('facturacion_provincia') === 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                            <option value="Vizcaya" {{ old('facturacion_provincia') === 'Vizcaya' ? 'selected' : '' }}>Vizcaya</option>
                            <option value="Zamora" {{ old('facturacion_provincia') === 'Zamora' ? 'selected' : '' }}>Zamora</option>
                            <option value="Zaragoza" {{ old('facturacion_provincia') === 'Zaragoza' ? 'selected' : '' }}>Zaragoza</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="facturacion_info_adicional" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Información adicional <span class="text-white/40 font-normal">(opcional)</span></label>
                        <textarea id="facturacion_info_adicional" name="facturacion_info_adicional" rows="2" placeholder="Ej: Porte 5, edificio torre"
                                  class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos resize-none">{{ old('facturacion_info_adicional') }}</textarea>
                    </div>
                </div>

                <!-- Distancia -->
                <div class="mb-4">
                    <label for="distancia" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Distancia <span class="text-white/40 font-normal">(opcional)</span></label>
                    <select id="distancia" name="distancia"
                            class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos [color-scheme:dark]">
                        <option value="" disabled {{ old('distancia') === null ? 'selected' : '' }}>Selecciona una opción</option>
                        <option value="<5kms" {{ old('distancia') === '<5kms' ? 'selected' : '' }}>< 5 kms</option>
                        <option value="<30kms" {{ old('distancia') === '<30kms' ? 'selected' : '' }}>< 30 kms</option>
                        <option value="<100kms" {{ old('distancia') === '<100kms' ? 'selected' : '' }}>< 100 kms</option>
                        <option value="<200kms" {{ old('distancia') === '<200kms' ? 'selected' : '' }}>< 200 kms</option>
                    </select>
                    @error('distancia')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Contraseña *</label>
                    <input id="password" type="password" name="password" required
                           placeholder="Mínimo 8 caracteres"
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Confirmar Contraseña *</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           placeholder="Repite tu contraseña"
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-white/10 rounded-lg text-[var(--color-texto)] placeholder-white/30 hover:border-white/25 hover:bg-[var(--color-fondo)]/80 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/30 focus:bg-[var(--color-fondo)] focus:outline-none transition-all duration-300 font-parrafos">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <meter id="password-strength-meter" class="w-full h-2 rounded bg-white/20 mb-1" value="0" min="0" max="5"></meter>
                    <p id="password-strength-text" class="text-sm text-[var(--color-texto)] mb-0 font-parrafos">Fortaleza de la contraseña <span id="password-strength-text"></span></p>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-[var(--color-acento)]/30">
                    <a href="#" id="showLoginFromRegister" class="font-parrafos text-sm text-[var(--color-texto)] hover:text-[var(--color-acento)]  transition-colors underline underline-offset-2">
                        ¿Ya tienes cuenta?
                    </a>

                    <button type="submit" id="registerButton"
                                class="font-titulos px-6 py-3 bg-[var(--color-acento)] text-[var(--color-fondo)] font-bold rounded-lg hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)] transition-all duration-300">
                        REGISTRARSE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/autenticacion.js') }}"></script>
<script>

</script>
