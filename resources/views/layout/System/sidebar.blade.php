<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('sistema.home')}}">

        <div class="sidebar-brand-text mx-3">Sistema FCFM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @hasanyrole('SuperAdmin')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administración
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.user.administrador.index')}}">Lista de Usuarios</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-key"></i>
            <span>Roles y Permisos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.roles.index')}}">Roles</a>
                <a class="collapse-item" href="{{route('sistema.roles.permisos.index')}}">Permisos</a>
            </div>
        </div>
    </li>
    @endhasanyrole


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Difusión
    </div>

    @hasanyrole(['SuperAdmin|Avisos'])
    <!-- Nav Item - Charts -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAvisos"
           aria-expanded="true" aria-controls="collapseAvisos">
            <i class="fas fa-fw fa-bell"></i>
            <span>Avisos</span>
        </a>
        <div id="collapseAvisos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.avisos.index')}}">Aviso</a>
                <a class="collapse-item" href="{{route('sistema.avisos.categoria.index')}}">Categorías</a>
            </div>
        </div>
    </li>

    @endhasanyrole

    @hasanyrole(['SuperAdmin|Calendario'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.calendar.index')}}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Calendario </span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Museo'])
    <!-- Nav Item - Charts -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.museo.index')}}">
            <i class="fas fa-landmark"></i>
            <span>Museo </span>
        </a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Noticias'])
    <!-- Nav Item - Charts -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNoticias"
            aria-expanded="true" aria-controls="collapseNoticias">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Noticias</span>
        </a>
        <div id="collapseNoticias" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.noticias.index')}}">Noticia</a>
                <a class="collapse-item" href="{{route('sistema.noticias.categorias.index')}}">Categorías</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Observatorio'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObservatorio"
            aria-expanded="true" aria-controls="collapseObservatorio">
            <i class="fas fa-fw fa-table"></i>
            <span>Observatorio</span>
        </a>
        <div id="collapseObservatorio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.observatorio.index')}}">Observatorio Astronomico</a>
                <a class="collapse-item" href="{{route('sistema.destilado.index')}}">Destilado de Agave</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['Licenciatura|Posgrado|SuperAdmin|CoordinadorMaestriaCOM|CoordinadorMaestriaIF|CoordinadorMaestriaISI|CoordinadorMaestriaAPTA|CoordinadorDoctoradoM|CoordinadorDoctoradoIF|CoordinadorMaestriaCDD'])
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Oferta Educativa
    </div>

    @hasanyrole(['SuperAdmin|Licenciatura'])
    <!-- Nav Item - Licenciaturas -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLicenciaturas"
           aria-expanded="true" aria-controls="collapseLicenciaturas">
            <i class="fas fa-fw fa-users"></i>
            <span>Licenciaturas</span>
        </a>
        <div id="collapseLicenciaturas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.licenciaturas.licenciatura.index')}}">Licenciaturas</a>
                <a class="collapse-item" href="{{route('sistema.licenciaturas.profesores.index')}}">Profesores</a>
                <a class="collapse-item" href="{{route('sistema.licenciaturas.planes.index')}}">Planes de estudios</a>
                <a class="collapse-item" href="{{route('sistema.licenciaturas.congresos.index')}}">Congresos</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole(['SuperAdmin|Posgrado|CoordinadorMaestriaCOM|CoordinadorMaestriaIF|CoordinadorMaestriaISI|CoordinadorMaestriaAPTA|CoordinadorDoctoradoM|CoordinadorDoctoradoIF|CoordinadorMaestriaCDD'])
    <!-- Nav Item - Posgrado -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosgrado"
           aria-expanded="true" aria-controls="collapsePosgrado">
            <i class="fas fa-fw fa-users"></i>
            <span>Posgrado</span>
        </a>
        <div id="collapsePosgrado" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.posgrados.posgrado.index')}}">Posgrados</a>
                <a class="collapse-item" href="{{route('sistema.posgrados.profesores.index')}}">Profesores</a>
                <a class="collapse-item" href="{{route('sistema.posgrados.planes-posgrado.index')}}">Planes de estudios</a> 
                <a class="collapse-item" href="{{route('sistema.posgrados.congresos.index')}}">Congresos</a>
                <a class="collapse-item" href="{{route('sistema.posgrados.logros-profesores.index')}}">Logros de profesores</a>
                <a class="collapse-item" href="{{route('sistema.posgrados.seccion-libre.index')}}">Sección libre</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @endhasanyrole

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Departamentos
    </div>

    @hasanyrole(['SuperAdmin|ActividadesCulturales'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.actividades-culturales.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Actividades Culturales </span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Asesoria'])
    <!-- Nav Item - Posgrado -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTutoria"
        aria-expanded="true" aria-controls="collapseTutoria">
            <i class="fas fa-fw fa-users"></i>
            <span>Asesorías</span>
        </a>
        <div id="collapseTutoria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.asesorias.informacion.index')}}">Información de la página</a>
                <a class="collapse-item" href="{{route('sistema.asesorias.laboratorios.index')}}">Laboratorios</a>
                <a class="collapse-item" href="{{route('sistema.asesorias.profesores.index')}}">Profesores</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|AsuntosUniversitarios'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.asuntos.universitarios.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span> Asuntos Universitarios</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Becas'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.becas.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Becas </span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Biblioteca'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.biblioteca.index')}}">
            <i class="fas fa-book"></i>
            <span>Biblioteca</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|CAADI'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.caadi.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>CAADI</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|CalidadEducativa'])
    <!-- Nav Item - Calidad Educativa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCalidadEducativa"
           aria-expanded="true" aria-controls="collapseCalidadEducativa">
            <i class="fas fa-award"></i>
            <span>Calidad Educativa</span>
        </a>
        <div id="collapseCalidadEducativa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.calidad-educativa.informacion.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.calidad-educativa.licenciaturas.index')}}">Licenciaturas</a>
                <a class="collapse-item" href="{{route('sistema.calidad-educativa.posgrados.index')}}">Posgrados</a>
                
            </div>
        </div>
    </li>
    @endhasanyrole


    @hasanyrole(['SuperAdmin|Escolar'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEscolar"
           aria-expanded="true" aria-controls="collapseEscolar">
            <i class="fas fa-pencil-ruler"></i>
            <span>Escolar</span>
        </a>
        <div id="collapseEscolar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.escolar.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.escolar.preguntas.index')}}">Preguntas Frecuentes</a>
                <a class="collapse-item" href="{{route('sistema.escolar.indicadores.facultad.index')}}">Indicadores de la Facultad</a>
                <a class="collapse-item" href="{{route('sistema.escolar.indicadores.licenciaturas.index')}}">Indicadores de Licenciatura</a>
                <a class="collapse-item" href="{{route('sistema.escolar.indicadores.posgrados.index')}}">Indicadores de Posgrados</a>
                <a class="collapse-item" href="{{route('sistema.escolar.actualizarsemestre')}}">Actualizacion de Semestre</a>
            </div>
        </div>
    </li>
    @endhasanyrole


    @hasanyrole(['SuperAdmin|EstrategiaDigital'])

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.estrategia-digital.index')}}">
            <i class="fas fa-mobile-alt"></i>
            <span>Estrategia Digital</span></a>
    </li>
    @endhasanyrole


    @hasanyrole(['SuperAdmin|Emprendedores'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmprendimiento"
           aria-expanded="true" aria-controls="collapseEmprendimiento">
            <i class="fas fa-fw fa-table"></i>
            <span>Emprendedores</span>
        </a>
        <div id="collapseEmprendimiento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.emprendimiento.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.emprendimiento.publicaciones.index')}}">Publicaciones</a>
                <a class="collapse-item" href="{{route('sistema.emprendimiento.proyectos.index')}}">Proyectos</a>

            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Deportivo'])

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.deportivo.index')}}">
            <i class="fas fa-football-ball"></i>
            <span> Deportivo</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|EducacionContinua'])

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.educacion-continua.index')}}">
            <i class="fas fa-laptop"></i>
            <span>Educación continua</span></a>
    </li>
    @endhasanyrole


    {{-- @hasanyrole(['SuperAdmin|Emprendedores'])

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Emprendedores</span></a>
    </li>
    @endhasanyrole --}}

    @hasanyrole(['SuperAdmin|Facultad'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFacultad"
           aria-expanded="true" aria-controls="collapseFacultad">
            <i class="fas fa-school"></i>
            <span>Facultad</span>
        </a>
        <div id="collapseFacultad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.facultad.ex-directores.index')}}">Ex Directores</a>
                <a class="collapse-item" href="{{route('sistema.facultad.informes.index')}}">Informes</a>
                <a class="collapse-item" href="{{route('sistema.facultad.profesores-emeritos.index')}}">Profesores Eméritos</a>
                <a class="collapse-item" href="{{route('sistema.facultad.secciones.index')}}">Secciones</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|SubdirectorAcademico'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.guia-exens.index')}}">
            <i class="fas fa-clipboard-list"></i>
            <span>Guia EXEN</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|SubdirectorAcademico'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.guia-nuevo-ingreso.index')}}">
            <i class="fas fa-clipboard-list"></i>
            <span>Guia Nuevo Ingreso</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Asesoria'])
    <!-- Nav Item - Table -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaboratorio"
        aria-expanded="true" aria-controls="collapseLaboratorio">
            <i class="fas fa fa-list-alt"></i>
            <span>Laboratorio Matem&aacute;ticas</span>
        </a>
        <div id="collapseLaboratorio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.laboratorio-matematicas.materiaLaboratorio.index')}}">Materias laboratorio</a>
                <a class="collapse-item" href="{{route('sistema.laboratorio-matematicas.temaMateria.index')}}">Tema materia</a>
                <a class="collapse-item" href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.index')}}">Problemas</a>
                <a class="collapse-item" href="{{route('sistema.laboratorio-matematicas.examen.index')}}">Generar laboratorio</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Internacionalizacion'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.internacionalizacion.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Movilidad Estudiantil</span></a>
    </li>
    @endhasanyrole
    
    @hasanyrole(['SuperAdmin|PracticasProfesionales'])
    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.practicas-profesionales.index')}}">
            <i class="fas fa-briefcase"></i>
            <span>Prácticas Profesionales</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePracticas-profesionales"
        aria-expanded="true" aria-controls="collapsePracticas-profesionales">
            <i class="fas fa-briefcase"></i>
            <span>Prácticas Profesionales</span>
        </a>
        <div id="collapsePracticas-profesionales" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.practicas-profesionales.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.practicas-profesionales.preguntas.index')}}">Preguntas Frecuentes</a>
            </div>
        </div>  
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Escolar'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.semestres.index')}}">
            <i class="fas fa-calendar-alt"></i>
            <span>Semestres</span></a>  
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|ServicioSocial'])
    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.servicio-social.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Servicio Social</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServicio-social"
        aria-expanded="true" aria-controls="collapseServicio-social">
            <i class="fas fa-fw fa-table"></i>
            <span>Servicio Social</span>
        </a>
        <div id="collapseServicio-social" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.servicio-social.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.servicio-social.preguntas.index')}}">Preguntas Frecuentes</a>
                <a class="collapse-item" href="{{route('sistema.servicio-social.documentos.index')}}">Documentos</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin'])
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.sociedad-alumnos.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sociedad de alumnos</span>
        </a>
    </li>    
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Sustentabilidad'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.sustentabilidad.index')}}">
            <i class="fas fa-seedling"></i>
            <span>Sustentabilidad</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Tesoreria'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTesoreria"
        aria-expanded="true" aria-controls="collapseTesoreria">
            <i class="fas fa-landmark"></i>
            <span>Tesorería</span>
        </a>
        <div id="collapseTesoreria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('sistema.tesoreria.index')}}">Información de la Página</a>
                <a class="collapse-item" href="{{route('sistema.tesoreria.preguntas.index')}}">Preguntas Frecuentes</a>
            </div>
        </div>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Asesoria'])
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.tutorias.index')}}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Tutorías</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|UnidadLinares'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.unidad-linares.index')}}">
            <i class="fas fa-first-aid"></i>
            <span>Unidad Linares</span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin|Universidad_saludable'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.universidad-saludable.index')}}">
            <i class="fas fa-dna"></i>
            <span>Universidad Saludable </span></a>
    </li>
    @endhasanyrole

    @hasanyrole(['SuperAdmin'])
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.congresos-usuarios.index')}}">
            <i class="fas fa-first-aid"></i>
            <span>Usuarios de Congresos </span></a>
    </li>
    @endhasanyrole
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
<!-- End of Sidebar -->
