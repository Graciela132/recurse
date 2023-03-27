<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use App\Models\Componente;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function getComponentes()
    {
        $componentes = Componente::all();
        return view('imain', ['componentes' => $componentes]);
    }

    public function getCompoentesByCat(Request $cat)
    {
        $clave = $cat->input('clave');
        $categorias = Componente::where('id_categoria', $clave)
            ->get();
        return view('producto', ['componentes' => $categorias]);

    }
}
