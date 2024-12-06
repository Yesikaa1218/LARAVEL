@extends('layout.System.main')
@section('page_name', 'Calendario')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        .alert2{
            padding: 30px;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Calendario</h1>
    </div>

    <style>
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
            background: #456bd9;color:white;
        }
        .box-day{
            border:1px solid #E3E9E5;
            height:150px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:150px;
            background-color: #ccd1ce;
        }
    </style>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>


            <div class="row header-calendar"  >

                <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
                    <a  href="{{route('sistema.calendar.index_month', $data['last'])}}" style="margin:10px;">
                        <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
                    </a>
                    <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <?= $data['year']; ?></h2>
                    <a  href="{{route('sistema.calendar.index_month', $data['next'])}}" style="margin:10px;">
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
                                
                            {{ $dayweek['dia'] }}

                                @if (isset ($secuencia))
                                    @foreach ($secuencia as $avisosRepetidos)
                                        <br>
                                        <div style="background-color: {{$avisosRepetidos->categoria->color}}; color: white; padding: 1px 4px; opacity: 0.8">
                                            {{ $avisosRepetidos->titulo }}
                                        </div>
                                    @endforeach
                                @endif

                                @foreach ($dayweek['avisos_inicio'] as $inicio)
                                    @if ($inicio->active)
                                        <br>
                                        <div style="background-color: {{$inicio->categoria->color}}; color: white; padding: 1px 4px; opacity: 0.8">
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


@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#content_page',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table',
            toolbar_mode: 'sliding',
            language: 'es_MX',
            height: 500,
            toolbar_sticky: true,
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            spellchecker_language: 'es_MX',
        });
    </script>
@endsection
