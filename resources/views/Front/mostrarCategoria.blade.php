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
                                <li><a href="{{route('noticias.show')}}">Noticias</a></li>
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

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
             data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center noticiasDormir" style=" width: 100%; vertical-align: middle;">
                <img src="/storage/{{$data->imagen}}" alt="" >
                <div class="col-xl-12 col-lg-12">
                    <p>

                        @if($data && $data && $data->contenido)
                            {!! $data->contenido !!}
                        @endif
                    </p>
                    <br>
                </div>


            </div>
        </div>
    </section>




@endsection
