<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ComentsController;

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
    return view('home');
})->name('home');

Route::view('/login', "login")->middleware('guest')->name('login');
Route::view('/registro', "register")->middleware('guest')->name('registro');
//Route::view('/inicio', "home")->middleware('auth')->name('privada');
Route::view('/profile', "profile")->middleware('auth')->name('profile');
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/productos',[ProductsController::class,'listarPublico']) -> name('productos');

Route::get('/offline',function () {
    return view('vendor.laravelpwa.offline');
});


Route::get('productos', [ProductsController::class, 'show'])->name('productos');
Route::get('productos/busqueda', [ProductsController::class, 'busqueda'])->name('busqueda.simple');
Route::get('productos/{producto}', [ProductsController::class, 'productoVer'])->name('producto.mostrar');

Route::post('reseña',[ComentsController::class, 'store'])->name('calificar');

Route::get('/politica', function () { return view('politica'); })->name('politica');
Route::get('/nosotros', function () { return view('nosotros'); })->name('nosotros');