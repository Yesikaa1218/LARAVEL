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
    <h1 class="h3 mb-0 text-gray-800">Solicitudes cambio de calificación</h1>
    <!--<a href="{{ route('sistema.escolar.calificaciones.solicitudes.crear') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Registrar solicitud</a> -->
    <a href="{{ route('sistema.escolar.calificaciones.solicitudes.listaMaterias') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Lista de Materias</a>
</div>
@endsection
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de solicitudes de cambio de calificaciones</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="data" class="table table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Folio</th>
                            <th>Fecha de Creación</th>
                            <th>Materia</th>
                            <th>Plan</th>
                            <th>Cantidad</th>
                            <th>Estatus Solicitud</th>
                            <th width="250px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Solicitud de Cambio de Calificación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenedor donde se mostrará el PDF -->
                    <embed src="" id="pdfEmbed" type="application/pdf" width="100%" height="500px" />
                    <button type="button" id="btnEnviar" class="btn btn-primary">Enviar</button>
                    <button type="button" id="btnFirmar" idSolicitud="" class="btn btn-primary">Firmar</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts-page')
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.19/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>

<script type="text/javascript">
    const estatusTxt = [
        "No enviada"
        , "Enviada a Escolar"
        , "Firmada por Escolar"
        , "Firmada por Docente"
        , "Firmada por Coordinador"
        , "Firmada por Subdirector Academico"
        , "Jefe Escolar Finalizo Proceso"
        , "Finalizado"
        , "Rechazada por Escolar"
        , "Rechazada por Coordinador"
        , "Rechazada por Subdirector Academico"
    ];

    function mostrarMes(mes) {
        var texto = "";
        switch (mes) {
            case 1:
                texto = "Enero";
                break;
            case 2:
                texto = "Febrero";
                break;
            case 3:
                texto = "Marzo";
                break;
            case 4:
                texto = "Abril";
                break;
            case 5:
                texto = "Mayo";
                break;
            case 6:
                texto = "Junio";
                break;
            case 7:
                texto = "Julio";
                break;
            case 8:
                texto = "Agosto";
                break;
            case 9:
                texto = "Septiembre";
                break;
            case 10:
                texto = "Octubre";
                break;
            case 11:
                texto = "Noviembre";
                break;
            case 12:
                texto = "Diciembre";
                break;
            default:
                texto = " ";
                break;
        }
        return texto;
    }

    $(document).ready(function() {
        // Inicializa la tabla DataTables
        var dataTable = $('#data').DataTable();
        var idSolicitud;
        var tipoFirma = <?php echo json_encode($rolCheck); ?>;
            
        var pdfBaseURL = <?php echo json_encode($url); ?>;
        var FirmaURL = <?php echo json_encode($firmaUrl); ?>;

            function enviarSolicitud(solicitudId,_estatus){
                //alert(_estatus);
                var _url = '{{ route("cambio-calificaciones.solicitud.estatus", ["id" => ":id"]) }}';
                    _url = _url.replace(':id', solicitudId);
                $.ajax({
                    url: _url,
                    type: 'PATCH',
                    data: {
                        Estatus: _estatus
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Documento enviado',
                                'El documento ha sido enviado a la oficina de Escolar para su procesamiento.',
                                'success'
                            ).then(() => {
                                // Ocultar el botón después de enviar con éxito
                                $('#btnEnviar').hide();
                                //actualizarHistorial(idSolicitud);
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Hubo un error al enviar el documento: ' + response.message,
                                'error'
                            );
                        }
                    },
                    error: function(error) {
                        console.error('Error al actualizar la solicitud:', error);
                        Swal.fire(
                            'Error',
                            'Hubo un error al enviar el documento. Por favor, inténtalo de nuevo más tarde.',
                            'error'
                        );
                    }
                });
            }

            // Función para mostrar SweetAlert de confirmación al hacer clic en "Enviar"
            function mostrarConfirmacionEnvio(idSolicitud) {
                Swal.fire({
                title: '¿Estás seguro de que quieres enviar este documento a la oficina de Escolar?',
                text: 'Al confirmar, este documento será enviado a la oficina de Escolar para su procesamiento y no podrás editar o agregar mas cambios de calificaciones.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        enviarSolicitud(idSolicitud,1);                 
                    }
                });
            }

            function botonesxEstatus(estatus){
                
                switch (estatus) {
                            case 0:
                                mostrarBotones(true,false);
                                break;
                            case 1:
                                mostrarBotones(false,false);
                                break;
                            case 2:
                                mostrarBotones(false,true);
                                break;
                            case 3:
                                mostrarBotones(false,false);
                                break;
                            case 4:
                                mostrarBotones(false,false);
                                break;
                            case 5:
                                mostrarBotones(false,false);
                                break;
                            case 6:
                                mostrarBotones(false,false);
                                break;
                            case 7:
                                mostrarBotones(false,false);
                                break;
                            case 8:
                                mostrarBotones(false,false);
                                break;
                            case 9:
                                mostrarBotones(false,false);
                                break;
                            case 10:
                                mostrarBotones(false,false);
                                break;
                            default:
                                mostrarBotones(false,false);
                                break;
                        }
            }

            function mostrarBotones(mostrarBotonEnviar,mostrarBotonFirmar){
                
                if (!mostrarBotonEnviar) {
                    $('#btnEnviar').hide();
                } else {
                    $('#btnEnviar').show();
                }

                if(!mostrarBotonFirmar){
                    
                    $('#btnFirmar').hide();
                }else{
                    $('#btnFirmar').show();
                }         
                        
            }

            function buscarIndiceEstatus(estatus){
                var contador = 0;
                var index = 0;
                estatusTxt.forEach(e => {
                    
                    if(e == estatus){
                        index = contador;
                        
                    }
                    contador++;
                });
                return index;
            }

            function firmarSolicitud(solicitudId, _firma) {
                var _url = '{{ route("cambio-calificaciones.firmas.store.Firmas", ["solicitudId" => ":solicitudId","tipo" => ":tipo"]) }}';
                _url = _url.replace(':solicitudId', solicitudId);
                _url = _url.replace(':tipo', tipoFirma);

                $.ajax({
                    url: _url,
                    type: 'PATCH',
                    contentType: 'application/json',
                    data: JSON.stringify({ firma: _firma }),
                    success: function (response) {
                        if (response.success) {
                            console.log(response.message)
                            Swal.fire(
                                'Documento firmado',
                                'El documento ha sido Firmado exitosamente, seguirá el proceso de cambio de calificación.',
                                'success'
                            ).then(() => {
                                
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Hubo un error al firmar el documento: ' + response.message,
                                'error'
                            );
                        }
                    },
                    error: function (error) {
                        console.error('Error al actualizar la solicitud:', error);
                        Swal.fire(
                            'Error',
                            'Hubo un error al firmar el documento. Por favor, inténtalo de nuevo más tarde.',
                            'error'
                        );
                    }
                });
            }

            function mostrarConfirmacionFirmaModal() {
                Swal.fire({
                title: '¿Estás seguro de que quieres firmar este documento?',
                text: 'Al proceder con la firma de este documento, se concederá la debida autorización a la parte correspondiente de seguir el proceso de cambio de calificación.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, firmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    var FirmaURL = <?php echo json_encode($firmaUrl); ?>;
                    var idSolicitud = $('#btnFirmar').data('idSolicitud');
                    console.log(idSolicitud)
                    firmarSolicitud(idSolicitud,FirmaURL);
                }
                });
            }

            function mostrarConfirmacionFirma(idSolicitud) {
                Swal.fire({
                title: '¿Estás seguro de que quieres firmar este documento?',
                text: 'Al proceder con la firma de este documento, se concederá la debida autorización a la parte correspondiente de seguir el proceso de cambio de calificación.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, firmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    var FirmaURL = <?php echo json_encode($firmaUrl); ?>;
                    firmarSolicitud(idSolicitud,FirmaURL);
                }
                });
            }

            // Agregar el evento click al botón "Enviar" usando jQuery
            $('#btnEnviar').click(function(){
                var idSolicitud = $(this).data('idSolicitud');
                mostrarConfirmacionEnvio(idSolicitud);
            });

            //Funcio
            function verificarCambiosEnvio(fila){
                idSolicitud = fila[0];
                var estatusTable = fila[5];
                var cantidadCambios = fila[4];
                
                if(estatusTable == 'No enviada' && cantidadCambios == 0) { 
                    Swal.fire({
                        title: 'Su solicitud no cuenta con datos.',
                        text: 'La solicitud de cambio de calificaciones no cuenta con datos de los alumnos, favor de agregarlos antes de enviar.',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar',
                    });
                } else {
                    mostrarConfirmacionEnvio(idSolicitud);
                }
            }

            //Click en EnviarFrontalBtn
            $('#data').on('click', '.EnviarFrontalBtn', function() {
                var fila = dataTable.row($(this).closest('tr')).data();
                verificarCambiosEnvio(fila);             
            });


