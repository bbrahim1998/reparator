<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\CategoriaController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [\App\Http\Controllers\AdminAuthController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\AdminAuthController::class, 'store']);
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('usuarios', [\App\Http\Controllers\AdminUserController::class, 'index'])
            ->name('admin.usuarios');
        Route::get('usuarios/crear', [\App\Http\Controllers\AdminUserController::class, 'create'])
            ->name('admin.usuarios.create');
        Route::post('usuarios', [\App\Http\Controllers\AdminUserController::class, 'store'])
            ->name('admin.usuarios.store');
        Route::get('usuarios/{user}/editar', [\App\Http\Controllers\AdminUserController::class, 'edit'])
            ->name('admin.usuarios.edit');
        Route::put('usuarios/{user}', [\App\Http\Controllers\AdminUserController::class, 'update'])
            ->name('admin.usuarios.update');
        Route::delete('usuarios/{user}', [\App\Http\Controllers\AdminUserController::class, 'destroy'])
            ->name('admin.usuarios.destroy');
    });

    Route::post('logout', [\App\Http\Controllers\AdminAuthController::class, 'destroy'])->name('admin.logout');
});

Route::view('/presentacion', 'presentacion', ['currentPage' => 'presentacion']);
Route::get('/servicios', [\App\Http\Controllers\ProductController::class, 'index']);
Route::view('/rrss', 'rrss', ['currentPage' => 'rrss']);
Route::view('/consultasyreclamaciones', 'consultasyreclamaciones', ['currentPage' => 'consultasyreclamaciones']);
Route::view('/onsom', 'onsom', ['currentPage' => 'onsom']);
Route::view('/faqs', 'faqs', ['currentPage' => 'faqs']);

require __DIR__.'/auth.php';
