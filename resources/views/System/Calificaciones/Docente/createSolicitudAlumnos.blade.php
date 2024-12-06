@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Registrar Solicitud de cambio de calificación')

@section('styles-page')
    
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

    </style>
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar solicitud cambio de calificación</h1>
        <a href="{{route('sistema.escolar.calificaciones.solicitudes.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="POST" action="" id="datosProfesor">
            @csrf
            <!-- Información general del grupo -->
            <div class="row">
                <div class="col-md-12">
                    <label for="noEmpleado">No. de empleado:</label>
                    <input type="text" class="form-control" id="noEmpleado" name="noEmpleado" value="{{ $empleado->NoEmpleado }}" disabled required>
                </div>
                <div class="col-md-6">
                    <label for="plan">Plan:</label>
                    <input type="text" class="form-control" id="plan" name="plan" value="{{ $grupoInfo['plan'] }}" disabled required>
                </div>
                <div class="col-md-6">
                    <label for="materia">Materia:</label>
                    <input type="text" class="form-control" id="materia" name="materia" value="{{ $grupoInfo['materia'] }}" disabled required>
                </div>
                <div class="col-md-6">
                    <label for="clave">Clave:</label>
                    <input type="text" class="form-control" id="clave" name="clave" value="{{ $grupoInfo['clave'] }}" disabled required>
                </div>
                <div class="col-md-6">
                    <label for="grupo">Grupo:</label>
                    <input type="text" class="form-control" id="grupo" name="grupo" value="{{ $grupoInfo['grupo'] }}" disabled required>
                </div>
            </div>

            <!-- Acordeón de datos de alumnos -->
            <div id="seccionesDatosAlumnos">
                @foreach($alumnos as $index => $alumno)
                    <hr>
                    <div class="accordion" id="datosAlumnoAccordion{{ $index + 1 }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAlumno{{ $index + 1 }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlumno{{ $index + 1 }}" aria-expanded="false" aria-controls="collapseAlumno{{ $index + 1 }}">
                                    <span class="fw-bold text-primary">Datos Alumnos {{ $index + 1 }}</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="collapseAlumno{{ $index + 1 }}" class="accordion-collapse collapse" aria-labelledby="headingAlumno{{ $index + 1 }}" data-bs-parent="#seccionesDatosAlumnos">
                                <div class="accordion-body">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="nombre{{ $index + 1 }}" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre{{ $index + 1 }}" name="nombre{{ $index + 1 }}" value="{{ $alumno->nombre }}" required disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="matricula{{ $index + 1 }}" class="form-label">Matrícula:</label>
                                            <input type="text" class="form-control" id="matricula{{ $index + 1 }}" name="matricula{{ $index + 1 }}" value="{{ $alumno->matricula }}" required disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tipoExamen{{ $index + 1 }}" class="form-label">Tipo de Examen:</label>
                                            <input type="text" class="form-control" id="tipoExamen{{ $index + 1 }}" name="tipoExamen{{ $index + 1 }}" value="{{ $alumno->tipoExamen }}" required disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tipoExamenId{{ $index + 1 }}" class="form-label" hidden>Tipo de Examen ID:</label>
                                            <input type="text" class="form-control" id="tipoExamenId{{ $index + 1 }}" name="tipoExamenId{{ $index + 1 }}" value="{{ $alumno->tipoExamenId }}" hidden required disabled>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="calificacion{{ $index + 1 }}" class="form-label">Calificación:</label>
                                            <input type="number" class="form-control" id="calificacionIncorrecta{{ $index + 1 }}" name="calificacionIncorrecta{{ $index + 1 }}" value="{{ $alumno->calificacion }}" required disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="calificacionCorrecta{{ $index + 1 }}" class="form-label">Calificación corregida:</label>
                                            <input type="number" class="form-control" id="calificacionCorrecta{{ $index + 1 }}" name="calificacionCorrecta{{ $index + 1 }}" min="0" max="100" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="motivo{{ $index + 1 }}" class="form-label">Motivo:</label>
                                            <textarea class="form-control" id="motivo{{ $index + 1 }}" name="motivo{{ $index + 1 }}" rows="4" required maxlength="150" oninput="updateCount(this)"></textarea>
                                            <small id="charCount{{ $index + 1 }}" class="text-muted">150 caracteres restantes</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
        
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('sistema.escolar.calificaciones.solicitudes.index') }}" class="d-none d-sm-inline-block btn  btn-secondary shadow-sm">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>

