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
    public function eliminar($id)
    {
        $action='eliminar';
        $categoria = Categorium::find($id);
        $categoria->delete();

        return view('PanelAdm/Susses', ['tipo'=>'categoria','action'=>$action, 'categoria'=>$categoria]);
    }
    public function editar($id)
    {
        $categoria = Categorium::find($id);
        return view('PanelAdm.CategoriaUD', ['categoria'=>$categoria]);
    }

}
