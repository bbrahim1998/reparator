@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
    <h1 class="page-title">PRODUCTOS</h1>
    <p class="page-subtitle">Gestiona los productos del catálogo</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.productos.create') }}" class="btn-admin btn-admin-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Crear producto
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Solo local</th>
                        <th>Solo tienda</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="font-bold">{{ $producto->id }}</td>
                            <td class="font-semibold">{{ $producto->nombre }}</td>
                            <td class="text-white/70 max-w-[250px] truncate">{{ $producto->descripcion }}</td>
                            <td>
                                @if ($producto->categoria)
                                    <span class="text-white/70">{{ $producto->categoria->nombre }}</span>
                                @else
                                    <span class="text-white/30 italic">—</span>
                                @endif
                            </td>
                            <td><span class="precio">{{ number_format($producto->precio, 2) }} €</span></td>
                            <td>
                                <span class="badge {{ $producto->stock > 0 ? 'badge-stock' : 'badge-stock-low' }}">
                                    {{ $producto->stock }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $producto->solo_local ? 'badge-yes' : 'badge-no' }}">
                                    {{ $producto->solo_local ?? '—' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $producto->solo_tienda ? 'badge-yes' : 'badge-no' }}">
                                    {{ $producto->solo_tienda ?? '—' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.productos.edit', $producto) }}" class="btn-admin btn-admin-warning">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                        </svg>
                                        Modificar
                                    </a>
                                    <form method="POST" action="{{ route('admin.productos.destroy', $producto) }}" onsubmit="return confirm('¿Eliminar este producto?')">
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
                            <td colspan="10" class="text-center py-12 text-white/40 font-parrafos">
                                No hay productos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $productos->links() }}
        </div>
    </div>
@endsection
