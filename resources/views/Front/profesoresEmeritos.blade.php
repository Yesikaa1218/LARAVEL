@extends('layout.Front.main')

@section('pagetitle', 'Profesores Eméritos')
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Profesores Eméritos</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Profesores Eméritos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->



    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
    data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 col-lg-12">

                    <?php $contador = 0 ?>

                    @if($data)
                        @foreach($data as $profesorEmerito)
                            @if($contador == 0) 
                            <div class="row ex-profesor">
                            @endif
                                <div class="card mb-3 card-dark-mode"style="max-width: 40rem;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/storage/{{$profesorEmerito->image}}" class="img-fluid rounded-start img-thumbnail mx-auto d-block" alt="{{$profesorEmerito->name}}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body text-center"> 
                                                <h5 class="card-title">{{$profesorEmerito->name}}</h5>
                                                <?php
                                                    $biography = strip_tags($profesorEmerito->biography); // Eliminar todas las etiquetas HTML del contenido
                                                    $biography = Str::limit($biography, 70, '...'); // Mostrar solamente 70 caracteres
                                                ?>
                                                <p class="card-text">{!! $biography !!}</p>
                                                <a href="{{route('facultad.profesores-emeritos.show', $profesorEmerito->slug)}}" class="btn btn-dark-mode">Ver biografía</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $contador++ ?>

                            @if($contador == 2)
                            </div>
                            <br>

                            <?php $contador = 0 ?>
                            @endif
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection