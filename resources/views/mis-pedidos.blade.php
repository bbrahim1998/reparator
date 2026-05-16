@extends('layouts.master')

@section('title', 'Mis Pedidos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/mis-pedidos.css') }}">
@endsection

@section('content')
<div class="max-w-5xl mx-auto">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">MIS PEDIDOS</h1>

    @if($pedidos->count() === 0)
    <div class="text-center py-20">
        <p class="font-parrafos text-white/50 text-lg mb-6">No tienes ningún pedido todavía.</p>
        <a href="{{ route('servicios') }}"
           class="inline-block rounded-lg bg-[var(--color-acento)] px-8 py-4 font-titulos text-sm font-bold text-[var(--color-fondo)] transition-all duration-300 hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_20px_rgba(241,255,94,0.5)]">
            VER SERVICIOS
        </a>
    </div>
    @else
    <div class="space-y-4">
        @foreach($pedidos as $pedido)
        <a href="{{ route('mis-pedidos.show', $pedido) }}" class="pedido-card">
            <div class="pedido-card-header">
                <span class="pedido-id">#{{ $pedido->id }}</span>
                <span class="pedido-date">{{ $pedido->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="pedido-card-body">
                <div class="pedido-info">
                    <span class="pedido-label">Total</span>
                    <span class="pedido-value">{{ number_format($pedido->total, 2) }} €</span>
                </div>
                <div class="pedido-info">
                    <span class="pedido-label">Artículos</span>
                    <span class="pedido-value">{{ $pedido->lineasTicket->sum('cantidad') }}</span>
                </div>
            </div>
            <div class="pedido-card-footer">
                <span class="pedido-comment">{{ $pedido->has_to_comment }}</span>
                <span class="pedido-arrow">→</span>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $pedidos->links() }}
    </div>
    @endif
</div>
@endsection
