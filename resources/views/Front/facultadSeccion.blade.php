@extends('layout.Front.main')

@section('pagetitle', $data->title)
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">{{$data->title}}</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">{{$data->title}}</a></li>
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
                    
                    @if($data && $data->pdf_url)
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->title}}</h5>
                            <p class="card-text">Presione el botón para descargar el archivo PDF con el contenido.</p>
                            <a href="/storage/{{$data->pdf_url}}" class="btn btn-secondary" target="_blank">Descargar</a>
                        </div>
                        <!-- <div class="card-footer text-muted">
                        </div> -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
