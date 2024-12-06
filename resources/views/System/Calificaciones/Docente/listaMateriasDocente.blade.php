<?php
use Illuminate\Support\Facades\Storage;
// Ruta del archivo en el disco personalizado
$filePath = 'FormatoCambioCalificacion.JPG';
$url = Storage::disk('custom_public')->url($filePath);
$firmaUrl =Storage::disk('custom_public')->url('Firmas/'.$empleado->Firma);
?>
@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'cambio de calificaciones')
@section('page-header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lista de Materias</h1>

    <a href="{{route('sistema.escolar.calificaciones.solicitudes.index')}}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
</div>
@endsection
@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
    .accordion-button {
        background-color: #F8F9FC; /* Color de fondo del botón */
        color: #fff; /* Color del texto del botón */
        border: 1px solid #F8F9FC; /* Borde del botón */
        border-radius: 5px; /* Radio de borde del botón */
        margin-bottom: 10px; /* Espacio entre botones */
    }

    .accordion-button:hover {
        background-color: #D1D3E2; /* Color de fondo del botón al pasar el ratón */
    }

    .clickable-row:hover {
        background-color: #f2f2f2; /* Cambia el color de fondo al pasar el cursor */
        cursor: pointer; /* Cambia el cursor a una mano indicando que se puede hacer clic */
    }
    </style>
@endsection
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Materias</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="data" class="table table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Clave Materia</th>                 
                            <th>Nombre Materia</th>
                            <th>Plan</th>
                            <th>Grupo</th>
                            <!--<th width="250px">&nbsp;</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materias as $materia)
                        <tr data-id="{{ $materia->id_grupo }}" class="clickable-row">
                            <td>{{ $materia->clave_materia }}</td>                           
                            <td>{{ $materia->nombre_materia }}</td>
                            <td>{{ $materia->nombre_plan_estudios }}</td>
                            <td>{{ $materia->grupo }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Modal -->
    

</div>
@endsection

@section('scripts-page')
<script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>
<script src={{asset('/assets/js/specialtinyjs.js')}}></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script> <!-- Incluye jQuery -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var empleado = <?php echo json_encode($empleado); ?>;
        
            // Inicializar la tabla con DataTables
            $('#data').DataTable();
        
            // Usar delegación de eventos para manejar el clic en las filas
            $(document).on('click', '.clickable-row', function() {
                // Obtener el ID de la materia
                var idGrupo = $(this).data('id');
                
                // Redirigir a la nueva página o realizar alguna acción
                //alert(idGrupo);

                var _url = '{{ route("sistema.escolar.calificaciones.solicitudes.listaAlumnos", ["idGrupo"=>":idGrupo"]) }}';
                _url = _url.replace(':idGrupo',idGrupo);
                window.location.href=_url;
                
            });
        });
        </script>
        
@endsection
