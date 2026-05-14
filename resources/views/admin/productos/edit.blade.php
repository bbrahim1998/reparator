@extends('layouts.admin')

@section('title', 'Modificar Producto')

@section('styles')
<style>
    .form-card { background: var(--color-secundario); border: 1px solid rgba(241,255,94,0.2); border-radius: 16px; padding: 32px; max-width: 700px; margin: 0 auto; box-shadow: 0 4px 24px rgba(0,0,0,0.2); }
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
    <h1 class="page-title">MODIFICAR PRODUCTO</h1>
    <p class="page-subtitle">Actualiza los datos del producto</p>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.productos.update', $producto) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group full-width">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required autofocus>
                    @error('nombre')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="imagen">Imagen (URL)</label>
                    <input id="imagen" type="url" name="imagen" value="{{ old('imagen', $producto->imagen) }}" class="form-control" placeholder="https://ejemplo.com/imagen.jpg">
                    @error('imagen')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <select id="categoria_id" name="categoria_id" class="form-control" required>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="precio">Precio (€)</label>
                    <input id="precio" type="number" step="0.01" min="0" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" required>
                    @error('precio')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input id="stock" type="number" min="0" name="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required>
                    @error('stock')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label>Restricciones</label>
                    <div class="checkbox-group">
                        <input id="solo_local" type="checkbox" name="solo_local" value="1" {{ old('solo_local', $producto->solo_local) ? 'checked' : '' }}>
                        <label for="solo_local">Solo local</label>
                    </div>
                    <div class="checkbox-group">
                        <input id="solo_tienda" type="checkbox" name="solo_tienda" value="1" {{ old('solo_tienda', $producto->solo_tienda) ? 'checked' : '' }}>
                        <label for="solo_tienda">Solo tienda</label>
                    </div>
                    <p class="form-help">Si se deja desmarcado, hereda el valor de la categoría.</p>
                    @error('solo_local')<p class="form-error">{{ $message }}</p>@enderror
                    @error('solo_tienda')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex-buttons">
                <a href="{{ route('admin.productos') }}" class="btn-admin btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin btn-admin-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
@endsection
