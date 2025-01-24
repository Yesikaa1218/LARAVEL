<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

$empleado = Auth::guard('empleado')->user();
$filePath = 'FormatoCambioCalificacion.JPG';
$url = Storage::disk('custom_public')->url($filePath);
$firmaUrl =Storage::disk('custom_public')->url('Firmas/'.$empleado->Firma);
$roles = $empleado->getRoleNames();
?>

@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Solicitudes en Progreso')


@section('styles-page')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Solicitudes en Progreso</h1>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Solicitudes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="data" class="table table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Folio</th>
                            <th>Maestro</th>
                            <th>Fecha de Creación</th>
                            <th>Materia</th>
                            <th>Plan</th>
                            <th>Cantidad</th>
                            <th>Estatus</th>
                            <th width="200px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudesEnProgreso as $solicitud)
                            <tr>
                                <td>{{ $solicitud->idSolicitudCambio }}</td>
                                <td>
                                    @if($solicitud->grupo && $solicitud->grupo->empleadoMateria && $solicitud->grupo->empleadoMateria->empleado)
                                        {{ $solicitud->grupo->empleadoMateria->empleado->Nombre }} 
                                        {{ $solicitud->grupo->empleadoMateria->empleado->ApPaterno }}
                                        {{ $solicitud->grupo->empleadoMateria->empleado->ApMaterno }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($solicitud->grupo && $solicitud->grupo->empleadoMateria && $solicitud->grupo->empleadoMateria->materia)
                                        {{ $solicitud->grupo->empleadoMateria->materia->materia_licenciatur }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($solicitud->planEstudios)
                                        {{ $solicitud->planEstudios->name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($solicitud->cambioCalificacionesDatos->count())
                                        {{ $solicitud->cambioCalificacionesDatos->count() }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @switch($solicitud->Estatus)
                                        @case(1) Enviada a Escolar 
                                        @break
                                        @case(2) Firmada por Escolar 
                                        @break
                                        @case(3) Firmada por Docente 
                                        @break
                                        @case(4) Firmada por Coordinador 
                                        @break
                                        @case(5) Firmada por Subdirector Academico 
                                        @break
                                        @case(6) Jefe Escolar Finalizo Proceso 
                                        @break
                                        @default Finalizado 
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles-page')
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .dataTables_filter {
        text-align: right !important;
    }

    .dataTables_paginate {
        text-align: right !important;
    }

    .dataTables_paginate .pagination {
        justify-content: flex-end;
    }

    .dataTables_filter input {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px 10px;
    }
</style>
@endsection

@section('scripts-page')
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#data').DataTable({
            "serverSide": false, 
            "header": {
                "token": "{{ csrf_token() }}",
            },
            "language": {
                "info": "_TOTAL_ Registro(s)",
                "search": "Search",
                "paginate": {
                    "next": "next",
                    "previous": "previous",
                },
                "lengthMenu": 'Show <select >' +
                    '<option value="10">10</option>' +
                    '<option value="30">30</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> entries',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay coincidencias",
                "infoEmpty": "",
                "infoFiltered": ""
            }
        });
    });
</script>
@endsection

