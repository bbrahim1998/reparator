@extends('layouts.master')

@section('title', 'Mis Favoritos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
@endsection

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">MIS FAVORITOS</h1>

    <div id="favoritosEmpty" class="hidden py-20 text-center">
        <svg class="mx-auto mb-4 text-white/20" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
        <p class="font-parrafos text-base text-[var(--color-texto)]">No tienes productos favoritos.</p>
        <a href="{{ route('servicios') }}" class="font-titulos inline-block mt-4 text-sm font-bold text-[var(--color-acento)] underline underline-offset-2 hover:text-white transition-colors">Ver servicios</a>
    </div>

    <div id="favoritosGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
</div>
@endsection

@section('scripts')
<script>
    window.__productos = @json($productosJson);
</script>
<script src="{{ asset('js/favoritos.js') }}"></script>
@endsection
