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
    <h1 class="h3 mb-0 text-gray-800">Lista de Alumnos Hola este es el blade real, el otro no se que sea</h1>
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
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 id="table-title" class="m-0 font-weight-bold text-primary">Lista de Alumnos</h6>
            <button class="btn btn-secondary" id="toggle-button">Ver Alumnos en Espera</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- Tabla de Alumnos Libres -->
                <table id="alumnos-table" class="table table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th><input type="checkbox" id="select-all"> Seleccionar</th>
                            <th>Matricula</th>                 
                            <th>Nombre</th>
                            <th>Oportunidad</th>
                            <th>Tipo Examen</th>
                            <th>Calificacion</th>
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

                <!-- Tabla de Alumnos en Espera, inicialmente oculta -->
                <table id="alumnos-espera-table" class="table table-flush" style="display: none;">
                    <thead class="thead-light">
                        <tr>
                            <th>Matricula</th>                 
                            <th>Nombre</th>
                            <th>Folio de Solicitud</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnosEnEspera as $alumno)
                            <tr data-id="{{ $alumno->id_alumno }}">
                                <td>{{ $alumno->matricula_alumno }}</td>
                                <td>{{ $alumno->nombre_alumno }}</td>
                                <td>{{ $alumno->idSolicitud }}</td>
                                <td>{{ $alumno->Estatus }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- Botón de Crear Solicitud (inicialmente visible) -->
            <div class="d-sm-flex align-items-right justify-content-between mb-4">
                <button class="d-none d-sm-inline-block btn btn-primary shadow-sm" id="boton-crear-solicitud">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Crear Solicitud
                </button>
            </div>
        </div>
    </div>
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
            var datos = <?php echo json_encode($alumnos); ?>;
            var datosEspera = <?php echo json_encode($alumnosEnEspera); ?>;
      
            // Inicializa solo la primera tabla al cargar la página
            let table1 = $('#alumnos-table').DataTable();
            let table2;
            
            console.log(datos);
            console.log(datosEspera);

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
          
            document.getElementById("toggle-button").addEventListener("click", function() {
    const alumnosTable = $('#alumnos-table');
    const alumnosEsperaTable = $('#alumnos-espera-table');
    const tableTitle = document.getElementById("table-title");
    const toggleButton = document.getElementById("toggle-button");
    const botonCrearSolicitud = document.getElementById("boton-crear-solicitud");

    if (alumnosTable.is(":visible")) {
        // Destruye la primera tabla y ocúltala
        table1.destroy();
        alumnosTable.hide();

        // Muestra y vuelve a inicializar la segunda tabla si aún no está creada
        alumnosEsperaTable.show();
        table2 = $('#alumnos-espera-table').DataTable({
            data: datosEspera,
            columns: [
                { data: 'matricula_alumno' },
                { data: 'nombre_alumno' },
                { data: 'idSolicitud' },
                { 
                    data: 'Estatus', // Valor original
                    render: function(data, type, row) {
                        // Convertir valor numérico a string
                        let estatusString;
                        switch(data) {
                            case 0:
                                estatusString = "No enviada";
                                break;
                            case 1:
                                estatusString = "Enviada a Escolar";
                                break;
                            case 2:
                                estatusString = "Firmada por Escolar";
                                break;
                            case 3:
                                estatusString = "Firmada por Docente";
                                break;
                            case 4: 
                                estatusString = "Firmada por Coordinador";
                                break;
                            case 5: 
                                estatusString = "Firmada por Subdirector";
                                break;
                            case 8: 
                                estatusString = "Rechazada por Escolar";
                                break;
                            case 9:
                                estatusString = "Rechazada por Coordinador";
                                break;
                            case 10:
                                estatusString = "Rechazada por Subdirector";
                                break;
                            default:
                                estatusString = "Desconocido";
                        }
                        return estatusString; // Mostrar el string en la tabla
                    }
                }
            ]
        });

        // Cambia el texto y deshabilita el botón si es necesario
        tableTitle.textContent = "Lista de Alumnos en Espera";
        toggleButton.textContent = "Ver Alumnos Libres";
        botonCrearSolicitud.disabled = true;
        botonCrearSolicitud.style.visibility = 'hidden';
        
    } else {
        // Destruye la segunda tabla y ocúltala
        table2.destroy();
        alumnosEsperaTable.hide();

        // Muestra y vuelve a inicializar la primera tabla
        alumnosTable.show();
        table1 = $('#alumnos-table').DataTable();

        // Cambia el texto y habilita el botón si es necesario
        tableTitle.textContent = "Lista de Alumnos";
        toggleButton.textContent = "Ver Alumnos en Espera";
        botonCrearSolicitud.disabled = false;
        botonCrearSolicitud.style.visibility = 'visible';
    }
});




        });       
        </script>
@endsection
