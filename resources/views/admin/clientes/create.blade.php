@extends('layouts.admin')

@section('title', 'Nuevo Cliente')

@section('styles')
<style>
    .form-card { background: var(--color-secundario); border: 1px solid rgba(241,255,94,0.2); border-radius: 16px; padding: 32px; max-width: 800px; margin: 0 auto; box-shadow: 0 4px 24px rgba(0,0,0,0.2); }
    .form-group { margin-bottom: 24px; }
    .form-group label { display: block; font-family: 'sourcesanspro','Roboto',sans-serif; font-weight: 700; font-size: 14px; color: var(--color-acento); margin-bottom: 6px; text-transform: uppercase; letter-spacing: .5px; }
    .form-control { width: 100%; padding: 12px 16px; background: var(--color-fondo); border: 1px solid rgba(241,255,94,0.2); border-radius: 10px; color: var(--color-texto); font-family: 'Roboto',sans-serif; font-size: 15px; transition: all .3s ease; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--color-acento); box-shadow: 0 0 0 3px rgba(241,255,94,0.15); }
    .form-control::placeholder { color: rgba(255,255,255,0.3); }
    .form-error { color: #ef4444; font-family: 'Roboto',sans-serif; font-size: 13px; margin-top: 4px; }
    .form-warning { color: #fbbf24; font-family: 'Roboto',sans-serif; font-size: 13px; margin-top: 4px; }
    .form-help { color: rgba(255,255,255,0.4); font-family: 'Roboto',sans-serif; font-size: 12px; margin-top: 4px; }
    .flex-buttons { display: flex; gap: 12px; justify-content: flex-end; margin-top: 32px; padding-top: 20px; border-top: 1px solid rgba(241,255,94,0.15); }
    .section-title { font-family: 'sourcesanspro','Roboto',sans-serif; font-weight: 700; font-size: 16px; color: var(--color-texto); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid rgba(241,255,94,0.15); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
    @media (max-width: 768px) { .form-row, .form-row-3 { grid-template-columns: 1fr; } }
    .recomended-badge { display: inline-block; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 2px 8px; border-radius: 999px; background: rgba(251, 191, 36, 0.15); color: #fbbf24; margin-left: 8px; vertical-align: middle; }
</style>
@endsection

@section('content')
    <h1 class="page-title">NUEVO CLIENTE</h1>
    <p class="page-subtitle">Crea un nuevo usuario cliente en el sistema</p>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.clientes.store') }}">
            @csrf

            <div class="section-title">DATOS PERSONALES</div>

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nombre <span class="recomended-badge">Recomendado</span></label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre">
                    <p class="form-help">Recomendado para identificar al cliente.</p>
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos <span class="recomended-badge">Recomendado</span></label>
                    <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" class="form-control" placeholder="Apellidos">
                    @error('apellidos')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email <span class="recomended-badge">Recomendado</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="correo@ejemplo.com">
                    <p class="form-help">Recomendado para que el cliente pueda iniciar sesión.</p>
                    @error('email')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono <span class="recomended-badge">Recomendado</span></label>
                    <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Ej: 612345678">
                    @error('telefono')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Contraseña <span class="recomended-badge">Recomendado</span></label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres">
                    <p class="form-help">Recomendado para que el cliente pueda iniciar sesión. Mínimo 8 caracteres.</p>
                    @error('password')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña <span class="recomended-badge">Recomendado</span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control">
                    @error('fecha_nacimiento')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="distancia">Distancia</label>
                    <select id="distancia" name="distancia" class="form-control">
                        <option value="">Seleccionar...</option>
                        <option value="<5kms" {{ old('distancia') == '<5kms' ? 'selected' : '' }}>Menos de 5 km</option>
                        <option value="<30kms" {{ old('distancia') == '<30kms' ? 'selected' : '' }}>Menos de 30 km</option>
                        <option value="<100kms" {{ old('distancia') == '<100kms' ? 'selected' : '' }}>Menos de 100 km</option>
                        <option value="<200kms" {{ old('distancia') == '<200kms' ? 'selected' : '' }}>Menos de 200 km</option>
                    </select>
                    @error('distancia')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="section-title">DIRECCIÓN DE ENVÍO</div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="envio_tipo_via">Tipo de vía</label>
                    <input id="envio_tipo_via" type="text" name="envio_tipo_via" value="{{ old('envio_tipo_via') }}" class="form-control" placeholder="Ej: Calle, Avda.">
                </div>

                <div class="form-group">
                    <label for="envio_nombre_via">Nombre de la vía</label>
                    <input id="envio_nombre_via" type="text" name="envio_nombre_via" value="{{ old('envio_nombre_via') }}" class="form-control" placeholder="Nombre de la calle">
                </div>

                <div class="form-group">
                    <label for="envio_numero">Número</label>
                    <input id="envio_numero" type="text" name="envio_numero" value="{{ old('envio_numero') }}" class="form-control" placeholder="Nº">
                </div>
            </div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="envio_piso_puerta">Piso / Puerta</label>
                    <input id="envio_piso_puerta" type="text" name="envio_piso_puerta" value="{{ old('envio_piso_puerta') }}" class="form-control" placeholder="Ej: 3º 2ª">
                </div>

                <div class="form-group">
                    <label for="envio_codigo_postal">Código postal</label>
                    <input id="envio_codigo_postal" type="text" name="envio_codigo_postal" value="{{ old('envio_codigo_postal') }}" class="form-control" placeholder="12345">
                </div>

                <div class="form-group">
                    <label for="envio_provincia">Provincia</label>
                    <input id="envio_provincia" type="text" name="envio_provincia" value="{{ old('envio_provincia') }}" class="form-control" placeholder="Provincia">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="envio_municipio">Municipio / Ciudad</label>
                    <input id="envio_municipio" type="text" name="envio_municipio" value="{{ old('envio_municipio') }}" class="form-control" placeholder="Municipio o ciudad">
                </div>

                <div class="form-group">
                    <label for="envio_info_adicional">Información adicional</label>
                    <input id="envio_info_adicional" type="text" name="envio_info_adicional" value="{{ old('envio_info_adicional') }}" class="form-control" placeholder="Indicaciones extra">
                </div>
            </div>

            <div class="section-title">DIRECCIÓN DE FACTURACIÓN</div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="facturacion_tipo_via">Tipo de vía</label>
                    <input id="facturacion_tipo_via" type="text" name="facturacion_tipo_via" value="{{ old('facturacion_tipo_via') }}" class="form-control" placeholder="Ej: Calle, Avda.">
                </div>

                <div class="form-group">
                    <label for="facturacion_nombre_via">Nombre de la vía</label>
                    <input id="facturacion_nombre_via" type="text" name="facturacion_nombre_via" value="{{ old('facturacion_nombre_via') }}" class="form-control" placeholder="Nombre de la calle">
                </div>

                <div class="form-group">
                    <label for="facturacion_numero">Número</label>
                    <input id="facturacion_numero" type="text" name="facturacion_numero" value="{{ old('facturacion_numero') }}" class="form-control" placeholder="Nº">
                </div>
            </div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="facturacion_piso_puerta">Piso / Puerta</label>
                    <input id="facturacion_piso_puerta" type="text" name="facturacion_piso_puerta" value="{{ old('facturacion_piso_puerta') }}" class="form-control" placeholder="Ej: 3º 2ª">
                </div>

                <div class="form-group">
                    <label for="facturacion_codigo_postal">Código postal</label>
                    <input id="facturacion_codigo_postal" type="text" name="facturacion_codigo_postal" value="{{ old('facturacion_codigo_postal') }}" class="form-control" placeholder="12345">
                </div>

                <div class="form-group">
                    <label for="facturacion_provincia">Provincia</label>
                    <input id="facturacion_provincia" type="text" name="facturacion_provincia" value="{{ old('facturacion_provincia') }}" class="form-control" placeholder="Provincia">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="facturacion_municipio">Municipio / Ciudad</label>
                    <input id="facturacion_municipio" type="text" name="facturacion_municipio" value="{{ old('facturacion_municipio') }}" class="form-control" placeholder="Municipio o ciudad">
                </div>

                <div class="form-group">
                    <label for="facturacion_info_adicional">Información adicional</label>
                    <input id="facturacion_info_adicional" type="text" name="facturacion_info_adicional" value="{{ old('facturacion_info_adicional') }}" class="form-control" placeholder="Indicaciones extra">
                </div>
            </div>

            <div class="flex-buttons">
                <a href="{{ route('admin.clientes') }}" class="btn-admin btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin btn-admin-primary">Crear cliente</button>
            </div>
        </form>
    </div>
@endsection
