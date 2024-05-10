<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegociosController;

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

