<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Modulos\Inventario\ListaPreciosProductos;
use App\Livewire\Modulos\Compras\Compras;



Route::get('/', function () {
    return view('auth.login');
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

Route::get('/usuarios', function () {
    return view('modulos.administracion.usuarios');
})->middleware(['auth'])->name('usuarios');


Route::get('/empleados', function () {
    return view('modulos.recursos-humanos.empleados');
})->middleware(['auth'])->name('empleados');

Route::get('/clientes', function () {
    return view('modulos.socios-negocio.clientes');
})->middleware(['auth'])->name('clientes');

Route::get('/proveedores', function () {
    return view('modulos.socios-negocio.proveedores');
})->middleware(['auth'])->name('proveedores');

Route::get('/productos', function () {
    return view('modulos.inventario.productos');
})->middleware(['auth'])->name('productos');

Route::get('/almacenes', function () {
    return view('modulos.inventario.almacenes');
})->middleware(['auth'])->name('almacenes');

Route::get('/categorias', function () {
    return view('modulos.inventario.categorias');
})->middleware(['auth'])->name('categorias');

Route::get('/lista-precios', function () {
    return view('modulos.inventario.lista-precios');
})->middleware(['auth'])->name('lista-precios');

Route::get('/lista-precios-productos/{listaPrecioId}', ListaPreciosProductos::class)
    ->middleware(['auth'])
    ->name('lista-precios-productos');


Route::get('/compras', function () {
    return view('modulos.compras.compras');
})->middleware(['auth'])->name('compras');

Route::get('/ventas', function () {
    return view('modulos.ventas.ventas');
})->middleware(['auth'])->name('ventas');


/// Reportes de productos
Route::get('/ReporteProductos', function () {
    return view('modulos.reportes.ReporteProductos');
})->middleware(['auth'])->name('ReporteProductos');



//////reportes PDF 
Route::get('/reportes', function () {
    return view('reportes.reportes');
})->middleware(['auth'])->name('reportes');



use App\Http\Controllers\ReporteProductosController;
Route::get('reporte-productos/pdf/{almacen_id}', [ReporteProductosController::class, 'exportarPDF'])->name('reporte.productos.pdf');


use App\Http\Controllers\ReporteVentasController;
Route::get('/ventas/pdf/{id}', [ReporteVentasController::class, 'exportarPDF'])->name('ventas.exportar.pdf');


use App\Livewire\Modulos\Reportes\ReporteVentas;
Route::get('/reporte-ventas', ReporteVentas::class)->name('reporte.ventas');


use App\Livewire\Modulos\Reportes\ReporteCompras;
Route::get('/reporte-compras', ReporteCompras::class)->name('reporte.compras');
