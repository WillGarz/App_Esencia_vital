<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ContactoController;


Route::get('/', function () {
    return view('welcome');
});



Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
Route::get('/comentarios', [ComentariosController::class, 'index'])->name('comentarios');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

