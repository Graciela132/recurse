@extends('index')
@section('principal')
    <!--CARRUCEL-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ">
            <div class="  carousel-item active">
                <a href="ArmaPc.php"><img src="img/2.jpg" class="d-block w-100" alt="..."></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Arma tu pc</h5>
                    <p>Genera el presupuesto de tu PC ideal.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/pc3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--RIBON-->
    <div id="ribbon" class="container-fluid">
        <div id="brithday" class="container w-75 pl-2">

            <div class="row align-items-center">
                <div class="col-sm p-3">
                    <img src="img/PC_Gamer_logo.png" alt="" class="w-75 mx-auto">
                </div>
                <div class="col-sm p-3 text-light text-center">
                    <p>Arma tu pc Gamer</p>
                    <h4>Cotizacion de precios y componentes</h4>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!--COMPONENTES-->
    <div id="componentes">
        <div class="container-md">
            <div class="row">
                <h3 class="text-center pb-5 pt-5 " style="color:beige"> ¡¡¡Lista de componetes para armar tu pc!!!
                </h3>
            </div>

            <div class="row row-cols- row-cols-md-4 g-4">
                @foreach($componentes as $componente)
                    <div class='col'>
                        <div class='card h-100'>
                            <a href="https://www.ejemplo.com/producto1">
                                <div class='card-body'>
                                    <h5 class='card-title'>{{$componente->nombre_componente}}</h5>
                                    <p class='card-text'>${{$componente->precio_actual_componente}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
