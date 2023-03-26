<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function getComponentes() {
        $componentes=Componente::all();
        return view('imain', ['componentes' => $componentes]);
    }
    public function getCompoentesByCat($cat)
    {
        $componentes=Componente::where('id_categoria_jarmando', $cat)->get();

    }
}
