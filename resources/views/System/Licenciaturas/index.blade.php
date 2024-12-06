<?php 
/*
  Template Name: Licenciatura
 */

//   get_header();

//        global $wp_query;
//         query_posts(array(
//             'post_type' => 'Licenciaturas'
//         ));


// $query = new WP_Query( array( 'post_type' => 'Licenciaturas', 'paged' => $paged ) );

// if ( $query->have_posts() ) : ?>
<?php 
//while ( $query->have_posts() ) : $query->the_post(); 

			//Busca entre las licenciaturas publicadas por la que tenga el mismo nombre
	  		//if(the_title('','',false) == 'Multimedia Y Animación Digital'){
	  		//if(true){

	  		

	?>



<body>

<div class="preloader">
    <img class="preloader__image" width="60" src="assets/images/loader.png" alt=""/>
</div>

<!-- /.preloader -->
<div class="page-wrapper">

    <header class="main-header main-header--two clearfix">

        <div class="main-header--two__top clearfix">
            <div class="container">
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
                            <!--li class="main-header--two__top-contact-info-single">
                                <div class="icon">
                                    <span class="icon-message-1"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:info@templatepath.com">needhelp@company.com</a></p>
                                </div>
                            </li> -->
                        </ul>
                    </div>


                    <div class="main-header--two__top-right clearfix">
                        <div class="main-header--two__top-right-login-register">
                            <ul class="list-unstyled">
                                <li><a href="#">Iniciar Sesión</a></li>
                            </ul>
                        </div>
                        <div class="main-header--two__top-right-social-link">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


  <!--       <div class="main-header-two__bottom">
            <div class="container">
                <div class="main-header-two__bottom-inner clearfix">
                    <nav class="main-menu main-menu--1">
                        <div class="main-menu__inner">
                            <div class="left">
                                <div class="logo-box1">
                                    <a href="index.html">
                                        <img src="assets/images/resources/fcfm.png" style="max-width: 200px"
                                             class="img-fluid d-none d-sm-block d-md-none" alt="FCFM">
                                        <img src="assets/images/resources/uanl.png" style="max-width: 200px"
                                             class="img-fluid d-sm-none d-md-block d.lg-block" alt="UANL">
                                    </a>
                                </div>
                            </div>
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                            <div class="middle">
                                <ul class="main-menu__list">
                                    <li class="dropdown current">
                                        <a href="index.html">Inicio</a>
                                    </li>
                                    <li><a href="#">Facultad</a></li>
                                    <li class="dropdown">
                                        <a href="#"> Licenciaturas</a>
                                        <ul>
                                            <li><a href="#">Matemáticas</a></li>
                                            <li><a href="#">Física</a></li>
                                            <li><a href="#">Ciencias Computacionales</a></li>
                                            <li><a href="#">Actuaría</a></li>
                                            <li><a href="multimedia-animacion-digital.html">Multimedia y Animación
                                                Digital</a></li>
                                            <li><a href="#">Seguridad en T.I.</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Posgrado</a>
                                        <ul>
                                            <li><a href="#">Maestrías</a></li>
                                            <li><a href="#">Doctorados</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Noticias</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#">Más <span></span></a>
                                        <ul>
                                            <li><a href="#">Escolar</a></li>
                                            <li><a href="#">Servicio Social</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="right">
                                <div class="logo-box1">
                                    <a href="index.html">
                                        <img src="assets/images/resources/fcfm.png" style="max-width: 200px"
                                             class="img-fluid" alt="FCFM">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
 -->
    </header>


    <div class="stricky-header stricky-header--two stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix" style="background-image: url('<?php //the_field('banner_de_la_licenciatura'); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2><?php //echo the_title(); ?></h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="index.html">Inicio</a></li>
                                <li class="active">Licenciaturas</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
             style="background-image: url('./assets/images/backgrounds/Background_Uanl.png'); background-repeat: no-repeat; background-size: cover; background-position: center"
             data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <h1>Descripción</h1>
                    <br>
                    <p> <?php //echo the_field("descripcion_general_licenciatura") ?>
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                     data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <img src="<?php // echo the_field("foto_del_coordinador") ?>" class="rounded-circle mx-auto d-block pb-4" style="max-width: 200px; " alt=""/>
                        <h4  class="courses-one__single-content-title text-center"><?php // echo the_field("nombre_coordinador_licenciatura") ?>
                            <br>
                            <span>  2019 - A LA FECHA</span></h4>
                        <h6 class="courses-one__single-content-title text-center">Coordinadora de Licenciatura</h6>
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
                        <h3>Aspirantes</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Cualidades deseables en el aspirante a ingresar a esta carrera:</p>
                    </div>
                    <div class="course-details__content-list">
                        <ul class="list-unstyled">

	                        <?php 

	                        	//Se trae el texto de perfil de ingreso, se separa mediante cambio de linea, y se le aplica el diseño deseado

	                        	// $str = get_field("perfil_de_ingreso_licenciatura",'',true); 

	                        	// $arr = explode("\n", $str);
	                        	// foreach ($arr as $element) {
								// 		echo "  <li>
	                            //     				<div class='icon'>
	                            //         				<span class='icon-confirmation'></span>
	                            //     				</div>
	                            //     				<div class='text'>
	                            //         				<p>$element</p>
	                            //     				</div>
	                            // 				</li>";
								// }

	                        ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de Licenciatura en Multimedia y Animación Digital son:</p>
                    </div>
                    <div class="course-details__content-list">
                        <ul class="list-unstyled">



                        <?php 
                        
                        	//Se trae el texto de perfil de egreso, se separa mediante cambio de linea, y se le aplica el diseño deseado

                        	// $str = get_field("perfil_de_egreso_licenciatura",'',true); 

                        	// $arr = explode("\n", $str);
                        	// foreach ($arr as $element) {
							// 		echo "  <li>
                            //     				<div class='icon'>
                            //         				<span class='icon-confirmation'></span>
                            //     				</div>
                            //     				<div class='text'>
                            //         				<p>$element</p>
                            //     				</div>
                            // 				</li>";
							// }

                        ?>

                        	
                 
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="quick-facts justify-content-center align-items-center mt-4" style="background-color: #ffcc00">
       <div class="container ">
           <div class="row">
               <div class="col-xl-4 col-lg-4">
                   <div class="course-details__sidebar bg-white">
                       <div class="course-details__sidebar-meta wow fadeInUp animated" data-wow-delay="0.3s">
                           <ul class="course-details__sidebar-meta-list list-unstyled">
                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="far fa-clock"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Duración:<span> <?php // echo the_field("duracion_de_licenciatura") ?></span></a></p>
                                   </div>
                               </li>

                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="far fa-folder-open"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Modalidad:<span> Presencial</span></a></p>
                                   </div>
                               </li>

                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="far fa-user-circle"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Students:<span> Max 6</span></a></p>
                                   </div>
                               </li>

                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="fas fa-play"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Video:<span>8 hours</span></a></p>
                                   </div>
                               </li>

                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="far fa-flag"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Skill Level:<span>Advanced</span></a></p>
                                   </div>
                               </li>

                               <li class="course-details__sidebar-meta-list-item">
                                   <div class="icon">
                                       <a href=""><i class="far fa-bell"></i></a>
                                   </div>
                                   <div class="text">
                                       <p><a href="#">Language:<span>English</span></a></p>
                                   </div>
                               </li>
                           </ul>
                       </div>

                   </div>
               </div>
               <div class="col-xl-8 col-lg-8 pt-5 pb-5 justify-content-center align-items-center  wow fadeInUp animated animated">
                   <div class="col-auto "  data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div>
                        <h1 class="text-center pt-5">Indicadores</h1>
                        <hr>
                        <div class="col-auto text-center justify-content-center align-items-center pt-5">
                            <div class="card-group col-auto">
                                <div class="card card-facts wow fadeInUp animated animated"
                                     data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <span class="icon-photo-camera"></span>
                                    <div class="card-body">
                                        <h3>300</h3>
                                        <h5 class="card-title">
                                            Estudiantes
                                        </h5>
                                    </div>
                                </div>
                                <div class="card card-facts wow fadeInUp animated animated"
                                     data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <span class="icon-photo-camera"></span>
                                    <div class="card-body">
                                        <h3>300</h3>
                                        <h5 class="card-title">
                                            Egresados
                                        </h5>
                                    </div>
                                </div>
                                <div class="card card-facts wow fadeInUp animated animated"
                                     data-wow-delay="800ms" data-wow-duration="1500ms">
                                    <span class="icon-photo-camera"></span>
                                    <div class="card-body">
                                        <h3>300</h3>
                                        <h5 class="card-title">
                                            Maestros
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                            Optativa IV Área Curricular de Formación Profesional Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optativa III Área Curricular de Formación Profesional Fundamental
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
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                            Optativa V Área Curricular de Formación Profesional Fundamental
                                                        </a>
                                                    </td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <ul>
                                                            <li>Optativa IV Área Curricular de Formación Profesional Fundamental
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
                                                    <th scope="col">Requsitos</th>
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
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Créditos</th>
                                                    <th scope="col">Horas/semana</th>
                                                    <th scope="col">Requsitos</th>
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
                                                        Optativa VI Área Curricular de Formación Profesional Fundamental
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
                                                    <th scope="col">Requsitos</th>
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
                        <!--End Single Course Details Curriculum-->


                    </div>
                    <!--End Course Details Curriculum-->
                </div>



                    <!--Start Single Course Details Curriculum-->
                    <div class="course-details__curriculum-single">
                        <section class="company-logos-one company-logos-one--two">
                            <div class="container">
                                <div class="company-logos-one__title text-center">
                                    <h6>Oferta Laboral </h6>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
            "0": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "375": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "575": {
                "spaceBetween": 30,
                "slidesPerView": 3
            },
            "767": {
                "spaceBetween": 50,
                "slidesPerView": 4
            },
            "991": {
                "spaceBetween": 50,
                "slidesPerView": 5
            },
            "1199": {
                "spaceBetween": 100,
                "slidesPerView": 5
            }
        }}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="assets/images/oferta-laboral/1280px-FEMSA_Logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/oferta-laboral/softtek.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/oferta-laboral/multimedios-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/resources/Company-Logos-v1-logo1.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--End Single Course Details Curriculum-->


            </div>
        </div>
    </section>
    <!--End Course Details-->


    <!--Start Footer One-->
    <footer class="footer-one">
        <div class="footer-one__bg" style="background-image: url(assets/images/backgrounds/20190804_018.JPG);">
        </div><!-- /.footer-one__bg -->
        <div class="footer-one__top">
            <div class="container">
                <div class="row">
                    <!--Start Footer Widget Column-->
                    <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.1s">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__about-logo">
                                <a href="index3.html"><img src="assets/images/resources/fcfm.png"
                                                           style="max-width: 130px" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--End Footer Widget Column-->

                    <!--Start Footer Widget Column-->
                    <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                        <div class="footer-widget__column footer-widget__courses">
                            <h3 class="footer-widget__title">Courses</h3>
                            <ul class="footer-widget__courses-list list-unstyled">
                                <li><a href="#">UI/UX Design</a></li>
                                <li><a href="#">WordPress Development</a></li>
                                <li><a href="#">Business Strategy</a></li>
                                <li><a href="#">Software Development</a></li>
                                <li><a href="#">Business English</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End Footer Widget Column-->

                    <!--Start Footer Widget Column-->
                    <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s">
                        <div class="footer-widget__column footer-widget__links">
                            <h3 class="footer-widget__title">Links</h3>
                            <ul class="footer-widget__links-list list-unstyled">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Overview</a></li>
                                <li><a href="teachers-1.html">Teachers</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="news.html">Our News</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End Footer Widget Column-->

                    <!--Start Footer Widget Column-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                        <div class="footer-widget__column footer-widget__contact">
                            <h3 class="footer-widget__title">Contacto</h3>
                            <p class="text">AV. UNIVERSIDAD S/N. CIUDAD UNIVERSITARIA SAN NICOLÁS DE LOS GARZA, C.P.
                                66451 <br> NUEVO LEÓN, MÉXICO
                            </p>
                            <p class="phone"><a href="tel:8183294030">TEL. 81 83 29 40 30</a></p>
                        </div>
                    </div>
                    <!--End Footer Widget Column-->

                    <!--Start Footer Widget Column-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.9s">
                        <div class="footer-widget__column footer-widget__social-links">
                            <ul class="footer-widget__social-links-list list-unstyled clearfix">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End Footer Widget Column-->

                </div>
            </div>
        </div>

        <!--Start Footer One Bottom-->
        <div class="footer-one__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-one__bottom-inner">
                            <div class="footer-one__bottom-text text-center">
                                <p>&copy; Copyright 2021 FCFM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer One Bottom-->
    </footer>
    <!--End Footer One-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index3.html" aria-label="logo image"><img src="assets/images/resources/mobilemenu_logo.png"
                                                               width="155" alt=""/></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="icon-phone-call"></i>
                <a href="mailto:needhelp@packageName__.com">needhelp@zilom.com</a>
            </li>
            <li>
                <i class="icon-letter"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
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
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..."/>
            <button type="submit" aria-label="search submit" class="thm-btn2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/jarallax/jarallax.min.js"></script>
<script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="assets/vendors/nouislider/nouislider.min.js"></script>
<script src="assets/vendors/odometer/odometer.min.js"></script>
<script src="assets/vendors/swiper/swiper.min.js"></script>
<script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
<script src="assets/vendors/wnumb/wNumb.min.js"></script>
<script src="assets/vendors/wow/wow.js"></script>
<script src="assets/vendors/isotope/isotope.js"></script>
<script src="assets/vendors/countdown/countdown.min.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/vendors/twentytwenty/twentytwenty.js"></script>
<script src="assets/vendors/twentytwenty/jquery.event.move.js"></script>


<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

<!-- template js -->
<script src="assets/js/zilom.js"></script>


</body>

<?php 
//}
//endwhile; wp_reset_postdata(); ?>
<!-- show pagination here -->
<?php //else : ?>
<!-- show 404 error here -->
<?php //endif;

 ?>