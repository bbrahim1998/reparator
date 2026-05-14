@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
    <h1 class="page-title">CATEGORÍAS</h1>
    <p class="page-subtitle">Gestiona las categorías del catálogo</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.categorias.create') }}" class="btn-admin btn-admin-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Crear categoría
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Padre</th>
                        <th>Imagen</th>
                        <th>Solo local</th>
                        <th>Solo tienda</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                        <tr>
                            <td class="font-bold">{{ $categoria->id }}</td>
                            <td class="font-semibold">{{ $categoria->nombre }}</td>
                            <td class="text-white/70 max-w-[250px] truncate">{{ $categoria->descripcion }}</td>
                            <td>
                                @if ($categoria->categoria_padre_id && $categoria->padre)
                                    <span class="text-white/70">{{ $categoria->padre->nombre }}</span>
                                @else
                                    <span class="text-white/30 italic">—</span>
                                @endif
                            </td>
                            <td>
                                @if ($categoria->imagen)
                                    <span class="text-white/70 text-xs truncate block max-w-[120px]">{{ $categoria->imagen }}</span>
                                @else
                                    <span class="text-white/30 italic">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $categoria->solo_local ? 'badge-yes' : 'badge-no' }}">
                                    {{ $categoria->solo_local ? 'Sí' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $categoria->solo_tienda ? 'badge-yes' : 'badge-no' }}">
                                    {{ $categoria->solo_tienda ? 'Sí' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn-admin btn-admin-warning">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                        </svg>
                                        Modificar
                                    </a>
                                    <form method="POST" action="{{ route('admin.categorias.destroy', $categoria) }}" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-admin btn-admin-danger">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 6h18M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-white/40 font-parrafos">
                                No hay categorías registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $categorias->links() }}
        </div>
    </div>
@endsection
