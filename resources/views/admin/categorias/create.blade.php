@extends('layouts.admin')

@section('title', 'Nueva Categoría')

@section('styles')
<style>
    .form-card { background: var(--color-secundario); border: 1px solid rgba(241, 255, 94, 0.2); border-radius: 16px; padding: 32px; max-width: 650px; margin: 0 auto; box-shadow: 0 4px 24px rgba(0,0,0,0.2); }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-grid .full-width { grid-column: 1 / -1; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-family: 'sourcesanspro','Roboto',sans-serif; font-weight: 700; font-size: 14px; color: var(--color-acento); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
    .form-control { width: 100%; padding: 12px 16px; background: var(--color-fondo); border: 1px solid rgba(241,255,94,0.2); border-radius: 10px; color: var(--color-texto); font-family: 'Roboto',sans-serif; font-size: 15px; transition: all .3s ease; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--color-acento); box-shadow: 0 0 0 3px rgba(241,255,94,0.15); }
    .form-control::placeholder { color: rgba(255,255,255,0.3); }
    .form-control option { background: var(--color-fondo); color: var(--color-texto); }
    select.form-control { cursor: pointer; }
    textarea.form-control { resize: vertical; min-height: 100px; }
    .form-error { color: #ef4444; font-family: 'Roboto',sans-serif; font-size: 13px; margin-top: 4px; }
    .form-help { color: rgba(255,255,255,0.4); font-family: 'Roboto',sans-serif; font-size: 12px; margin-top: 4px; }
    .checkbox-group { display: flex; align-items: center; gap: 10px; padding-top: 8px; }
    .checkbox-group input[type="checkbox"] { width: 18px; height: 18px; accent-color: var(--color-acento); cursor: pointer; }
    .checkbox-group label { font-family: 'Roboto',sans-serif; font-size: 14px; color: var(--color-texto); cursor: pointer; text-transform: none; letter-spacing: 0; font-weight: 400; }
    .flex-buttons { display: flex; gap: 12px; justify-content: flex-end; margin-top: 32px; padding-top: 20px; border-top: 1px solid rgba(241,255,94,0.15); }
</style>
@endsection

@section('content')
    <h1 class="page-title">NUEVA CATEGORÍA</h1>
    <p class="page-subtitle">Añade una nueva categoría al catálogo</p>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.categorias.store') }}">
            @csrf

            <div class="form-grid">
                <div class="form-group full-width">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre de la categoría" required autofocus>
                    @error('nombre')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripción de la categoría" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="imagen">Imagen (URL)</label>
                    <input id="imagen" type="url" name="imagen" value="{{ old('imagen') }}" class="form-control" placeholder="https://ejemplo.com/imagen.jpg">
                    @error('imagen')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="categoria_padre_id">Categoría padre</label>
                    <select id="categoria_padre_id" name="categoria_padre_id" class="form-control">
                        <option value="">Ninguna (categoría raíz)</option>
                        @foreach ($categorias as $padre)
                            <option value="{{ $padre->id }}" {{ old('categoria_padre_id') == $padre->id ? 'selected' : '' }}>{{ $padre->nombre }}</option>
                        @endforeach
                    </select>
                    <p class="form-help">Dejar vacío si es una categoría raíz.</p>
                    @error('categoria_padre_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label>Restricciones</label>
                    <div class="checkbox-group">
                        <input id="solo_local" type="checkbox" name="solo_local" value="1" {{ old('solo_local') ? 'checked' : '' }}>
                        <label for="solo_local">Solo local</label>
                    </div>
                    <div class="checkbox-group">
                        <input id="solo_tienda" type="checkbox" name="solo_tienda" value="1" {{ old('solo_tienda') ? 'checked' : '' }}>
                        <label for="solo_tienda">Solo tienda</label>
                    </div>
                    @error('solo_local')<p class="form-error">{{ $message }}</p>@enderror
                    @error('solo_tienda')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex-buttons">
                <a href="{{ route('admin.categorias') }}" class="btn-admin btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin btn-admin-primary">Crear categoría</button>
            </div>
        </form>
    </div>
@endsection