@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        function updateCount(textarea) {
            const maxLength = textarea.getAttribute('maxlength');
            const currentLength = textarea.value.length;
            const remaining = maxLength - currentLength;
            document.getElementById('charCount' + textarea.id.slice(-1)).innerText = remaining + ' caracteres restantes';
        }
        

        $(document).ready(function(){

 // Validación en tiempo real para la calificación correcta
 $('.form-control[name^="calificacionCorrecta"]').on('input', function() {
        const input = $(this);
        const valor = parseFloat(input.val());

        // Verifica si el valor es un número y está dentro del rango permitido
        if (isNaN(valor) || valor < 0 || valor > 100 || (valor === 0 && input.val() === '-0')) {
            input.addClass('is-invalid'); // Agrega clase para indicar un error
            input.removeClass('is-valid'); // Remueve clase de éxito si existe
            Swal.fire({
                title: "Error",
                text: "La calificación debe ser un número entre 0 y 100.",
                icon: "error",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Aceptar"
            });
            $(this).val('');
        } else {
            input.removeClass('is-invalid'); // Remueve clase de error si es válido
            input.addClass('is-valid'); // Agrega clase de éxito si es válido
        }
    });

            var cantidadRepeticiones = <?php echo json_encode($contadorAlumnos); ?>;
            var datos = <?php echo json_encode($grupoInfo) ?>;
            console.log(datos);

            var inputsEnBlanco = false;
            //Verificar espacios en blanco
            function verificarEspaciosEnBlanco(){           
                var resultado = false;        
                $(".accordion").each(function(index){    
                    var accordion = $(this);
                    // Verificar cada input que no este en blanco
                    $(this).find('input[type="text"], input[type="number"], textarea').each(function() {
                        if ($(this).val().trim() === '') {
                            accordion.find('.accordion-button').removeClass('collapsed');
                            accordion.find('.accordion-button').attr('aria-expanded', 'true');
                            accordion.find('.accordion-collapse').removeClass('collapse'); 
                            accordion.find('.accordion-collapse').addClass('show');
                            resultado = true; 
                            return resultado;
                        }         
                    });
                });
                return resultado;
            }

            $('#btnGuardar').on('click', function() {
        if (verificarEspaciosEnBlanco()) {
            return;
        }

        // Construir el objeto formData
        var formData = [];

        // Datos del formulario principal
        var datosPrincipal = {
            noEmpleado: $('#noEmpleado').val(),
            plan: datos.fkPlan,
            materia: $('#materia').val(),
            clave: datos.clave,
            grupo: datos.fkGrupo
        };
        formData.push(datosPrincipal);

        // Datos de los formularios de alumnos
        $('.accordion').each(function(index) {
        var indexForm = index + 1;
        var nombre = $(`#nombre${indexForm}`).val();
        var matricula = $(`#matricula${indexForm}`).val();
        var tipoExamen = $(`#tipoExamenId${indexForm}`).val();
        var calificacionCorrecta = $(`#calificacionCorrecta${indexForm}`).val();
        var calificacionIncorrecta = $(`#calificacionIncorrecta${indexForm}`).val();
        var motivo = $(`#motivo${indexForm}`).val();
    if (nombre || matricula || tipoExamen || calificacionCorrecta || calificacionIncorrecta || motivo) {
        var datosAlumno = {
            [`nombre${indexForm}`]: nombre,
            [`matricula${indexForm}`]: matricula,
            [`tipoExamen${indexForm}`]: tipoExamen,
            [`calificacionCorrecta${indexForm}`]: calificacionCorrecta,
            [`calificacionIncorrecta${indexForm}`]: calificacionIncorrecta,
            [`motivo${indexForm}`]: motivo
        };
        formData.push(datosAlumno);
    }
        });
        //alert("Hola");
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{ route('cambio-calificaciones.solicitud.store') }}",
            data: { data: formData },
            success: function(data) {
                Swal.fire({
                    title: "Éxito",
                    text: "Los datos se han guardado exitosamente.",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Aceptar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('sistema.escolar.calificaciones.solicitudes.index') }}";
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error",
                    text: xhr.responseJSON.error || "Ocurrió un error al procesar la solicitud.",
                    icon: "error",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Aceptar",
                });
            }
        });
    });

});
    </script>


@endsection
