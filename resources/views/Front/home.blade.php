@extends('layout.Front.main')

@section('pagetitle', 'Inicio')

@section('stylespage')
    <link rel="stylesheet" href="{{asset('front/assets/vendors/tiny-slider/tiny-slider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/owl-carousel/owl.theme.default.min.css')}}"/>
@endsection

@section('content')
    <section class="main-slider main-slider-two">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": false, "effect": "fade", "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": 5000
            }}'>

            <div class="swiper-wrapper">
                <!--Start Single Swiper Slide-->
                <div class="swiper-slide">
                    <div class="image-layer"
                         style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}');
                             background-repeat: no-repeat; background-position: bottom; background-size: cover"
                    >
                    </div>
                    <div class="image-layer-overlay"></div>
                    <div class="container">
                        <!--desde aqui esta un carrusel -->
                        <div id="carouselAvisos" class="carousel slide--two__top" data-bs-ride="carousel" 
                             <?php if((count($aviso)) == 0) { ?> 
                                        style="display:none" 
                             <?php } else { ?> 
                                        style="display:visible" 
                             <?php } ?>
                            >
                            <div class="carousel-inner" align="center">
                            <h5 style="color:#FFFFFF" align="center">Avisos: </h5>
                                <?php  $contador=0;?>
                                @foreach($aviso as $avisoI)
                                <?php if($contador==0) { ?>
                                    <div class="carousel-item active">
                                      <ul><a style="color:#FFFFFF" href="{{route('avisos.mostrar-aviso', $avisoI->slug)}}">
                                        <img src="/storage/{{$avisoI->imagen_inicio}}" style="max-height: 200px; max-width: 800px;" 
                                             class="d-block w-100" alt="...">
                                      </a></ul>
                                    </div>
                                <?php $contador=1;
                                      } else { ?>        
                                    <div class="carousel-item">
                                      <ul><a style="color:#FFFFFF" href="{{route('avisos.mostrar-aviso', $avisoI->slug)}}">  
                                        <img src="/storage/{{$avisoI->imagen_inicio}}" style="max-height: 200px; max-width: 800px;"  
                                             class="d-block w-100" alt="...">
                                      </a></ul>     
                                    </div>
                                <?php } ?> 
                                @endforeach        
                            </div>          
                            <a class="carousel-control-prev" role="button" data-bs-target="#carouselAvisos" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" role="button" data-bs-target="#carouselAvisos" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span> 
                            </a>            
                        </div> 
                        <!--hasta aqui -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider-two__content text-center">
                                    <br><br>
                                    <h2 class="main-slider-two__tagline text-white">Bienvenido </h2><br><br>
                                    <h2 class="main-slider__title">Facultad de Ciencias Físico Matemáticas </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Swiper Slide-->
                <!--Start Single Swiper Slide-->

                <!--End Single Swiper Slide-->


            </div>
            <!-- If we need navigation buttons -->
        </div>
    </section>

    <!--Start Welcome One-->
    <section class="welcome-one pt-5">
        <div class="container pt-5">
            <div class="row">
                <!--Start Welcome One Left-->
                <div class="col-xl-6">
                    <div class="welcome-one__left">
                        <div class="section-title">
                            <span class="section-title__tagline">Mensaje del Director</span>
                            <h2 class="section-title__title">Dr. Atilano Martínez Huerta <br></h2>
                        </div>
                        <p class="welcome-one__left-text">Es mi compromiso seguir contribuyendo en el crecimiento de la
                            Facultad de Ciencias Físico Matemáticas, en un ambiente de respeto y responsabilidad;
                            encabezando una gestión innovadora, dialogante, abierta a las ideas, eficiente y
                            comprometida con la educación de calidad que merecen nuestros Estudiantes y la sociedad a la
                            que nos debemos.
                            En el cumplimiento de los 5 ejes estratégicos, establecidos en el Plan de Desarrollo
                            Institucional 2019 – 2030, programa rector, donde se establecen los compromisos y desafíos
                            que habremos de enfrentar. En este marco de referencia, los retos por cumplir son numerosos
                            y complejos.
                            Lo logros solo serán posibles con la participación decidida de los Maestros, el Personal
                            Administrativo y los Estudiantes de nuestra Facultad; por esta razón, los exhorto, a seguir
                            trabajando coordinadamente y en cumplimiento de nuestra Misión.</p>

                    </div>
                </div>
                <!--End Welcome One Left-->

                <!--Start Welcome One Right-->
                <div class="col-xl-6">
                    <div class="welcome-one__right clearfix">
                        <div class="shape1 rotate-me"><img src="{{asset('front/assets/images/shapes/thm-shape1.png')}}" alt=""/></div>
                        <div class="welcome-one__right-img1 wow slideInRight" data-wow-delay="100ms"
                             data-wow-duration="2500ms">
                            <div class="welcome-one__right-img1-inner">
                                <img src="{{asset('front/assets/images/resources/Dr-Atilano2.jpg')}}" alt="Dr. Atilano"/>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Welcome One Right-->
            </div>
        </div>
    </section>
    <!--End Welcome One-->

    <section class="categories-one pt-5">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Oferta Educativa</span>
                <h2 class="section-title__title">Licenciaturas</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="categories-one__wrapper">
                        <div class="row">
                            @php $delay = 0; @endphp
                            @foreach ($licenciaturas as $item)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="@php echo $delay.'ms' @endphp"
                                        data-wow-duration="1500ms">
                                    <a href="/licenciatura/{{$item->slug}}">
                                        <div class="categories-one__single">
                                            <div class="categories-one__single-img">
                                                <img src="/storage/{{$item->banner_licenciatura}}" alt="{{$item->nombre_licenciatura}}"/>
                                                <div class="categories-one__single-overlay">
                                                    <div class="categories-one__single-overlay-text2">
                                                        <h4>{{$item->nombre_licenciatura}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @php $delay += 200; @endphp
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="categories-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Oferta Educativa</span>
                <h2 class="section-title__title">Posgrados</h2>
            </div>
            <div class="row">
                <div class="col-xl-12 ">
                    <div class="categories-one__wrapper">
                        <div class="row justify-content-center">
                            @php $delay = 0; @endphp
                            @foreach ($posgrado as $item)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="@php echo $delay.'ms' @endphp"
                                        data-wow-duration="1500ms">
                                    <a href="/posgrados/{{$item->slug}}">
                                        <div class="categories-one__single">
                                            <div class="categories-one__single-img">
                                                <img src="/storage/{{$item->banner_del_posgrado}}" alt="{{$item->nombre_posgrado}}"/>
                                                <div class="categories-one__single-overlay">
                                                    <div class="categories-one__single-overlay-text2">
                                                        <h4>{{$item->nombre_posgrado}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @php $delay += 200; @endphp
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Video One Start-->
    <section class="video-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-one__box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"
                         style=" background-position: center;
                        background-repeat: none;
                        background-size: cover;

                        background-image: url({{asset('front/assets/images/backgrounds/video-v2-bg.jpg')}});">
                        <div class="video-one__box-title">
                            <h2>Mira el video</h2>
                        </div>
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup" title="Zilom Video Gallery"
                               href="https://www.youtube.com/watch?v=zP83-P3wPzA">
                                <span class="icon-play"></span>
                            </a>
                            <span class="border-animation border-1"></span>
                            <span class="border-animation border-2"></span>
                            <span class="border-animation border-3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video One End-->


    <!--Counter One Start-->
    <section class="counter-one jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
             style="background-image: url({{asset('front/assets/images/backgrounds/20200427_014.JPG')}});">
        <div class="container">
            <div class="row justify-content-center">

                <div class="pt-2 pb-5">
                    <h2 class="text-center text-white">Indicadores del semestre {{ $semestre->nombre }}</h2>
                </div>

                <!--Start Counter One Right-->
                <div class="col-xl-12 col-lg-12">
                    <div class="counter-one__right">
                       
                        <div class="container text-center">

                            <div class="row justify-content-center">

                                @foreach ($indicadores as $indicador)

                                    <div class="col col-lg-2 mx-4 justify-content-center main-menu__inner ">
                                        <div class="counter-one__indicadores wow slideInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="margin-right:0px;">
                                            <div class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                                <div class="counter-one__right-single-icon">
                                                    <img src="/storage/{{ $indicador->imagen }}" style="max-width: 80px"/>
                                                    <!--<span class="icon-teacher"></span>-->
                                                </div>
                                                <span>+</span>
                                                <h3 class="odometer" data-count= {{ $indicador->valor }}>00</h3>
                                                <p class="counter-one__right-text"> {{ $indicador->nombre }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    @php 
                                        $delay += 200; 
                                    @endphp

                                @endforeach

                            <!--End Counter One Right Single-->
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!--End Counter One Right-->
            </div>
        </div>
    </section>
    <!--Counter One End-->


    <!--Start Categories Two-->
    <section class="categories-two">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h1 class="section-title__title" style="text-transform: none !important">Enlaces de interés </h1>
                </div>

                <div class="col-xl-12  d-flex justify-content-center">
                    <div class="categories-two__inner">
                        <div class="shape1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                src="{{asset('front/assets/images/icons/WEB/Enlaces de interes/thm-shape4.png')}}" alt=""/></div>
                        <ul class="categories-two__wrapper list-unstyled">
                            <!--Start Single Categories Two-->
                            <a href="{{route('escolar.show')}}">
                                <li class="categories-two__single text-center wow fadeInUp animated animated"
                                    data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="categories-two__single-icon">
                                        <!-- <span class="icon-creativity"></span> -->
                                        <!-- /public/front/assets/images/icons/WEB/Enlaces de interes/escolarDM.png -->
                                        <!-- <img src="{{asset('front/assets/images/icons/enlaces_interes/escolar.svg')}}" alt="" width="100%" height="100%"> -->

                                        <!-- Icono de escolar -->
                                        @include('layout.SVG.escolar')

                                        <div class="overly-bg"
                                             style="background-color: #1a1e21">
                                        </div>
                                    </div>
                                    <div class="categories-two__single-text">
                                        <h5><a href="{{route('escolar.show')}}">Escolar</a></h5>
                                    </div>
                                </li>
                            </a>
                            <!--End Single Categories Two-->

                            <!--Start Single Categories Two-->
                            <a href="{{route('calidadeducativa.show')}}">
                                <li class="categories-two__single text-center wow fadeInUp animated animated"
                                    data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="categories-two__single-icon">
                                        <!-- <span class="icon-needs"></span> -->
                                        <!-- <img src="{{asset('front/assets/images/icons/enlaces_interes/servicio_social.svg')}}" alt="" width="100%" height="100%"/> -->

                                        <!-- Icono de servicio social -->
                                        @include('layout.SVG.servicio_social')

                                        <div class="overly-bg"
                                             style="background-color: #1a1e21">
                                        </div>
                                    </div>
                                    <div class="categories-two__single-text">
                                        <h5><a href="{{route('calidadeducativa.show')}}">Servicio Social</a></h5>
                                    </div>
                                </li>
                            </a>
                            <!--End Single Categories Two-->

                            <!--Start Single Categories Two-->
                            <a href="https://www.facebook.com/NBisontes">
                                <li class="categories-two__single text-center wow fadeInUp animated animated"
                                    data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="categories-two__single-icon">
                                        <!-- <span class="icon-photo-camera"></span> -->
                                        <!-- <img src="{{asset('front/assets/images/icons/enlaces_interes/noticiero_bisontes.svg')}}" alt="" width="100%" height="100%"/> -->

                                        <!-- Icono de noticiero bisontes -->
                                        @include('layout.SVG.noticiero_bisontes')

                                        <div class="overly-bg"
                                             style="background-color: #1a1e21">
                                        </div>
                                    </div>
                                    <div class="categories-two__single-text">
                                        <h5><a href="#">Noticiero Bisontes</a></h5>
                                    </div>
                                </li>
                            </a>
                            <!--End Single Categories Two-->

                            <!--Start Single Categories Two-->
                            <a href="{{route('avisos.show')}}">
                                <li class="categories-two__single text-center wow fadeInUp animated animated"
                                    data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <div class="categories-two__single-icon">
                                        <!-- <span class="icon-target"></span> -->
                                        <!-- <img src="{{asset('front/assets/images/icons/enlaces_interes/avisos.svg')}}" alt="" width="100%" height="100%"/> -->

                                        <!-- Icono de avisos -->
                                        @include('layout.SVG.avisos')

                                        <div class="overly-bg"
                                             style="background-color: #1a1e21">
                                        </div>
                                    </div>
                                    <div class="categories-two__single-text">
                                        <h5><a href="{{route('avisos.show')}}">Avisos</a></h5>
                                    </div>
                                </li>
                            </a>
                            <!--End Single Categories Two-->

                            <!--Start Single Categories Two-->
                            <a href="{{route('escolar.show')}}">
                                <li class="categories-two__single text-center wow fadeInUp animated animated"
                                    data-wow-delay="800ms" data-wow-duration="1500ms">
                                    <div class="categories-two__single-icon">
                                        <!-- <span class="icon-desk"></span> -->
                                        <!-- <img src="{{asset('front/assets/images/icons/enlaces_interes/preguntas_frecuentes.svg')}}" alt="" width="100%" height="100%"/> -->

                                        <!-- Icono de preguntas frecuentes -->
                                        @include('layout.SVG.preguntas_frecuentes')

                                        <div class="overly-bg"
                                             style="background-color: #1a1e21">
                                        </div>
                                    </div>
                                    <div class="categories-two__single-text">
                                        <h5><a href="#">Preguntas Frecuentes</a></h5>

                                    </div>
                                </li>
                            </a>
                            <!--End Single Categories Two-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Categories Two-->
    
    <!--Start Registration Two-->
    <section class="registration-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="registration-two__wrapper">
                        <div class="shape1 zoom-fade"><img src="{{asset('front/assets/images/shapes/thm-shape2.png')}}" alt=""/></div>
                        <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                src="{{asset('front/assets/images/shapes/thm-shape3.png')}}" alt=""/></div>
                        <div class="registration-two__left pb-5">
                            <h2 class="registration-two__left-text" style="text-transform: none !important">Comienza tu carrera educativa<br>Facultad de
                                Ciencias Físico Matemáticas.</h2>
                        </div>
                        <div class="registration-two__right">
                            <div class="registration-two__right-btn">
                              <!--  <a href="#" class="thm-btn">Más Información</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Registration Two-->

    <!--Blog One Start-->
    <section class="blog-one blog-one--blog-two">
        <div class="blog-one--blog-two__bg wow slideInDown" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Mantente Informado</span>
                <h2 class="section-title__title">Noticias</h2>
            </div>
            <div class="row" >
                <!--End Single Blog One-->
                    @foreach($noticias as $no)
                        <!--Start Single Blog One-->
                        <div class="col-xl-4 col-lg-4 wow fadeInUp blog-one-card" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__single-img">
                                    <img class="card-notice-image" src="/storage/{{$no->imagen}}" alt="{{$no->titulo}}"/>
                                </div>
                                <div class="blog-one__single-content">
                                    <div class="blog-one__single-content-overlay-mata-info">
                                        <ul class="list-unstyled">
                                            <li><a href="#"><span class="icon-clock"></span>{{\Carbon\Carbon::parse(strtotime($no->created_at))->formatLocalized('%d/%m/%Y')}}</a></li>
                                            <li><a href="#"><span class="icon-user"></span>Redacción </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="blog-one__single-content-title"><a href="{{route('noticias.mostrar-noticia', $no->slug)}}">{{$no->titulo}}</a></h2>
                                    <?php
                                    $contenido = strip_tags($no->contenido); // Eliminar todas las etiquetas HTML del contenido
                                    $contenido = Str::limit($contenido, 50, '...'); // Mostrar solamente 150 caracteres
                                    ?>
                                    <p class="blog-one__single-content-text">
                                        {!! $contenido !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Blog One-->
                    @endforeach

                    <div class="col-sm-12 justify-center-content" align="center">
                        <a href="{{route('noticias.show')}}" class="btn btn-lg btn-dark text-center">Ver más noticias</a>
                    </div>
            </div>
        </div>
    </section>

@endsection


@section('scriptspage')
    <script src="{{asset('front/assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
@endsection


