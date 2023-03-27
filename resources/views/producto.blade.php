@extends('index')
@section('principal')
    <div class="row row-cols- row-cols-md-4 g-4">
        @foreach($componentes as $componente)
            <div class="col">
                <div class="card h-100" style="width: 18rem;">
                    <div class="card-body">
                        @php
                            $imagen = base64_encode($componente->imagen);
                        @endphp
                        <img src="data:image/png;base64,{{$imagen}}" alt='Img blob desde MySQL' class="img-fluid" />
                        <h5 class="card-title">{{$componente->nombre_componente}}</h5>
                        <p class="card-text">{{$componente->descripcion_componente}}</p>
                        <button onclick="clickMe('1')" type="button" class="btn btn-primary">{{$componente->precio_actual_componente}}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
