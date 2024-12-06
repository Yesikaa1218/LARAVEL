@extends('layout.Front.main')

@section('pagetitle', 'Avisos')
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
                            <h2 style="text-transform: none;">Avisos</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Avisos</a></li>
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
                @foreach($data as $aviso)
                

                <!--Start Single Blog One-->
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" >
                    <div class="blog-one__single">
                        
                        <div class="blog-one__single-img">
                            <img src="/storage/{{$aviso->imagen}}" href="{{route('avisos.mostrar-aviso', $aviso->slug)}}" alt=""/>
                        </div>
                        <div class="blog-one__single-content">
                            <div class="blog-one__single-content-overlay-mata-info" align="center">
                                <ul class="list-unstyled">
                                    <li><a href="#"><span class="icon-clock"></span>{{\Carbon\Carbon::parse(strtotime($aviso->created_at))->formatLocalized('%d/%m/%Y')}}</a></li>
                                    <li><a href="#"><span class="icon-user"></span>Redacción </a></li>
                                    <li>
                                        <i class="fas fa-eye" style="color: #285aa1;"></i>
                                        <span>{{ $aviso->contador }}</span>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="blog-one__single-content-title"><a href="{{route('avisos.mostrar-aviso', $aviso->slug)}}">{{$aviso->titulo}}</a></h2>
                            <?php 
                                $contenido = strip_tags($aviso->contenido); // Eliminar todas las etiquetas HTML del contenido
                                $contenido = Str::limit($contenido, 150, '...'); // Mostrar solamente 150 caracteres
                            ?>
                            <p class="blog-one__single-content-text">
                                {!! $contenido !!}
                            </p>
                        </div>
                    </div>
                </div>
                <!--End Single Blog One-->
                @endforeach
                <!-- carousel -->
                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> -->
                <!-- end carousel -->
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
                        <form action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </form> 
                        <hr>  
                    </div>

                    <div class="col-sm-12 pt-5">
                       <h3>Últimos 5 avisos</h3> 
                       <hr>
                       <div class="list-group">
                       @if($ultimosavisos)
                            @foreach($ultimosavisos as $ul)
                            
                                <a href="{{route('avisos.mostrar-aviso', $ul->slug)}}" class="list-group-item list-group-item-action">{{$ul->titulo}}</a>
                            
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
                                <a href="{{route('avisos.tag.show', $ca->id)}}" class="list-group-item list-group-item-action">{{$ca->nombre}}</a>
                            
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