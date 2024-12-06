@extends('layout.Front.main')

@section('pagetitle', 'Servicio Social')
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
                            <h2 style="text-transform: none;">Servicio Social</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Servicio Social</a></li>
                                <!-- <li class="active">Licenciaturas</li> -->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
        {{-- container --}}
        <nav>
            <div class=" pt-4 pb-2 s-servicio-container-2">
                {{-- align-items-center --}}
                <div class="row justify-content-center">
                    {{-- col-xl-12 col-lg-12--}}
                    <div class="col-8">
                        <p>

                            @if($data && $data->content_page)
                                {!! $data->content_page !!}
                            @endif
                        </p>
                        <br>

                        <div class="pt-5"></div>
                        <h2>Preguntas Frecuentes</h2>
                        <hr>
                        @if($preguntas)
                            @foreach($preguntas as $p)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$p->id}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$p->id}}" aria-expanded="true" aria-controls="collapse{{$p->id}}">
                                        {{$p->name}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$p->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$p->id}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        {!! $p->content_page !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                    </div>
                    <!-- {{-- ocultar la lista de documentos y remplazarla  por un  --}}-->
                    <div class="col-4 s-servicio-container">
                        <h2 class="text-align">Documentos</h2>
                        @if ($documentos)
                        <div id="list-example" class="list-group">
                            @foreach($documentos as $documento)
                            <a class="list-group-item list-group-item-action" target="_blank" href="{{$documento->pdf_url}}">{{$documento->nombre_documento}}</a>
                            @endforeach
                        </div>
                        @endif
                    </div> 
                </div>
            </div>
        </nav>
    </section>
    


@endsection
