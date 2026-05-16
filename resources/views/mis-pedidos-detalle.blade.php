@extends('layouts.master')

@section('title', 'Pedido #' . $pedido->id)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/mis-pedidos.css') }}">
<link rel="stylesheet" href="{{ asset('css/checkout-confirmacion.css') }}">
@endsection

@section('content')
<div class="confirmacion-container">
    <div class="mb-6">
        <a href="{{ route('mis-pedidos') }}" class="font-parrafos text-sm text-[var(--color-acento)] hover:underline">&larr; Volver a mis pedidos</a>
    </div>

    <h1 class="confirmacion-title" style="text-align:left; margin-bottom:32px;">PEDIDO #{{ $pedido->id }}</h1>

    <div class="confirmacion-grid">
        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DATOS DEL PEDIDO</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Fecha</span>
                <span class="confirmacion-value">{{ $pedido->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Estado</span>
                <span class="confirmacion-value">{{ $pedido->has_to_comment }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Cliente</span>
                <span class="confirmacion-value">{{ $pedido->name }} {{ $pedido->apellidos }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Email</span>
                <span class="confirmacion-value">{{ $pedido->email }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Teléfono</span>
                <span class="confirmacion-value">{{ $pedido->telefono }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Distancia</span>
                <span class="confirmacion-value">{{ $pedido->distancia }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Tarjeta</span>
                <span class="confirmacion-value">****{{ $pedido->ultimos_cuatro }}</span>
            </div>
        </div>

        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DIRECCIÓN DE ENVÍO</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Dirección</span>
                <span class="confirmacion-value">{{ $pedido->envio_tipo_via }} {{ $pedido->envio_nombre_via }}, {{ $pedido->envio_numero }}{{ $pedido->envio_piso_puerta ? ', '.$pedido->envio_piso_puerta : '' }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">C. Postal</span>
                <span class="confirmacion-value">{{ $pedido->envio_codigo_postal }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Municipio</span>
                <span class="confirmacion-value">{{ $pedido->envio_municipio }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Provincia</span>
                <span class="confirmacion-value">{{ $pedido->envio_provincia }}</span>
            </div>
            @if($pedido->envio_info_adicional)
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Info adicional</span>
                <span class="confirmacion-value">{{ $pedido->envio_info_adicional }}</span>
            </div>
            @endif
        </div>

        @if($pedido->facturacion_tipo_via)
        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DIRECCIÓN DE FACTURACIÓN</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Dirección</span>
                <span class="confirmacion-value">{{ $pedido->facturacion_tipo_via }} {{ $pedido->facturacion_nombre_via }}, {{ $pedido->facturacion_numero }}{{ $pedido->facturacion_piso_puerta ? ', '.$pedido->facturacion_piso_puerta : '' }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">C. Postal</span>
                <span class="confirmacion-value">{{ $pedido->facturacion_codigo_postal }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Municipio</span>
                <span class="confirmacion-value">{{ $pedido->facturacion_municipio }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Provincia</span>
                <span class="confirmacion-value">{{ $pedido->facturacion_provincia }}</span>
            </div>
            @if($pedido->facturacion_info_adicional)
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Info adicional</span>
                <span class="confirmacion-value">{{ $pedido->facturacion_info_adicional }}</span>
            </div>
            @endif
        </div>
        @endif

        <div class="confirmacion-card confirmacion-card-full">
            <h2 class="confirmacion-card-title">PRODUCTOS</h2>

            <div class="confirmacion-table-header">
                <span>Producto</span>
                <span>Cant.</span>
                <span>Precio</span>
                <span>Subtotal</span>
            </div>

            @foreach($pedido->lineasTicket as $linea)
            <div class="confirmacion-table-row">
                <span class="confirmacion-product-name">{{ $linea->nombre }}</span>
                <span class="confirmacion-product-qty">{{ $linea->cantidad }}</span>
                <span class="confirmacion-product-price">{{ number_format($linea->precio, 2) }} €</span>
                <span class="confirmacion-product-subtotal">{{ number_format($linea->subtotal, 2) }} €</span>
            </div>
            @endforeach

            <div class="confirmacion-total-row">
                <span class="confirmacion-total-label">TOTAL</span>
                <span class="confirmacion-total-value">{{ number_format($pedido->total, 2) }} €</span>
            </div>
        </div>
    </div>
</div>
@endsection
