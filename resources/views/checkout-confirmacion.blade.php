@extends('layouts.master')

@section('title', 'Compra Confirmada')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/checkout-confirmacion.css') }}">
@endsection

@section('content')
<div class="confirmacion-container">
    <div class="confirmacion-header">
        <div class="confirmacion-check-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M20 6L9 17l-5-5"/>
            </svg>
        </div>
        <h1 class="confirmacion-title">COMPRA CONFIRMADA</h1>
        <p class="confirmacion-subtitle">Gracias por tu pedido. A continuación te mostramos el resumen de la compra.</p>
    </div>

    <div class="confirmacion-grid">
        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DATOS DE FACTURACIÓN</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Nombre</span>
                <span class="confirmacion-value">{{ $data['name'] }} {{ $data['apellidos'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Email</span>
                <span class="confirmacion-value">{{ $data['email'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Teléfono</span>
                <span class="confirmacion-value">{{ $data['telefono'] }}</span>
            </div>
        </div>

        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DIRECCIÓN DE ENVÍO</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Dirección</span>
                <span class="confirmacion-value">
                    {{ $data['envio_tipo_via'] }} {{ $data['envio_nombre_via'] }}, {{ $data['envio_numero'] }}
                    @if($data['envio_piso_puerta']), {{ $data['envio_piso_puerta'] }}@endif
                </span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Código Postal</span>
                <span class="confirmacion-value">{{ $data['envio_codigo_postal'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Municipio</span>
                <span class="confirmacion-value">{{ $data['envio_municipio'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Provincia</span>
                <span class="confirmacion-value">{{ $data['envio_provincia'] }}</span>
            </div>
            @if($data['envio_info_adicional'])
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Info. adicional</span>
                <span class="confirmacion-value">{{ $data['envio_info_adicional'] }}</span>
            </div>
            @endif
            @if($data['distancia'])
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Distancia</span>
                <span class="confirmacion-value">{{ $data['distancia'] }}</span>
            </div>
            @endif
        </div>

        @if($data['facturacion_tipo_via'])
        <div class="confirmacion-card">
            <h2 class="confirmacion-card-title">DIRECCIÓN DE FACTURACIÓN</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Dirección</span>
                <span class="confirmacion-value">
                    {{ $data['facturacion_tipo_via'] }} {{ $data['facturacion_nombre_via'] }}, {{ $data['facturacion_numero'] }}
                    @if($data['facturacion_piso_puerta']), {{ $data['facturacion_piso_puerta'] }}@endif
                </span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Código Postal</span>
                <span class="confirmacion-value">{{ $data['facturacion_codigo_postal'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Municipio</span>
                <span class="confirmacion-value">{{ $data['facturacion_municipio'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Provincia</span>
                <span class="confirmacion-value">{{ $data['facturacion_provincia'] }}</span>
            </div>
            @if($data['facturacion_info_adicional'])
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Info. adicional</span>
                <span class="confirmacion-value">{{ $data['facturacion_info_adicional'] }}</span>
            </div>
            @endif
        </div>
        @endif

        <div class="confirmacion-card confirmacion-card-full">
            <h2 class="confirmacion-card-title">PAGO</h2>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Titular</span>
                <span class="confirmacion-value">{{ $data['card_holder'] }}</span>
            </div>
            <div class="confirmacion-data-row">
                <span class="confirmacion-label">Tarjeta</span>
                <span class="confirmacion-value">**** **** **** {{ $lastFour }}</span>
            </div>
        </div>

        <div class="confirmacion-card confirmacion-card-full">
            <h2 class="confirmacion-card-title">DETALLE DE LA COMPRA</h2>

            <div class="confirmacion-table-header">
                <span>Producto</span>
                <span>Cant.</span>
                <span>Precio</span>
                <span>Subtotal</span>
            </div>

            @foreach($data['cart_data'] as $item)
            <div class="confirmacion-table-row">
                <span class="confirmacion-product-name">{{ $item['name'] }}</span>
                <span class="confirmacion-product-qty">{{ $item['quantity'] }}</span>
                <span class="confirmacion-product-price">{{ number_format($item['price'], 2) }} €</span>
                <span class="confirmacion-product-subtotal">{{ number_format($item['price'] * $item['quantity'], 2) }} €</span>
            </div>
            @endforeach

            <div class="confirmacion-total-row">
                <span class="confirmacion-total-label">TOTAL</span>
                <span class="confirmacion-total-value">{{ number_format($total, 2) }} €</span>
            </div>
        </div>
    </div>

    <div class="confirmacion-footer">
        <a href="{{ route('servicios') }}" class="confirmacion-btn">VOLVER A SERVICIOS</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    localStorage.removeItem('reparator_cart');
    if (typeof updateCartBadge === 'function') {
        updateCartBadge();
    }
</script>
@endsection
