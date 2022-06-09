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
Route::get('/catalogo/{talle}/{color}', [ProductoController::class, 'productosVariables'])->middleware('auth')->name('producto.talle');
//Ruta para mostrar por orden de precio
Route::get('/precio/{orden}', [ProductoController::class, 'productoOrdenarPorPrecio'])->middleware('auth')->name('producto.precio');

Route::get('/menor', [ProductoController::class, 'productosMenor'])->middleware('auth')->name('producto.preciom');
Route::get('/mayor', [ProductoController::class, 'productosMayor'])->middleware('auth')->name('producto.precioM');

Route::get('/nike', [ProductoController::class, 'productosMarcaNike'])->middleware('auth')->name('producto.nike'); 
Route::get('/adidas', [ProductoController::class, 'productosMarcaAdidas'])->middleware('auth')->name('producto.adidas'); 
Route::get('/marcel', [ProductoController::class, 'productosMarcaMarcel'])->middleware('auth')->name('producto.marcel'); 
Route::get('/Negro', [ProductoController::class, 'productosColorNegro'])->middleware('auth')->name('producto.negro'); 
Route::get('/Azul', [ProductoController::class, 'productosColorAzul'])->middleware('auth')->name('producto.azul');
Route::get('/Marron', [ProductoController::class, 'productosColorMarron'])->middleware('auth')->name('producto.marron');
Route::get('/Verde', [ProductoController::class, 'productosColorVerde'])->middleware('auth')->name('producto.verde');
Route::get('/Rojo', [ProductoController::class, 'productosColorRojo'])->middleware('auth')->name('producto.rojo');
Route::get('/Amarillo', [ProductoController::class, 'productosColorAmarillo'])->middleware('auth')->name('producto.amarillo');
Route::get('/Blanco', [ProductoController::class, 'productosColorBlanco'])->middleware('auth')->name('producto.blanco');


Route::get('/home', [ProductoController::class, 'index'])->middleware('auth.admin')->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');
