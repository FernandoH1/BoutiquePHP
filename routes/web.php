<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::get('/xs', [ProductoController::class, 'productosViewXS'])->middleware('auth')->name('producto.xs');
Route::get('/s', [ProductoController::class, 'productosViewS'])->middleware('auth')->name('producto.s');  
Route::get('/m', [ProductoController::class, 'productosViewM'])->middleware('auth')->name('producto.m');    
Route::get('/l', [ProductoController::class, 'productosViewL'])->middleware('auth')->name('producto.l');
Route::get('/xl', [ProductoController::class, 'productosViewXL'])->middleware('auth')->name('producto.xl');
Route::get('/xxl', [ProductoController::class, 'productosViewXXL'])->middleware('auth')->name('producto.xxl');
Route::get('/xxxl', [ProductoController::class, 'productosViewXXXL'])->middleware('auth')->name('producto.xxxl');   


//Route::get('catalogo', [ProductoController::class, 'catalogo'])->middleware('auth')->name('producto.catalogo');




//Auth::routes();
Route::get('/home', [ProductoController::class, 'index'])->middleware('auth.admin')->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');
