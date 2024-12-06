@extends('layout.Front.main')

@section('pagetitle', 'Asesorías')
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
                style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Asesorías</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Asesorías</a></li>
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
                    <p>

                        @if($data && $data->content_page)
                            {!! $data->content_page !!}
                        @endif
                    </p>
                    <br>
               
                    <div class="section-title text-center">
                        <h2 class="section-title__title">Laboratorios</h2>
                    </div>


                    <?php $contador = 0 ?>

                    @if($laboratorios)
                        @foreach($laboratorios as $laboratorio)

                            @if($contador == 0) 
                            <div class="row">
                            @endif
                                <div class="col-sm-6 mb-3">
                                    <div class="card card-dark-mode">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{$laboratorio->nombre_laboratorio}}</h5>
                                            <p class="card-text text-center">Presione el botón para descargar el laboratorio.</p>
                                            <div class="col text-center">
                                                <a href="/storage/{{$laboratorio->url_laboratorio}}" class="btn btn-dark-mode" style="margin-left: auto; margin-right: auto;" target="_blank">Descargar PDF</a>
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
