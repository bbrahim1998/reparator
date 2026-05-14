<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function home(): View
    {
        $categorias = Categoria::where('categoria_padre_id', 0)->orderBy('nombre')->get();

        return view('welcome', compact('categorias'));
    }
}
