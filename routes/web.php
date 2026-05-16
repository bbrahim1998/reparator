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

        Route::get('clientes', [\App\Http\Controllers\AdminClienteController::class, 'index'])
            ->name('admin.clientes');
        Route::get('clientes/crear', [\App\Http\Controllers\AdminClienteController::class, 'create'])
            ->name('admin.clientes.create');
        Route::post('clientes', [\App\Http\Controllers\AdminClienteController::class, 'store'])
            ->name('admin.clientes.store');
        Route::get('clientes/{user}/editar', [\App\Http\Controllers\AdminClienteController::class, 'edit'])
            ->name('admin.clientes.edit');
        Route::put('clientes/{user}', [\App\Http\Controllers\AdminClienteController::class, 'update'])
            ->name('admin.clientes.update');
        Route::delete('clientes/{user}', [\App\Http\Controllers\AdminClienteController::class, 'destroy'])
            ->name('admin.clientes.destroy');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('pedidos', [\App\Http\Controllers\AdminPedidoController::class, 'index'])->name('admin.pedidos');
    Route::get('pedidos/{pedido}', [\App\Http\Controllers\AdminPedidoController::class, 'show'])->name('admin.pedidos.show');
    Route::get('pedidos/{pedido}/editar', [\App\Http\Controllers\AdminPedidoController::class, 'edit'])->name('admin.pedidos.edit');
    Route::put('pedidos/{pedido}', [\App\Http\Controllers\AdminPedidoController::class, 'update'])->name('admin.pedidos.update');
});

Route::post('logout', [\App\Http\Controllers\AdminAuthController::class, 'destroy'])->name('admin.logout');
});

Route::view('/presentacion', 'presentacion', ['currentPage' => 'presentacion']);
Route::get('/servicios', [\App\Http\Controllers\ProductController::class, 'index'])->name('servicios');
Route::get('/servicio/{producto}', [\App\Http\Controllers\ProductController::class, 'show'])->name('producto.detalle');
Route::post('/consulta-producto', [\App\Http\Controllers\ProductController::class, 'consulta'])->name('producto.consulta');
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/confirmacion', [\App\Http\Controllers\CheckoutController::class, 'confirmacion'])->name('checkout.confirmacion');
});
Route::view('/rrss', 'rrss', ['currentPage' => 'rrss']);
Route::view('/consultasyreclamaciones', 'consultasyreclamaciones', ['currentPage' => 'consultasyreclamaciones']);
Route::view('/onsom', 'onsom', ['currentPage' => 'onsom']);
Route::middleware('auth')->group(function () {
    Route::get('/mi-cuenta', [\App\Http\Controllers\MiCuentaController::class, 'edit'])->name('mi-cuenta');
    Route::put('/mi-cuenta', [\App\Http\Controllers\MiCuentaController::class, 'update'])->name('mi-cuenta.update');
    Route::get('/mis-pedidos', [\App\Http\Controllers\PedidoController::class, 'index'])->name('mis-pedidos');
    Route::get('/mis-pedidos/{pedido}', [\App\Http\Controllers\PedidoController::class, 'show'])->name('mis-pedidos.show');
});

Route::get('/favoritos', [\App\Http\Controllers\FavoritoController::class, 'index'])->name('favoritos');
Route::view('/faqs', 'faqs', ['currentPage' => 'faqs']);
Route::view('/aviso-legal', 'aviso-legal', ['currentPage' => 'aviso-legal'])->name('aviso-legal');
Route::view('/politica-cookies', 'politica-cookies', ['currentPage' => 'politica-cookies'])->name('politica-cookies');
Route::view('/politica-envio', 'politica-envio', ['currentPage' => 'politica-envio'])->name('politica-envio');

require __DIR__.'/auth.php';
