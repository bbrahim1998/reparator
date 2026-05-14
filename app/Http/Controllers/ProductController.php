<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $productos = Producto::with('categoria')->orderBy('nombre')->get();

        return view('servicios', compact('productos') + ['currentPage' => 'servicios']);
    }
}
