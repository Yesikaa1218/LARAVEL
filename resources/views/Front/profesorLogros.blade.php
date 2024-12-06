@extends('layout.Front.main')

@section('pagetitle', $data->nombre_profesor)
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">{{$data->nombre_profesor}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Facultad</a></li>
                                <li><a href="{{route('posgrados.logros')}}">Profesores Logros</a></li>
                                <li><a href="#">{{$data->nombre_profesor}}</a></li>
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
                <div class="row">
                    <div class="col-md-2 mx-auto d-block">
                        @if($data && $data->imagen)
                            <img src="/storage/{{$data->imagen}}" alt="$data->nombre_profesor" class="img-thumbnail mx-auto d-block">
                        @endif
                    </div>
                    <div class="col-md-10">
                        @if($logrosData)
                        
                        @foreach ($logrosData as $logro)
                                    <h5>{{ $logro->titulo }}</h5>
                                    {!! $logro->descripcion !!}
                                    @if($logro->archivo)
                                        <a href="/storage/{{$logro->archivo}}" target="_blank">Archivo pdf</a>
                                    @endif
                                @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection