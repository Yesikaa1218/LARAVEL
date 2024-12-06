
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>h
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Multimedia y Animación Digital</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets/images/favicons/apple-touch-icon.png')}}"/>
    <link rel="android-chrine-512x512" sizes="512x512" href="{{asset('front/assets/images/favicons/android-chrome-512x512.png')}}"/>
    <link rel="android-chrome-192x192" sizes="192x192" href="{{asset('front/assets/images/favicons/android-chrome-192x192.png')}}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/images/favicons/favicon-32x32.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/images/favicons/favicon-16x16.png')}}"/>
    <link rel="manifest" href="{{asset('front/assets/images/favicons/site.webmanifest')}}"/>
    <meta name="description" content="Facultad de Ciencias Físico Matemáticas"/>
    <meta name="tags" content="@yield('tagspage')">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('front/assets/vendors/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/animate/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/animate/custom-animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/fontawesome/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/jarallax/jarallax.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/nouislider/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/nouislider/nouislider.pips.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/odometer/odometer.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/swiper/swiper.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/icomoon-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/vendors/reey-font/stylesheet.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/twentytwenty/twentytwenty.css')}}"/>
@yield('stylespage')
<!-- template styles -->
    <link rel="stylesheet" href="{{asset('front/assets/css/zilom.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/css/zilom-responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/css/styles.css')}}"/>

    
</head>

<body>

<div class="preloader">
    <img class="preloader__image" width="60" src="{{asset('front/assets/images/loader.png')}}" alt=""/>
</div>

<!-- /.preloader -->
<div class="page-wrapper">

<header class="main-header main-header--two clearfix">

    <div class="main-header--two__top clearfix">
        <div class="container-fluid menu-nav-fcfm">
            <div class="main-header--two__top-inner clearfix">
                <div class="main-header--two__top-left">
                    <ul class="main-header--two__top-contact-info list-unstyled">
                        <li class="main-header--two__top-contact-info-single">
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="text">
                                <p><a href="tel:8183294030">(81) 8329 4030</a></p>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="main-header--two__top-right clearfix">
                    <div class="main-header--two__top-right-login-register">
                        
                    </div>
                    <div class="main-header--two__top-right-social-link">
                        <ul class="list-unstyled">
                            <li><a href="https://www.facebook.com/FCFM.UANL" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/FCFMUANL" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    <div class="main-header--two__top-right-button">
                        <button id="dark-mode-toggle" class="dark-mode-toggle"><i class="fas fa-adjust" style="padding:5px;"></i> Dark Mode </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-header-two__bottom">
        <div class="container-fullwidth menu-nav-fcfm">
            <div class="main-header-two__bottom-inner clearfix">
                <nav class="main-menu main-menu--1">
                    <div class="main-menu__inner">
                        <div class="left">
                            <div class="logo-box1">
                                <a href="#">
                                    <img src="{{asset('front/assets/images/resources/fcfm.png')}}"
                                         style="max-width: 200px"
                                         class="img-fluid  d-sm-block d-md-none" alt="FCFM">
                                    <img src="{{asset('front/assets/images/resources/uanl.png')}}"
                                         style="max-width: 200px"
                                         class="img-fluid d-none d-sm-none d-md-block d.lg-block" alt="UANL">
                                </a>
                            </div>
                        </div>
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                        <div class="middle">
                            <ul class="main-menu__list">
                                <li>
                                    <a href="{{route('lics.actuaria')}}">Actuaría</a>
                                </li>
                                <li>
                                    <a href="{{route('lics.lcc')}}">Ciencias Computacionales</a>
                                </li>
                                <li>
                                    <a href="{{route('lics.fisica')}}">Física</a>
                                </li>
                                <li>
                                    <a href="{{route('lics.matematicas')}}">Matemáticas</a>
                                </li>
                                <li>
                                    <a href="{{route('lics.multimedia')}}">Multimedia y Animación Digital</a>
                                </li>
                                <li>
                                    <a href="{{route('lics.seguridad')}}">Seguridad e Informática</a>
                                </li>
                            </ul>
                        </div>

                        <div class="right">
                            <div class="logo-box1">
                                <a href="#">
                                    <img src="{{asset('front/assets/images/resources/fcfm.png')}}"
                                         style="max-width: 200px"
                                         class="img-fluid" alt="FCFM">
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>

</header>


<div class="stricky-header stricky-header--two stricked-menu main-menu">
    <div class="sticky-header__content">

    </div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="#" aria-label="logo image"><img src="{{asset('front/assets/images/resources/fcfm.png')}}"
                                                               style="max-width: 155px" alt=""/></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->


        <ul class="mobile-nav__contact list-unstyled">
     
        <hr>
    </ul><!-- /.mobile-nav__contact -->
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="icon-letter"></i>
                <a href="tel:8183294030">TEL. 81 83 29 40 30</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="https://www.facebook.com/FCFM.UANL" target="_blank" class="fab fa-facebook-square"></a>
                <a href="https://twitter.com/FCFMUANL" target="_blank" class="fab fa-twitter-square"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->
    </div>
    <!-- /.mobile-nav__content -->
</div>

<!--Page Header Start-->
<section class="page-header pt-5 clearfix"
                style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                        <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Multimedia y Animación Digital </div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    @yield('content')


</div><!-- /.page-wrapper -->

<!-- /.mobile-nav__wrapper -->


<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">Buscar...</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Escriba para buscar..."/>
            <button type="submit" aria-label="search submit" class="thm-btn2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="{{asset('front/assets/vendors/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/wow/wow.js')}}"></script>
<script src="{{asset('front/assets/vendors/isotope/isotope.js')}}"></script>
<script src="{{asset('front/assets/vendors/countdown/countdown.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/twentytwenty/twentytwenty.js')}}"></script>
<script src="{{asset('front/assets/vendors/twentytwenty/jquery.event.move.js')}}"></script>
@yield('scriptspage')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

<!-- template js -->
<script src="{{asset('front/assets/js/zilom.js')}}"></script>
<script src="{{asset('front/assets/js/darkmode.js')}}"></script>

</body>

