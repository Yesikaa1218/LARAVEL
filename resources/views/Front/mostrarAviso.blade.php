@extends('layout.Front.main')

@section('pagetitle', $data->titulo)
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">{{$data->titulo}}</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="{{route('avisos.show')}}">Avisos</a></li>
                                @if($data)
                                <li><a href="#"> {{ Str::limit($data->titulo, 20, '...');}}</a></li>
                                @endif
                                <!-- <li class="active">Licenciaturas</li> -->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->
    <div class="row">
        
        <div class="container">
            <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
                    data-wow-delay="400ms" data-wow-duration="1500ms">
                <div class="container pt-4 pb-2">
                    <div class="row justify-content-center align-items-center noticiasDormir" style=" width: 100%; vertical-align: middle;">
                        <!-- <img src="/storage/{{$data->imagen}}" alt=""> -->
                        
                        
                        <div class="col-xl-12 col-lg-12">

                            @if ($data && $data->imagenes)

                                @php
                                    $imagenes = json_decode($data->imagenes);
                                @endphp

                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach ($imagenes as $key => $imagen)
                                            @if ($key == 0)
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"  aria-label="Slide 1"></button>
                                            @else
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key + 1}}"></button>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">


                                        @foreach ($imagenes as $key => $imagen)
                                            <div class="carousel-item <?php if($key == 0) echo 'active'?>">
                                                <img src="/storage/{{$imagen}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach

                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif

                            <p>
                                @if($data && $data && $data->contenido)
                                    {!! $data->contenido !!}
                                @endif
                            </p>
                            <br>

                            @if($data && $data->documento)
    
                                <div class="mb-3">
                                    <div class=" card-dark-mode">
                                        <div class="card-body">
                                            <p class="card-text text-center">Presione el botón para ver descargar el PDF.</p>
                                            <div class="col text-center">
                                            
                                                <a href="/storage/{{$data->documento}}#view=FitH" class="btn btn-dark-mode" style="margin-left: auto; margin-right: auto;" target="_blank" >Descargar PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         
                            @endif   

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
   

@endsection
