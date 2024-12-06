
<!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>FCFM | Licenciatura en Ciencias Computacionales</title>
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
                            <div class="h2" style="text-transform: none; font-size: 40px; color: white">Licenciatura en Ciencias Computacionales </div>
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
                    Abordar las Ciencias Computacionales desde un enfoque fundamental de las Matemáticas y la Lógica, para aprender y desarrollar tecnología de vanguardia.
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">

                        <img src="{{asset('front/assets/images/coordinadores/LCC_Perla Marlene Viera González.JPG')}}" class="img-thumbnail"
                            alt="Nombre Coordinador"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">DRA. PERLA MARLENE VIERA GONZÁLEZ
                            <br>
                            <span>perla.vieragn@uanl.edu.mx</span></h4>
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
                        <p>El aspirante al programa educativo debe cumplir con las siguientes cualidades:</p>
                    </div>
                    <div class="course-details__content-list">
                    Posee conocimientos en álgebra, cálculo diferencial e integral y geometría analítica a nivel bachillerato.
                    <br>
                    Demuestra capacidad para la concentración y el trabajo durante largos periodos de tiempo.
                    <br>
                    Es tenaz y perseverante al analizar y resolver problemas.
                    <br>
                    Tiene interés profundo en la aplicación de los conocimientos a problemas reales.
                    <br>
                    Posee aptitud de trabajo metódico y disciplinado.
                    <br>
                    Demuestra actitud proactiva y responsable ante los retos en situaciones adversas.
                    <br>
                    <br>
                    El aspirante deberá demostrar las aptitudes y competencias en las áreas de pensamiento matemático, pensamiento analítico, estructura de la lengua y comprensión lectora a través del examen EXANI-II de CENEVAL en la prueba de Admisión, adicional a esto en la prueba de Diagnóstico, el aspirante deberá demostrar las competencias disciplinares del módulo de Ingenierías y tecnología, el cual incluye las áreas de física y matemáticas que deben dominar los estudiantes para ingresar al programa de educación superior que han elegido.
                    <br>
                    <br>
                    Para que el estudiante logre con éxito el plan de estudios es deseable que posea las siguientes características:
                    <br>
                    Tener gusto por la ciencia y la tecnología.
                    <br>
                    Tener gusto por las matemáticas.
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Los egresados de la Licenciatura en Ciencias Computacionales:</p>
                    </div>
                    <div class="course-details__content-list">
                    <br>
                    Podrán trabajar en equipos multidisciplinarios; con responsabilidad y ética profesional;
                    <br>
                    Serán capaces de desarrollar tecnologías computacionales innovadoras;
                    <br>
                    Adquirirán las competencias para analizar y diseñar soluciones tecnológicas mediante la utilización de modelos matemáticos;
                    <br>
                    Crearán software utilizando herramientas computacionales de última generación;
                    <br>
                    Administrarán proyectos de sistemas computacionales;
                    <br>
                    Diseñarám estrategias, metodologías o herramientas tecnológicas para desempeñarse en departamentos de sistemas, tecnologías de información, soporte tecnológico o de desarrollo de software,
                    <br>
                    Todo lo anterior, a fin de contribuir al desarrollo de las organizaciones tanto en el ámbito público como privado.


                    <br><br>
                    Competencias generales
                    <br><br>
                    Competencias instrumentales
                    <br>
                    1. Aplicar estrategias de aprendizaje autónomo en los diferentes niveles y campos del conocimiento que le permitan la toma de decisiones oportunas y pertinentes en los ámbitos personal, académico y profesional.
                    <br>
                    2. Utilizar los lenguajes lógico, formal, matemático, icónico, verbal y no verbal de acuerdo a su etapa de vida, para comprender, interpretar y expresar ideas, sentimientos, teorías y corrientes de pensamiento con un enfoque ecuménico.
                    <br>
                    3. Manejar las tecnologías de la información y la comunicación como herramienta para el acceso a la información y su transformación en conocimiento, así como para el aprendizaje y trabajo colaborativo con técnicas de vanguardia que le permitan su participación constructiva en la sociedad.
                    <br>
                    4. Dominar su lengua materna en forma oral y escrita con corrección, relevancia, oportunidad y ética adaptando su mensaje a la situación o contexto, para la transmisión de ideas y hallazgos científicos.
                    <br>
                    5. Emplear pensamiento lógico, crítico, creativo y propositivo para analizar fenómenos naturales y sociales que le permitan tomar decisiones pertinentes en su ámbito de influencia con responsabilidad social.
                    <br>
                    6. Utilizar un segundo idioma, preferentemente el inglés, con claridad y corrección para comunicarse en contextos cotidianos, académicos, profesionales y científicos.
                    <br>
                    7. Elaborar propuestas académicas y profesionales inter, multi y transdisciplinarias de acuerdo a las mejores prácticas mundiales para fomentar y consolidar el trabajo colaborativo.
                    <br>
                    8. Utilizar los métodos y técnicas de investigación tradicionales y de vanguardia para el desarrollo de su trabajo académico, el ejercicio de su profesión y la generación de conocimientos
                    <br><br>
                    Competencias personales y de interacción social
                    <br>
                    9. Mantener una actitud de compromiso y respeto hacia la diversidad de prácticas sociales y culturales que reafirman el principio de integración en el contexto local, nacional e internacional con la finalidad de promover ambientes de convivencia pacífica.
                    <br>
                    10. Intervenir frente a los retos de la sociedad contemporánea en lo local y global con actitud crítica y compromiso humano, académico y profesional para contribuir a consolidar el bienestar general y el desarrollo sustentable.
                    <br>
                    11. Practicar los valores promovidos por la UANL: verdad, equidad, honestidad, libertad, solidaridad, respeto a la vida y a los demás, paz, respeto a la naturaleza, integridad, comportamiento ético y justicia, en su ámbito personal y profesional para contribuir a construir una sociedad sustentable.
                    <br><br>
                    Competencia integradoras
                    <br>
                    12. Construir propuestas innovadoras basadas en la comprensión holística de la realidad para contribuir a superar los retos del ambiente global interdependiente.
                    <br>
                    13. Asumir el liderazgo comprometido con las necesidades sociales y profesionales para promover el cambio social pertinente.
                    <br>
                    14. Resolver conflictos personales y sociales, de conformidad a técnicas específicas en el ámbito académico y de su profesión para la adecuada toma de decisiones.
                    <br>
                    15. Lograr la adaptabilidad que requieren los ambientes sociales y profesionales de incertidumbre de nuestra época para crear mejores condiciones de vida.

                    <br><br>

                    Competencias específicas
                    <br>
                    Desarrollar tecnologías computacionales innovadoras, a través de la investigación y la aplicación de modelos matemáticos, con el fin de contribuir al avance de la ciencia o al progreso de las organizaciones.
                    <br>
                    Diseñar soluciones tecnológicas analizando el entorno y determinando áreas de oportunidad que permitan a las organizaciones ser más eficientes.
                    <br>
                    Crear software utilizando herramientas computacionales de última generación, con el fin de incrementar la competitividad de las organizaciones mediante la automatización de procesos.
                    <br>
                    Administrar proyectos de sistemas computacionales, supervisando las funciones y recursos utilizados y asegurando la adecuada explotación de las aplicaciones y la correcta implementación definida en el análisis funcional del proyecto, para mejorar el funcionamiento de las organizaciones
                    <br>
                    Diseñar estrategias, metodologías o herramientas tecnológicas mediante el conocimiento de la estructura general de las organizaciones para ayudar al control y mejor manejo de los procesos y recursos de la organización.
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
                                                    Cálculo Integral
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Geometría Analítica</li>
                                                            <li>Álgebra</li>
                                                            <li>Cálculo Diferencial</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Matemáticas Discretas</a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        <li>Álgebra</li>
                                                        <li>Cálculo Diferencial</li>
                                                           
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Programación Estructurada
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td><ul>
                                                        <li>Metodología de la Programación</li>
                                                        
                                                           
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Física
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
                                                        Tópicos de Álgebra
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
                                                        Laboratorio de Programación Estructurada
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    <ul>
                                                        <li>Metodología de la Programación</li>
                                                        
                                                           
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Física
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    <ul>
                                                        <li>Física Básica</li>
                                                        
                                                           
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
                                                            Programación Orientada a Objetos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación Estructurada</li>
                                                            <li>Laboratorio de Programación Estructurada</li>
                                                           
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Circuitos Digitales</a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Laboratorio de Física</li>
                                                            <li> Física</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Álgebra Lineal
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Topicos de Álgebra</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Tecnologías Multimedia
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
                                                        Cálculo de Varías Variables
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    <ul>
                                                            <li>Cálculo Integral</li>
                                                            <li>Topicos de Álgebra</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Estructura de Datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación Estructurada</li>
                                                            <li>Laboratorio de Programación Estructurada</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Programación Orientada a Objetos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación Estructurada</li>
                                                            <li>Laboratorio de Programación Estructurada</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Circuitos Digitales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                            <li>Física</li>
                                                            <li>Laboratorio de Física</li>
                                                        </ul>
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
                                                    Aplicaciones Móviles
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Programación  Orientada a Objetos</li>
                                                            <li>Laboratorio de Programación Orientada a Objetos</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Base de datos</a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Estructura de datos</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Teoría de Autómatas
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Estructura de datos</li>
                                                        </ul>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Ecuaciones Diferenciales
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                            <li>Álgebra Lineal</li>
                                                            <li>Cálculo de Varías Variables</li>
                                                            
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
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    <ul>
                                                            <li>Álgebra Lineal</li>
                                                            <li>Cálculo de Varías Variables</li>
                                                            
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Cultura de Paz
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
                                                        Laboratorio de Aplicaciones Móviles
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    <ul>
                                                            <li>Programación Orientada a Objetos</li>
                                                            <li>Laboratorio de Programación Orientada a Objetos</li>
                                                            
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Base de Datos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    <ul>
                                                            <li>Estructura de Datos</li>
                                                           
                                                            
                                                        </ul>
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
                                                    Análisis Numéricos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Ecuaciones Diferenciales</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Sistemas Electrónicos</a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Circuitos Digitales</li>
                                                            <li>Laboratorio de Circuitos Digitales</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Organización y Arquitectura de Computadoras
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
                                                        Lenguajes Modernos de Programación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    <ul>
                                                            <li>Aplicaciones Móviles</li>
                                                            <li>Laboratorio de Aplicaciones Móviles</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
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
                                                    <td>
                                                        <a href="#">
                                                        Programación Lineal
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                    <ul>
                                                            <li>Álgebra Lineal</li>
                                                            <li>Cálculo de Varías Variables</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Responsabilidad Social y Desarrollo Sustentable
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
                                                        Laboratorio de Sistemas Electrónicos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                    <ul>
                                                            <li>Circuitos Digitales</li>
                                                            <li>Laboratorio de Circuitos Digitales</li>
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
                                                    Microprocesadores
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li> Sistemas Electrónico</li>
                                                            <li>Laboratorio de Sistemas Electrónico</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Redes de Computadoras
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
                                                    Liderazgo, Emprendimiento e Innovación
                                                        </a></td>
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
                                                        Inteligencia Artificial
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
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Microprocesadores
                                                        </a>
                                                    </td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <ul>
                                                        <li>Sistemas Electrónicos</li>
                                                            <li>Laboratorio de Sistemas Electrónicos</li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Laboratorio de Redes de Computadoras
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
                                                        Investigación de Operaciones
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <ul>
                                                        <li>Probabilidads</li>
                                                            <li>Programación Lineal</li>
                                                        </ul>
                                                    </td>

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
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>
                                                    </td>

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
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>
                                                    </td>

                                                </tr>


                                            </table>
</div>
                                            <h2 class="pt-4 pb-1">Optativas </h2>
                                            
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
                                                    Introducción a las Telecomunicaciones
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
                                                    Tópicos de Tecnologías
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
                                                    Lenguaje Ensamblador
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
                                                    Fundamentos de Networking
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
                                                    Videojuegos
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
                                                    Compiladores
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
                                                    Sistemas Embebidos
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
                                                    Sistema Administrador de Base de Datos
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
                                                    Sistema Administrador de Base de Datos
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
                                                    Desarrollo Web: Back-End
                                                        </a></td>
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
                                                    Sistemas Operativos
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Microprocesadores</li>
                                                            <li>Laboratorio de Microprocesadores</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Administración
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
                                                    Análisis de Sistemas
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
                                                        Criptografía y Seguridad
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
                                                        Ética y Cultura de la Legalidad
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
                                                        Optativa III Área Curricular de Formación Profesional Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Optativa IV Área Curricular de Formación Profesional Fundamental	
                                                        </a>
                                                    </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
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
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                            Investigación de Operaciones
                                                            </li>
                                                            <li>
                                                            Estadística
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Contabilidad
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
                                                    Redes Inalámbricas y Móviles
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
                                                    Minería de Datos
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
                                                    Estándares y Protocolos de Enrutamiento. Ruteo
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Redes de Computadoras</li>
                                                            <li>Laboratorio de Redes de Computadorass</li>
                                                            <li>Fundamentos de Networking</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Diseño de Soluciones Computacionales
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
                                                    Nanotecnología
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
                                                    Biotecnología
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
                                                    Desarrollo Web: Front-End
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Desarrollo Web: Back-End</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Seguridad en Desarrollo de Software
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
                                                    Introducción al Aprendizaje Automático
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Inteligencia Artificial</li>
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
                                                    Seminario de Computación
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    <ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Comportamiento Organizacional
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    <ul>
                                                            <li>Administración</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Optativa V Área Curricular de Formación Profesional Fundamental
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
                                                        Optativa VI Área Curricular de Formación Profesional Fundamental	 
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
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
                                                    Sistemas Embebidos Avanzados
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    <ul>
                                                            <li>Sistemas Embebidos</li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">Ingeniería de Software
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                    <ul>
                                                            <li>Análisis de Sistemas</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Técnicas para Presentaciones Ejecutivas
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
                                                        Estándares y Protocolos de Conmutación. Switcheo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Estándares y Protocolos de Conmutación. Switcheo</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Estimación de Proyectos de Software
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
                                                        Proyectos de Software Enfocados a Nanotecnología
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
                                                        Introducción al Aprendizaje Profundo
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Inteligencia Artificial	</li>
                                                            <li>Introducción al Aprendizaje Automático	</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td>
                                                        <a href="#">
                                                        Seguridad Avanzada en Tecnologías de Información
                                                        </a>
                                                    </td>
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
                                                            Servicio Social
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
                                                    <td><a href="#">Administración de Proyectos de Software
                                                        </a></td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Análisis de Sistemas</li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Seminario de Egreso
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
                                                    Seminario para el Desempeño Profesional
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
                                                            Optativa VII Área Curricular de Formación Profesional
                                                            Fundamental
                                                        </a></td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
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
                                                    Nuevas Tecnologías
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
                                                    Seminario de Análisis Empresarial
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
                                                    Interconectividad Segura de Redes Corporativas
                                                        </a>
                                                    </td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                            Estándares y Protocolos de Conmutación. Switcheo
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </th>
                                                    <td><a href="#">
                                                    Modelos de Negocio
                                                        </a></td>
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
                            </div>

                        </div>
                        <!--End Single Course Details Curriculum-->


                    </div>
                    <!--End Course Details Curriculum-->
                </div>
            </div>
        </div>
    </section>

