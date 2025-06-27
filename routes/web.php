<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/empleados', function () {
    return view('modulos.recursos-humanos.empleados');
})->middleware(['auth'])->name('empleados');

Route::get('/productos', function () {
    return view('modulos.inventario.productos');
})->middleware(['auth'])->name('productos');

Route::get('/almacenes', function () {
    return view('modulos.inventario.almacenes');
})->middleware(['auth'])->name('almacenes');