// Click en agregar +
let datosSeleccionados = null; // Variable para almacenar los datos seleccionados

$('#data').on('click', '.AgregarBtn', function () {
    var fila = dataTable.row($(this).closest('tr')).data();
    idSolicitud = fila[0];

    // Realizar la petición AJAX para obtener los alumnos relacionados con el idSolicitud
    $.ajax({
        method: 'GET',
        url: '{{ route("sistema.escolar.calificaciones.solicitudes.indexSolicitudAlumnos", ["idSolicitud" => ":idSolicitud"]) }}'.replace(':idSolicitud', idSolicitud),
        success: function(response) {
            var alumnos = response.alumnos;
            var tablaAlumnos = `
                <div style="overflow-x: auto; max-height: 350px; max-width: 100%;">
                    <table class="table table-striped table-sm" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nombre</th>
                                <th>Tipo de Examen</th>
                                <th>Calificación Incorrecta</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>`;

            alumnos.forEach(function(alumno) {
                tablaAlumnos += `
          <tr class="alumno-row">
            <td>${alumno.matricula_alumno}</td>
            <td>${alumno.nombre_alumno}</td>
            <td>${alumno.tipo_examen}</td>
            <td>${alumno.calificacion}</td>
            <td>
                <button class="btn btn-primary seleccionarAlumno" 
                        data-matricula="${alumno.matricula_alumno}" 
                        data-nombre="${alumno.nombre_alumno}" 
                        data-tipo-examen="${alumno.tipo_examen}" 
                        data-calificacion="${alumno.calificacion}">Seleccionar</button>
            </td>
        </tr>`;
            });

            tablaAlumnos += `</tbody></table></div>`;

            // Crear el modal con la tabla de alumnos
            var form = document.createElement("form");
            form.id = "datosAlumno";
                  form.innerHTML = `
            @csrf
            ${tablaAlumnos}
            <div class="row mt-3">
                <label for="calificacionCorrecta">Calificación Correcta:</label>
                <input type="number" class="form-control" id="calificacionCorrecta" name="calificacionCorrecta" step="0.01" required>
            </div>
            <div class="row mt-3">
                <label for="motivo">Motivo:</label>
                <textarea class="form-control" id="motivo" name="motivo" rows="4" maxlength="150" required></textarea>
                <small id="caracteresRestantes" class="form-text text-muted">150 caracteres restantes</small>
            </div>`;


            Swal.fire({
                title: 'Agregar Cambio de Calificación',
                html: form,
                width: '80%', // Ajusta el ancho del modal al 80% de la pantalla
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                didOpen: () => {

                    // Deshabilitar el botón de confirmar al abrir el modal
                    const confirmButton = Swal.getConfirmButton();
                    confirmButton.disabled = true;

                    // Asignar evento al botón de seleccionar alumno
                    $('.seleccionarAlumno').on('click', function() {
                        var $button = $(this);
                        var $row = $button.closest('tr');
                        var nombre = $button.data('nombre');
                        var matricula = $button.data('matricula');
                        var tipoExamen = $button.data('tipo-examen');
                        var calificacion = $button.data('calificacion');

                        if ($button.text() === 'Seleccionar') {
                            // Ocultar otras filas
                            $('.alumno-row').not($row).hide();
                            // Cambiar el texto del botón a "Deseleccionar"
                            $button.text('Deseleccionar');
                            
                            // Guardar los datos seleccionados
                            datosSeleccionados = {
                                nombre: nombre,
                                matricula: matricula,
                                tipoExamen: tipoExamen,
                                calificacion: calificacion
                            };

                             // Habilitar el botón de confirmación al seleccionar un alumno
                            confirmButton.disabled = false;
                        } else {
                            // Mostrar otras filas
                            $('.alumno-row').show();
                            // Cambiar el texto del botón de vuelta a "Seleccionar"
                            $button.text('Seleccionar');
                            // Limpiar datos seleccionados
                            datosSeleccionados = null;
                            // Deshabilitar el botón de confirmación cuando no hay alumno seleccionado
                            confirmButton.disabled = true;
                        }
                    });

                    // Función para actualizar el contador de caracteres
                    $('#motivo').on('input', function() {
                        var maxLength = 150;
                        var currentLength = $(this).val().length;
                        $('#caracteresRestantes').text((maxLength - currentLength) + ' caracteres restantes');
                    });

                    $('#calificacionCorrecta').on('input change', function() {
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

                },
                preConfirm: () => {
 // Validar si se ha seleccionado un alumno
 if (!datosSeleccionados) {
            Swal.showValidationMessage('Debes seleccionar un registro antes de continuar.');
            return Promise.reject(); // Detiene la ejecución y evita el envío
        }
        

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
                    // Verificar si hay un registro seleccionado
                    if (!datosSeleccionados) {
                        Swal.showValidationMessage('Debes seleccionar un registro antes de continuar.');
                        return false;
                    }
                    switch(datosSeleccionados.tipoExamen){
                        case "Ordinario":
                            datosSeleccionados.tipoExamen=1;
                            break;
                        case "ExtraOrdinario":
                            datosSeleccionados.tipoExamen=2;
                            break;
                        case "Semestral":
                            datosSeleccionados.tipoExamen=3;
                            break;
                        case "Trimestral":
                            datosSeleccionados.tipoExamen=4;
                            break;
                        default:
                            datosSeleccionados.tipoExamen=5;
                    }

                    var datos = {
                        nombre: datosSeleccionados.nombre,
                        matricula: datosSeleccionados.matricula.toString(),
                        tipoExamen: datosSeleccionados.tipoExamen,
                        calificacionCorrecta: $('#calificacionCorrecta').val(),
                        calificacionIncorrecta: datosSeleccionados.calificacion,
                        motivo: $('#motivo').val(),
                        idSolicitud: idSolicitud
                    };

                    // Validar formulario
                    if ($("#datosAlumno").valid()) {
                        
                        console.log(datos);                     
                        return $.ajax({
                            method: 'POST',
                            url: '{{ route("cambio-calificaciones.solicitud.store-cambio") }}',
                            data: JSON.stringify(datos),
                            contentType: 'application/json'
                        }).done(function(response) {
                            if (response.success) {
                                Swal.fire('Guardado', 'Los datos han sido guardados correctamente', 'success')
                                    .then(() => {
                                        location.reload();
                                    });
                            } else {
                                Swal.fire('Error', 'Ocurrió un error al guardar los datos', 'error');
                            }
                        }).fail(function() {
                            Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
                        });

                        
                    } else {
                        return false;
                    }
                }
            });
        },
        error: function() {
            Swal.fire('Error', 'Ocurrió un error al obtener los datos de los alumnos', 'error');
        }
    });
});

    //Click en Editar
    $('#data').on('click', '.EditarBtn', function() {

        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];
        var url = '{{ route("sistema.escolar.calificaciones.solicitudes.docentes", ["id" => ":id"]) }}'.replace(':id', idSolicitud);
        // Redirigir a una nueva página
        window.location.href = url;
    });

    //Click en Firmar (tabla)
    $('#data').on('click', '.FirmarBtn', function() {
        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];
        mostrarConfirmacionFirma(idSolicitud);
    });

    //Click firmar (Modal)
    $('#btnFirmar').click(mostrarConfirmacionFirmaModal);

    //Funcion de eliminar
    function eliminarRegistro(_idSolicitud){
    var _url = '{{ route("cambio-calificaciones.solicitud.softdelete-cambio", ["id" => ":id"]) }}';
    _url = _url.replace(':id', _idSolicitud);
    $.ajax({
        url: _url,
        type: 'PATCH',
        data: {
            idSolicitud: _idSolicitud
        },
        success: function(response) {
            if (response.success) {
                Swal.fire(
                    'Solicitud eliminada.',
                    'La solicitud se ha eliminado de forma exitosa.',
                    'success'
                ).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar el registro: ' + response.message,
                    'error'
                );
            }
        },
        error: function(error) {
            console.error('Error al actualizar la solicitud:', error);
            Swal.fire(
                'Error',
                'Hubo un error al realizar la operacion. Por favor, inténtalo de nuevo más tarde.',
                'error'
            );}});}


    //Click en eliminar
    $('#data').on('click','.EliminarBtn',function(){
        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];
        Swal.fire({
                title: 'Eliminar registro',
                text: '¿Estás seguro de eliminar el registro? Esta acción no se puede deshacer.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    eliminarRegistro(idSolicitud);
                }
            });
           return;

    });

    //Click en ver
    $('#data').on('click','.VerBtn',function(){
        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];
        var estatusTable = fila[5];
        var cantidadCambios = fila[4];
        const embedElement = document.getElementById('pdfEmbed');
        if (cantidadCambios == 0) {
            Swal.fire({
                title: 'Sin cambios',
                text: 'La solicitud no tiene cambios pendientes, para visualizarla agregue al menos 1 con el botón Agregar(+).',
                icon: 'info',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    embedElement.setAttribute('src', "");
                    $('#pdfModal').modal('hide');
                } else {
                    embedElement.setAttribute('src', "");
                    location.reload();
                }
            });
            return;
        }

        botonesxEstatus(buscarIndiceEstatus(estatusTable));
        $('#btnEnviar').data('idSolicitud', idSolicitud);
        $('#btnFirmar').data('idSolicitud', idSolicitud);
        embedElement.setAttribute('src', "");
        var _url = '{{ route("cambio-calificaciones.solicitud.getDatosDocumento", ["id" => ":id"]) }}';
        _url = _url.replace(':id', idSolicitud);
        $.ajax({ 
            url: _url,
            method: 'GET',
            success: function(response) { 
                var cantidad = response.cantidad;
                var data = response.datos;
                // Obtener los datos de la respuesta
                const materia = data[0].materia;
                const clave = data[0].Clave;
                const grupo = data[0].grupo;
                const plan = data[0].plan;
                const fechaHoy = new Date(data[0].fechaSolicitud);
                const dia = fechaHoy.getDate();
                const mes = fechaHoy.getMonth() + 1;
                const año = fechaHoy.getFullYear();
                const firmaEscolarURL = data[0].firmaE !== null ? '/storage/Firmas/' + data[0].firmaE : null;
                const firmaDocenteURL = data[0].firmaD !== null ? '/storage/Firmas/' + data[0].firmaD : null;
                const firmaCoordinadorURL = data[0].firmaC !== null ? '/storage/Firmas/' + data[0].firmaC : null;
                const firmaSubAcademicoURL = data[0].firmaS !== null ? '/storage/Firmas/' + data[0].firmaS : null;
                const nombreEscolar = data[0].nombre_escolar;
                const nombreDocente = data[0].nombre_docente;
                const nombreCoordinador = data[0].nombre_coordinador;
                const nombreSubAcademico = data[0].nombre_subacademico;
                const ancho = 150;
                const alto = 90;
                const jefeDepartamentoEscolar = 'M.C. MARIA AURORA CHAVEZ VALDEZ';
                
                // Crear un nuevo objeto jsPDF
                const pdf = new window['jspdf'].jsPDF('p', 'pt', 'a4');
                            // Función para redimensionar la imagen
            function resizeImage(img, maxWidth, maxHeight) {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                var width = img.width;
                var height = img.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width *= maxHeight / height;
                        height = maxHeight;
                    }
                }

                canvas.width = width;
                canvas.height = height;

                ctx.drawImage(img, 0, 0, width, height);

                return canvas.toDataURL('image/png', 0.8); // Ajusta el valor según las necesidades
            }

            function loadAndCompressImage(url, callback) {
                var img = new Image();

                img.onload = function() {
                    var compressedUrl = resizeImage(img, 150, 90); // Ajusta las dimensiones según sea necesario
                    callback(compressedUrl);
                };

                img.onerror = function() {
                    console.error('Error al cargar la imagen desde la URL:', url);
                    callback(null);
                };
                img.src = url;
            }
                // Función para manejar la carga y compresión de firmas
                function handleFirma(firmaURL, coordenadaX, coordenadaY) {
                    if (firmaURL) {
                        // Cargar y comprimir la firma desde la URL
                        loadAndCompressImage(firmaURL, function(compressedFirma) {
                        // Agregar la firma al PDF
                            if (compressedFirma) {
                            pdf.addImage(compressedFirma, 'PNG', coordenadaX, coordenadaY, ancho, alto);
                            // Actualizar el elemento embed después de agregar todas las firmas
                                if (firmaURL === data[0].firmaSubAcademico) {
                                const pdfModificadoDataUri = pdf.output('dataurlstring');
                                const embedElement = document.getElementById('pdfEmbed');
                                embedElement.setAttribute('src', pdfModificadoDataUri);
                                }
                            }
                        });
                    }
                }

            //Encabezado del PDF
            pdf.setFont('Times New Roman');
            pdf.setFontSize(16);
            pdf.text(30, 40, jefeDepartamentoEscolar.toLocaleString());
            pdf.setFontSize(14);
            pdf.text(30, 55, 'Jefa del Departamento Escolar'+'\n'+'Facultad de Ciencias Físico Matemáticas'+'\n'+'Presente.*');
            pdf.setFontSize(12);
            pdf.text(30, 110, 'Por medio de la presente me permito solicitar un cambio de calificación debido a un error involuntario.');

            // Modificar el contenido de los pdf.text con los datos de la base de datos
            pdf.setFontSize(16);
            const informacion = [
                ['Materia', 'Clave', 'Grupo', 'Plan'],
                [materia.toLocaleString(), clave.toLocaleString(), grupo.toLocaleString(), plan.toLocaleString()]
            ];
            // Generar la tabla de informacion
            pdf.autoTable({
                startY: 130,
                body: informacion,
                theme: 'plain', // Usar el tema 'plain' para evitar el fondo gris
                styles: {
                    font: 'Times New Roman',
                    fontSize: 14,
                    cellPadding: 3,
                    lineWidth: 1.5,
                    lineColor: [0, 0, 0], // Establecer el color de línea a negro
                },
                columnStyles: {
                    0: { cellWidth: 260 }, // Ancho de la primera columna (Matrícula)
                    1: { cellWidth: 80 }, // Ancho de la segunda columna (Nombre)
                    2: {cellWidth: 80},
                    3: {cellWidth: 80}
                },
            });

            // Generar la tabla de motivos
            const encabezadosMotivos = [['Motivo', 'Tipo Examen']];
            const filaMotivos = data.map(row => [row.Motivo, row.tipoExamen]);
            pdf.autoTable({
                startY: 190,
                head: encabezadosMotivos,
                body: filaMotivos,
                theme: 'plain', // Usar el tema 'plain' para evitar el fondo gris
                styles: {
                    font: 'Times New Roman',
                    fontSize: 10,
                    cellPadding: 3,
                    lineWidth: 1,
                    lineColor: [0, 0, 0], // Establecer el color de línea a negro
                    valign: 'middle',
                    halign: 'center'
                },
                columnStyles: {
                    0: { cellWidth: 400 }, // Ancho de la primera columna (Matrícula)
                    1: { cellWidth: 100 }, // Ancho de la segunda columna (Nombre)
                },
            });


            // Generar la tabla con los datos de los alumnos
            const headers = [['Matrícula', 'Nombre', 'Calificación Incorrecta', 'Calificación correcta']];
            const dataRows = data.map(row => [row.Matricula, row.NombreAlumno, row.CalificacionIncorrecta, row.CalificacionCorrecta]);
            // Añadir filas vacías si el número de filas es menor que 5
            while (dataRows.length < 5) {
                dataRows.push(['', '', '', '']);
            }
            // Generar la tabla de alumnos en el PDF
            pdf.autoTable({
                startY: 440,
                head: headers,
                body: dataRows,
                theme: 'plain', // Usar el tema 'plain' para evitar el fondo gris
                styles: {
                    font: 'Times New Roman',
                    fontSize: 10,
                    cellPadding: 3,
                    lineWidth: 1.5,
                    lineColor: [0, 0, 0], // Establecer el color de línea a negro
                    valign: 'middle',
                    halign: 'center'
                },
                columnStyles: {
                    0: { cellWidth: 80 }, // Ancho de la primera columna (Matrícula)
                    1: { cellWidth: 280 }, // Ancho de la segunda columna (Nombre)
                    2: { cellWidth: 75 }, // Ancho de la tercera columna (Calif. Anterior)
                    3: { cellWidth: 75 } // Ancho de la cuarta columna (Calif. Nueva)
                },
            });

            pdf.setFontSize(12);
            //Mensaje final
            pdf.text(35, 590, 'Agradeciendo de antemano esta solicitud quedo de Usted, para cualquier duda o aclaración al respecto.');          
            pdf.setFontSize(16);
            pdf.text(36, 610, 'ATENTAMENTE.*');
            //Fechas
            pdf.setFontSize(14);
            pdf.text(36, 623, ('San Nicólas de los Garza, N.L. a ' + dia.toLocaleString() + ' de ' + mostrarMes(mes) + ' de ' + año.toLocaleString()));
            const promises = [];

            if (firmaEscolarURL) {
                promises.push(handleFirma(firmaEscolarURL, 50, 630));
            }

            if (firmaDocenteURL) {
                promises.push(handleFirma(firmaDocenteURL, 210, 724));
            }

            if (firmaCoordinadorURL) {
                promises.push(handleFirma(firmaCoordinadorURL, 210, 630));
            }

            if (firmaSubAcademicoURL) {
                promises.push(handleFirma(firmaSubAcademicoURL, 370, 630));
            }

            pdf.setFont('Times New Roman', 'bold');
            pdf.setFontSize(12); 
            //Lineas de firma        
            pdf.setLineWidth(0.5); // Ancho de la línea
            pdf.setDrawColor(0, 0, 0); // Color de la línea (negro)
            pdf.text(95, 710, 'Escolar');
            pdf.line(50, 695, 180, 695);
            pdf.text(260, 710, 'Coordinador');
            pdf.line(220, 695, 360, 695);
            pdf.text(425, 710, 'Subdirector Académico');
            pdf.line(400, 695, 560, 695);
            pdf.text(260, 805, 'Docente');
            pdf.line(220, 795, 360, 795);

            pdf.setFontSize(10);
            if (nombreEscolar) {
                pdf.textWithLink(nombreEscolar, 115, 720, {
                    align: 'center',
                    maxWidth: 140,
                    maxHeight: 40
                });
            }
            if (nombreCoordinador) {
                pdf.textWithLink('Dr. ' + nombreCoordinador, 290, 720, {
                    align: 'center',
                    maxWidth: 140,
                    maxHeight: 40
                });
            } 
            if (nombreSubAcademico) {
                pdf.textWithLink('M.A. ' + nombreSubAcademico, 450, 720, {
                    align: 'center',
                    maxWidth: 140,
                    maxHeight: 40
                });
            }        
            if (nombreDocente) {
                pdf.textWithLink(nombreDocente, 280, 815, {
                    align: 'center',
                    maxWidth: 140,
                    maxHeight: 40
                });
            }              

            Promise.all(promises)
                .then(() => {
                    setTimeout(() => {
                        // Generar el PDF modificado y actualizar el elemento embed
                        const pdfModificadoDataUri = pdf.output('dataurlstring');
                        embedElement.setAttribute('src', pdfModificadoDataUri);
                    }, 500);

                })
                .catch((error) => {
                    // Manejar cualquier error que pueda ocurrir en alguna de las promesas
                    // Generar el PDF modificado y actualizar el elemento embed
                    const pdfModificadoDataUri = pdf.output('dataurlstring');
                    const embedElement = document.getElementById('pdfEmbed');
                    embedElement.setAttribute('src', pdfModificadoDataUri);
                });
            }
        });
        
    });

    //Click en historial
    $('#data').on('click','.historialBtn', function(){
        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];
       // Realizar la petición AJAX para obtener los historiales relacionados con el idSolicitud
        $.ajax({
            method: 'GET',
            url: '{{ route("sistema.escolar.calificaciones.solicitudes.historialSolicitud", ["idSolicitud" => ":idSolicitud"]) }}'.replace(':idSolicitud', idSolicitud),
            success: function(response) {
                var historial = response.historial;
                var tablaHistorial = `
                <div style="overflow-x: auto; max-height: 350px; max-width: 100%;">
                    <table class="table table-striped table-sm" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Empleado</th>
                                <th>Accion</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>`;

            historial.forEach(function(item) {
                tablaHistorial += `
          <tr class="alumno-row">
            <td>${item.Clave}</td>
            <td>${item.Nombre}</td>
            <td>${item.accion}</td>
            <td>${item.Fecha}</td>
            </tr>`;
            });

            tablaHistorial += `</tbody></table></div>`;

            // Crear el modal con la tabla de alumnos
            var form = document.createElement("form");
            form.id = "datosAlumno";
                  form.innerHTML = `
            @csrf
            ${tablaHistorial}`;

            Swal.fire({
                title: 'Historial de Solicitud',
                html: form,
                width: '90%',
                confirmButtonText: 'Cerrar',
                showLoaderOnConfirm: true,
            });
        },
    });

    });

    //Click en ver motivo
    $("#data").on('click', ".motivoBtn", function(){
        var fila = dataTable.row($(this).closest('tr')).data();
        idSolicitud = fila[0];

        $.ajax({
            method: 'GET',
            url: '{{ route("cambio-calificaciones.verMotivo", ["idSolicitud" => ":idSolicitud"]) }}'.replace(':idSolicitud', idSolicitud),
            success: function(response) {
                // Crear el modal con la tabla de alumnos
                var form = document.createElement("form");
                form.id = "datosAlumno";
                form.innerHTML = `
                    <div class="row mt-3">
                        <label for="rol">Puesto:</label>
                        <input type=text class="form-control" id="rol" name="rol" value=${response.rol} readonly disabled required></input>
                    </div>
                    <div class="row mt-3">
                        <label for="empleado">Empleado:</label>
                        <input type=text class="form-control" id="empleado" name="empleado" value=${response.motivo[0].Nombre} readonly disabled required></input>
                    </div>
                    <div class="row mt-3">
                        <label for="motivo">Motivo:</label>
                        <textarea class="form-control" id="motivo" name="motivo" rows="4" maxlength="150" readonly disabled required>${response.motivo[0].Comentario}</textarea>                    
                    </div>`;
                

                Swal.fire({
                    title: 'Motivo de rechazo',
                    html: form,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Reactivar solicitud',
                    cancelButtonText: 'Volver',
                }).then((result) => {
                    if(result.isConfirmed){
                        Swal.fire({
                            title:'Reactivar solicitud',
                            text: "Al continuar, su solicitud podrá ser editada y tendrá que ser enviada nuevamente a escolar.",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Continuar',
                            cancelButtonText: 'Cancelar',
                            showCancelButton: true
                        }).then((result) => {
                            if(result.isConfirmed){
                                $.ajax({
                                    method: 'PATCH',
                                    url: '{{ route("cambio-calificaciones.reactivarSolicitud", ["idSolicitud" => ":idSolicitud"]) }}'.replace(':idSolicitud', idSolicitud),
                                    success: function(response){
                                        if(response.success){
                                            Swal.fire(
                                                'Solicitud reactivada.',
                                                'Ya puedes editar la solicitud para su posterior envío.',
                                                'success'
                                            ).then(() => {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire(
                                                'Error',
                                                'Hubo un error al completar la operación',
                                                'error'
                                            );
                                        }
                                    }
                                });
                            } 
                        })
                    }
                });
            }
        });
    });


    // llenar la tabla DataTables
    $.ajax({
    url: "{{ route('cambio-calificaciones.solicitud.get') }}"
    , type: 'GET'
    , dataType: 'json'
    , success: function(data) {
        const options = {
            year: 'numeric'
            , month: '2-digit'
            , day: '2-digit'
        };

        // Itera sobre los datos y agrega cada fila a la tabla
        $.each(data, function(index, item) {

            var fecha = new Date(item.fecha);
            var historial = '<button type="button" title="Ver" class="btn btn-secondary historialBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-tasks"></i></button>'
            var estatus = "";
            var botones = "";

            switch (item.Estatus) {
                case 0:
                    //No enviada
                    estatus = estatusTxt[0];
                    if (item.cantidad >= 5) {
                        botones =
                            '<button type="button" title="Editar" class="btn btn-secondary EditarBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-pencil-alt"></i></button>' +
                            '<button type="button" class="btn btn-info EnviarFrontalBtn" title="Enviar" style="display: inline-block; margin: 5px;"><i class="fas fa-paper-plane"></i></button>' +
                            '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                        } else {
                        botones =
                            '<button type="button" class="btn btn-primary AgregarBtn" title="Agregar" style="display: inline-block; margin: 5px;" data-idSolicitudCambio="' + item.folio + '"><i class="fas fa-plus fa-sm"></i> </button>' +
                            '<button type="button" title="Editar" class="btn btn-secondary EditarBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-pencil-alt"></i></button>' +
                            '<button type="button" class="btn btn-info EnviarFrontalBtn" title="Enviar" style="display: inline-block; margin: 5px;"><i class="fas fa-paper-plane"></i></button>' +
                            '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';                                       
                    }
                    if(item.Estatus == 0) {
                        botones += '<button type="button" title="Eliminar" class="btn btn-danger EliminarBtn" style:"display: inline-block; margin: 5px;"><i class="fas fa-trash-alt style="color: #ffffff;"></i></button>'
                    } 
                    break;
                case 1:
                    //Enviada a escolar
                    estatus = estatusTxt[1];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                        break;
                case 2:
                    //Firmada por escolar
                    estatus = estatusTxt[2];
                    botones =
                        '<button type="button" title="Firmar" class="btn btn-primary FirmarBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-file-signature"></i></button>' +
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 3:
                    //Firmada por Docente
                    estatus = estatusTxt[3];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 4:
                    //Firmada por Coordinador
                    estatus = estatusTxt[4];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 5:
                    //Firmada por subdirector
                    estatus = estatusTxt[5];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 6:
                    //Jefe escolar finalizo proceso
                    estatus = estatusTxt[6];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 7:
                    //Finalizado
                    estatus = estatusTxt[7];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
                case 8:
                    //Rechazada por escolar
                    estatus = estatusTxt[8];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>' +
                        '<a href="#" title="Motivo" class="btn btn-info motivoBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-clipboard" style="color: #ffffff;"></i></a>'
                    
                        break;
                case 9:
                    //Rechazada por coordinador
                    estatus = estatusTxt[9];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>' +
                        '<a href="#" title="Motivo" class="btn btn-info motivoBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-clipboard" style="color: #ffffff;"></i></a>';
                    break;
                case 10:
                    //Rechazada por subdirector
                    estatus = estatusTxt[10];
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>' +
                        '<a href="#" title="Motivo" class="btn btn-info motivoBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-clipboard" style="color: #ffffff;"></i></a>';
                    break;
                default:
                    estatus = "No reconocido";
                    botones =
                        '<a href="#" title="Ver" class="btn btn-success VerBtn" data-toggle="modal" data-target="#pdfModal" style="display: inline-block; margin: 5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></a>';
                    break;
            }

            dataTable.row.add([
                item.folio
                , fecha.toLocaleString('es-ES', options)
                , item.materia
                , item.name
                , item.cantidad
                , estatus
                , botones
            ]).draw();

        });
    }
    });
    });

</script>

@endsection
