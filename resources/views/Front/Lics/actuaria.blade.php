
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Actuaría</title>
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

<!--Page Header Start-->
<section class="page-header pt-5 clearfix"
                style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                        <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Actuaría</div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->
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
                        El propósito del programa educativo es formar Licenciados en Actuaria con un perfil integral, altamente competentes en el mundo laboral, capaces de entender holísticamente la realidad, con plena conciencia de la situación regional, nacional y mundial, comprometidos con el desarrollo sustentable, económico, tecnológico y social de la humanidad capaces de estudiar, planear y formular modelos matemáticos así como estadísticos y probabilísticos y modelos computacionales, con el fin de proveer información para la planeación, la previsión y la toma de decisiones acerca de fenómenos que involucran riesgos, además de ofrecer soluciones optimas u asesoría experta a problemas financieros, empresariales y sociales que involucren eventos futuros inciertos, tanto en el ámbito público como privado. Los profesionistas egresados del programa educativo de licenciado en actuaria deben distinguirse por practicar los valores de la UANL como son equidad, honestidad, libertad, integridad, comportamiento ético y justicia, en su ámbito personal y profesional para contribuir a construir una sociedad sustentable.
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LA_Abigail Contreras Mendoza.JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">ABIGAIL CONTRERAS MENDOZA
                            <br>
                            <span>abigail.contrerasmnd@uanl.edu.mx</span></h4>
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
                    </div>
                    <div class="course-details__content-list">
                        -Posee conocimientos en álgebra, cálculo diferencial e integral y geometría analítica a nivel bachillerato.
                        <br>
                        -Demuestra capacidad para la concentración y el trabajo durante largos periodos de tiempo.
                        <br>
                        -Es tenaz y perseverante al analizar y resolver problemas.
                        <br>
                        -Es creativo.
                        <br>
                        -Posee marcado gusto por el estudio.
                        <br>
                        -Tiene interés profundo en la aplicación de los conocimientos a problemas reales.
                        <br>
                        -Posee aptitud de trabajo metódico y disciplinado.
                        <br>
                        -Demuestra actitud proactiva y responsable ante los retos en situaciones adversas.
                        <br>
                        -Mantiene una actitud orientada hacia la solución de problemas.
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de Actuaría son:</p>
                    </div>
                    <div class="course-details__content-list">
                        -Tendrá una sólida formación matemática y estadística.
                        <br>
                        -Conocimientos acerca de seguros, matemáticas actuariales, pensiones y finanzas.
                        <br>
                        -Será capaz de estudiar, plantear y formular modelos de contenido matemático, con el fin de proveer información para la planeación, la previsión y la toma de decisiones.
                        <br>
                        -Integrará conocimientos matemáticos y actuariales en la solución de problemas concretos.
                        <br>
                        -Empleará la informática y la tecnología computarizada en el trabajo cotidiano.
                        <br>
                        -Expresará de manera clara y precisa las ideas, en forma oral y escrita.
                        <br>
                        -Tomará decisiones en torno a problemas actuariales.
                        <br>
                        -Obtendrá y valorará información.
                        <br>
                        -Utilizará el idioma ingles como medio de comunicación.
                        <br><br>
                        Actitudes deseables en el egresado de esta carrera:
                        <br><br>
                        -Vocación de servicio a la comunidad.
                        <br>
                        -Cooperación para el trabajo en equipo multidisciplinario.
                        <br>
                        -Crítica y apertura ante las situaciones de cambio social, científico y tecnológico.
                        <br>
                        -Honestidad y alto sentido humanista.
                        <br>
                        -Competencia para la administración de recursos.
                        <br>
                        -Liderazgo en proyectos del campo profesional.
                        <br>
                        -Fuertes principios éticos y morales con la sociedad
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
                                                            Tópicos de álgebra
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
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
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Programación I
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
                                                            Matemáticas financieras
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
                                                            Seguro de vida
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
                                                            Análisis de datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
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
                                                            Álgebra lineal
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Cálculo de varias variables</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Probabilidad básica
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Economía
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
                                                            Seguro de daños
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
                                                            Contexto económico geopolítico
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                            Ecuaciones diferenciales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Probabilidad avanzada</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Matemáticas financieras avanzadas
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Contabilidad
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
                                                        Análisis de datos avanzados
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
                                                            Cultura de la paz
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
                                                        Inferencia estadística
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
                                                    <td><a href="#">Portafolios de inversión</a></td>
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
                                                        Métodos numéricos
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
                                                            	Cálculo actuarial
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
                                                    <td>
                                                        
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
                                                    <td>
                                                        <a href="#">
                                                         	Optativa I Área curricular de Formación profesional fundamental
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
                                                        Optativa II Área curricular de formación profesional fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

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
                                                         Procesos estocásticos
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
                                                    <td><a href="#">Métodos estadísticos
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
                                                        Matemáticas actuariales del seguro de vida
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
                                                        Investigación de operaciones
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
                                                        Optativa III Área curricular de formación profesional fundamental
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
                                                            Optativa IV Área curricular de formación profesional fundamental
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
                                                    <td><a href="#">
                                                            Demografía
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
                                                    <td><a href="#">Estadística aplicada
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
                                                    Productos financieros derivados
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
                                                        Simulación
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
                                                        Planeación estratégica
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
                                                        Optativa V Área curricular de formación profesional fundamental
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
                                                        Ética y cultura de la legalidad
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
                                                        Pensiones
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
                                                    <td><a href="#">Administración del riesgo empresarial
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
                                                    Finanzas corporativas
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
                                                        Matemáticas actuariales del seguro de daños
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
                                                        Servicio social
                                                        </a>
                                                    </td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center">2</td>
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
                                                        Teoría del riesgo
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
                                                    <td><a href="#">Administración actuarial
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
                                                    Administración del riesgo empresarial aplicada
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Teoría del comportamiento
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Optativa VI Área curricular de formación profesional fundamental
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Optativa Área curricular de formación profesional integradora
                                                        </a></td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">5</td>
                                                    <td></td>
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
<br> <br>
                        <!--Start Course Details Curriculum-->
                        <div class="course-details__curriculum">
                        <h2 class="course-details__curriculum-title">Optativas</h2>
                        <hr>
                        <!--Start Single Course Details Curriculum-->
                            <div class="course-details__curriculum-single">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse10"
                                                    aria-expanded="false" aria-controls="flush-collapse10">
                                                    Optativa I Área Curricular de Formación Profesional - Fundamental 
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Contabilidad de seguros
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">Programación II
                                                            </a></td>
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
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse17"
                                                    aria-expanded="false" aria-controls="flush-collapse17">
                                                    Optativa II Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse17" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Mercadotecnia
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Administración
                                                            </a></td>
                                                        <td class="text-center">3</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse16"
                                                    aria-expanded="false" aria-controls="flush-collapse16">
                                                    Optativa III Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse16" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Legislación de seguros
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Modelado matemático
                                                            </a></td>
                                                        <td class="text-center">3</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse11"
                                                    aria-expanded="false" aria-controls="flush-collapse11">
                                                    Optativa IV Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Comportamiento organizacional
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Muestreo
                                                            </a></td>
                                                        <td class="text-center">3</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse13"
                                                    aria-expanded="false" aria-controls="flush-collapse13">
                                                    Optativa V Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse13" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Modelo de negocios
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Minería de datos
                                                            </a></td>
                                                        <td class="text-center">3</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse14"
                                                    aria-expanded="false" aria-controls="flush-collapse14">
                                                    Optativa VI Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse14" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Teoría de juegos
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Auditoría actuarial
                                                            </a></td>
                                                        <td class="text-center">3</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading9">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse15"
                                                    aria-expanded="false" aria-controls="flush-collapse15">
                                                    Optativa VI Área Curricular de Formación Profesional - Fundamental
                                            </button>
                                        </h2>
                                        <div id="flush-collapse15" class="accordion-collapse collapse"
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </th>
                                                        <td><a href="#">
                                                        Estancia de Investigación
                                                            </a>
                                                        </td>
                                                        <td class="text-center">3</td>
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
                        <!--End Single Course Details Curriculum-->
                    </div>
                    <!--End Course Details Curriculum-->





                </div>
            </div>
        </div>
    </section>

