<?php
/*
  Template Name: Home
 

get_header();*/
?>
    <div class="preloader">
        <img class="preloader__image" width="60" src="assets/images/loader.png" alt=""/>
    </div>

    <!-- /.preloader -->
    <div class="page-wrapper">


    <div class="stricky-header stricky-header--two stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

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
                    >
                        <video src="assets/images/resources/comercial.mp4" width="100%" height="100%" autoplay muted
                               loop></video>
                    </div>
                    <div class="image-layer-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider-two__content text-center">
                                    <h2 class="main-slider-two__tagline text-white"><?php //echo get_field('texto_secundario_home') ?> </h2>
                                    <h2 class="main-slider__title"><?php // //echo get_field('texto_primario_home') ?></h2>
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

    <div class="pt-5"></div>
    <!--Start Welcome One-->
    <section class="welcome-one pt-5">
        <div class="container">
            <div class="row">
                <!--Start Welcome One Left-->
                <div class="col-xl-6">
                    <div class="welcome-one__left">
                        <div class="section-title">
                            <span class="section-title__tagline"><?php // echo get_field('titulo_mensaje_director_home') ?></span>
                            <h2 class="section-title__title"> <?php // echo get_field('nombre_director_home') ?><br></h2>
                        </div>
                        <p class="welcome-one__left-text"><?php // echo get_field('mensaje_director_home') ?></p>

                    </div>
                </div>
                <!--End Welcome One Left-->

                <!--Start Welcome One Right-->
                <div class="col-xl-6">
                    <div class="welcome-one__right clearfix">
                        <div class="shape1 rotate-me"><img src="assets/images/shapes/thm-shape1.png" alt=""/></div>
                        <div class="welcome-one__right-img1 wow slideInRight" data-wow-delay="100ms"
                             data-wow-duration="2500ms">
                            <div class="welcome-one__right-img1-inner">
                                <img src="<?php // echo get_field('imagen_director_home') ?>" alt="Director"/>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Welcome One Right-->
            </div>
        </div>
    </section>
    <!--End Welcome One-->

    <section class="categories-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Oferta Educativa</span>
                <h2 class="section-title__title">Licenciaturas</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="categories-one__wrapper">
                        <div class="row">
                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms"
                                 data-wow-duration="1500ms">
                                <a href="#">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/matematicas.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Matemáticas</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->

                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms"
                                 data-wow-duration="1500ms">
                                <a href="#">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/fisica.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Física</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->

                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms"
                                 data-wow-duration="1500ms">
                                <a href="#">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/ciencias-computacionales.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Ciencias Computacionales</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->

                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="600ms"
                                 data-wow-duration="1500ms">
                                <a href="#">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/actuaria.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Actuaría</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->


                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="800ms"
                                 data-wow-duration="1500ms">
                                <a href="multimedia-animacion-digital.html">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/multimedia.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Multimedia y Animación Digital</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->


                            <!--Start Single Categories One-->
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="1000ms"
                                 data-wow-duration="1500ms">
                                <a href="#">
                                    <div class="categories-one__single">
                                        <div class="categories-one__single-img">
                                            <img src="assets/images/licenciaturas/seguridad.jpg" alt=""/>
                                            <div class="categories-one__single-overlay">
                                                <div class="categories-one__single-overlay-text2">
                                                    <h4>Seguridad en T.I.</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--End Single Categories One-->

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
                         style="background-image: url(<?php // echo get_field('imagen_previsalizacion_home') ?>)">
                        <div class="video-one__box-title">
                            <h2>
                                <?php //
                                    // echo get_field( 'texto_overlay_home' )
                                ?>
                            </h2>
                        </div>
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup" title="Zilom Video Gallery"
                               href="<?php // echo get_field('link_video_home') ?>">
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
             style="background-image: url(assets/images/backgrounds/20200427_014.JPG);">
        <div class="container">
            <div class="row">

                <!--Start Counter One Right-->
                <div class="col-xl-12 col-lg-12">
                    <div class="counter-one__right">
                        <ul class="counter-one__right-box list-unstyled">
                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-teacher"></span>
                                </div>
                                <span>+</span>
                                <h3 class="odometer" data-count="316">00</h3>
                                <p class="counter-one__right-text">Docentes</p>
                            </li>
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.5s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-student"></span>
                                </div>
                                <span>+</span>
                                <h3 class="odometer" data-count="5600">00</h3>
                                <p class="counter-one__right-text">Estudiantes</p>
                            </li>
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-student"></span>
                                </div>
                                <span>+</span>
                                <h3 class="odometer" data-count="368">00</h3>
                                <p class="counter-one__right-text">Egresados</p>
                            </li>
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.3s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-online-course"></span>
                                </div>
                                <h3 class="odometer" data-count="6">00</h3>
                                <p class="counter-one__right-text">Programas Educativos</p>
                            </li>
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-online-course"></span>
                                </div>
                                <h3 class="odometer" data-count="6">00</h3>
                                <p class="counter-one__right-text">Posgrados</p>
                            </li>
                            <!--End Counter One Right Single-->


                        </ul>
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
                        <span class="section-title__tagline"><?php // echo get_field('enlaces_de_interes_lema') ?></span>
                        <h2 class="section-title__title"><?php // echo get_field('enlaces_de_interes_titulo') ?> </h2>
                    </div>

                    <div class="col-xl-12">
                        <div class="categories-two__inner">
                            <div class="shape1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                        src="<?php // echo get_field('enlaces_fondo_icono') ?>" alt=""/></div>
                            <ul class="categories-two__wrapper list-unstyled">
                                <!--Start Single Categories Two-->
                                <a href="#">
                                    <li class="categories-two__single text-center wow fadeInUp animated animated"
                                        data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="categories-two__single-icon">
                                             <!-- <span class="icon-creativity"> </span>  -->
                                            <span class="linkImageCategory"> <img
                                                src="<?php // echo get_field('enlace_categoria_1_imagen') ?>" alt=""/>
                                            </span>  
                                            <div class="overly-bg"
                                                 style="background-color: #1a1e21">
                                            </div>
                                        </div>
                                        <div class="categories-two__single-text">
                                            <h5><a href="#"><?php // echo get_field('enlace_categoria1') ?></a></h5>
                                        </div>
                                    </li>
                                </a>
                                <!--End Single Categories Two-->

                                <!--Start Single Categories Two-->
                                <a href="#">
                                    <li class="categories-two__single text-center wow fadeInUp animated animated"
                                        data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="categories-two__single-icon">
                                            <!-- <span class="icon-needs"></span> -->
                                            <span class="linkImageCategory"> <img
                                                src="<?php // echo get_field('enlace_categoria_2_imagen') ?>" alt=""/>
                                            </span>  
                                            <div class="overly-bg"
                                                 style="background-color: #1a1e21">
                                            </div>
                                        </div>
                                        <div class="categories-two__single-text">
                                            <h5><a href="#"><?php // echo get_field('enlace_categoria2') ?></a></h5>
                                        </div>
                                    </li>
                                </a>
                                <!--End Single Categories Two-->

                                <!--Start Single Categories Two-->
                                <a href="#">
                                    <li class="categories-two__single text-center wow fadeInUp animated animated"
                                        data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <div class="categories-two__single-icon">
                                            <!-- <span class="icon-photo-camera"></span> -->
                                            <span class="linkImageCategory"> <img
                                                src="<?php // echo get_field('enlace_categoria_3_imagen') ?>" alt=""/>
                                            </span>  
                                            <div class="overly-bg"
                                                 style="background-color: #1a1e21">
                                            </div>
                                        </div>
                                        <div class="categories-two__single-text">
                                            <h5><a href="#"><?php // echo get_field('enlace_categoria3') ?></a></h5>
                                        </div>
                                    </li>
                                </a>
                                <!--End Single Categories Two-->

                                <!--Start Single Categories Two-->
                                <a href="#">
                                    <li class="categories-two__single text-center wow fadeInUp animated animated"
                                        data-wow-delay="600ms" data-wow-duration="1500ms">
                                        <div class="categories-two__single-icon">
                                            <!-- <span class="icon-target"></span> -->
                                            <span class="linkImageCategory"> <img
                                                src="<?php // echo get_field('enlace_categoria_4_imagen') ?>" alt=""/>
                                            </span>  
                                            <div class="overly-bg"
                                                 style="background-color: #1a1e21">
                                            </div>
                                        </div>
                                        <div class="categories-two__single-text">
                                            <h5><a href="#"><?php // echo get_field('enlace_categoria4') ?></a></h5>
                                        </div>
                                    </li>
                                </a>
                                <!--End Single Categories Two-->

                                <!--Start Single Categories Two-->
                                <a href="#">
                                    <li class="categories-two__single text-center wow fadeInUp animated animated"
                                        data-wow-delay="800ms" data-wow-duration="1500ms">
                                        <div class="categories-two__single-icon">
                                            <!-- <span class="icon-desk"></span> -->
                                            <span class="linkImageCategory"> <img
                                                src="<?php // echo get_field('enlace_categoria_5_imagen') ?>" alt=""/>
                                            </span>  
                                            <div class="overly-bg"
                                                 style="background-color: #1a1e21">
                                            </div>
                                        </div>
                                        <div class="categories-two__single-text">
                                            <h5><a href="#"><?php // echo get_field('enlace_categoria5') ?></a></h5>

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
                        <div class="shape1 zoom-fade"><img src="assets/images/shapes/thm-shape2.png" alt=""/></div>
                        <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                    src="assets/images/shapes/thm-shape3.png" alt=""/></div>
                        <div class="registration-two__left">
                            <h2 class="registration-two__left-text">Comienza tu carrera educativa<br>Facultad de
                                Ciencias Físico Matemáticas.</h2>
                        </div>
                        <div class="registration-two__right">
                            <div class="registration-two__right-btn">
                                <a href="#" class="thm-btn">Más Información</a>
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
    <div class="row">
