<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\NegociosController;
use App\Http\Controllers\ProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/verificar', [App\Http\Controllers\HomeController::class, 'verificar'])->name('verificarOTP');
    Route::get('/reenviar', [App\Http\Controllers\HomeController::class, 'reenviar'])->name('reenviarOTP');

    // para negocios
    Route::get('/negocios', [NegociosController::class, 'index'])->name('negocios.index');
    Route::get('/negocios/registrar', [NegociosController::class, 'create'])->name('negocios.create');
    Route::post('/negocios/registrar', [NegociosController::class, 'store'])->name('negocios.store');
    Route::get('/negocios/actualizar/{id}', [NegociosController::class, 'edit'])->name('negocios.edit');
    Route::put('/negocios/actualizar/{id}', [NegociosController::class, 'update'])->name('negocios.update');
    Route::get('/negocios/estado/{id}', [NegociosController::class, 'estado'])->name('negocios.estado');
    Route::get('/negocios/ver/{id}', [NegociosController::class, 'show'])->name('negocios.show');

    // para productos
    Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('/productos/registrar', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/productos/registrar', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('/productos/actualizar/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/actualizar/{id}', [ProductosController::class, 'update'])->name('productos.update');
    Route::get('/productos/estado/{id}', [ProductosController::class, 'estado'])->name('productos.estado');

    // para pedidos
    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/registrar', [PedidosController::class, 'create'])->name('pedidos.create');
    Route::get('/pedidos/estado/{id}/{estado}', [PedidosController::class, 'estado'])->name('pedidos.estado');
    Route::get('/pedidos/ver/{id}', [PedidosController::class, 'show'])->name('pedidos.show');


});

