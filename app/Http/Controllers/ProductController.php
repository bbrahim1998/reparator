<?php

/*
 * CONTROLADOR PRODUCTOS
 *
 * Gestiona la visualización del catálogo de productos,
 * el detalle individual de cada producto y el envío
 * de consultas de los usuarios sobre productos específicos.
 */

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Consulta;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /*
     * Muestra el catálogo completo de productos con sus categorías,
     * ordenados alfabéticamente. También carga las categorías
     * para los filtros de navegación.
     *
     * @return View
     */
    public function index(): View
    {
        $productos = Producto::with('categoria')->orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('servicios', compact('productos', 'categorias') + ['currentPage' => 'servicios']);
    }

    /*
     * Muestra el detalle de un producto individual
     * con su categoría asociada.
     *
     * @param Producto $producto Modelo inyectado por route model binding
     * @return View
     */
    public function show(Producto $producto): View
    {
        $producto->load('categoria');

        return view('producto-detalle', compact('producto') + ['currentPage' => 'servicios']);
    }

    /*
     * Procesa el envío de una consulta sobre un producto.
     * Si el usuario está autenticado, rellena automáticamente
     * sus datos personales.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function consulta(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'producto_id' => 'required|integer|exists:productos,id',
            'mensaje' => 'required|string|max:5000',
        ]);

        /* Si el usuario está logueado, usa sus datos en lugar de los del formulario */
        if (auth()->check()) {
            $user = auth()->user();
            $data['nombre'] = $user->name;
            $data['apellidos'] = $user->apellidos;
            $data['email'] = $user->email;
        }

        Consulta::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'mail' => $data['email'],
            'producto_id' => $data['producto_id'],
            'consulta' => $data['mensaje'],
        ]);

        return redirect()->back()->with('success', 'Consulta enviada correctamente. Te responderemos lo antes posible.');
    }
}
