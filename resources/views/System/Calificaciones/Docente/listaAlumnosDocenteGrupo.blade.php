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
    <h1 class="h3 mb-0 text-gray-800">Lista de Alumnos</h1>
    <a href="{{ route('sistema.escolar.calificaciones.solicitudes.listaMaterias') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Lista de Materias</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de Alumnos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="data" class="table table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th><input type="checkbox" id="select-all"> Seleccionar Todos</th>
                            <th>Matricula</th>                 
                            <th>Nombre</th>
                            <th>Oportunidad</th>
                            <th>Tipo Examen</th>
                            <th>Calificacion</th>
                            <!--<th width="250px">&nbsp;</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr data-id="{{ $alumno->id_alumno }}" class="clickable-row">
                                <td><input type="checkbox" name="ids[]" value="{{ $alumno->id_alumno }},{{ $alumno->idGrupo }}"></td>
                                <td>{{ $alumno->matricula_alumno }}</td>
                                <td>{{ $alumno->nombre_alumno }}</td>
                                <td>{{ $alumno->oportunidad }}</td>
                                <td>{{ $alumno->tipo_examen }}</td>
                                <td>{{ $alumno->calificacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
                
            </div>
            <div class="d-sm-flex align-items-right justify-content-between mb-4">
                <button class="d-none d-sm-inline-block btn btn-primary shadow-sm" id="boton-crear-solicitud" style="display: none;">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Crear Solicitud
                </button>
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
            var datos = <?php echo json_encode($alumnos); ?>
        
            
            // Inicializar la tabla con DataTables
            $('#data').DataTable();
            console.log(datos);
            // Usar delegación de eventos para manejar el clic en las filas
            $(document).on('click', '.clickable-row', function() {
                // Obtener la casilla de verificación en la fila clicada
                var checkbox = $(this).find('input[type="checkbox"]');
                
                // Alternar el estado de la casilla de verificación
                checkbox.prop('checked', !checkbox.prop('checked'));
        
                // Manejar la selección/deselección de todos los checkboxes si es necesario
                var allChecked = $('input[name="ids[]"]').length === $('input[name="ids[]"]:checked').length;
                $('#select-all').prop('checked', allChecked);
            });
        
            // Manejo del clic en el checkbox para seleccionar/desmarcar todas las filas
            $('#select-all').click(function() {
                var isChecked = $(this).prop('checked');
                $('input[name="ids[]"]').prop('checked', isChecked);
            });
        
            // Manejo del clic en los checkboxes individuales
            $('input[name="ids[]"]').click(function() {
                if (!$(this).prop('checked')) {
                    $('#select-all').prop('checked', false);
                } else {
                    var allChecked = $('input[name="ids[]"]').length === $('input[name="ids[]"]:checked').length;
                    $('#select-all').prop('checked', allChecked);
                }
            });
        
            $('#boton-crear-solicitud').click(function(){
                var checkedIds = $('input[name="ids[]"]:checked').map(function() {
                    return $(this).val();
                 }).get();

                if ($('input[name="ids[]"]:checked').length > 0 && $('input[name="ids[]"]:checked').length < 6) {
                    // Al menos una fila está marcada
                    Swal.fire({
                        title: 'Cambio de calificación',
                        text: 'Al proceder se iniciará el proceso para registrar la solicitud a cambio de calificación.',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continuar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            $.ajax({
                                url: "{{ route('sistema.escolar.calificaciones.solicitudes.indexSolicitud') }}",
                                type: 'POST',
                                data: {
                                    ids: checkedIds,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    var form = $('<form>', {
                                        'method': 'POST',
                                        'action': "{{ route('sistema.escolar.calificaciones.solicitudes.indexSolicitud') }}"
                                    });

                                    form.append($('<input>', {
                                        'name': '_token',
                                        'value': "{{ csrf_token() }}",
                                        'type': 'hidden'
                                    }));

                                    $.each(checkedIds, function(i, id) {
                                        form.append($('<input>', {
                                            'name': 'ids[]',
                                            'value': id,
                                            'type': 'hidden'
                                        }));
                                    });
                                    form.appendTo('body').submit();
                                },
                                error: function(xhr, status, error) {
                                    console.log('Error:', error);
                                }
                            });
                            
                           //console.log(checkedIds);
                        }
                    });
                } else if($('input[name="ids[]"]:checked').length > 5){
                    Swal.fire({
                        title: 'Aviso',
                        text: 'Solo puedes hacer 5 cambios por solicitud.',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    // No hay filas marcadas, muestra un mensaje de advertencia o no hace nada
                    Swal.fire({
                        title: 'Aviso',
                        text: 'Debes marcar al menos una de las filas para continuar.',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });              
                }
            })
          
        });
        </script>
        
        
@endsection
