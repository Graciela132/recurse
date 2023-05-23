<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\MarcaController;
use App\Models\Categorium;
use App\Models\Componente;
use App\Models\Marca;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/',  [ComponenteController::class, 'getComponentes'])
    ->name('imain');

Route::get('/sobre-nosotros', function () {
    return view('Sobre_nosotros');
})->name('sobre');

Route::get('/categorias', [CategoriaController::class, 'getCategorias'])
    ->name('categorias');

Route::get('/paneladm', function () {
    return view('PanelAdmin');
})->name('paneladm');

Route::get('/productos', [ComponenteController::class, 'getCompoentesByCat'])
    ->name('productos');

//MARCAS
Route::get('/marcaslb', [MarcaController::class, 'getMarcas'])
    ->name('marcaslb');
//addmarcas
Route::get('/marcasad', function () {
    return view('PanelAdm.MarcasCA');
})->name('marcasad');

Route::post('/addmarca', function (Illuminate\Http\Request $request) {
    $marca = App\Models\Marca::create([
        'nombre_marca' => $request->input('nombre_marca'),
        'status' => $request->has('estatus'),
    ]);

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'agregar', 'marca' => $marca]);
})->name('addmarca');

//editmarcas
Route::get('/marcaedit/{id}', [MarcaController::class, 'editar'])->name('marcaedit');

Route::post('/editmarca', function (Illuminate\Http\Request $request) {
    $marca = App\Models\Marca::findOrFail($request->input('id_marca'));
    $marca->nombre_marca = $request->input('nombre_marca');
    $marca->status = $request->has('estatus');
    $marca->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $marca]);
})->name('editmarca');

//deletemarca
Route::delete('/marca/{id}', [MarcaController::class, 'eliminar'])->name('marca');



//CATEGORIAS
Route::get('/categoriaslb', function () {
    $categorias = Categorium::where('status_categoria', '1')->get();

    return view('PanelAdm.CategoriaLB', ['categorias' => $categorias]);
})->name('categoriaslb');
//delete
Route::delete('/categoriaborrar/{id}', [CategoriaController::class, 'eliminar'])->name('categoriaborrar');

//edit
Route::get('/categoriaedit/{id}', [CategoriaController::class, 'editar'])->name('categoriaedit');

Route::post('/editcategoria', function (Illuminate\Http\Request $request) {
    $categoria = App\Models\Categorium::findOrFail($request->input('id_categoria'));
    $categoria->nombre_categoria = $request->input('nombre_categoria');
    $categoria->descripcion_categoria = $request->input('descripcion_categoria');
    $categoria->status_categoria = $request->has('estatus');
    $categoria->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $categoria]);
})->name('editcategoria');

//addcategorias
Route::get('/categoriasad', function () {
    return view('PanelAdm.CategoriaCA');
})->name('categoriasad');

Route::post('/addcategorias', function (Illuminate\Http\Request $request) {
    $categoria = Categorium::create([
        'nombre_categoria' => $request->input('nombre_categoria'),
        'descripcion_categoria' => $request->input('descripcion_categoria'),
        'status_categoria' => $request->has('estatus'),
    ]);
    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'agregar', 'marca' => $categoria]);
})->name('addcategorias');

//COMPONENTES
Route::get('/componenteslb', function () {
    $componentes = Componente::all();
    return view('PanelAdm.ComponenteLB', ['componentes' => $componentes]);
})->name('componenteslb');

//delete componentes
Route::delete('/componenteborrar/{id}', [ComponenteController::class, 'eliminar'])->name('componenteborrar');

//edit componentes
Route::get('/componenteedit/{id}', [ComponenteController::class, 'editar'])->name('componenteedit');

Route::post('/editcomponente', function (Illuminate\Http\Request $request) {
    $componente = App\Models\Componente::findOrFail($request->input('id_componente'));
    $componente->nombre_componente = $request->input('nombre_componente');
    $componente->descripcion_componente = $request->input('descripcion_componente');
    $componente->status_componente = $request->has('estatus');
    $componente->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $componente]);
})->name('editcomponente');

//addcomponentes
Route::get('/componentesad', function () {
    $categorias = Categorium::where('status_categoria', '1')->get();
    $marcas = Marca::where('status', '1')->get();
    return view('PanelAdm.ComponenteCA', ['categorias' => $categorias, 'marcas' => $marcas]);
})->name('componentesad');

Route::post('/addcomponentes', function (Illuminate\Http\Request $request) {
    // Validación para asegurarte de que se proporciona una clave de componente
    if (!$request->has('clave_componente')) {
        return redirect()->back()->withInput()->withErrors(['La clave del componente es requerida']);
    }
    $claveComponente = $request->input('clave_componente');
    $imagen = $request->file('imagen');
    $imagenBlob = file_get_contents($imagen);


    $componente = new Componente;
    $componente->clave_componente = $claveComponente;
    $componente->nombre_componente = $request->input('nombre_componente');
    $componente->descripcion_componente = $request->input('descripcion_componente');
    $componente->precio_actual_componente = $request->input('precio_actual_componente');
    $componente->existencia_componente = $request->input('existencia_componente');
    $componente->stock_min_componente = $request->input('stock_min_componente');
    $componente->stock_max_componente = $request->input('stock_max_componente');
    $componente->id_ct_marca = $request->input('id_ct_marca');
    $componente->id_categoria = $request->input('id_categoria');
    $componente->descuento_componente = $request->input('descuento_componente');
    $componente->imagen = $imagenBlob;

    $componente->save();

    return view('PanelAdm.Susses', ['tipo' => 'componente', 'action' => 'agregar', 'componente' => $componente]);
})->name('addcomponentes');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
