@extends('layout.Front.main')

@section('pagetitle', 'Noticias')
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
                            <h2 style="text-transform: none;">Noticias</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Noticias</a></li>
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
            <?php $news = false; ?>
                @foreach($data as $noticia)
                <!--Start Single Blog One-->
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single"  style="
                    height: 100%; 
                    display: flex; 
                    flex-direction: column;
                    ">
                        <div class="blog-one__single-img">
                            <img src="/storage/{{$noticia->imagen}}" alt="{{$noticia->titulo}}"/>
                        </div>
                        <div class="blog-one__single-content">
                            <div class="blog-one__single-content-overlay-mata-info" align="center">
                                <ul class="list-unstyled">
                                    <li><a href="#"><span class="icon-clock"></span>{{\Carbon\Carbon::parse(strtotime($noticia->created_at))->formatLocalized('%d/%m/%Y')}}</a></li>
                                    <li><a href="#"><span class="icon-user"></span>Redacción </a></li>
                                    <li>
                                        <i class="fas fa-eye" style="color: #285aa1;"></i>
                                        <span>{{ $noticia->contador }}</span>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="blog-one__single-content-title"><a href="{{route('noticias.mostrar-noticia', $noticia->slug)}}">{{$noticia->titulo}}</a></h2>
                            <?php
                                $contenido = strip_tags($noticia->contenido); // Eliminar todas las etiquetas HTML del contenido
                                $contenido = Str::limit($contenido, 150, '...'); // Mostrar solamente 150 caracteres
                            ?>
                            <p class="blog-one__single-content-text">
                                {!! $contenido !!}
                            </p>
                        </div>
                    </div>
                </div>
                <?php $news = true; ?>
                <!--End Single Blog One-->
                @endforeach
            </div>

            @endif

            @if(!$news)
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
                        <form action="{{route('noticias.show')}}">
                            <div class="input-group mb-3" id="Me tardé como 3 horas pero al fin funciona :D By: Pazos">
                                <input name="searchBar" type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                    <div class="col-sm-12 pt-5">
                       <h3>Últimas 5 noticias</h3>
                       <hr>
                       <div class="list-group">
                       @if($ultimasnoticias)
                            @foreach($ultimasnoticias as $ul)
                                <a href="{{route('noticias.mostrar-noticia', $ul->slug)}}" class="list-group-item list-group-item-action">{{$ul->titulo}}</a>
                            @endforeach
                       @endif
                       </div>
                    </div>


                    <div class="col-sm-12 pt-5">
                       <h3>Categorías</h3>
                       <hr>
                       <div class="list-group">
                        @if($categorias)
                                @foreach($categorias as $ca)
                                <a href="{{route('noticias.mostrar-por-categoria',$ca->id)}}"  class="list-group-item list-group-item-action" >{{$ca->nombre}}</a>

                                @endforeach
                         @endif
                        </div>

                    </div>
                </div>
                    </div>

</div>
</div>

    </section>




@endsection
