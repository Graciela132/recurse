<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function getCategorias(){
        $categorias = Categorium::where('status_categoria', '1')->get();
        return view('categorias', ['categorias' => $categorias]);
    }
}
