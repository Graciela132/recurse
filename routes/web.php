<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',  [\App\Http\Controllers\ComponenteController::class, 'getComponentes'])->name('imain');

Route::get('/sobre-nosotros', function () {
    return view('Sobre_nosotros');
})->name('sobre');

Route::get('/categorias', function () {
    return view('categorias');
})->name('categorias');

