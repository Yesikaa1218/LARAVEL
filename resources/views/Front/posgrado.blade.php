@extends('layout.Front.main')

@section('pagetitle', $data->nombre_posgrado)
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
        style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">{{$data->nombre_posgrado}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li class="active">Posgrados</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="desripcion-posgrado pt-5 pb-5  wow fadeInLeft animated animated"
             data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2" style="border:2px solid #1576FA; border-radius:22px">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated">
                    <div class="text-center" style="border:2px solid #1576FA; border-radius:22px; height:350px; width:700px; display:table-cell; vertical-align:middle">
                        <img src="/storage/{{$data->foto_del_coordinador}}" class="img-thumbnail"
                             alt="{{$data->nombre_posgrado}}"/>
                    </div>
                    <br>
                    <center><a href="#" class="btn btn-warning" style="color:#1576FA">{{$data->nombre_coordinador_posgrado}}</a></center>
                </div>

                <div class="col-xl-6 col-lg-6 pt-5 pb-5 justify-content-center align-items-center  wow fadeInRight animated animated">
                    <div style="border:2px solid #1576FA; border-radius:22px; height:350px">
                        <h3 class="text-center" style="color:#1576FA">Datos coordinador posgrado</h3>
                        <p class="text-center" style="color:#000000"> {{$data->nombre_coordinador_posgrado}} <br>Coordinador(a) de Programa</p>
                        <pre><p style="color:#1576FA; text-indent: 10px"><i style='font-size:24px' class='fas'>&#xf199;</i>&emsp; {{$data->correo}}</p></pre>
                        @if($data->telefono)
                            <p style="color:#1576FA; text-indent: 10px">
                                <i style='font-size:24px' class='fas'>&#xf879;</i>&emsp;<a href="tel:{{$data->telefono}}" style="color:#1576FA"> {{$data->telefono}}</a>
                            </p>
                        @endif
                        @if($data->extension)
                            <p style="color:#1576FA; text-indent: 10px">
                                <i style="font-size:24px" class="fa">&#xf098;</i>&emsp; {{$data->extension}}
                            </p>
                        @endif
                        @if($data->extension)    
                            <p style="color:#1576FA; text-indent: 20px">{{$data->informacion_extra}}</p>
                        @endif    
                    </div>
                    <br>  
                    <center><a href="#plan-estudios" class="btn btn-warning" style="color:#1576FA">Plan de Estudios</a></center>
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
                    <div class="course-details__content-list" style="word-wrap: break-word;">
                        @if($data->perfil_de_ingreso_posgrado)
                            <?php
                            // Expresión regular para encontrar la liga específica de la pagina maestria-en-ingenieria-fisica
                            $pattern = '/(https:\/\/www\.fcfm\.uanl\.mx\/storage\/documentos\/CONVOCATORIA_PIFI_AGO_DEC_2023\.pdf)/';
                            
                            // Inicializa una variable para el contenido modificado
                            $contenido_con_botones = $data->perfil_de_ingreso_posgrado;
                    
                            // Verifica si se encuentra el enlace de maestria-en-ingenieria-fisica
                            if (preg_match($pattern, $contenido_con_botones, $matches)) {
                                // Si se encuentra el enlace, reemplaza con el enlace y el botón de Bootstrap
                                $contenido_con_botones = preg_replace($pattern, '<p><a href="$1" target="_blank">$1</a></p><a href="$1" target="_blank" class="btn btn-primary">Ver Pasos Convocatoria</a>', $contenido_con_botones);
                            } else {
                                // Si no se encuentra el enlace específico, busca etiquetas <a> con href y crea botones para ellas
                                $contenido_con_botones = preg_replace_callback('/<a\s+[^>]*href=["\'](https?:\/\/[^"\']+)["\'][^>]*>/i', function ($match) {
                                    $enlace = $match[1];
                                    return '<p><a href="' . $enlace . '" target="_blank">' . $enlace . '</a></p><a href="' . $enlace . '" target="_blank" class="btn btn-primary">Ver Pasos Convocatoria</a>';
                                }, $contenido_con_botones);
                            }
                    
                            // Verifica si se realizó alguna modificación
                            if ($contenido_con_botones !== $data->perfil_de_ingreso_posgrado) {
                                // Imprime el contenido con los enlaces y botones de Bootstrap
                                echo $contenido_con_botones;
                            } else {
                                // Si no se realizó ninguna modificación, imprime el contenido original
                                echo $data->perfil_de_ingreso_posgrado;
                            }
                            ?>
                        @endif
                        
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="pt-5">
                        <h3>Egresado</h3>
                        <hr>
                    </div>
                    <div>
                        <p>Las competencias específicas del profesional de egresados de {{$data->nombre_posgrado}} son:</p>
                    </div>
                    <div class="course-details__content-list">
                        @if($data->perfil_de_egreso_posgrado)
                            {!! $data->perfil_de_egreso_posgrado !!}
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
                            <h1 class="text-center pt-5 txt-bg-ligth" >Indicadores</h1>
                            <hr>
                            <div class="col-auto text-center justify-content-center align-items-center pt-5">
                                <div class="card-group col-auto">
                                    @if($indicadores)
                                        @foreach($indicadores as $indicador)
                                            <div class="card card-facts wow fadeInUp animated animated"
                                                data-wow-delay="400ms" data-wow-duration="1500ms">
                                                <span class="icon-photo-camera"></span>
                                                <div class="card-body">
                                                    <h3 class="txt-bg-ligth">{{$indicador->valor}}</h3>
                                                    <h5 class="card-title txt-bg-ligth">
                                                        {{$indicador->nombre}}
                                                    </h5>
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
    </section>

    <!--Start Course Details-->
    <section class="course-details" id="detalles-curso">
        <div class="container">
        @if(!empty($planesEstudioPosgrado))
       
            <div class="row" id="plan-estudios">
                <div class="col-xl-12 col-lg-12 mb-5">
                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @php  
                                // Variable para indicar que se imprima solo una vez el tab activo
                                $activeTab = true;
                            @endphp	

                            @foreach($planesEstudioPosgrado as $p) 
                                @if($activeTab)
                                <li class="nav-item">
                                    <a class="nav-link active" tabs-plan="true" id="pills-<?php echo $p->name?>-tab" data-toggle="pill" href="#detalles-curso" role="tab" aria-controls="pills-<?php echo $p->name?>" aria-selected="true">Plan {{$p->name}}</a>
                                </li>
                                <?php $activeTab = false; ?>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" tabs-plan="false" id="pills-<?php echo $p->name?>-tab" data-toggle="pill" href="#detalles-curso" role="tab" aria-controls="pills-<?php echo $p->name?>" aria-selected="true">Plan {{$p->name}}</a>
                                </li>
                                @endif
                            @endforeach
                            
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @php   
                            // Variable para indicar que se imprima solo una vez el contenido activo
                            $activeContent = true;
                        @endphp	

                        @foreach($planesEstudioPosgrado as $p) 

                            @if($activeContent)
                                <div class="tab-pane fade show active" container-plan="true" id="pills-<?php echo $p->name?>" role="tabpanel" aria-labelledby="pills-<?php echo $p->name?>-tab">
                                <?php $activeContent = false; ?>
                                @else
                                <div class="tab-pane fade show" container-plan="false" id="pills-<?php echo $p->name?>" role="tabpanel" aria-labelledby="pills-<?php echo $p->name?>-tab">
                            @endif

                                  <br>
                                <h2 class="course-details__curriculum-title">Plan de Estudios {{$p->name}}</h2>
                                <hr> 

                                <!--Start Single Course Details Curriculum-->
                                <div class="course-details__curriculum-single">
                                    @for($periodo = 1; $periodo <= 8; $periodo++)
                                            
                                        <?php
                                            // Variable para imprimir la tabla de optativas en cado de que el periodo las contenga
                                            $existenOptativas = false;

                                            // En este foreach se verifica que haya una materia que pertenezca al periodo, si no existe ninguna no imprimirá la tabla de ese periodo
                                            foreach($p->materias_posgrados as $materiaPosgrado){
                                                    
                                                $mostrarPeriodo = false;

                                                if ($materiaPosgrado->semestre_materia_pos == $periodo){
                                                    $mostrarPeriodo = true;
                                                    break;
                                                }

                                            }

                                            // Dependiendo del número de periodo se le asigna a $nombreSemestre el periodo en letras
                                            $nombrePeriodo;

                                            switch($periodo){
                                                case 1:
                                                    $nombrePeriodo = "Primer Semestre";
                                                    break;
                                                case 2:
                                                    $nombrePeriodo = "Segundo Semestre";
                                                    break;
                                                case 3:
                                                    $nombrePeriodo = "Tercer Semestre";
                                                    break;
                                                case 4:
                                                    $nombrePeriodo = "Cuarto Semestre";
                                                    break;
                                                case 5:
                                                    $nombrePeriodo = "Quinto Semestre";
                                                    break;
                                                case 6:
                                                    $nombrePeriodo = "Sexto Semestre";
                                                    break;
                                                case 7:
                                                    $nombrePeriodo = "Séptimo Semestre";
                                                    break;
                                                case 8:
                                                    $nombrePeriodo = "Octavo Semestre";
                                                    break;
                                                default:
                                                    $nombrePeriodo = "Semestre";
                                                    break;
                                                        
                                            }
                                            if($p->periodo_academico_id == 2){
                                                switch($periodo){
                                                    case 1:
                                                        $nombrePeriodo = "Primer Tetramestre";
                                                        break;
                                                    case 2:
                                                        $nombrePeriodo = "Segundo Tetramestre";
                                                        break;
                                                    case 3:
                                                        $nombrePeriodo = "Tercer Tetramestre";
                                                        break;
                                                    case 4:
                                                            $nombrePeriodo = "Cuarto Tetramestre";
                                                            break;
                                                    case 5:
                                                        $nombrePeriodo = "Quinto Tetramestre";
                                                        break;
                                                    case 6:
                                                        $nombrePeriodo = "Sexto Tetramestre";
                                                        break;
                                                    case 7:
                                                        $nombrePeriodo = "Séptimo Tetramestre";
                                                        break;
                                                    case 8:
                                                        $nombrePeriodo = "Octavo Tetramestre";
                                                        break;
                                                    default:
                                                        $nombrePeriodo = "Tetramestre";
                                                        break;            
                                                }
                                            }
                                        ?>
                                            
                                        @if($mostrarPeriodo)
                                            <div class="accordion accordion-flush" id="accordionFlushExample-<?php echo $p->name?>-<?php echo $periodo?>">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?php echo $p->name?>-<?php echo $periodo?>"
                                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                            {{$nombrePeriodo}}
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne-<?php echo $p->name?>-<?php echo $periodo?>" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample-<?php echo $p->name?>-<?php echo $periodo?>">
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

                                                                    @foreach($p->materias_posgrados as $materiaPosgrado)
                                                                        
                                                                        <!-- Si la materia pertenece al semestre y NO es optativa imprime la fila con sus datos -->
                                                                        @if($materiaPosgrado->semestre_materia_pos == $periodo && $materiaPosgrado->optativa_materia_pos == 0)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                                </th>
                                                                                <td><a href="#">
                                                                                        {{$materiaPosgrado->materia_posgrado}}
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center">{{$materiaPosgrado->creditos_materia_pos}}</td>
                                                                                <td class="text-center">{{$materiaPosgrado->horas_semana_materia_pos}}</td>
                                                                                
                                                                                @php
                                                                                    $requisitos = strip_tags($materiaPosgrado->requisitos_materia_pos);
                                                                                @endphp
                                                                                <td>{!! $requisitos !!}</td>

                                                                            </tr>
                                                                        @endif

                                                                        <?php
                                                                            // En este if se verifica que por lo menos exista una materia optativa para imprimir la tabla de optativas
                                                                            if($materiaPosgrado->semestre_materia_pos == $periodo && $materiaPosgrado->optativa_materia_pos == 1){
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

                                                                        @foreach($p->materias_posgrados as $materiaPosgrado)

                                                                            @if($materiaPosgrado->semestre_materia_pos == $periodo && $materiaPosgrado->optativa_materia_pos == 1)
                                                                        
                                                                            <!-- Si la materia pertenece al semestre y SI es optativa imprime la fila con sus datos -->
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                                    </th>
                                                                                    <td><a href="#">
                                                                                            {{$materiaPosgrado->materia_posgrado}}
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="text-center">{{$materiaPosgrado->creditos_materia_pos}}</td>
                                                                                    <td class="text-center">{{$materiaPosgrado->horas_semana_materia_pos}}</td>
                                                                                    
                                                                                    @php
                                                                                        $requisitos = strip_tags($materiaPosgrado->requisitos_materia_pos);
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
        
                    <!--End Course Details Curriculum-->
                         
                </div>
            </div>

        @endif
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