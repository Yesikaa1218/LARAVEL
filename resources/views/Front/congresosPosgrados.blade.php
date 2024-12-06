@extends('layout.Front.main')

@section('pagetitle', 'Congresos de Posgrados')
@section('stylespage')


@endsection
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
        style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Congresos de Posgrados</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Congresos de Posgrados</a></li>
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


       <div class="container pt-5">
       <div class="row">
            <div class="col-sm-12 col-md-8">
            <div class="container">
                
           @if($data)
            <div class="row">
            <?php $congresos = false; ?>
                @foreach($data as $congresoPosgrado)
                <!--Start Single Blog One-->
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single"  style="
                    height: 100%; 
                    display: flex; 
                    flex-direction: column;
                    ">
                        <div class="blog-one__single-img">
                            <img src="/storage/{{$congresoPosgrado->image}}" alt="{{$congresoPosgrado->name}}"/>
                        </div>
                        <div class="blog-one__single-content">
                            <div class="blog-one__single-content-overlay-mata-info" align="center">
                                <ul class="list-unstyled">
                                    <li><span class="icon-clock"></span> Fecha del evento: {{\Carbon\Carbon::parse(strtotime($congresoPosgrado->fecha_evento))->formatLocalized('%d/%m/%Y')}}</a></li>
                                </ul>
                            </div>
                            <h2 class="blog-one__single-content-title"><a href="{{route('congreso.posgrado.registrar', $congresoPosgrado->slug)}}">{{$congresoPosgrado->name}}</a></h2>
                            <?php
                                $content_page = strip_tags($congresoPosgrado->content_page); // Eliminar todas las etiquetas HTML del contenido
                                $content_page = Str::limit($content_page, 150, '...'); // Mostrar solamente 150 caracteres
                            ?>
                            <p class="blog-one__single-content-text">
                                {!! $content_page !!}
                            </p>
                        </div>
                    </div>
                </div>
                <?php $congresos = true; ?>
                <!--End Single Blog One-->
                @endforeach
            </div>

            @endif

            @if(!$congresos)
            <div class="row">
                <div class="col-sm-12 text-center">
                        <h3>No hay información para mostrar.</h3>
                </div>
            </div>
            @endif

            </div>
            @if($data)
                 {{ $data->onEachSide(5)->links() }}
            @endif

        </div>
        <div class="col-sm-12 col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{route('congreso.posgrado')}}">
                            <div class="input-group mb-3">
                                <input name="searchBar" type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                    @if($ultimosCongresosPosgrados)
                    <div class="col-sm-12 pt-5">
                       <h3>Últimos 5 congresos</h3>
                       <hr>
                       <div class="list-group">
                            @foreach($ultimosCongresosPosgrados as $ul)

                                <a href="{{route('congreso.posgrado.registrar', $ul->slug)}}" class="list-group-item list-group-item-action">{{$ul->name}}</a>

                            @endforeach
                       </div>
                    </div>
                    @endif
                </div>
        </div>

</div>
</div>

    </section>




@endsection
