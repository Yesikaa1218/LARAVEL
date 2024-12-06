

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
                        <ul class="list-unstyled">
                            <li><a href="{{route('login')}}">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                    <div class="main-header--two__top-right-login-register">
                        <ul class="list-unstyled">
                            <li><a href="{{route('SistemaEscolar.empleado.login')}}">Sistema Escolar</a></li>
                        </ul>
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
            <div class="main-header-three__bottom-inner clearfix">
                <nav class="main-menu main-menu--1">
                    <div class="main-menu__inner">
                        <div class="left">
                            <div class="logo-box1">
                                <!-- <a href="{{route('index')}}">
                                    <img src="{{asset('front/assets/images/resources/fcfm.png')}}"
                                         style="max-width: 200px" 
                                         class="img-fluid d-sm-block d-md-none" alt="FCFM">
                                </a> -->

                                <a href="https://www.uanl.mx/"></a>
                                    <img src="{{asset('front/assets/images/resources/uanl.png')}}"
                                         style="max-width: 160px"
                                         class="img-fluid d-md-block d.lg-block " alt="UANL">
                                         <!-- d-sm-none -->
                                </a>
                            </div>
                        </div>
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                        <div class="middle">
                            <ul class="main-menu__list">
                                <li>
                                    <a href="{{route('index')}}">Inicio</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#"> Facultad</a>
                                    <ul>
                                        @if($seccionesFacultad)
                                            @foreach($seccionesFacultad as $seccion)
                                                @if ($seccion->title === 'Historia')
                                                    <li class="submenu">
                                                        <a href="#" class="" data-target="submenu-ul">{{$seccion->title}} <button aria-label="dropdown toggler" class="submenuBtn"><i class="fa fa-angle-down"></i></button>
                                                        </a>
                                                        {{-- display:none es para que no se vean las opciones --}}
                                                        <ul class="submenu-ul" > 
                                                            <li><a href="/facultad/{{$seccion->slug}}">{{$seccion->title}}</a></li>
                                                            <li><a href="/facultad/mural">Mural</a></li>
                                                        </ul>
                                                    </li>
                                                @else
                                                    @if ($seccion->title != 'Mural')
                                                        <li><a href="/facultad/{{$seccion->slug}}">{{$seccion->title}}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                        <li><a href="{{route('facultad.ex-directores')}}">Ex Directores</a></li>
                                        <li><a href="{{route('facultad.informes')}}">Informes</a></li>
                                        <li><a href="{{route('facultad.profesores-emeritos')}}">Profesores Eméritos</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"> Licenciaturas</a>
                                    <ul>
                                        @if($licenciaturas)
                                            @foreach($licenciaturas as $lic)
                                                <li><a href="/licenciatura/{{$lic->slug}}">{{$lic->nombre_licenciatura}}</a></li>
                                            @endforeach
                                        @endif
                                        <!-- <li><a href="{{route('congreso.licenciatura')}}">Congresos</a> </li> -->
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"> Posgrado</a>
                                    <ul>
                                        @if($posgrado)
                                            @foreach($posgrado as $pos)
                                                <li><a href="/posgrados/{{$pos->slug}}">{{$pos->nombre_posgrado}}</a></li>
                                            @endforeach
                                            <li><a href="/posgrados/test/logros-posgrados">Logros de posgrado</a></li>
                                            <li><a href="/posgrados/test/seccion-libre">Sección Libre</a></li>

                                        @endif
                                        <!-- <li><a href="{{route('congreso.posgrado')}}">Congresos</a> </li> -->
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{route('noticias.show')}}">Noticias</a>
                                </li>
                                <li class="">
                                    <a href="{{route('avisos.show')}}">Avisos</a>
                                </li>
                                <li class="">
                                    <a href="{{route('calendario.show')}}">Calendario</a>
                                </li>
                                <!-- first is the link in your navbar -->
                                <li class="dropdown" >
                                    <a  href="#" data-bs-toggle="dropdown">Estudiantes </a>
                                    <!-- your mega menu starts here! -->
                                    <div class="dropdown-menu">
                                    <!-- next, a divider to tidy things up -->
                                    <div class="dropdown-divider"></div>
                                    <!-- finally, using flex to create your layout -->
                                     <div class="align-items-start justify-content-start p-2 dropdown-list">

                                      <div>    
                                       <!-- <div class="dropdown-header">Title 1</div> -->
                                       <a class="dropdown-item" href="{{route('actividadesculturales.show')}}">Actividades Culturales</a>
                                       <a class="dropdown-item" href="{{route('asesorias.show')}}">Asesorías</a>
                                       <a class="dropdown-item" href="{{route('asuntosuniversitarios.show')}}">Asuntos Universitarios</a>
                                       <a class="dropdown-item" href="{{route('becas.show')}}">Becas</a>
                                       <a class="dropdown-item" href="{{route('biblioteca.show')}}">Biblioteca</a>
                                      </div>

                                      <div>
                                       <!-- <div class="dropdown-header">Title 1</div> -->
                                       <a class="dropdown-item" href="{{route('caadi.show')}}">CAADI</a>
                                       <a class="dropdown-item" href="{{route('calidadeducativa.show')}}">Calidad Educativa</a>
                                       <a class="dropdown-item" href="{{route('educacioncontinua.show')}}">Educación Continua</a>
                                       <a class="dropdown-item" href="{{route('deportivo.show')}}">Deportivo</a>
                                       <a class="dropdown-item" href="{{route('emprendedores.show')}}">Emprendedores</a>
                                      </div>

                                      <div>
                                       <!-- <div class="dropdown-header">Title 1</div> -->
                                       <a class="dropdown-item" href="{{route('escolar.show')}}">Escolar</a>
                                       <a class="dropdown-item" href="{{route('estrategiadigital.show')}}">Estrategia digital</a>
                                       <a class="dropdown-item" href="{{route('internacionalizacion.show')}}">Movilidad Estudiantil</a>
                                       <a class="dropdown-item" href="{{route('practicas-profesionales.show')}}">Prácticas profesionales</a>
                                       <a class="dropdown-item" href="{{route('servicio-social.show')}}">Servicio Social</a>
                                       
                                      </div>

                                      <div>
                                       <!-- <div class="dropdown-header">Title 1</div> -->
                                       <a class="dropdown-item" href="{{route('sociedad-alumnos')}}">Sociedad de Alumnos</a>
                                       <a class="dropdown-item" href="{{route('sustentabilidad.show')}}">Sustentabilidad</a>
                                       <a class="dropdown-item" href="{{route('tesoreria.show')}}">Tesorería</a>
                                       <a class="dropdown-item" href="{{route('tutorias.show')}}">Tutorías</a>
                                       <a class="dropdown-item" href="{{route('universidadsaludable.show')}}">Universidad Saludable</a>
                                       
                                      </div>

                                       <div>
                                        <a class="dropdown-item" href="{{route('unidadlinares.show')}}">Unidad Linares</a>
                                        <a class="dropdown-item" href="{{route('guia-exens.show')}}">Guias examen</a>
                                        <a class="dropdown-item" href="{{route('guia-nuevo-ingreso.show')}}">Guia nuevo ingreso</a>
                                       </div>


                                     </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{route('museo.show')}}">Museo</a>
                                </li>
                                <li class="dropdown">
                                    <a  href="#" data-bs-toggle="dropdown">Observatorio</a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-divider"></div>
                                        <!-- finally, using flex to create your layout -->
                                        <div class="align-items-start justify-content-start p-2 dropdown-list">
                                            <div>
                                                <a class="dropdown-item" href="{{route('observatorio.show')}}">Observatorio Astronomico<br> Universitario</a>
                                                <a class="dropdown-item" href="{{route('destilado.show')}}">Mezcal Flammam</a>
                                            </div>
                                        </div>
                                    </div>            
                                </li>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="logo-box1">
                                <a href="{{route('index')}}">
                                    <img src="{{asset('front/assets/images/resources/fcfm.png')}}"
                                         style="max-width: 160px"
                                         class="img-fluid hidden" alt="FCFM">
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</header>