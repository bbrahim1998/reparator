<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::with('padre')->orderBy('id')->paginate(15);

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.categorias.create', compact('categorias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'categoria_padre_id' => ['nullable', 'integer', 'min:0', 'exists:categorias,id'],
            'imagen' => ['nullable', 'string', 'max:2048'],
            'solo_local' => ['nullable', 'boolean'],
            'solo_tienda' => ['nullable', 'boolean'],
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_padre_id' => $request->filled('categoria_padre_id') ? $request->categoria_padre_id : 0,
            'imagen' => $request->imagen,
            'solo_local' => $request->boolean('solo_local'),
            'solo_tienda' => $request->boolean('solo_tienda'),
        ]);

        return redirect()->route('admin.categorias')->with('status', 'Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria): View
    {
        $categorias = Categoria::where('id', '!=', $categoria->id)->orderBy('nombre')->get();

        return view('admin.categorias.edit', compact('categoria', 'categorias'));
    }

    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'categoria_padre_id' => ['nullable', 'integer', 'min:0', 'exists:categorias,id'],
            'imagen' => ['nullable', 'string', 'max:2048'],
            'solo_local' => ['nullable', 'boolean'],
            'solo_tienda' => ['nullable', 'boolean'],
        ]);

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_padre_id' => $request->filled('categoria_padre_id') ? $request->categoria_padre_id : 0,
            'imagen' => $request->imagen,
            'solo_local' => $request->boolean('solo_local'),
            'solo_tienda' => $request->boolean('solo_tienda'),
        ]);

        return redirect()->route('admin.categorias')->with('status', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->hijos()->exists()) {
            return redirect()->route('admin.categorias')->with('error', 'No se puede eliminar: tiene subcategorías asociadas.');
        }

        if ($categoria->productos()->exists()) {
            return redirect()->route('admin.categorias')->with('error', 'No se puede eliminar: tiene productos asociados.');
        }

        $categoria->delete();

        return redirect()->route('admin.categorias')->with('status', 'Categoría eliminada correctamente.');
    }
}
