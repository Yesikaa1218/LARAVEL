
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Física</title>
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
                            <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Física</div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->
    @yield('content')










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
                    Competencias de la carrera
                    <br>
                    1.- Formular modelos físicos óptimos, utilizando herramientas matemáticas y principios físicos, que se adapten a las condiciones actuales del avance científico y tecnológico, enfocados a resolver problemas de índole práctico y teórico, los cuales contribuyan al desarrollo de la sociedad.
                    <br>
                    2.- Manejar equipos tecnológicos de vanguardia en grupos inter y multidisciplinarios mediante la aplicación de protocolos experimentales y estándar de seguridad, manuales operativos y tratamiento de datos, bajo criterios de ética para contribuir al bienestar y seguridad de los agentes implicados en el proceso de operación.
                    <br>
                    3.- Propiciar procesos de enseñanza - aprendizaje de las ciencias naturales y exactas mediante estrategias acordes al contexto educativo formal y no formal con una actitud de liderazgo, empleando plataformas tecnológicas y los principios de responsabilidad social que le permitan explicar la importancia de los fenómenos naturales y su influencia en la vida cotidiana de la sociedad actual.
                    <br>
                    4.- Colaborar en proyectos de investigación científica y tecnológica de alto impacto, empleando el método científico y el trabajo colaborativo, siguiendo un código de ética y honestidad, en instituciones públicas y privadas para producir conocimiento de frontera sobre fenómenos físicos.
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LF_Omar González Amezcua .JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">Dr. Omar Gonzalez Amezcua
                            <br>
                            <span>omar.gonzalezmz@uanl.edu.mx</span></h4>
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
                        <p> El candidato a cursar el programa educativo de Licenciatura en Física deberá manifestar y tener las siguientes características:</p>
                    </div>
                    <div class="course-details__content-list">
                    <br>
                    i. Características evaluables
                    <br>
                    • Resolver problemas de razonamiento: aritmético, geométrico, algebraico y estadístico. • Aplicar las herramientas matemáticas para la elaboración, diseño y construcción de modelos teóricos de los fenómenos físicos.
                    <br>
                    • Integrar ideas y conceptos de diversos principios físicos en un solo marco conceptual general.
                    <br>
                    • Extraer conclusiones apropiadas del análisis de información presentada en forma gráfica.
                    <br>
                    • Integrar un conjunto de información en forma gráfica de forma tal que se pueda fácilmente identificar información y contenidos específicos y relevantes.
                    <br>
                    • Tener un domino amplio de la lengua (escrita y oral) de forma tal que permita la comunicación de un mensaje claro a una audiencia técnica.
                    <br>
                    • Poseer la capacidad de comprender información de textos científicos y técnicos.
                    <br><br>
                    ii. Características deseables
                    <br>
                    • Tener vocación de servicio para la solución integral de los problemas de la sociedad.
                    <br>
                    • Tener habilidad de integrarse en trabajo de equipo interdisciplinario para hacer frente a los retos que la sociedad científica e industrial le exige como profesionista.
                    <br>
                    • Tener interés en la ciencia y la investigación.
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de la licenciatura en Física son:</p>
                    </div>
                    <div class="course-details__content-list">
                    Formar profesionistas en Física con un perfil integral, líderes en el manejo y operación de equipos tecnológicos de vanguardia, con responsabilidad social y compromiso ético para responder a las necesidades actuales de una sociedad altamente industrializada.
                    <br>
                    Se distinguen por colaborar en equipos multi e interdisciplinarios en proyectos de investigación científica, aplicando técnicas analíticas, experimentales y de simulación; explicar y divulgar el conocimiento científico y tecnológico en la educación formal y no formal, así como su influencia en la vida cotidiana mediante teorías, modelos y experimentos que describan las interacciones entre la materia y la energía en todas las escalas de espacio, tiempo y velocidad.
                    <br>
                    Son reconocidos por contribuir a la mejora del bienestar de la sociedad actual al generar soluciones óptimas a problemáticas científicas y tecnológicas que permitan proponer soluciones a fenómenos físicos que impacten en la sociedad a nivel local, nacional e internacional.
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
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Competencia comunicativa
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td><!-- OLA CHOBBI-->
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Cálculo diferencial
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
                                                            Álgebra
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
                                                            Mecánica translacional
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
                                                            Geometría Analítica
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
                                                            Aplicación de las tecnologías de la informacion
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
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
                                                            Introducción a la nanotecnología
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Derechos humanos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Desarrollo humano y competitividad profesional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                           Equidad de genero
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Autocuidado y estilos de vida saludable
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cálculo integral
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo diferencial</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Tópicos de álgebra
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
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
                                                    <td>
                                                        <a href="#">
                                                            Mecánica toracional, fluidos y calor
                                                        </a>
                                                    </td>
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
                                                            Programación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Cálculo diferencial</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Astrometría Esférica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Cultura regional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Antropología social
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Métodos alternos de la solución de controversias
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Psicología y desarrolo profesional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Cultura de calidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Educación física
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Astronomía general I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Cálculo de varias variables </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li> Cálculo integral</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Álgebra lineal
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Tópicos de álgebra</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Electricidad y magnetísmo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Mecánica rotacional fluidos y calor</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Ecuaciones diferenciales
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
                                                    <td>
                                                        <a href="#">
                                                            Análisis y técnicas experimentales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Apreciación de las artes
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Competencia comunicativa en íngles
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
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
                                                            Introdución a la nanobiotecnología 
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Astronomía general II y cálculo numérico</a></td>
                                                    <td class="text-center">3</td>
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
                                                            Cálculo vectorial
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Variable compeja
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Ondas y electromagnetísmo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Electricidad y magnetísmo</li>
                                                        </ul>
                                                    </td>
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
                                                    <td class="text-center">3</td>
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
                                                            Metrología
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Química
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Contexto social de la profesión
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Ambiente y sustentabilidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
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
                                                            Física moderna
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ondas y electromagnetismo</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Historia de la física</a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Física del sistema solar
                                                        </a></td>
                                                    <td class="text-center">3</td>
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
                                                            Mecánica celeste
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Electrónica digital 
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ondas y electromagnetismo</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Física térmica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ondas y electromagnetismo</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Mecánica teórica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ondas y electromagnetismo</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Métodos matemáticos de la física I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
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
                                                            Física computacional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
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
                                                    <td>
                                                        <a href="#">
                                                            Ciencia de materiales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Formación y evolucion estelar
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Semanario de Física
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Química computacional para nanotecnología 
                                                        </a></td>
                                                    <td class="text-center">3</td>
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
                                                            Aplicaciones de nanotecnología computacional
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
                                                            Materiales nanoestructurados
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
                                                            Circuitos electronicos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Electrónica digital</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Física estadística
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Física térmica</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Teoría electromagnética
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Mecánica teórica</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Mecánica cuántica I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Física moderna</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Métodos matemáticos de la física II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Métodos matemáticos de la física I</li>
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
                                                    <td class="text-center">3</td>
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
                                                            Física experimental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td>
                                                        <a href="#">
                                                            Física nuclear
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Magnetismo en sistemas de baja dimensionalidad
                                                        </a></td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Tópicos de física matemática
                                                        </a></td>
                                                    <td class="text-center">2</td>
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
                                                            Servicio social
                                                        </a>
                                                    </td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center">20</td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Estado sólido
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul> 
                                                            <il> Teoría electromagnética</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Mecánica cuántica II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Óptica y aplicaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Matemáticas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Ética, sociedad y profesión
                                                        </a></td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Metodología científica
                                                        </a></td>
                                                    <td class="text-center">2</td>
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
                                                            Formación de emprendedores
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                    <h2 class="accordion-header" id="flush-heading9">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse9"
                                                aria-expanded="false" aria-controls="flush-collapse9">
                                            Optativas
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
                                                            Libre elección
                                                        </a>
                                                    </td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center">20</td>
                                                    <td>
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

