@extends('layout.Front.main')

@section('pagetitle', 'Asuntos Universitarios')
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
                            <h2 style="text-transform: none;">Asuntos Universitarios</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Asuntos Universitarios</a></li>
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
                    <p>

                        @if($data && $data->content_page)
                            {!! $data->content_page !!}
                        @endif
                    </p>
                    <br>
                </div>


            </div>
        </div>
    </section>




@endsection
