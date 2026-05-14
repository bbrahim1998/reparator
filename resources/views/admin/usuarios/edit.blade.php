@extends('layouts.admin')

@section('title', 'Modificar Administrador')

@section('styles')
<style>
    .form-card { background: var(--color-secundario); border: 1px solid rgba(241,255,94,0.2); border-radius: 16px; padding: 32px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 24px rgba(0,0,0,0.2); }
    .form-group { margin-bottom: 24px; }
    .form-group label { display: block; font-family: 'sourcesanspro','Roboto',sans-serif; font-weight: 700; font-size: 14px; color: var(--color-acento); margin-bottom: 6px; text-transform: uppercase; letter-spacing: .5px; }
    .form-control { width: 100%; padding: 12px 16px; background: var(--color-fondo); border: 1px solid rgba(241,255,94,0.2); border-radius: 10px; color: var(--color-texto); font-family: 'Roboto',sans-serif; font-size: 15px; transition: all .3s ease; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--color-acento); box-shadow: 0 0 0 3px rgba(241,255,94,0.15); }
    .form-control::placeholder { color: rgba(255,255,255,0.3); }
    .form-error { color: #ef4444; font-family: 'Roboto',sans-serif; font-size: 13px; margin-top: 4px; }
    .form-help { color: rgba(255,255,255,0.4); font-family: 'Roboto',sans-serif; font-size: 12px; margin-top: 4px; }
    .flex-buttons { display: flex; gap: 12px; justify-content: flex-end; margin-top: 32px; padding-top: 20px; border-top: 1px solid rgba(241,255,94,0.15); }
</style>
@endsection

@section('content')
    <h1 class="page-title">MODIFICAR ADMINISTRADOR</h1>
    <p class="page-subtitle">Actualiza los datos del administrador</p>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.usuarios.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required autofocus>
                @error('name')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="password">Nueva contraseña <span class="text-white/40 text-xs" style="font-weight:400;text-transform:none;">(dejar vacío para mantener la actual)</span></label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres">
                <p class="form-help">Solo si quieres cambiar la contraseña. Mínimo 8 caracteres.</p>
                @error('password')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar nueva contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
            </div>

            <div class="flex-buttons">
                <a href="{{ route('admin.usuarios') }}" class="btn-admin btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin btn-admin-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
@endsection
