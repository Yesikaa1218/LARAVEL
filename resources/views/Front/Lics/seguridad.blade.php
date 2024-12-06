
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Seguridad de Tecnologías de Información </title>
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
<div class="page-wrapper"><header class="main-header main-header--two clearfix">

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
                        <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Seguridad de Tecnologías de Información </div>
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
                        Una carrera donde comprenderás los tópicos más importantes para ser parte activa dentro de la industria 4.0 un complemento importante para el avance de la tecnología en todas sus formas. Con las unidades de aprendizaje dentro del plan de estudios te permitirá. 
                        <br>
                        - Diseñar políticas y protocolos de seguridad en la información con base en la identificación y evaluación de riesgos, para apoyar a las organizaciones al desarrollo de sus procesos de tecnologías de la información de manera segura y garantizar su continuidad ante contingencias.
                        <br>
                        - Asesorar en procesos de tecnologías de información a las organizaciones e individuos en el cumplimiento de las leyes, estándares y normas nacionales e internacionales del manejo y uso ético de la información para mejorar la reputación y la calidad de las actividades.
                        <br>
                        - Trazar estrategias y soluciones de seguridad utilizando herramientas computacionales de última generación, evaluando tecnologías emergentes y su adaptabilidad a las plataformas actuales para fortalecer la seguridad en los sistemas computacionales y en los procesos de las organizaciones de los diferentes sectores de la sociedad
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LSTI_GUILLERMO EZEQUIEL SANCHEZ GUERRERO.JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">Guillermo Ezequiel Sánchez Guerrero
                            <br>
                            <span>guillermo.sanchezgr@uanl.edu.mx</span></h4>
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
                        El perfil requiere que el aspirante haya concluido sus estudios en el Nivel Medio Superior, y que cuente con los siguientes conocimientos:
                        <br>
                        - Elementos básicos de aritmética, geometría, trigonometría, álgebra y lógica matemática.
                        <br>
                        - Elementos básicos de computación y manejo de equipo de cómputo y conocimientos sobre la aplicación de software actualizado.
                        <br>
                        - Elementos suficientes en español: lectura, escritura, pronunciación, redacción, conversación con solvencia para el estudio de la licenciatura.
                        <br>
                        - Elementos suficientes de inglés: lectura, escritura, pronunciación, redacción, conversación con solvencia para el estudio de la licenciatura.
                        <br>
                        - Elementos básicos de cultura general. Información general acerca del entorno político, económico y social actual.
                        <br>
                        <br>
                        Cualidades deseables en el aspirante a ingresar a esta carrera:
                        <br>
                        - Interés de incursionar en las nuevas tecnologías computacionales.
                        <br>
                        - Sustentar una postura personal sobre temas de interés y relevancia general.
                        <br>
                        - Interés de seguir actualizándose en temáticas de la disciplina.
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de Licenciatura en Seguridad de Tecnologías de Información son:</p>
                    </div>
                    <div class="course-details__content-list">
                        Formar profesionistas en Seguridad en Tecnologías de Información que sean capaces de resolver problemas a través del razonamiento crítico, con ética y honestidad, que posean las competencias necesarias para desarrollar estrategias de seguridad de la información; implementar y mantener plataformas tecnológicas; ofrecer consultoría para la implementación y cumplimento de leyes, estándares y normas del manejo ético de las tecnologías de información; diseñar y administrar redes de telecomunicaciones; evaluar y desarrollar aplicaciones de software; así como desarrollar políticas, protocolos y planes de contingencia, con el fin de preservar la integridad, confidencialidad y disponibilidad de la información, así como el cumplimiento de los objetivos y compromisos legales, sociales, tecnológicos y económicos de los individuos y las organizaciones a nivel local, nacional e internacional.
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
                                <!-- PRIMER SEMESTRE -->
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
                                                        Ingeniería
                                                        social
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
                                                    <td><a href="#">
                                                        Principios de
                                                        arquitectura
                                                        computacional
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
                                                            Programación
                                                            orientada a
                                                            objetos
                                                        </a></td>
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
                                                            Lab. programación
                                                            orientada a
                                                            objetos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
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
                                                            Normatividad y
                                                            regulaciones
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
                                                            Fundamentos de
                                                            la seguridad
                                                            informática
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
                                                            Aplicación de
                                                            las tecnologías
                                                            de información
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
                                                            Competencia
                                                            comunicativa
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
                                                            Tópicos selectos
                                                            de desarrollo
                                                            humano, salud
                                                            y deportes
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
                                <!-- SEGUNDO SEMESTRE -->
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
                                                            Circuitos digitales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Principios de arquitectura computacional</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Diseño orientado a objetos</a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Programación orientada a objetos</li>
                                                            <li> Lab. programación orientada a objetos</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Laboratorio diseño orientado a objetos
                                                        </a></td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Programación orientada a objetos</li>
                                                            <li> Lab. programación orientada a objetos</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Cálculo diferencial y
                                                            geometría analítica
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Álgebra</li>
                                                        </ul>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Telecomunicaciones I
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
                                                            Laboratorio telecomunicaciones I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Laboratorio circuitos digitales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Principios de arquitectura computacional</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Optativa I
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
                                                            Tópicos selectos de ciencias
                                                            sociales, artes y humanidades
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                            Medios de transmisión y normatividad
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
                                                    <td><a href="#">
                                                            Administracion
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Medios de transmisión y normatividad</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                        Evidencias digitales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Normatividad y regulaciones</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERCER SEMESTRE -->
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
                                                            Sistemas operativos
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
                                                    <td><a href="#">Base de datos</a></td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Lab. programación orientada a objetos</li>
                                                            <li> Programación orientada a objetos</li>
                                                            <li> Laboratorio diseño orientado a objetos</li>
                                                            <li> Diseño orientado a objetos</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                            Laboratorio base de datos
                                                        </a></td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Diseño orientado a objetos</li>
                                                            <li> Laboratorio diseño orientado a objetos</li>
                                                        </ul>
                                                    </td>
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
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Álgebra</li>
                                                            <li> Cálculo diferencial y geometría analítica</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Telecomunicaciones II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones I</li>
                                                            <li> Laboratorio telecomunicaciones I</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Laboratorio telecomunicaciones II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones I</li>
                                                            <li> Laboratorio telecomunicaciones I</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Análisis y administración del riesgo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Ingeniería social
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
                                                            Optativa II
                                                        </a>
                                                    </td>
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
                                                        Reconocimiento y deteccion de amenazas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Fundamentos de la seguridad informática</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Derecho informatico
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Normatividad y regulaciones</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Contabilidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Herramientas y protocolos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Comportamiento organizacional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- CUARTO SEMESTRE -->
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
                                                    <td>
                                                        <a href="#">
                                                            Seguridad en aplicaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Sistemas operativos</li>
                                                        </ul>
                                                    </td>

                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Laboratorio seguridad en aplicaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Sistemas operativos</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Teoría de la información I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
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
                                                    <td>
                                                        <a href="#">
                                                            Teoria de automatas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Álgebra</li>
                                                            <li> Cálculo diferencial y geometría analítica</li>
                                                            <li> Cálculo integral</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                            Álgebra lineal
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Álgebra</li>
                                                            <li> Cálculo diferencial y geometría analítica</li>
                                                            <li> Cálculo integral</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Telecomunicaciones III
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones I</li>
                                                            <li> Laboratorio telecomunicaciones I</li>
                                                            <li> Telecomunicaciones II</li>
                                                            <li> Laboratorio telecomunicaciones II</li>

                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio telecomunicaciones III
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones I</li>
                                                            <li> Laboratorio telecomunicaciones I</li>
                                                            <li> Telecomunicaciones II</li>
                                                            <li> Laboratorio telecomunicaciones II</li>

                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Seguridad física
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                        Ambiente y sustentabilidad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                        Optativa III
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                        Optativa IV
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
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
                                                    Programacion I
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
                                                    <td><a href="#">
                                                    Programacion C++
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
                                                    <td><a href="#">
                                                    Laboratorio de programacion I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">3</td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Laboratorio de programacion C++
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
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
                                                    Metodología y sistemas de control de acceso
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Seguridad física</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Laboratorio metodología y sistemas de control de A	
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Seguridad física</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Teoría de la información II
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Teoría de la información I</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Criptografía aplicada
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Teoria de automatas</li>
                                                            <li> Álgebra</li>
                                                            <li> Cálculo integral</li>
                                                            <li> Teoría de la información I</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Diseño de arquitecturas de seguridad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                        Telecomunicaciones IV
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones I</li>
                                                            <li> Laboratorio telecomunicaciones I</li>
                                                            <li> Telecomunicaciones II</li>
                                                            <li> Laboratorio telecomunicaciones II</li>
                                                            <li> Telecomunicaciones III</li>
                                                            <li> Laboratorio telecomunicaciones III</li>

                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio telecomunicaciones IV
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Telecomunicaciones III</li>
                                                            <li> Laboratorio telecomunicaciones III</li>

                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Operación de la seguridad
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Seguridad en aplicaciones</li>
                                                            <li> Laboratorio seguridad en aplicaciones</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Contexto social de la profesion
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                        OPTATIVA V
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
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
                                                    Estructura de datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Ataque de ingenieria social
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                             Ingeniería social
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Tópicos de tecnologías I
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Comunicación digital
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Seguridad en bases de datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
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
                                                    <td><a href="#">
                                                    Seguridad en sistemas operativos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
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
                                                    Análisis forense
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Laboratorio análisis forense
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Prácticas avanzadas de seguridad informática
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Laboratorio prácticas avanzadas de seguridad informática
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Diseño de políticas y programas empresariales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Competencia comunicativa en ingles
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
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
                                                    <td><a href="#">
                                                    Continuidad de negocio y planeación de recuperacion
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Metodología y sistemas de control de acceso</li>
                                                            <li> Laboratorio metodología y sistemas de control de A</li>
                                                            <li> Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Optativa VI
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                        
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
                                                        Investigacion de operaciones
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
                                                    <td><a href="#">
                                                        Pruebas de penetracion a redes
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                         <ul>
                                                            <li>Operación de la seguridad</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Sistemas de conmutación y telefonía
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
                                                    <td><a href="#">
                                                    Tópicos de tecnologías II
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
                                                    <td><a href="#">
                                                    Seguridad en desarrollo de software
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
                                                    <td><a href="#">
                                                    Seguridad en redes de voz sobre IP
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
                                                    <td><a href="#">
                                                    Seguridad de redes inalambricas
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
                                                    <td><a href="#">
                                                    Tòpicos de seguridad
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
                                                        Seguridad de las telecomunicaciones y redes
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Prácticas avanzadas de seguridad informática</li>
                                                            <li>Laboratorio prácticas avanzadas de seguridad informatica</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                        Laboratorio seguridad de las telecomunicaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li>Prácticas avanzadas de seguridad informática</li>
                                                            <li>Laboratorio prácticas avanzadas de seguridad informatica</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                        Servicio Social
                                                        </a>
                                                    </td>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center">20</td>
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
                                                        Optativa VII
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            
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
                                                        Analisis de vulnerabilidades
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
                                                        <td><a href="#">
                                                        Simulaciòn de computadoras
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
                                                        <td><a href="#">
                                                        Anàlisis de brecha
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
                                                        <td><a href="#">
                                                        Tendencias tecnològicas
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
                                                    Etica sociedad y profesion
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
                                                    <td><a href="#">
                                                    Libre elección
                                                        </a>
                                                    </td>
                                                    <td class="text-center">18</td>
                                                    <td class="text-center">20</td>
                                                    <td>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Topicos selectos para el desarrollo académico y profesional
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                
                                            </table>
                                            <div class="table-responsive">
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

