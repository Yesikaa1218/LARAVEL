@extends('layout.Front.main')

@section('pagetitle', 'Tesorería')
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
                 <h2 style="text-transform: none;">Tesorería</h2>
                 <hr>
             </div>
             <div class="page-header__menu">
                 <ul class="page-header__menu-list list-unstyled clearfix">
                     <li><a href="{{route('index')}}">Inicio</a></li>
                     <li><a href="#">Tesorería</a></li>
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

                @if($data && ($data->calendario_pagos_posgrado || $data->manual_cuota_interna || $data->solicitud_factura))

                    <h2>Documentos</h2>
                    <hr>

                @endif

                @if($data && $data->calendario_pagos_posgrado)
                    <span class="section-title__tagline">Calendario de pagos de posgrado</span>
                    <br>
                    <a class="btn btn-outline-secondary" href="/storage/{{$data->calendario_pagos_posgrado}}" target="_blank">Presione para descargar el PDF</a>
                    <br><br>
                @endif

                @if($data && $data->manual_cuota_interna)
                    <span class="section-title__tagline">Manual de cuota interna</span>
                    <br>
                    <a class="btn btn-outline-secondary" href="/storage/{{$data->manual_cuota_interna}}" target="_blank">Presione para descargar el PDF</a>
                    <br><br>
                @endif

                @if($data && $data->solicitud_factura)
                    <span class="section-title__tagline">Solicitud de factura</span>
                    <br>
                    <a class="btn btn-outline-secondary" href="/storage/{{$data->solicitud_factura}}" target="_blank">Presione para descargar el PDF</a>
                    <br><br>
                @endif

                <div class="pt-5"></div>

                @if($preguntas)

                    <h2>Preguntas Frecuentes</h2>
                    <hr>

                    @foreach($preguntas as $p)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$p->id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$p->id}}" aria-expanded="false" aria-controls="collapse{{$p->id}}">
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
        </div>
    </div>
</section>




@endsection