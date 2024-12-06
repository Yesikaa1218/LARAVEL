@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'cambio de calificaciones')
@php
    $urlIndex = "";
    $estatus = $solicitud->Estatus;
    $mostrarBtnFirmar = false;
    $firmaUrl =Storage::disk('custom_public')->url('Firmas/'.$empleado->Firma);

    switch($rolCheck){
        case 'coordinador':
            $urlIndex = route('sistema.escolar.calificaciones.solicitudes.coordinadores');
            if($estatus == 3){
                $mostrarBtnFirmar = true;
            }
            break;
        case 'escolar':
            $urlIndex = route('sistema.escolar.calificaciones.solicitudes.escolar');
            if($estatus == 1){
                $mostrarBtnFirmar = true;
            }
            break;
        case 'subacademico':
            $urlIndex = route('sistema.escolar.calificaciones.solicitudes.subacademico');
            if($estatus == 4){
                $mostrarBtnFirmar = true;
            }
            break;
    }
    

@endphp
@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cambio de calificaciones</h1>
        <a href="{{$urlIndex}}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> <i
            class="fas fa-list fa-sm text-white-50"></i> Ver Solicitudes</a>
    </div>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de cambios de calificaciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p id="cantidad"></p>
                    <p id="restantes"></p>

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
        @if($mostrarBtnFirmar)
        <div class="d-flex justify-content-center align-items-center">
            <a id="BtnFirmar" href="#" class="btn btn-success shadow-sm mr-2">
                <i class="fas fa-file-signature" style="color: #ffffff;"></i> Firmar
            </a>
            <a id="BtnDeclinar" href="#" class="btn btn-danger shadow-sm">
                <i class="fas fa-times-circle" style="color: #ffffff;"></i> Declinar
            </a>
        </div>
        @endif
    

    </div>
@endsection

@section('scripts-page')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
            var tipoFirma = <?php echo json_encode($rolCheck); ?>;
            var idSolicitud = <?php echo json_encode($solicitudId); ?>;
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

            function declinarDocumento(solicitudId, tipoFirma) {
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

            function mostrarConfirmacionFirma() {
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


            function mostrarConfirmacionDeclinar() {
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
                        declinarDocumento(idSolicitud, tipoFirma);
                    }
                });
            }

        $("#BtnFirmar").click(mostrarConfirmacionFirma);
        $("#BtnDeclinar").click(mostrarConfirmacionDeclinar);

    </script>
  
    <script>
        $(document).ready(function () {
            // Inicializa la tabla DataTables
            var dataTable = $('#data').DataTable();
            var pCantidad=$('#cantidad');
            var pRestantes = $('#restantes');

        //boton ver
        $('#data').on('click', '.verBtn', function () {
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
                        ver(idCambio,data);
                    } else {
                        Swal.fire('Error', 'Ocurrió un error al obtener los datos del cambio', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
                }
            });        
        });



        function ver(idCambio,data){
            var html=`
                <div class="container-fluid">
                    <h4>Folio: `+idCambio+` </h4>
                    <form method="POST" action="" id="datosAlumno">
                        @csrf 
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value=":nombre" disabled readonly required>
                            </div>
                        </div>
                        <div class="row mt-3">             
                            <div class="col-md-6">
                                <label for="matricula">Matrícula:</label>
                                <input type="text" class="form-control" id="matricula" name="matricula"  value=":matricula" disabled readonly required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipoExamen">Tipo de Examen:</label>
                                <input type="text" class="form-control" id="tipoExamen" name="tipoExamen" value=":tipoExamen" disabled readonly required>
                            </div>
                        </div>
                        
                        <div class="row mt-3">    
                            <div class="col-md-6">
                                <label for="calificacionIncorrecta">Calificación Incorrecta:</label>
                                <input type="number" class="form-control" id="calificacionIncorrecta" name="calificacionIncorrecta" value=":calificacionIncorrecta" min="0" max="100" step="0.01" readonly required>
                            </div>

                            <div class="col-md-6">
                                <label for="calificacionCorrecta">Calificación Correcta:</label>
                                <input type="number" class="form-control" id="calificacionCorrecta" name="calificacionCorrecta"  value=":calificacionCorrecta" min="0" max="100" readonly disabled required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="motivo">Motivo:</label>
                                <textarea class="form-control" id="motivo" name="motivo" rows="4" maxlength="150" disabled readonly required></textarea>
                            </div>
                        </div>
                        
                    </form>    
                </div>
                `;
                //Llenado de campos para update
                $(document).ready(function(){
                    var tipoExamen = document.getElementById('tipoExamen');
                    var tipoExamenValue="Error";
                    switch(data[0].fkTipoExamen){
                        case 1:
                            tipoExamenValue = "Ordinario";
                            break;
                        case 2:
                            tipoExamenValue = "Extraordinario";
                            break;
                        case 3:
                            tipoExamenValue = "Semestral";
                            break;
                        case 4:
                            tipoExamenValue = "Trimestral";
                            break;
                        case 5:
                            tipoExamenValue = "Otro";
                            break;
                    }

                    tipoExamen.value = tipoExamenValue;
                    var textarea = document.getElementById('motivo');
                    textarea.value = data[0].Motivo;
                });
                html = html.replace(':nombre', data[0].NombreAlumno);
                html = html.replace(':matricula', data[0].Matricula);
                html = html.replace(':calificacionCorrecta', data[0].CalifCorrecta);
                html = html.replace(':calificacionIncorrecta', data[0].CalifIncorrecta);

                Swal.fire({
                    title: 'Datos de la Solicitud',
                    html: html,
                    confirmButtonText: 'Cerrar',
                });
        }




            $.ajax({
                url: "{{ route('cambio-calificaciones.solicitud.getCambiosBySolicitud', ['id' => $solicitudId]) }}",
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var data=response.datos;
                    var cantidad = response.cantidad;
                    var botones = '<button title="Ver" title="Ver" class="btn btn-primary verBtn" type="button" style="margin: auto;"><i class="fas fa-eye"></i></button>';
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
@endsection