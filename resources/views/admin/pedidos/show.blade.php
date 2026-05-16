@extends('layouts.admin')

@section('title', 'Pedido #' . $pedido->id)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pedidos') }}" style="color:var(--color-acento); text-decoration:none; font-size:14px;">&larr; Volver a pedidos</a>
</div>

<h1 class="page-title">PEDIDO #{{ $pedido->id }}</h1>
<p class="page-subtitle">Realizado el {{ $pedido->created_at->format('d/m/Y H:i') }}</p>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
    <div class="card">
        <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DATOS DEL CLIENTE</h3>
        <div style="font-size:14px; line-height:2;">
            <strong style="color:var(--color-texto);">Nombre:</strong> {{ $pedido->name }} {{ $pedido->apellidos }}<br>
            <strong style="color:var(--color-texto);">Email:</strong> {{ $pedido->email }}<br>
            <strong style="color:var(--color-texto);">Teléfono:</strong> {{ $pedido->telefono }}
        </div>
    </div>

    <div class="card">
        <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">ESTADO</h3>
        <div style="font-size:14px; line-height:2;">
            <strong style="color:var(--color-texto);">Estado:</strong>
            <span class="badge badge-yes">{{ $pedido->has_to_comment }}</span><br>
            <strong style="color:var(--color-texto);">Distancia:</strong> {{ $pedido->distancia }}<br>
            <strong style="color:var(--color-texto);">Tarjeta:</strong> ****{{ $pedido->ultimos_cuatro }}
        </div>
    </div>

    <div class="card">
        <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DIRECCIÓN DE ENVÍO</h3>
        <div style="font-size:14px; line-height:1.8;">
            {{ $pedido->envio_tipo_via }} {{ $pedido->envio_nombre_via }}, {{ $pedido->envio_numero }}{{ $pedido->envio_piso_puerta ? ', '.$pedido->envio_piso_puerta : '' }}<br>
            {{ $pedido->envio_codigo_postal }} {{ $pedido->envio_municipio }}<br>
            {{ $pedido->envio_provincia }}<br>
            @if($pedido->envio_info_adicional)
            <em style="color:rgba(255,255,255,0.5);">{{ $pedido->envio_info_adicional }}</em>
            @endif
        </div>
    </div>

    @if($pedido->facturacion_tipo_via)
    <div class="card">
        <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">DIRECCIÓN DE FACTURACIÓN</h3>
        <div style="font-size:14px; line-height:1.8;">
            {{ $pedido->facturacion_tipo_via }} {{ $pedido->facturacion_nombre_via }}, {{ $pedido->facturacion_numero }}{{ $pedido->facturacion_piso_puerta ? ', '.$pedido->facturacion_piso_puerta : '' }}<br>
            {{ $pedido->facturacion_codigo_postal }} {{ $pedido->facturacion_municipio }}<br>
            {{ $pedido->facturacion_provincia }}<br>
            @if($pedido->facturacion_info_adicional)
            <em style="color:rgba(255,255,255,0.5);">{{ $pedido->facturacion_info_adicional }}</em>
            @endif
        </div>
    </div>
    @endif
</div>

<div class="card" style="margin-top:20px;">
    <h3 style="font-family:'sourcesanspro','Roboto',sans-serif; font-weight:900; color:var(--color-acento); margin-bottom:16px; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">PRODUCTOS</h3>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-right">Precio</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->lineasTicket as $linea)
            <tr>
                <td>{{ $linea->nombre }}</td>
                <td class="text-center">{{ $linea->cantidad }}</td>
                <td class="text-right">{{ number_format($linea->precio, 2) }} €</td>
                <td class="text-right" style="color:var(--color-acento); font-weight:700;">{{ number_format($linea->subtotal, 2) }} €</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right" style="font-weight:700;">TOTAL</td>
                <td class="text-right" style="color:var(--color-acento); font-weight:700; font-size:18px;">{{ number_format($pedido->total, 2) }} €</td>
            </tr>
        </tfoot>
    </table>
</div>

<div style="margin-top:24px;">
    <a href="{{ route('admin.pedidos.edit', $pedido) }}" class="btn-admin btn-admin-warning">Editar pedido</a>
</div>
@endsection
