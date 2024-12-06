@extends('layout.Front.main')

@section('pagetitle', 'Estrategia Digital')
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            @if($data && $data->image)
                style="background-image: url('{{$data->image}}')">
            @else
                style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
            @endif
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Estrategia Digital</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Estrategia Digital</a></li>
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
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 col-lg-12">
                    @if($data && $data->content_page)
                        <p>
                            {!! $data->content_page !!}
                        </p>
                        <br>
                        <br>
                    @endif
   
                    @if($data && $data->texto_link1)
                        <span class="section-title__tagline">{!! $data->texto_link1 !!}</span>
                        <br>
                        <a class="btn btn-outline-secondary" href="{{$data->link1}}" target="_blank">Presione para ir al enlace</a>
                        <br>
                        <br>
                        <br>
                    @endif

                    @if($data && $data->texto_link2)
                        <span class="section-title__tagline">{!! $data->texto_link2 !!}</span>
                        <br>
                        <a class="btn btn-outline-secondary" href="{{$data->link2}}" target="_blank">Presione para ir al enlace</a>
                        <br>
                        <br>
                        <br>
                    @endif

                    @if($data && $data->texto_link3)
                        <span class="section-title__tagline">{!! $data->texto_link3 !!}</span>
                        <br>
                        <a class="btn btn-outline-secondary" href="{{$data->link3}}" target="_blank">Presione para ir al enlace</a>
                    @endif

                </div>
            </div>
        </div>
    </section>




@endsection
