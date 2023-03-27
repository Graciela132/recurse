@extends('index')
@section('principal')
    <div class="row row-cols- row-cols-md-4 g-4">

        @foreach($categorias as $categoria)
            <div class='col'>
                <div class='card h-100'>
                    <a href="{{ route('productos', ['clave'=>$categoria->id_categoria]) }}">
                        <div class='card-body'>
                            <h5 class='card-title'>{{ $categoria->nombre_categoria }}</h5>
                            <p class='card-text'>{{ $categoria->descripcion_categoria }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
