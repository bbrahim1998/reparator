<?php

/*
 * CONTROLADOR CATEGORÍAS
 *
 * Controlador principal que carga las categorías raíz
 * para mostrarlas en la página de inicio (welcome).
 */

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /*
     * Carga las categorías raíz (sin padre) para mostrarlas
     * en la página de inicio del sitio web.
     *
     * @return View
     */
    public function home(): View
    {
        /* Obtiene solo las categorías que son raíz (categoria_padre_id = 0) */
        $categorias = Categoria::where('categoria_padre_id', 0)->orderBy('nombre')->get();

        return view('welcome', compact('categorias'));
    }
}
