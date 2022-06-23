<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// Route::get('/', function () {
//     return view('home');
// })->middleware('auth.admin');

Route::get('/catalogo', function () {
    return view('producto.catalogo');
})->middleware('auth');

Auth::routes();

Route::post('/cart/add', [CartController::class, 'postCartAdd'])->middleware('auth')->name('cart.add');

Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');

Route::get('/home/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('home.admin')->middleware('auth.admin');

Route::resource('producto', ProductoController::class)->middleware('auth.admin');

// Route::get('/carrito', [CartController::class, 'index'])->middleware('auth')->name('carrito.cart');

Route::get('/cart', [CartController::class, 'getCart'])->middleware('auth')->name('cart');
Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->middleware('auth')->name('cart.destroy');
Route::get('/cart/{id}', [CartController::class, 'show'])->middleware('auth')->name('cart.show');

Route::get('/count/{id}', [ProductoController::class, 'contadorCarrito'])->middleware('auth')->name('producto.count');

Route::get('/catalogo', [ProductoController::class, 'catalogoView'])->middleware('auth')->name('producto.catalogo');
// Ruta para mostrar los talles de la DB
Route::get('/catalogo/{talle}/{color}/{marca}/{orden}', [ProductoController::class, 'productosVariables'])->middleware('auth')->name('producto.talle');
//Ruta para mostrar por orden de precio
Route::get('/precio/{orden}', [ProductoController::class, 'productoOrdenarPorPrecio'])->middleware('auth')->name('producto.precio');


Route::get('/home', [ProductoController::class, 'index'])->middleware('auth.admin')->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');
