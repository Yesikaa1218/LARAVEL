@extends('layout.Front.main')

@section('pagetitle', 'Calendario')
@section('stylespage')


    <style>

        :root{
            --thm-dayoff: #ccd1ce;
        }

        [data-theme="dark"]{ 
            --thm-dayoff: #4f545c;
        }

        body{
            font-family: 'Exo', sans-serif;
        }
        .header-col{
            background: #E3E9E5;
            color:#536170;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .header-calendar{
            background: #1c1e27; color:white;
        }
        .box-day{
            border:1px solid #E3E9E5;
            height:150px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:150px;
            background-color: var(--thm-dayoff);
        }

        
    </style>
@endsection
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
        style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Calendario</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Calendario</a></li>
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
                <div class="col-xl-12 col-lg-12">

                    <div class="row header-calendar"  >

                        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
                            <a  href="{{route('calendario.showMonth', $data['last'])}}" style="margin:10px;">
                                <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
                            </a>
                            <h2 style="font-weight:bold;margin:10px;color:white;"><?= $mespanish; ?> <?= $data['year']; ?></h2>
                            <a  href="{{route('calendario.showMonth', $data['next'])}}" style="margin:10px;">
                                <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
                            </a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col header-col">Lunes</div>
                        <div class="col header-col">Martes</div>
                        <div class="col header-col">Miércoles</div>
                        <div class="col header-col">Jueves</div>
                        <div class="col header-col">Viernes</div>
                        <div class="col header-col">Sábado</div>
                        <div class="col header-col">Domingo</div>
                    </div>

                    @php
                        $secuencia = array();
                    @endphp

                    <!-- inicio de semana -->
                    @foreach ($data['calendar'] as $weekdata)
                        <div class="row">
                            <!-- ciclo de dia por semana -->
                            @foreach  ($weekdata['datos'] as $dayweek)

                                @if  ($dayweek['mes']==$mes)
                                    <div class="col box-day">
                                        {{ $dayweek['dia']  }}

                                        @if (isset ($secuencia))
                                            @foreach ($secuencia as $avisosRepetidos)
                                                <br>
                                                <div style="background-color: {{$avisosRepetidos->categoria->color}}; color: white; padding: .1px 5px; opacity: 0.8; font-size: 10px; line-height: 20px;">
                                                    {{ $avisosRepetidos->titulo }}
                                                </div>
                                            @endforeach
                                        @endif

                                        @foreach ($dayweek['avisos_inicio'] as $inicio)
                                            @if ($inicio->active)
                                                <br>
                                                <div style="background-color: {{$inicio->categoria->color}}; color: white; padding: .1px 5px; opacity: 0.8; font-size: 10px; line-height: 20px;">
                                                    {{ $inicio->titulo }}
                                                </div>
                                                @php array_push($secuencia, $inicio); @endphp
                                            @endif
                                        @endforeach

                                        @foreach ($dayweek['avisos_final'] as $final)
                                            @if ($final->active)
                                                @php
                                                foreach (array_keys($secuencia, $final) as $key) {
                                                    unset($secuencia[$key]);
                                                }
                                                @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <div class="col box-dayoff">
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

   

@endsection

@section('scripts-page')

@endsection