<?php

use App\Http\Controllers\AdminCategoriaController;
use App\Http\Controllers\AdminProductoController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('categorias', [AdminCategoriaController::class, 'index'])
        ->name('admin.categorias');
    Route::get('categorias/crear', [AdminCategoriaController::class, 'create'])
        ->name('admin.categorias.create');
    Route::post('categorias', [AdminCategoriaController::class, 'store'])
        ->name('admin.categorias.store');
    Route::get('categorias/{categoria}/editar', [AdminCategoriaController::class, 'edit'])
        ->name('admin.categorias.edit');
    Route::put('categorias/{categoria}', [AdminCategoriaController::class, 'update'])
        ->name('admin.categorias.update');
    Route::delete('categorias/{categoria}', [AdminCategoriaController::class, 'destroy'])
        ->name('admin.categorias.destroy');

    Route::get('productos', [AdminProductoController::class, 'index'])
        ->name('admin.productos');
    Route::get('productos/crear', [AdminProductoController::class, 'create'])
        ->name('admin.productos.create');
    Route::post('productos', [AdminProductoController::class, 'store'])
        ->name('admin.productos.store');
    Route::get('productos/{producto}/editar', [AdminProductoController::class, 'edit'])
        ->name('admin.productos.edit');
    Route::put('productos/{producto}', [AdminProductoController::class, 'update'])
        ->name('admin.productos.update');
    Route::delete('productos/{producto}', [AdminProductoController::class, 'destroy'])
        ->name('admin.productos.destroy');
});
