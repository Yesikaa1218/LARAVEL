<?php 
use Illuminate\Support\Facades\Auth;

$empleado = Auth::guard('empleado')->user();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeEscolar')}}">

        <div class="sidebar-brand-text mx-3">Sistema Escolar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
 {{--    <li class="nav-item">
        <a class="nav-link" href="{{route('sistema.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('SistemaEscolar.empleados.updateFirma')}}">
            <i class="fas fa-signature"></i>
            <span> Firma </span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('SistemaEscolar.empleados.cambio-contrasena')}}">
            <i class="fas fa-key"></i>
            <span> Cambio Contraseña </span></a>
    </li>
    @if($empleado->Firma)
    @hasanyrole('SistemaAdmin|Administrador')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('SistemaEscolar.empleados.index')}}">
                <i class="fas fa-user"></i>
                <span> Empleados </span></a>
        </li>
    @endhasrole

    @hasanyrole(['Escolar|Administrador'])
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Escolar
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('sistema.escolar.calificaciones.solicitudes.escolar')}}">
                <i class="fas fa-exchange-alt"></i>
                <span> Cambio de Calificaciones </span></a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="far fa-minus-square"></i>
                <span> Baja Parcial </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Reprogramación de Horario </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Adelanto de Oportunidad </span></a>
        </li> --}}
    @endhasanyrole

    @hasanyrole(['Docente|Administrador'])
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Docente
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('sistema.escolar.calificaciones.solicitudes.index')}}">
                <i class="fas fa-exchange-alt"></i>
                <span> Cambio de Calificaciones </span></a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Agendar Api </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-dungeon"></i>
                <span> Solicitar Auditorio </span></a>
        </li> --}}
    @endhasanyrole
    @hasanyrole(['CoordinadorMaestriaCOM|CoordinadorMaestriaIF|CoordinadorMaestriaISI|CoordinadorMaestriaAPTA|CoordinadorDoctoradoM|CoordinadorDoctoradoIF|CoordinadorMaestriaCDD|CoordinadorLicenciaturaLMAD|CoordinadorLicenciaturaLCC|CoordinadorLicenciaturaLA|CoordinadorLicenciaturaLSTI|CoordinadorLicenciaturaLM|CoordinadorLicenciaturaLF|Administrador'])
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Coordinador
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('sistema.escolar.calificaciones.solicitudes.coordinadores')}}">
                <i class="fas fa-exchange-alt"></i>
                <span> Cambio de Calificaciones </span></a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-table"></i>
                <span> Terceras y Quintas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Confirmación de Horario </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Consulta de Registros </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-th-list"></i>
                <span> AFIs </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-calendar"></i>
                <span> Adelantos de Oportunidad </span></a>
        </li> --}}
    @endhasanyrole

    @hasanyrole(['SubdirectorAcademico|Administrador'])
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Sub Director Académico
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('sistema.escolar.calificaciones.solicitudes.subacademico')}}">
                <i class="fas fa-exchange-alt"></i>
                <span> Cambio de Calificaciones </span></a>
        </li>
        
    @endhasanyrole
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
<!-- End of Sidebar -->
