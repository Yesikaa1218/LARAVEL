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
@section('page_name', 'solicitudes de cambios de calificaciones')

@section('styles-page')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Solicitudes de cambio de calificaciones</h1>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
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
                    <h5 class="modal-title" id="pdfModalLabel">Firmar Cambio de Calificación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenedor donde se mostrará el PDF -->
                    <embed src="" id="pdfEmbed" type="application/pdf" width="100%" height="500px" />
                    <button type="button" id="btnFirmar" class="btn btn-primary">Firmar</button>
                    <button type="button" id="btnDeclinar" class="btn btn-danger">Declinar</button>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts-page')
<script src="https://cdn.jsdelivr.net/gh/WangYuLue/image-conversion/build/conversion.js"></script>
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.19/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
<script>
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

    $(document).ready(function() {
                var idSolicitud;
                var Estatus = <?php echo json_encode($estatusMostrar); ?>;
                var tipoFirma = <?php echo json_encode($rolCheck); ?>;


            //funciones
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
                                // Ocultar el botón después de enviar con éxito
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

            function confirmarTerminarProceso(url) {
                // Mostrar la alerta de confirmación SweetAlert
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción cambiará el estatus. ¿Deseas continuar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, terminar proceso',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'PATCH',
                            url: url,
                            data: { _token: '{{ csrf_token() }}', Estatus: 7 },
                            success: function (response) {
                                Swal.fire({
                                    title: 'Éxito',
                                    text: 'El proceso ha sido terminado exitosamente.',
                                    icon: 'success'
                                }).then((result) => {
                                    // Verifica si el usuario hizo clic en el botón "OK"
                                    if (result.isConfirmed) {
                                        // Recarga la página
                                        location.reload();
                                    }
                                });
                            },
                            error: function (error) {
                                Swal.fire('Error', 'Hubo un error al intentar terminar el proceso.', 'error');
                            }
                        });
                    }
                });
            }

        function declinarDocumento(solicitudId, tipoFirma) {
            var motivoGeneral;
            var rechazo = `
            <div style="overflow-x: auto; max-height: 350px; max-width: 100%;">`;

                rechazo += `</tbody></table></div>`;

            // Crear el modal con la tabla de alumnos
            var form = document.createElement("form");
            form.id = "datosAlumno";
                  form.innerHTML = `
            @csrf
            ${rechazo}
            <div class="row mt-3">
                <label for="motivo">Motivo:</label>
                <textarea class="form-control" id="motivo" name="motivo" rows="4" maxlength="150" required></textarea>
                <small id="caracteresRestantes" class="form-text text-muted">150 caracteres restantes</small>
            </div>`;

            Swal.fire({
                title: 'Motivo de rechazo',
                html: form,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                didOpen: ()=>{
                    // Función para actualizar el contador de caracteres
                    $('#motivo').on('input', function() {
                        var maxLength = 150;
                        var currentLength = $(this).val().length;
                        $('#caracteresRestantes').text((maxLength - currentLength) + ' caracteres restantes');
                    });
                },
                preConfirm: ()=>{
                    var motivo = $('#motivo').val();
                    // Validar si los campos no están en blanco
                    if (!motivo) {
                        Swal.fire('Error', 'El campo de "Motivos" deben contener información para proceder.', 'error');
                        return Promise.reject(); // Detiene la ejecución y evita el envío
                    } else {
                        motivoGeneral = motivo;
                    }
                },
            }).then((result)=>{
                if (result.isConfirmed){
                    var _url = '{{ route("cambio-calificaciones.declinar", ["solicitudId" => ":solicitudId"]) }}';
                    _url = _url.replace(':solicitudId', solicitudId);

                    $.ajax({
                        url: _url,
                        type: 'PATCH',
                        data: {
                            Estatus: 0,
                            TipoFirma: tipoFirma
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Documento declinado',
                                    'No podrás continuar con el proceso en cuestión.',
                                    'info'
                                ).then(() => {
                                    var _motivoUrl = '{{ route("cambio-calificaciones.comentarioSolicitud", ["solicitudId" => ":solicitudId"]) }}';
                                    _motivoUrl = _motivoUrl.replace(':solicitudId', solicitudId);
                                    $.ajax({
                                        url: _motivoUrl,
                                        type: 'PATCH',
                                        data: {
                                            Comentario: motivoGeneral,
                                        },
                                    });
                                    // Puedes realizar acciones adicionales después de declinar el documento
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error',
                                    'Hubo un error al declinar el documento: ' + response.message,
                                    'error'
                                );
                            }
                        },
                        error: function(error) {
                            console.error('Error al declinar la solicitud:', error);
                            Swal.fire(
                                'Error',
                                'Hubo un error al declinar el documento. Por favor, inténtalo de nuevo más tarde.',
                                'error'
                            );
                        }
                    });
                }
            });
        }

            function mostrarConfirmacionFirma(opcion = null) {
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
                        //var idSolicitud = null;
                        if(opcion==null){
                            //idSolicitud = $('#btnFirmar').data('idSolicitud');                          
                            firmarSolicitud(idSolicitud,FirmaURL);
                        } else {
                            //idSolicitud = opcion;
                            firmarSolicitud(idSolicitud,FirmaURL);
                        }
                    }
                });
            }

            function mostrarConfirmacionDeclinar(opcion = null) {
                Swal.fire({
                title: '¿Estás seguro de que quieres declinar este documento?',
                text: 'Si declinas, no podrás continuar con este proceso para cambio de calificación.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, declinar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    if(opcion==null){
                        //var idSolicitud = $('#btnDeclinar').data('idSolicitud');
                        declinarDocumento(idSolicitud, tipoFirma);
                    } else {
                        //var idSolicitud = opcion;
                        declinarDocumento(idSolicitud, tipoFirma);
                    }
                    }
                });
            }

            var mostrarBotonesFirma = false;
            function botonesxEstatus(estatus){
                switch (estatus) {
                            case 0://No Enviada
                                mostrarBotones(false,false);
                                break;
                            case 1://SolicitudEnviada
                                mostrarBotones(true,true);
                                break;
                            case 2://Firmada por Escolar
                                mostrarBotones(false,false);
                                break;
                            case 3://Firmada por Docente
                                if(tipoFirma=='coordinador'){
                                    mostrarBotones(true,true);
                                }else{
                                    mostrarBotones(false,false);
                                }
                                break;
                            case 4://Firmada por Coordinador
                                if(tipoFirma=='subacademico'){
                                    mostrarBotones(true,true);
                                }else{
                                    mostrarBotones(false,false);
                                }
                                break;
                            case 5://Firmada por SubAcademico
                                mostrarBotones(false,false);
                                break;
                            case 6://Finalizado por Jefe Escolar
                                mostrarBotones(false,false);
                                break;
                            case 7://Finalizado
                                mostrarBotones(false,false);
                                break;
                            case 8://Escolar Rechaza
                                mostrarBotones(false,false);
                                break;
                            case 9://Coordinador Rechaza
                                mostrarBotones(false,false);
                                break;
                            case 10://Subdirector Rechaza
                                mostrarBotones(false,false);
                                break;
                            default:
                                mostrarBotones(false,false);
                                break;
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

            function mostrarBotones(mostrarBotonDeclinar,mostrarBotonFirmar){    
                if (!mostrarBotonDeclinar) {
                    $('#btnDeclinar').hide();        
                    mostrarBotonesFirma = false; 
                } else {
                    $('#btnDeclinar').show();
                    mostrarBotonesFirma = true; 
                }
                if(!mostrarBotonFirmar){          
                    $('#btnFirmar').hide();
                    mostrarBotonesFirma = false; 
                }else{
                    $('#btnFirmar').show();
                    mostrarBotonesFirma = true; 
                }                  
            }

            //Botones
            $('#btnFirmar').click(mostrarConfirmacionFirma);
            $('#btnDeclinar').click(mostrarConfirmacionDeclinar);

            //Botones para firmar en tabla
            $('#data').on('click','.btnFirmarTabla', function(){
                var fila = dataTable.row($(this).closest('tr')).data();
                idSolicitud = fila[0];
                mostrarConfirmacionFirma(idSolicitud);
            });
            $('#data').on('click','.btnDeclinarTabla', function(){
                var fila = dataTable.row($(this).closest('tr')).data();
                idSolicitud = fila[0];
                mostrarConfirmacionDeclinar(idSolicitud);
            });

            function revisarCoordinador(){
                var roles = @json($roles);
                var rol = -1;
                switch (roles[0]) {
                    case "Administrador":
                        rol = 0;
                    break;
                    case "CoordinadorLicenciaturaLMAD":
                        rol = 5;
                        break;
                    case "CoordinadorLicenciaturaLCC":
                        rol = 3;
                        break;
                    case "CoordinadorLicenciaturaLA":
                        rol = 4;
                        break;
                    case "CoordinadorLicenciaturaLSTI":
                        rol = 6;
                        break;
                    case "CoordinadorLicenciaturaLM":
                        rol = 1;
                        break;
                    case "CoordinadorLicenciaturaLF":
                        rol = 2;
                        break;
                }
                return rol;
            }
            


    //Click ver nuevo
    $('#data').on('click','.VerBtn',function(){
        //Llenado de documento pdf
        var fila = dataTable.row($(this).closest('tr')).data();
                idSolicitud = fila[0];
                var estatusTable = fila[6];
                botonesxEstatus(buscarIndiceEstatus(estatusTable));
                var pdfBaseURL = <?php echo json_encode($url); ?>;
                const embedElement = document.getElementById('pdfEmbed');
                embedElement.setAttribute('src', "");
                // Asignar el idSolicitud al botón "Enviar" dentro del modal
                $('#btnFirmar').data('idSolicitud', idSolicitud);
                $('#btnDeclinar').data('idSolicitud', idSolicitud);

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
            const headers = [['Matrícula', 'Nombre', 'Calificación Incorrecta (capturada en SIASE)', 'Calificación correcta']];
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
    
//Terminar proceso
            $('#data').on('click', '.FinalizarBtn', function () {
                var fila = dataTable.row($(this).closest('tr')).data();
                idSolicitud = fila[0];
                var _url = '{{ route("cambio-calificaciones.solicitud.estatus", ["id" => ":id"]) }}';
                _url = _url.replace(':id', idSolicitud);

                confirmarTerminarProceso(_url);
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
                                <th>Rol</th>
                                <th>Empleado</th>
                                <th>Acción</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>`;

            historial.forEach(function(item) {
                tablaHistorial += `
          <tr class="alumno-row">
            <td>${item.Clave}</td>
            <td>${item.Rol}</td>
            <td>${item.Nombre}</td>
            <td>${item.Accion}</td>
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
                confirmButtonText: 'Cerrar'
            });
            },
        });
    });


            // Inicializa la tabla DataTables
            var dataTable = $('#data').DataTable();
            var _url = '';
            if(tipoFirma == 'escolar'){
                _url = '{{ route("cambio-calificaciones.solicitud.getEnviadasEscolar") }}';
            }
            /*
            else if(tipoFirma == 'coordinador'){
                _url = '{{ route("cambio-calificaciones.solicitud.getEnviadas.licenciatura", ["Estatus" => ":Estatus", "licenciaturaId" => ":licenciaturaId"]) }}';
                _url = _url.replace(':Estatus', Estatus);
                _url = _url.replace(':licenciaturaId', revisarCoordinador());
            } 
            */
            else{
                _url = '{{ route("cambio-calificaciones.solicitud.getEnviadas", ["Estatus" => ":Estatus"]) }}';
                _url = _url.replace(':Estatus',Estatus );
            }


            $.ajax({
                url: _url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    const options = { year: 'numeric', month: '2-digit', day: '2-digit'};
                    // Itera sobre los datos y agrega cada fila a la tabla
                    $.each(data, function (index, item) {
                        var estatus = "";
                        var detalleUrl = tipoFirma+"/VerDetalle/"+item.folio;
                        var fecha = new Date(item.fecha);
                        var botones = '<div style="display: flex;">' +
                        '<button title="Ver Documento" type="button" class="btn btn-primary VerBtn btn-square" data-toggle="modal" data-target="#pdfModal" style="margin:5px;"><i class="far fa-file-pdf" style="color: #ffffff;"></i></button>' +
                        '<a title="Ver Detalle" type="button" href="' + detalleUrl + '" class="btn btn-secondary btn-square" style="margin:5px;"><i class="far fa-eye" style="color: #ffffff;"></i></a>';                       
                        var firmarBotones = '<button title="Firmar" href="'+ detalleUrl +'" class="btn btn-success shadow-sm btnFirmarTabla" style="margin:5px;"><i class="fas fa-file-signature" style="color: #ffffff;"></i></button>' +
                        '<button title="Declinar" href="'+ detalleUrl +'" class="btn btn-danger shadow-sm btnDeclinarTabla" style="margin:5px;"><i class="fas fa-times-circle" style="color: #ffffff;"></i></button></div>';                                                       
                        var historial = '<button type="button" title="Historial" class="btn btn-secondary historialBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-tasks"></i></button>';
                        
                        if(tipoFirma=='escolar'){
                            botones += historial;
                        }
                        
                        
                        //var botonPrueba = '<button title="Prueba" class="btn btn-success shadow-sm btnPrueba" data-toggle="modal" data-target="#pdfModal" style="margin:5px;"><i class="fas fa-file-signature" style="color: #ffffff;"></i></button>';
                        botonesxEstatus(item.Estatus);
                        if(mostrarBotonesFirma){botones += firmarBotones;}
                        switch (item.Estatus) {
                            case 0:
                                //No enviada
                                estatus = estatusTxt[0];
                                break;
                            case 1:
                                //SolicitudEnviada
                                estatus = estatusTxt[1];
                                break;
                            case 2:
                                //Firmada por Escolar
                                estatus = estatusTxt[2];
                                break;
                            case 3:
                                //Firmada por Docente
                                estatus = estatusTxt[3];
                                break;
                            case 4:
                                //Firmada por Coordinador
                                estatus = estatusTxt[4];                
                                break;
                            case 5:
                                //Firmada por Subdirector Academico
                                estatus = estatusTxt[5];
                                botones += '<button title="Finalizar Proceso" type="button" class="btn btn-success FinalizarBtn btn-square" data-toggle="modal" data-target="#finalizarModal" style="margin:5px;"><i class="fas fa-check-circle" style="color: #ffffff;"></i></button>';
                                // Cierra el contenedor <div>
                                botones += '</div>';
                                break;
                            case 6:
                                //Jefe Escolar Finalizo Proceso
                                estatus = estatusTxt[6];
                                break;
                            case 7:
                                //Finalizado
                                estatus = estatusTxt[7];
                                break;
                            case 8:
                                //Rechazada por Escolar
                                estatus = estatusTxt[8];
                                break;
                            case 9:
                                //Rechazada por Coordinador
                                estatus = estatusTxt[9];
                                break;
                            case 10:
                                //Rechazada por Subdirector Academico
                                estatus = estatusTxt[10];
                                break;
                            default:
                                estatus = "No reconocido";
                                break;
                        }                       

                        
                            dataTable.row.add([                      
                                item.folio,
                                item.name,
                                fecha.toLocaleString('es-ES', options),
                                item.materia,
                                item.plan,
                                item.cantidad,
                                estatus,
                                botones
                            ]).draw();
                        

                    });
                }
            });
        });

</script>
@endsection
