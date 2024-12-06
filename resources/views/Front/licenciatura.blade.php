@extends('layout.Front.main')

@section('pagetitle', $data->nombre_licenciatura)
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5 ">
                            <h2 style="text-transform: none;" class="titulos-width">Licenciatura en {{$data->nombre_licenciatura}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
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
            data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <p>
                        @if($data && $data->descripcion)
                            {!! $data->descripcion !!}
                        @endif
                    </p>
                    <br>
                    <a href="#plan-estudios" class="btn btn-lg thm-btn">Plan de Estudios</a>
                </div>

                <div
                    class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated"
                    data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="col-auto">
                        <div class="text-center">
                            <img src="/storage/{{$data->foto_coordinador}}" class="img-thumbnail"
                                alt="{{$data->nombre_coordinador}}" style="max-height: 40rem"/>
                        </div>
                        <h4 class="courses-one__single-content-title pt-5 text-center">{{$data->nombre_coordinador}}
                            <br>
                            <span>{{$data->informacion_contacto}}</span>
                        </h4>
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
                        @if($data->perfil_ingreso)
                            {!! $data->perfil_ingreso !!}
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de {{$data->nombre_licenciatura}} son:</p>
                    </div>
                    <div class="course-details__content-list">
                        @if($data->perfil_egreso)
                            {!! $data->perfil_egreso !!}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="quick-facts justify-content-center align-items-center mt-4" style="background-color: #ffcc00">
        <div class="container ">
            <div class="row">
                <div
                    class="col-xl-12 col-lg-12 pt-5 pb-5 justify-content-center align-items-center  wow fadeInUp animated animated">
                    <div class="col-auto " data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div>
                            <h1 class="text-center pt-5 txt-bg-ligth">Indicadores</h1>
                            <h4 class="text-center pt-5 txt-bg-ligth">Semestre {{ $semestre->nombre }}</h4>
                            <hr>
                            <div class="col-auto text-center justify-content-center align-items-center pt-5">
                                <div class="container text-center">
                                    <div class="row justify-content-center">
                                                            @if($indicadores)
                                                                @foreach($indicadores as $indicador)
                                                                <div class="col col-lg-2 justify-content-center main-menu__inner ">
                                                                    <div class="counter-one__indicadores wow slideInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="margin-right:0px;">

                                                                        {{-- card card-facts wow fadeInUp animated animated --}}
                                                                    <div class="counter-one__right-single-icon">
                                                                        {{-- data-wow-delay="400ms" data-wow-duration="1500ms"> --}}
                                                                        <img src="/storage/{{ $indicador->imagen }}" style="width:90px; height:90px"/> 
                                                                        <div class="card-body">
                                                                            <h3 class="txt-bg-ligth">{{ $indicador->valor }}</h3>
                                                                            <h5 class="card-title txt-bg-ligth">
                                                                                {{ $indicador->nombre }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                @endforeach
                                                                @endif
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
    <section class="course-details" id="detalles-curso">
        <div class="container">
   
            <div class="row" id="plan-estudios">
                <div class="col-xl-12 col-lg-12 mb-5">
                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @php  
                                // Variable para indicar que se imprima solo una vez el tab activo
                                $activeTab = true;
                            @endphp	

                            @foreach($planesEstudio as $p) 
                                @if($activeTab)
                                <li class="nav-item">
                                    <a class="nav-link active" tabs-plan="true" id="pills-<?php echo $p->name?>-tab" data-toggle="pill" href="#detalles-curso" role="tab" aria-controls="pills-<?php echo $p->name?>" aria-selected="true">Plan {{$p->name}}</a>
                                </li>
                                <?php $activeTab = false; ?>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link " tabs-plan="false" id="pills-<?php echo $p->name?>-tab" data-toggle="pill" href="#detalles-curso" role="tab" aria-controls="pills-<?php echo $p->name?>" aria-selected="true">Plan {{$p->name}}</a>
                                </li>
                                @endif
                            @endforeach
                            
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @php   
                            // Variable para indicar que se imprima solo una vez el contenido activo
                            $activeContent = true;
                        @endphp	

                        @foreach($planesEstudio as $p) 

                            @if($activeContent)
                            <div class="tab-pane fade show active" container-plan="true" id="pills-<?php echo $p->name?>" role="tabpanel" aria-labelledby="pills-<?php echo $p->name?>-tab">
                            <?php $activeContent = false; ?>
                            @else
                            <div class="tab-pane fade show " container-plan="false" id="pills-<?php echo $p->name?>" role="tabpanel" aria-labelledby="pills-<?php echo $p->name?>-tab">
                            @endif

                                  <br>
                                <h2 class="course-details__curriculum-title">Plan de Estudios {{$p->name}}</h2>
                                <hr> 

                                <!--Start Single Course Details Curriculum-->
                                <div class="course-details__curriculum-single">

                                        @for($semestre = 1; $semestre <= 14; $semestre++)
                                            
                                            <?php
                                                // Variable para imprimir la tabla de optativas en cado de que el semestre las contenga
                                                $existenOptativas = false;

                                                // En este foreach se verifica que haya una materia que pertenezca al semestre, si no existe ninguna no imprimirá la tabla de ese semestre
                                                foreach($p->materias as $materia){
                                                    
                                                    $mostrarSemestre = false;

                                                    if ($materia->semestre_materia_lic == $semestre){
                                                        $mostrarSemestre = true;
                                                        break;
                                                    }

                                                }

                                                // Dependiendo del número de semestre se le asigna a $nombreSemestre el semestre en letras
                                                $nombreSemestre;

                                                switch($semestre){
                                                    case 1:
                                                        $nombreSemestre = "Primer Semestre";
                                                        break;
                                                    case 2:
                                                        $nombreSemestre = "Segundo Semestre";
                                                        break;
                                                    case 3:
                                                        $nombreSemestre = "Tercer Semestre";
                                                        break;
                                                    case 4:
                                                        $nombreSemestre = "Cuarto Semestre";
                                                        break;
                                                    case 5:
                                                        $nombreSemestre = "Quinto Semestre";
                                                        break;
                                                    case 6:
                                                        $nombreSemestre = "Sexto Semestre";
                                                        break;
                                                    case 7:
                                                        $nombreSemestre = "Séptimo Semestre";
                                                        break;
                                                    case 8:
                                                        $nombreSemestre = "Octavo Semestre";
                                                        break;
                                                    case 9:
                                                        $nombreSemestre = "Noveno Semestre";
                                                        break;
                                                    case 10:
                                                        $nombreSemestre = "Décimo Semestre";
                                                        break;
                                                    case 11:
                                                        $nombreSemestre = "Décimo Primer Semestre";
                                                        break;
                                                    case 12:
                                                        $nombreSemestre = "Décimo Segundo Semestre";
                                                        break;
                                                    case 13:
                                                        $nombreSemestre = "Décimo Tercer Semestre";
                                                        break;
                                                    case 14:
                                                        $nombreSemestre = "Décimo Cuarto Semestre";
                                                        break;
                                                    default:
                                                        $nombreSemestre = "Semestre";
                                                        break;
                                                        
                                                }
                                            ?>
                                            
                                            @if($mostrarSemestre)
                                            <div class="accordion accordion-flush" id="accordionFlushExample-<?php echo $p->name?>-<?php echo $semestre?>">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?php echo $p->name?>-<?php echo $semestre?>"
                                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                            {{$nombreSemestre}}
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne-<?php echo $p->name?>-<?php echo $semestre?>" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample-<?php echo $p->name?>-<?php echo $semestre?>">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <colgroup>
                                                                        <col span="1" style="width: 5%;">
                                                                        <col span="1" style="width: 30%;">
                                                                        <col span="1" style="width: 12.5%;">
                                                                        <col span="1" style="width: 12.5%;">
                                                                        <col span="1" style="width: 40%;">
                                                                    </colgroup>
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

                                                                    @foreach($p->materias as $materia)
                                                                        
                                                                        <!-- Si la materia pertenece al semestre y NO es optativa imprime la fila con sus datos -->
                                                                        @if($materia->semestre_materia_lic == $semestre && $materia->optativa_materia_lic == 0)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                                </th>
                                                                                <td><a href="#">
                                                                                        {{$materia->materia_licenciatur}}
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center">{{$materia->creditos_materia_lic}}</td>
                                                                                <td class="text-center">{{$materia->horas_semana_materia_lic}}</td>
                                                                                
                                                                                @php
                                                                                    $requisitos = strip_tags($materia->requisitos_materia_lic);
                                                                                @endphp
                                                                                <td>{!! $requisitos !!}</td>

                                                                            </tr>
                                                                        @endif

                                                                        <?php

                                                                            // En este if se verifica que por lo menos exista una materia optativa para imprimir la tabla de optativas
                                                                            if($materia->semestre_materia_lic == $semestre && $materia->optativa_materia_lic == 1){

                                                                                $existenOptativas = true;
                                                                            }
                                                                        ?>
                                                                        
                                                                    @endforeach

                                                                </table>
                                                            </div>

                                                            @if($existenOptativas)
                                                                <br>
                                                                <h2 class="course-details__curriculum-title">Optativas</h2>
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <colgroup>
                                                                            <col span="1" style="width: 5%;">
                                                                            <col span="1" style="width: 30%;">
                                                                            <col span="1" style="width: 12.5%;">
                                                                            <col span="1" style="width: 12.5%;">
                                                                            <col span="1" style="width: 40%;">
                                                                        </colgroup>
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

                                                                        @foreach($p->materias as $materia)

                                                                            @if($materia->semestre_materia_lic == $semestre && $materia->optativa_materia_lic == 1)
                                                                        
                                                                            <!-- Si la materia pertenece al semestre y SI es optativa imprime la fila con sus datos -->
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                                    </th>
                                                                                    <td><a href="#">
                                                                                            {{$materia->materia_licenciatur}}
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="text-center">{{$materia->creditos_materia_lic}}</td>
                                                                                    <td class="text-center">{{$materia->horas_semana_materia_lic}}</td>
                                                                                    
                                                                                    @php
                                                                                        $requisitos = strip_tags($materia->requisitos_materia_lic);
                                                                                    @endphp
                                                                                    <td>{!! $requisitos !!}</td>

                                                                                </tr>
                                                                            @endif

                                                                        @endforeach
                                                                    </table>
                                                                </div>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            @endif

                                        @endfor


                                </div>
                            
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- AQUÍ IBA LO QUE BORRÉ  -->
                <!--End Course Details Curriculum-->
            
                    
                </div>
            </div>
        </div>
    </section>


@endsection

<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    $(document).ready(function(){



        $("body").on("click", '[tabs-plan=false]', function(){
            $("[tabs-plan=true]").removeClass("active").attr("tabs-plan", "false");
            $(this).addClass("active").attr("tabs-plan", "true");

            var id_container = $(this).attr("aria-controls");
            $('[container-plan=true]').removeClass("active").attr("container-plan", "false");
            $('#' + id_container).addClass("active").attr("container-plan", "true");
        });
    });
</script>