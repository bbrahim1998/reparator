<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['currentPage' => 'home']);
});

Route::get('/onsom', function () {
    return view('onsom', ['currentPage' => 'onsom']);
});

Route::get('/servicios', function () {
    return view('servicios', ['currentPage' => 'servicios']);
});

Route::get('/presentacion', function () {
    return view('presentacion', ['currentPage' => 'presentacion']);
});

Route::get('/faqs', function () {
    return view('faqs', ['currentPage' => 'faqs']);
});

Route::get('/consultasyreclamaciones', function () {
    return view('consultasyreclamaciones', ['currentPage' => 'consultasyreclamaciones']);
});

Route::get('/rrss', function () {
    return view('rrss', ['currentPage' => 'rrss']);
});