<?php
//the query
/*$queryblogs = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'post_id',
    'order' => 'DESC',
    'posts_per_page' => 3
));
// the loop
while ($queryblogs->have_posts()):
    $queryblogs->the_post();*/
    ?>

    <!--Start Single Blog One-->
    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="blog-one__single">
            <div class="blog-one__single-img">
    <?php //if (has_post_thumbnail()): ?>
                <img src="<?php //the_post_thumbnail_url(); ?>" alt="<?php //echo the_title(); ?>"/>
            </div>
            <?php //endif; ?>
            <div class="blog-one__single-content">
                <div class="blog-one__single-content-overlay-mata-info" align="center">
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-clock"></span><?php //echo the_date() ?></a></li>
                        <li><a href="#"><span class="icon-user"></span><?php //echo get_the_author() ?> </a></li>
                    </ul>
                </div>
                <h2 class="blog-one__single-content-title"><a href="<?php //echo the_permalink(); ?>"><?php //echo the_title(); ?></a></h2>
                <p class="blog-one__single-content-text">
                </p>
            </div>
        </div>
    </div>
    <!--End Single Blog One-->
<?php //endwhile; ?>

    </div>
    </div>
    </section>
    <!--Blog One End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index3.html" aria-label="logo image"><img src="assets/images/resources/fcfm.png"
                                                                   style="max-width: 155px" alt=""/></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="icon-letter"></i>
                    <a href="tel:8183294030">TEL. 81 83 29 40 30</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
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

    <?php
    //get_footer();
    ?>
