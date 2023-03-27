<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComponenteController;
use Illuminate\Support\Facades\Route;



Route::get('/',  [ComponenteController::class, 'getComponentes'])
    ->name('imain');

Route::get('/sobre-nosotros', function () {
    return view('Sobre_nosotros');
})->name('sobre');

Route::get('/categorias', [CategoriaController::class, 'getCategorias'])
    ->name('categorias');

Route::get('/productos', [ComponenteController::class, 'getCompoentesByCat'])
    ->name('productos');

