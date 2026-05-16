@extends('layouts.admin')

@section('title', 'Pedidos')

@section('content')
<h1 class="page-title">PEDIDOS</h1>
<p class="page-subtitle">Gestiona los pedidos de tus clientes</p>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="card" style="overflow-x:auto;">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th style="text-align:right;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
            <tr>
                <td><strong>#{{ $pedido->id }}</strong></td>
                <td>{{ $pedido->user?->name ?? $pedido->name }} {{ $pedido->apellidos }}</td>
                <td class="precio">{{ number_format($pedido->total, 2) }} €</td>
                <td>
                    <span class="badge badge-yes">{{ $pedido->has_to_comment }}</span>
                </td>
                <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                <td style="text-align:right;">
                    <div style="display:flex; gap:8px; justify-content:flex-end;">
                        <a href="{{ route('admin.pedidos.show', $pedido) }}" class="btn-admin btn-admin-secondary">Ver</a>
                        <a href="{{ route('admin.pedidos.edit', $pedido) }}" class="btn-admin btn-admin-warning">Editar</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:40px; color:rgba(255,255,255,0.4);">No hay pedidos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $pedidos->links() }}
</div>
@endsection
