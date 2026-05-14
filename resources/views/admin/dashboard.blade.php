@extends('layouts.admin')

@section('title', 'Dashboard')

@section('styles')
<style>
    .dash-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }
    .dash-card {
        background: var(--color-secundario);
        border: 1px solid rgba(241, 255, 94, 0.15);
        border-radius: 16px;
        padding: 28px 24px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 12px;
    }
    .dash-card:hover {
        border-color: var(--color-acento);
        box-shadow: 0 0 20px rgba(241, 255, 94, 0.15);
        transform: translateY(-4px);
    }
    .dash-card .icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: rgba(241, 255, 94, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .dash-card .icon svg {
        width: 28px;
        height: 28px;
        color: var(--color-acento);
    }
    .dash-card .label {
        font-family: 'sourcesanspro', 'Roboto', sans-serif;
        font-weight: 700;
        font-size: 16px;
        color: var(--color-texto);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .dash-card .desc {
        font-family: 'Roboto', sans-serif;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.45);
        line-height: 1.4;
    }
    .dash-welcome {
        background: var(--color-secundario);
        border: 1px solid rgba(241, 255, 94, 0.15);
        border-radius: 16px;
        padding: 24px 28px;
        margin-top: 20px;
    }
    .dash-welcome p {
        font-family: 'Roboto', sans-serif;
        font-size: 15px;
        color: var(--color-texto);
    }
    .dash-welcome strong {
        color: var(--color-acento);
    }
</style>
@endsection

@section('content')
    <h1 class="page-title">DASHBOARD</h1>
    <p class="page-subtitle">Panel de administración de REPARATOR</p>

    <div class="dash-grid">
        <a href="{{ route('admin.usuarios') }}" class="dash-card">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <span class="label">Usuarios</span>
            <span class="desc">Gestiona los usuarios administradores</span>
        </a>

        <a href="{{ route('admin.categorias') }}" class="dash-card">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z"/>
                </svg>
            </div>
            <span class="label">Categorías</span>
            <span class="desc">Gestiona las categorías del catálogo</span>
        </a>

        <a href="{{ route('admin.productos') }}" class="dash-card">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18"/>
                    <path d="M16 10a4 4 0 0 1-8 0"/>
                </svg>
            </div>
            <span class="label">Productos</span>
            <span class="desc">Gestiona los productos del catálogo</span>
        </a>

        <a href="#" class="dash-card">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1.5"/>
                    <circle cx="18" cy="21" r="1.5"/>
                    <path d="M2 2h3l2 10h12l2-8H6"/>
                </svg>
            </div>
            <span class="label">Compras</span>
            <span class="desc">Gestiona las compras realizadas</span>
        </a>
    </div>

    <div class="dash-welcome">
        <p>Bienvenido, <strong>{{ Auth::user()->name }}</strong>. Tienes permisos de administrador.</p>
    </div>
@endsection
