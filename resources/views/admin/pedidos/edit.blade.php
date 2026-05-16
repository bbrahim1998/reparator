@extends('layouts.admin')

@section('title', 'Editar Pedido #' . $pedido->id)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pedidos.show', $pedido) }}" style="color:var(--color-acento); text-decoration:none; font-size:14px;">&larr; Volver al pedido</a>
</div>

<h1 class="page-title">EDITAR PEDIDO #{{ $pedido->id }}</h1>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('admin.pedidos.update', $pedido) }}">
    @csrf
    @method('PUT')

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
        <div class="card">
            <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DATOS DEL CLIENTE</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $pedido->name) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Apellidos</label>
                    <input type="text" name="apellidos" value="{{ old('apellidos', $pedido->apellidos) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Email</label>
                    <input type="email" name="email" value="{{ old('email', $pedido->email) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $pedido->telefono) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">ESTADO</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Estado</label>
                    <select name="has_to_comment"
                            style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px; [color-scheme:dark];">
                        <option value="pendiente" {{ old('has_to_comment', $pedido->has_to_comment) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ old('has_to_comment', $pedido->has_to_comment) === 'en proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="completado" {{ old('has_to_comment', $pedido->has_to_comment) === 'completado' ? 'selected' : '' }}>Completado</option>
                        <option value="cancelado" {{ old('has_to_comment', $pedido->has_to_comment) === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        <option value="en otro momento" {{ old('has_to_comment', $pedido->has_to_comment) === 'en otro momento' ? 'selected' : '' }}>En otro momento</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Distancia</label>
                    <select name="distancia"
                            style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px; [color-scheme:dark];">
                        <option value="<5kms" {{ old('distancia', $pedido->distancia) === '<5kms' ? 'selected' : '' }}>< 5 kms</option>
                        <option value="<30kms" {{ old('distancia', $pedido->distancia) === '<30kms' ? 'selected' : '' }}>< 30 kms</option>
                        <option value="<100kms" {{ old('distancia', $pedido->distancia) === '<100kms' ? 'selected' : '' }}>< 100 kms</option>
                        <option value="<200kms" {{ old('distancia', $pedido->distancia) === '<200kms' ? 'selected' : '' }}>< 200 kms</option>
                    </select>
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Total (€)</label>
                    <input type="number" step="0.01" min="0" name="total" value="{{ old('total', $pedido->total) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DIRECCIÓN DE ENVÍO</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Tipo de vía</label>
                    <input type="text" name="envio_tipo_via" value="{{ old('envio_tipo_via', $pedido->envio_tipo_via) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Nombre de la vía</label>
                    <input type="text" name="envio_nombre_via" value="{{ old('envio_nombre_via', $pedido->envio_nombre_via) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Número</label>
                    <input type="text" name="envio_numero" value="{{ old('envio_numero', $pedido->envio_numero) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Piso / Puerta</label>
                    <input type="text" name="envio_piso_puerta" value="{{ old('envio_piso_puerta', $pedido->envio_piso_puerta) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Código Postal</label>
                    <input type="text" name="envio_codigo_postal" value="{{ old('envio_codigo_postal', $pedido->envio_codigo_postal) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Municipio</label>
                    <input type="text" name="envio_municipio" value="{{ old('envio_municipio', $pedido->envio_municipio) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Provincia</label>
                    <input type="text" name="envio_provincia" value="{{ old('envio_provincia', $pedido->envio_provincia) }}" required
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Info adicional</label>
                    <textarea name="envio_info_adicional" rows="2"
                              style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px; resize:vertical;">{{ old('envio_info_adicional', $pedido->envio_info_adicional) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DIRECCIÓN DE FACTURACIÓN</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Tipo de vía</label>
                    <input type="text" name="facturacion_tipo_via" value="{{ old('facturacion_tipo_via', $pedido->facturacion_tipo_via) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Nombre de la vía</label>
                    <input type="text" name="facturacion_nombre_via" value="{{ old('facturacion_nombre_via', $pedido->facturacion_nombre_via) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Número</label>
                    <input type="text" name="facturacion_numero" value="{{ old('facturacion_numero', $pedido->facturacion_numero) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Piso / Puerta</label>
                    <input type="text" name="facturacion_piso_puerta" value="{{ old('facturacion_piso_puerta', $pedido->facturacion_piso_puerta) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Código Postal</label>
                    <input type="text" name="facturacion_codigo_postal" value="{{ old('facturacion_codigo_postal', $pedido->facturacion_codigo_postal) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Municipio</label>
                    <input type="text" name="facturacion_municipio" value="{{ old('facturacion_municipio', $pedido->facturacion_municipio) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Provincia</label>
                    <input type="text" name="facturacion_provincia" value="{{ old('facturacion_provincia', $pedido->facturacion_provincia) }}"
                           style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px;">
                </div>
                <div style="grid-column:span 2;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px; color:rgba(255,255,255,0.7);">Info adicional</label>
                    <textarea name="facturacion_info_adicional" rows="2"
                              style="width:100%; padding:10px 14px; background:var(--color-fondo); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:var(--color-texto); font-family:'Roboto',sans-serif; font-size:14px; resize:vertical;">{{ old('facturacion_info_adicional', $pedido->facturacion_info_adicional) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:24px; display:flex; gap:12px;">
        <button type="submit" class="btn-admin btn-admin-warning">Guardar cambios</button>
        <a href="{{ route('admin.pedidos.show', $pedido) }}" class="btn-admin btn-admin-secondary">Cancelar</a>
    </div>
</form>
@endsection
