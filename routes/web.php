<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/presentacion', 'presentacion', ['currentPage' => 'presentacion']);
Route::view('/servicios', 'servicios', ['currentPage' => 'servicios']);
Route::view('/rrss', 'rrss', ['currentPage' => 'rrss']);
Route::view('/consultasyreclamaciones', 'consultasyreclamaciones', ['currentPage' => 'consultasyreclamaciones']);
Route::view('/onsom', 'onsom', ['currentPage' => 'onsom']);
Route::view('/faqs', 'faqs', ['currentPage' => 'faqs']);

require __DIR__.'/auth.php';
