@extends('layouts.admin')

@section('title', 'Administradores')

@section('content')
    <h1 class="page-title">ADMINISTRADORES</h1>
    <p class="page-subtitle">Gestiona los usuarios administradores del sistema</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.usuarios.create') }}" class="btn-admin btn-admin-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Nuevo administrador
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Registrado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td class="font-bold">{{ $usuario->id }}</td>
                            <td class="font-semibold">{{ $usuario->name }}</td>
                            <td class="text-white/70">{{ $usuario->email }}</td>
                            <td><span class="badge-admin">Administrador</span></td>
                            <td class="text-white/50 text-sm">{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn-admin btn-admin-warning">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                        </svg>
                                        Modificar
                                    </a>
                                    @if ($usuario->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario) }}" onsubmit="return confirm('¿Eliminar este administrador?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-admin btn-admin-danger">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M3 6h18M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-white/40 font-parrafos">
                                No hay administradores registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection
