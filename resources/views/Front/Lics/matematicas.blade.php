
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Matemáticas</title>
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
                        <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Matemáticas</div>
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
                    La matemática ha sido actor protagonista en el desarrollo de los grandes avances científicos y tecnológicos en la mayoría de las áreas del conocimiento mediante la creación de teorías, modelos y herramientas de solución de problemas.

                    El Programa Educativo Licenciado en Matemáticas tiene como objetivo responder a las necesidades que el mundo laboral, científico y académico requiere de nuestros egresados, buscando al mismo tiempo cumplir los objetivos de la Visión UANL 2030 y del Modelo Educativo y Modelo Académico de TSU, PA Y Licenciatura de la UANL en su versión 2015.

                    Por su naturaleza teórica y práctica, los estudiantes de esta licenciatura, desarrollan competencias que les servirán en el mundo real en la aplicación directa en la industria y la investigación. La Licenciatura en Matemáticas forma profesionales con un sólido conocimiento en el álgebra, la geometría, estadística, probabilidad, análisis matemático, investigación de operaciones, topología entre otras que son base para ingresar a un posgrado, a la investigación y la docencia. Un profesional de esta licenciatura, adquiere las competencias necesarias que le impulsan a trabajar en equipo con responsabilidad y disciplina.

                    Es importante que en los contenidos de los programas de estudio se establezca un amplio espectro de actividades de aprendizaje, particularmente aquellas que estén relacionadas con problemáticas reales y socialmente relevantes para el desarrollo del estado. Enseguida una breve descripción de las áreas curriculares en las que se encuentran las de las unidades de aprendizaje.
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LM_María Esther Grimaldo Reyna.JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">DRA. MARÍA ESTHER GRIMALDO REYNA
                            <br>
                            <span>maria.grimaldory@uanl.edu.mx</span></h4>
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
                    <p>Cualidades deseables en el aspirante a ingresar a esta carrera:</p>
                    <p>El estudiante que ingresa a la Facultad proviene del nivel bachillerato o bachillerato técnico, el cual cuenta con las siguientes características de acuerdo al perfil de egreso publicado con la SEP y por el perfil de egreso del bachillerato de la UANL. En su perfil de ingreso se busca que el estudiante pueda resolver problemas de aritmética, geometría, álgebra, estadística y trigonometría de nivel bachillerato, tenga un pensamiento analítico para la identificación de patrones y análisis de figuras, tenga un manejo del español adecuado, y buena comprensión de textos de cualquier tipo.

El aspirante deberá demostrar las aptitudes y competencias en las áreas de pensamiento matemático, pensamiento analítico, estructura de la lengua y comprensión lectora a través del examen EXANI-II de CENEVAL en la prueba de Admisión; mientras que, en la prueba de Diagnóstico, el aspirante deberá demostrar las competencias disciplinares del módulo de Ingenierías y tecnología, el cual incluye las áreas de física y matemáticas que deben dominar los estudiantes para ingresar a esta licenciatura. En la prueba de Admisión se evalúa la habilidad de conocimiento e identificación de información y contenidos específicos; la capacidad de sistematización e integración</p>
                    </div>
                    
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                      
                    </div>
                    <div class="course-details__content-list">
                    Las competencias específicas del profesional de egresados de Matemáticas son:

Propósito del Programa Educativo

Formar Licenciados en Matemáticas con un perfil integral y sentido de responsabilidad social, capaces de validar y analizar teorías matemáticas a través del pensamiento lógicomatemático; plantear, modelar y resolver problemas reales con aplicaciones en la industria y en las ciencias físicas, biológicas y sociales; así como propiciar el pensamiento matemático mediante procesos de enseñanza aprendizaje. Son distinguidos por colaborar en proyectos de investigación de forma ética, en equipos interdisciplinarios y utilizar tecnologías de vanguardia. Los Licenciados en Matemáticas contribuyen al avance de la ciencia y su aplicación en beneficio de diferentes sectores gubernamentales y la industria privada.
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
                                            <table class="table ">
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
                                                            Tópicos de álgebra
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Álgebra</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Cálculo integral</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li> Cálculo diferencial</li>
                                                            <li> Álgebra</li>
                                                            <li> Geometría analítica</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación estructurada
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología de la programación</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Matemáticas discretas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología de la programación</li>
                                                            <li> Álgebra</li>
                                                            <li> Cálculo diferencial</li>
                                                        </ul>                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Mecánica traslacional y rotacional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">6</td>
                                                    <td class="text-center">7</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología de la programación</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Laboratorio de Programación Estructurada
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">1</td>
                                                    <td>
                                                        <ul>
                                                            <li> Programación estructurada</li>
                                                        </ul>
                                                    </td>

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
                                                            Cálculo de varias variables
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo integral</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Álgebra lineal</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li> Tópicos de álgebra</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Matemáticas computacionales
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cultura de paz
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Geometría moderna
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
                                                            Optativa I área curricular de formación profesional fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>

                                                </tr>
                                            </table>
                                            </div>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
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
                                                            Teoría de grafos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación lineal</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Estructura de datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    </td>
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
                                                            Ecuaciones diferenciales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo de varias variables</li>
                                                            <li>Álgebra lineal</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Variable compleja</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo de varias variables</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Cálculo vectorial
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo de varias variables</li>
                                                        </ul>
                                                    </td>
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
                                                    <td class="text-center">1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Probabilidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de álgebra</li>
                                                            <li>Cálculo de varias variables</li>
                                                        </ul>
                                                    </td>

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
                                                    <td class="text-center">1</td>
                                                    <td></td>

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
                                                            Estadística
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Probabilidad</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Tópicos de álgebra lineal</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Álgebra lineal</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tópicos de ecuaciones diferenciales
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ecuaciones diferenciales</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Historia de las matemáticas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ecuaciones diferenciales</li>
                                                        </ul>                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Tópicos de variable compleja
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Variable compleja</li>
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
                                                            Análisis matemático
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo de varias variables</li>
                                                            <li>Variable compleja</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Minería de datos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Estadística</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación lineal
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Álgebra lineal</li>
                                                            <li>Cálculo de varias variables</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Teoría de grupos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de álgebra lineal</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Matemática educativa
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Historia de las matemáticas</li>
                                                        </ul>
                                                    </td>

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
                                                    <td class="text-center">1</td>
                                                    <td>
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
                                                            Tópicos de análisis matemático
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Análisis matemático</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Teoría de anillos y campos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Teoría de grupos
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Topología
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Análisis matemático</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Enseñanza de las ciencias físico matemáticas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Matemática educativa</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Investigación de operaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación lineal</li>
                                                            <li>Probabilidad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa II área curricular de formación profesional fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    </td>

                                                </tr>
                                            </table>
                                            </div>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
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
                                                            Programación entera
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Programación lineal
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Muestreo
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Estadística</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Teoría de juegos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación lineal</li>
                                                            <li>Análisis matemático</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Análisis numérico
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación estructurada</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Lógica y conjuntos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
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
                                                            Teoría de la medida
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de análisis matemático</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Servicio social
                                                        </a></td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center"></td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optativa III área curricular de formación profesional fundamental
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
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
                                                            Simulación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Estadística
                                                            </li>
                                                            <li>
                                                                Investigación de operaciones
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tópicos de álgebra abstracta
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Teoría de anillos y campos</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Diseño de experimentos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Estadística</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Didáctica de las matemáticas
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Matemática educativa</li>
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
                                                            Geometría diferencial
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Topología</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Métodos de optimización
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Investigación de operaciones</li>
                                                            <li>Tópicos de análisis matemático</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optativa IV área curricular de formación profesional fundamental
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optativa V área curricular de formación profesional fundamental
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optativa VI área curricular de formación profesional fundamental
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Taller para examen de egreso
                                                        </a></td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Seminario de investigación
                                                        </a></td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Seminario para el desempeño profesional
                                                        </a></td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">1</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            </div>
                                            <h2 class="pt-4 pb-1">Optativas</h2>
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
                                                            Análisis funcional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Teoría de la medida
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Investigación educativa
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Matemática educativa</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Optimización de aplicaciones industriales
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Investigación de operaciones</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Teoría de control
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de ecuaciones diferenciales</li>
                                                            <li>Tópicos de análisis matemático</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tópicos de optimización
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Investigación de operaciones</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Introducción a la geometría algebraica
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de álgebra abstracta</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Análisis de algoritmos
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tópicos de topología
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Topología</li>
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