</html>

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
            data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <p>
                        Formar profesionistas capaces de diseñar aplicaciones enfocadas a cubrir necesidades de la industria del arte digital y medios interactivos, haciendo uso de TICs y arte gráfico, para los sectores público y privado.
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LMAD_Alma Patricia Calderón Martínez.JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">M.A. ALMA PATRICIA CALDERON MARTINEZ
                            <br>
                            <span>alma.calderonmrt@uanl.edu.mx</span></h4>
                        <h6 class="courses-one__single-content-title text-center">Coordinador(a) de Licenciatura</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="aspirantes pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Aspirantes (Perfil de Ingreso)</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Perfil de ingreso:</p>
                    </div>
                    <div class="course-details__content-list">
                        Tener interés en las TIC´s y la innovación de las expresiones gráficas.
                        <br>
                        Poseer la capacidad y habilidad para comprender, resolver y aplicar los diferentes algoritmos para el desarrollo de animación y gráficas por computadoras.
                        <br>
                        Tener vocación de servicio para la solución integral de los problemas de la sociedad.
                        <br>
                        Tener habilidad de integrarse en trabajo de equipo interdisciplinario para hacer frente a los retos que la sociedad tecnológica, industrial y de entretenimiento le exige como profesionista.
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de Multimedia y Animación Digital son:</p>
                    </div>
                    <div class="course-details__content-list">
                        El Licenciado en Multimedia y Animación Digital es un profesionista con conocimientos de técnicas y expresiones artísticas y socioculturales, así como dominio de metodologías de desarrollo y mantenimiento de tecnologías de información y comunicaciones. Además conoce la estructura y los componentes de la multimedia, animación y juegos de video que permiten la evaluación del rendimiento y compatibilidad de plataformas existentes, con el fin de mejorar y propiciar la generación de diferentes productos que sean innovadores en la industria.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Start Course Details-->
    <section class="course-details">
        <div class="container">
            <div class="row" id="plan-estudios">
                <div class="col-xl-12 col-lg-12 mb-5">
                    <!--Start Course Details Curriculum-->
                    <div class="course-details__curriculum">
                        <h2 class="course-details__curriculum-title">Plan de Estudios</h2>
                        <hr>
                        <!--Start Single Course Details Curriculum-->
                        <div class="course-details__curriculum-single">

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                            Primer Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Metodología
                                                            de la programación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Álgebra</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Geometría
                                                            analítica
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cálculo
                                                            diferencial
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Física básica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>

                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Segundo Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación básica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Metodología de la programación</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Matemáticas para videojuegos I</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Geometría analítica</li>
                                                            <li> Algebra</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tecnologías multimedia
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Dibujo de la anatomía humana
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Expresiones artísticas y socioculturales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Responsabilidad social y desarrollo sustentable
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td></td>

                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                aria-expanded="false" aria-controls="flush-collapseThree">
                                            Tercer Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingThree"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación avanzada
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación básica</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Matemáticas para videojuegos II</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Matemáticas para videojuegos I</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Producción multimedia
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tecnologías multimedia</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Fundamentos de los videojuegos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Modelado arquitectónico
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Ética y cultura de la legalidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td></td>

                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading4">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse4"
                                                aria-expanded="false" aria-controls="flush-collapse4">
                                            Cuarto Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse4" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación orientada a objetos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación avanzada</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Estructura de datos</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Programación avanzada</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Lógica digital
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Matemáticas para videojuegos I</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Sistemas operativos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Propiedad intelectual
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa I Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cultura de la paz
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td></td>

                                                </tr>
                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Modelado orgánico
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Lenguaje Ensamblador
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading5">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse5"
                                                aria-expanded="false" aria-controls="flush-collapse5">
                                            Quinto Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse5" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Gráficas computacionales I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación orientada a objetos</li>
                                                            <li> Matemáticas para videojuegos II</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Modelos de administración de datos</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Programación orientada a objetos</li>
                                                            <li>Estructura de datos</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Diseño de hápticos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Lógica digital</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Fotografía digital
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cinematrografia
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Liderazgo, emprendimiento e innovación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa II Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Optativa I Área Curricular de Formación Profesional
                                                                Fundamental
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Animación básica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Modelado orgánico
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Preproducción 2D
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Modelado orgánico</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Preproducción de video
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Modelado orgánico</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Administración de alto volumen de datos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Lenguaje Ensamblador</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading6">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse6"
                                                aria-expanded="false" aria-controls="flush-collapse6">
                                            Sexto Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse6" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Gráficas computacionales II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Gráficas computacionales I</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Programación web I
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Redes computacionales
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Diseño de hápticos</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Escenarios de videojuegos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Diseño de hápticos</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Guionismo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cinematrografia</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa III Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optativa II Área Curricular de Formación Profesional
                                                                Fundamental
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Modelado en alto poligonaje
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Animación básica
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Ilustración digital
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Preproducción 2D</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Efectos visuales I
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Preproducción de video</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Interface y experiencia de usuario en web
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Lenguaje Ensamblador</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading7">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse7"
                                                aria-expanded="false" aria-controls="flush-collapse7">
                                            Septimo Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse7" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Gráficas computacionales en web
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Gráficas computacionales II</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Base de datos multimedia
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Modelos de administración de datos
                                                            </li>
                                                            <li>
                                                                Programación web I
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación orientada a la internet
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Redes computacionales</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optimización de videojuegos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Escenarios de videojuegos</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Administración de proyectos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Programación web de capa intermedia
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación web I
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa IV Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optativa III Área Curricular de Formación Profesional
                                                                Fundamental
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Actuación y dirección para animación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Modelado en alto poligonaje
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Animación tradicional de humanos y de animales
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ilustración digital</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación de sistemas móviles
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Interface y experiencia de usuario en web</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Efectos visuales II
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Efectos visuales I</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading8">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse8"
                                                aria-expanded="false" aria-controls="flush-collapse8">
                                            Octavo Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse8" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Realidad Virtual
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Programación web II
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Procesamiento de imágenes
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Diseño de videojuegos en línea
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optimización de videojuegos</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Mercadotecnia
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa V Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optativa IV Área Curricular de Formación Profesional
                                                                Fundamental
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Esqueletos de personajes
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Actuación y dirección para animación
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Animación tradicional de escenarios
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Animación tradicional de humanos y de animales</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Iluminación y audio
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Efectos visuales II</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Administración de servidores
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación de sistemas móviles</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading9">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse9"
                                                aria-expanded="false" aria-controls="flush-collapse9">
                                            Noveno Semestre
                                        </button>
                                    </h2>
                                    <div id="flush-collapse9" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading4"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Servicio
                                                        </a>
                                                    </td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center"></td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Proyección personal y de productos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optativa VI Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>

                                            </table>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requisitos</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Postproducción
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Esqueletos de personajes
                                                            </li>
                                                            <li>
                                                                Animación tradicional de humanos y de animales
                                                            </li>
                                                            <li>
                                                                Iluminación y audio
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Ingeniería de software
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Administración de servidores</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--End Single Course Details Curriculum-->


                    </div>
                    <!--End Course Details Curriculum-->
                </div>
            </div>
        </div>
    </section>

