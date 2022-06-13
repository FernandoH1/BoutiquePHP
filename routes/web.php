<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/catalogo', function () {
    return view('producto.catalogo');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('producto', ProductoController::class)->middleware('auth.admin');


Route::get('/catalogo', [ProductoController::class, 'catalogoView'])->middleware('auth')->name('producto.catalogo');
// Ruta para mostrar los talles de la DB
Route::get('/catalogo/{talle}/{color}/{marca}', [ProductoController::class, 'productosVariables'])->middleware('auth')->name('producto.talle');
//Ruta para mostrar por orden de precio
Route::get('/precio/{orden}', [ProductoController::class, 'productoOrdenarPorPrecio'])->middleware('auth')->name('producto.precio');


Route::get('/home', [ProductoController::class, 'index'])->middleware('auth.admin')->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');
