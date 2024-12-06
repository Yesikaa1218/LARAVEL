@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'cambio de calificaciones')
@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cambio de calificaciones</h1>
        <a href="{{ route('sistema.escolar.calificaciones.solicitudes.index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> <i
            class="fas fa-list fa-sm text-white-50"></i> Ver Solicitudes</a>
    </div>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Solicitud para la materia de Física</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="data" class="table table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Materia</th>
                            <th>Plan</th>
                            <th>Nombre</th>                       
                            <th width="150px">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>

            </div>
            
        </div>

    </div>
@endsection

@section('scripts-page')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    {{-- Botones --}}
    <script>
         $(document).ready(function () {
            var dataTable = $('#data').DataTable();
            var idCambio;
            //boton editar
            $('#data').on('click', '.editarBtn', function () {
                var fila = dataTable.row($(this).closest('tr')).data();
                idCambio = fila[0];
                 // Realiza una solicitud AJAX para obtener los datos del cambio de calificación
                $.ajax({
                    url: '{{ route("cambio-calificaciones.solicitud.cambios-by-id", ["id" => ":id"]) }}'.replace(':id', idCambio),
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data) {
                            // Abre el modal de edición
                            editar(idCambio,data);
                        } else {
                            Swal.fire('Error', 'Ocurrió un error al obtener los datos del cambio', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
                    }
                });
                
                
            });

            $('#data').on('click', '.eliminarBtn', function () {
                var fila = dataTable.row($(this).closest('tr')).data();
                idCambio = fila[0];
                eliminar(idCambio);
            });

        });
    </script>
    {{-- Llenado de tabla --}}
    <script>
        var dataTable = $('#data').DataTable();
         $(document).ready(function () {
            // Inicializa la tabla DataTables
            
            var pCantidad=$('#cantidad');
            var pRestantes = $('#restantes');

            $.ajax({
                url: "{{ route('cambio-calificaciones.solicitud.getCambiosBySolicitud', ['id' => $solicitudId]) }}",
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var data=response.datos;
                    //console.log(data);
                    var cantidad = response.cantidad;
                    var botones = '<button title="Eliminar" type="button" class="btn btn-danger eliminarBtn" style="margin: auto;"><i class="fas fa-eraser"></i></button>'+'<button title="Editar" title="Editar" class="btn btn-primary editarBtn" type="button" style="margin: auto;"><i class="fas fa-pencil-alt"></i></button>';
                    const options = { year: 'numeric', month: '2-digit', day: '2-digit'};
                    // Itera sobre los datos y agrega cada fila a la tabla
                    $.each(data, function (index, item) {
                        var fecha = new Date(item.fecha);
                        dataTable.row.add([
                            item.folio,
                            fecha.toLocaleString('es-ES', options),
                            item.materia,
                            item.plan,
                            item.NombreAlumno,
                            botones
                        ]).draw();
                    });

                    //Imprime cantidad de registros
                    pCantidad.text('Cantidad de Cambios de Calificación: '+ cantidad);
                    pRestantes.text('Cambios Restantes: '+ (5-cantidad));
                }
            });
        });
    </script>
    {{-- sweet alert --}}
    <script>
        function editar(idCambio,data){
            var html=`
                    <div class="container-fluid">
                        <h4>Folio: `+idCambio+` </h4>
                        <form method="POST" action="" id="datosAlumno">
                            @csrf 
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value=":nombre" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label for="matricula">Matrícula:</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula"  value=":matricula" readonly required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="tipoExamen">Tipo de Examen:</label>
                                    <select class="form-control" id="tipoExamen" name="tipoExamen" readonly disabled required>
                                        <option value="0" selected>Selecciona un tipo de examen</option>
                                    @foreach($tipoExamen as $tipo)
                                        @if($tipo->Activo)
                                            <option value="{{ $tipo->idTipoExamen }}">{{ $tipo->Descripcion }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="row mt-3">
                                
                                <div class="col-md-6">
                                    <label for="calificacionIncorrecta">Calificación Incorrecta:</label>
                                    <input type="number" class="form-control" id="calificacionIncorrecta" name="calificacionIncorrecta" value=":calificacionIncorrecta" min="0" max="100" step="0.01" readonly required>
                                </div>

                                <div class="col-md-6">
                                    <label for="calificacionCorrecta">Calificación Correcta:</label>
                                    <input type="number" class="form-control" id="calificacionCorrecta" name="calificacionCorrecta"  value=":calificacionCorrecta" min="0" max="100" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="motivo">Motivo:</label>
                                    <textarea class="form-control" id="motivo" name="motivo" rows="4" maxlength="150" required></textarea>
                                    <small id="caracteresRestantes" class="form-text text-muted">150 caracteres restantes</small>
                                </div>
                            </div>
                        
                        </form>
                        
                        
                    </div>
                    `;
                //Llenado de campos para update
                $(document).ready(function(){
                        
                    var select = document.getElementById('tipoExamen');
                    var valorDeseado = data[0].fkTipoExamen;
                    // Itera a través de las opciones y selecciona la correcta
                    for (var i = 0; i < select.options.length; i++) {
                         
                        if (select.options[i].value == valorDeseado) {     
                            select.options[i].selected = true;
                            break;
                        }
                    }
                    var textarea = document.getElementById('motivo');
                    textarea.value = data[0].Motivo;
                });
                html = html.replace(':nombre', data[0].NombreAlumno);
                html = html.replace(':matricula', data[0].Matricula);
                html = html.replace(':calificacionCorrecta', data[0].CalifCorrecta);
                html = html.replace(':calificacionIncorrecta', data[0].CalifIncorrecta);

                Swal.fire({
                    title: 'Editar Cambio de Calificación',
                    html: html,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    showLoaderOnConfirm: true,
                    didOpen: () => {
                        // Función para actualizar el contador de caracteres
                        $('#motivo').on('input', function() {
                            var maxLength = 150;
                            var currentLength = $(this).val().length;
                            $('#caracteresRestantes').text((maxLength - currentLength) + ' caracteres restantes');
                        });
                    },
                    preConfirm: () => {

                        var calificacionCorrecta = $('#calificacionCorrecta').val();
                        var motivo = $('#motivo').val();

                        // Validar si los campos no están en blanco
                        if (!calificacionCorrecta || !motivo) {
                            Swal.fire('Error', 'Ambos campos: "calificacion correcta" y "motivos" deben contener información para proceder.', 'error');
                            return Promise.reject(); // Detiene la ejecución y evita el envío
                        }

                        // Validar si la calificación correcta está en el rango permitido
                        if (calificacionCorrecta < 0 || calificacionCorrecta > 100 || calificacionCorrecta == "-0" || calificacionCorrecta == "-" || calificacionCorrecta == null) {
                            Swal.fire('Error', 'La calificación debe estar entre 0 y 100', 'error');
                            return Promise.reject();  // Detiene la ejecución si el valor es incorrecto
                        }
        
                        var _url = '{{ route("cambio-calificaciones.solicitud.update-cambio", ["id" => ":id"]) }}';
                        _url = _url.replace(':id', idCambio);

                        var datos = {
                            nombre: $('#nombre').val(),
                            matricula: $('#matricula').val(),
                            tipoExamen: $('#tipoExamen').val(),
                            calificacionCorrecta: calificacionCorrecta,
                            calificacionIncorrecta: $('#calificacionIncorrecta').val(),
                            motivo: $('#motivo').val()
                        };

                        return $.ajax({
                            method: 'PUT',
                            url: _url,
                            data: JSON.stringify(datos), 
                            contentType: 'application/json',
                        })
                        .done(function (response) {
                            if (response.success) {
                                Swal.fire('Guardado', 'Los datos han sido guardados correctamente', 'success')
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Error', 'Ocurrió un error al guardar los datos', 'error');
                            }
                        })
                        .fail(function () {
                            Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
                        });
                    }
                });

                // Añade el evento de validación al campo de calificación
                $(document).on('input', '#calificacionCorrecta', function () {
                    var valor = $(this).val();
                    var mensajeError = $('#mensajeErrorCalificacion');

                    // Verificar si el valor es un número válido (sin signos y con hasta dos decimales)
                    if (!/^\d+(\.\d{1,2})?$/.test(valor)) {
                        $(this).val(''); // Borrar el valor si no es válido

                        if (mensajeError.length === 0) {
                            $(this).after('<small id="mensajeErrorCalificacion" class="form-text text-danger" style="font-size: 0.75rem;">Solo se permiten números y hasta dos decimales.</small>');
                        }
                    } else {
                        // Verificar si el valor es inválido (fuera del rango 0-100)
                        var numValor = parseFloat(valor);
                        if (numValor < 0 || numValor > 100) {
                            $(this).val(''); // Borrar el valor si no es válido

                        if (mensajeError.length === 0) {
                            $(this).after('<small id="mensajeErrorCalificacion" class="form-text text-danger" style="font-size: 0.75rem;">La calificación debe estar entre 0 y 100.</small>');
                        }   
                    } else {
                        // Si el valor es válido, removemos el mensaje de error si existe
                        if (mensajeError.length > 0) {
                            mensajeError.remove();
                        }
                    }
                }
            });

        }

        
        function eliminar(idCambio) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas dar de baja a este registro con folio: ' + idCambio + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, dar de baja',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var _url = '{{ route("cambio-calificaciones.solicitud.softdelete-cambioIndividual", ["id" => ":id"]) }}';
                    _url = _url.replace(':id', idCambio);

                    $.ajax({
                        type: 'PATCH', // Método HTTP para la baja lógica
                        url: _url,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'Registro dado de baja con éxito',
                                });

                                // Elimina la fila de la tabla
                                var fila = $('#data').find('td:contains("' + idCambio + '")').closest('tr');
                                dataTable.row(fila).remove().draw();
                                
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error en la operación: ' + JSON.stringify(response.errors),
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error en la solicitud AJAX: ' + error,
                            });
                        }
                    });
                }
            });
        }

    </script>
@endsection