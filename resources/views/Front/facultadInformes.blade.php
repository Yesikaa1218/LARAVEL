@extends('layout.Front.main')

@section('pagetitle', 'Informes')
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Informes</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Facultad</a></li>
                                <li><a href="#">Informes</a></li>
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
                @foreach($data as $informe)
                    @if($contador == 0) 
                    <div class="row justify-content">
                    @endif
                        <div class="col-sm-6  mb-3">
                            <div class="card card-dark-mode">
                            <div class="card-body">
                                <h5 class="card-title">{{$informe->title}}</h5>
                                <p class="card-text">Presione el botón para ver el contenido del informe.</p>
                                <a href="{{route('facultad.informes.show', $informe->slug)}}" class="btn btn-dark-mode">Ver contenido</a>
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
