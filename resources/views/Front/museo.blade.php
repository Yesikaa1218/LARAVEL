@extends('layout.Front.main')

@section('pagetitle', 'Museo')

@section('content')

    <section class="page-header pt-5 clearfix"
        style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 pt-5">
                        <div class="page-header__wrapper clearfix">
                            <div class="page-header__title pt-5">
                                <h2 style="text-transform: none;">Museo</h2>
                                <hr>
                            </div>
                            <div class="page-header__menu">
                                <ul class="page-header__menu-list list-unstyled clearfix">
                                    <li><a href="{{route('index')}}">Inicio</a></li>
                                    <li><a href="#">Museo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>        
    </section>

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
            data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            @if($data)
                <?php $news = false; ?>
                    @foreach($data as $museo)
                    <div class="row justify-content-center align-items-center noticiasDormir" style=" width: 100%; vertical-align: middle;">
                        <h2 class="blog-one__single-content-title" align="center">{{$museo->titulo}}</h2>
                        <?php  $contenido = $museo->contenido;  ?>
                        <p class="blog-one__single-content-text">
                            {!! $contenido !!}
                        </p>
                    </div>
                    @endforeach
                <?php $news = true; ?>
            @endif
        </div>
        @foreach($data as $museo)
            <div class="mb-3">
                <div class=" card-dark-mode">
                    <div class="card-body">
                        <p class="card-text text-center">Presione el botón para ver descargar el PDF.</p>
                        <div class="col text-center">
                            <?php  $documento = $museo->documento;  ?> 
                            <a href="/storage/{{$documento}}#view=" class="btn btn-dark-mode" style="margin-left: auto; margin-right: auto;" target="_blank">Descargar PDF</a>
                        </div>
                    </div>
                </div>
            </div>             
        @endforeach 
    </section>

@endsection