<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductoController extends Controller
{
    public function index(): View
    {
        $productos = Producto::with('categoria')->orderBy('id')->paginate(15);

        return view('admin.productos.index', compact('productos'));
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'imagen' => ['nullable', 'string', 'max:2048'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'solo_local' => ['nullable', 'boolean'],
            'solo_tienda' => ['nullable', 'boolean'],
            'stock' => ['required', 'integer', 'min:0'],
            'precio' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        ]);

        $categoria = Categoria::findOrFail($request->categoria_id);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'categoria_id' => $request->categoria_id,
            'solo_local' => $request->has('solo_local') ? (bool) $request->solo_local : $categoria->solo_local,
            'solo_tienda' => $request->has('solo_tienda') ? (bool) $request->solo_tienda : $categoria->solo_tienda,
            'stock' => $request->stock,
            'precio' => $request->precio,
        ]);

        return redirect()->route('admin.productos')->with('status', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto): View
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'imagen' => ['nullable', 'string', 'max:2048'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'solo_local' => ['nullable', 'boolean'],
            'solo_tienda' => ['nullable', 'boolean'],
            'stock' => ['required', 'integer', 'min:0'],
            'precio' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        ]);

        $categoria = Categoria::findOrFail($request->categoria_id);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'categoria_id' => $request->categoria_id,
            'solo_local' => $request->has('solo_local') ? (bool) $request->solo_local : $categoria->solo_local,
            'solo_tienda' => $request->has('solo_tienda') ? (bool) $request->solo_tienda : $categoria->solo_tienda,
            'stock' => $request->stock,
            'precio' => $request->precio,
        ]);

        return redirect()->route('admin.productos')->with('status', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();

        return redirect()->route('admin.productos')->with('status', 'Producto eliminado correctamente.');
    }
}
