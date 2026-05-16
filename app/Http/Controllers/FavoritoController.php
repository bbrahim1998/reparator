<?php

/*
 * CONTROLADOR FAVORITOS
 *
 * Se encarga de mostrar la vista de productos favoritos,
 * cargando todos los productos con sus categorías para
 * que el usuario pueda explorarlos.
 */

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\View\View;

class FavoritoController extends Controller
{
    /*
     * Muestra el listado completo de productos con sus categorías.
     * Prepara también un array JSON con los datos necesarios
     * para que el frontend pueda filtrar y buscar.
     *
     * @return View
     */
    public function index(): View
    {
        /* Carga todos los productos con su categoría, ordenados alfabéticamente */
        $productos = Producto::with('categoria')->orderBy('nombre')->get();
        /* Genera un array simplificado en JSON para uso en el frontend (búsqueda/filtros) */
        $productosJson = $productos->map(fn($p) => [
            'id' => $p->id,
            'nombre' => $p->nombre,
            'descripcion' => $p->descripcion,
            'imagen' => asset($p->imagen),
            'precio' => $p->precio,
        ]);
        return view('favoritos', compact('productos', 'productosJson') + ['currentPage' => 'favoritos']);
    }
}
