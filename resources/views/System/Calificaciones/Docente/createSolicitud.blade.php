@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Registrar Solicitud de cambio de calificación')

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
            Datos docente
            <div class="row">
                <div class="col-md-12">
                    <label for="noEmpleado">No. de empleado:</label>
                    <input type="text" class="form-control" id="noEmpleado" name="noEmpleado" value="{{ $empleado->NoEmpleado }}" disabled required>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan">Plan:</label>
                        <select class="form-control" id="plan" name="plan" required>
                            <option value="0" selected>Selecciona un plan</option>
                            @foreach($planes as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="materia">Materia:</label>
                        <select class="form-control" id="materia" name="materia" required>
                            <option value="0" selected>Selecciona una materia</option>
                            {{-- @foreach($materiasEmpleado as $materia)
                                <option value="{{ $materia->idMateria }}">{{ $materia->materia_licenciatur . ' | plan: ' . $materia->plan}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="clave">Clave:</label>
                    <input type="text" class="form-control" id="clave" name="clave" value="" disabled>
                </div>
        
                <div class="col-md-6">
                    <label for="grupo">Grupo:</label>
                    <input type="text" class="form-control" id="grupo" name="grupo" disabled>
                </div>
        </form>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cambiosCalif">Cantidad de Cambios de Calificación:</label>
                        <select class="form-control" id="cambiosCalif" name="cambiosCalif" required>
                            <option value="0">Selecciona cuantos cambios quieres</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="seccionesDatosAlumnos">
                <!-- Aquí irá la sección Datos Alumnos que se repetirá -->
            </div>
            
            
        
            <div class="row mt-3">
                <div class="col-md-12">
                    <a href="{{route('sistema.escolar.calificaciones.solicitudes.index')}}" class="d-none d-sm-inline-block btn  btn-secondary shadow-sm"> Cancelar</a>
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
    
    {{-- Acordeon datos alumnos --}}
    <script>
        $(document).ready(function() {
            // Configura el acordeón
            $('.collapse').on('show.bs.collapse', function () {
                $('.collapse.show').each(function(){
                    $(this).collapse('toggle');
                });
            });
        });
    </script>
    {{-- Script para llenar la clave con la clave de la materia cada que cambie el cb materia --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // Captura el evento de cambio en el campo de selección de materias
            $('#materia').on('change', function() {
                // Obtiene el valor de la materia seleccionada
                var materiaSeleccionada = $(this).val();
                
                var valor=(materiaSeleccionada>0)?materiaSeleccionada:"";
                // Actualiza el valor del campo "clave" con el valor de la materia seleccionada
                $('#clave').val(valor);
            });
        });
    </script>
    {{-- Script para mostrar las materias segun el plan --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // Captura el evento de cambio en el campo de selección de plan
            $('#plan').on('change', function() {
                var planId = $(this).val();
                
                if (planId > 0) {
                    // Realiza una petición AJAX para obtener las materias por plan
                    $.get("{{ route('materias.materias-by-plan', '') }}/" + planId, function(data) {
                        // Limpia el campo de selección de materias
                        $('#materia').empty();

                        // Agrega las opciones de materias
                        $('#materia').append('<option value="0" selected>Selecciona una materia</option>');
                        $.each(data, function(index, materia) {
                            $('#materia').append('<option value="' + materia.idMateria + '">' + materia.materia_licenciatur + '</option>');
                        });
                    });
                } else {
                    // Si no se selecciona un plan, limpia el campo de selección de materias
                    $('#materia').empty();
                    $('#materia').append('<option value="0" selected>Selecciona una materia</option>');
                }
            });
        });
    </script>
    {{-- Script para Obtener el grupo --}}
    <script type="text/javascript">
            // Asegúrate de que esta parte del código esté dentro de un bloque <script> en tu vista
        $(document).ready(function() {
            // Captura el evento de cambio en el campo de selección de materia
            $('#materia').on('change', function() {
                var materiaId = $(this).val(); // Obtén el ID de la materia seleccionada

                if (materiaId > 0) {
                    // Realiza una solicitud AJAX para obtener el grupo por materia y usuario
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('grupos.grupo-by-usuario-materia', '') }}/" + materiaId,
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                // Actualiza el valor del campo de entrada de texto con el grupo obtenido
                                $('#grupo').val(data[0].idGrupo);
                            } else {
                                // Si no se encuentra ningún grupo, muestra un mensaje en el campo de entrada de texto
                                $('#grupo').val('No se encontró grupo');
                            }
                        },
                        error: function(error) {
                            console.log('Error en la solicitud AJAX');
                        }
                    });
                } else {
                    // Si no se selecciona una materia, limpia el campo de entrada de texto
                    $('#grupo').val('');
                }
            });
        });

    </script>
    {{-- Mandar datos al servidor --}}
    <script>
        
        var cantidadRepeticiones;
       $(document).ready(function() {
        //metodos de validacion jqueryvalidate
        $.validator.addMethod("lettersAndSpaces", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Ingrese solo letras y espacios en blanco");

            $('#cambiosCalif').on('change', function() {
                cantidadRepeticiones = $(this).val();
                //localStorage.setItem('cantidadRepeticiones', cantidadRepeticiones);
                var seccionesDatosAlumnos = $('#seccionesDatosAlumnos');

                seccionesDatosAlumnos.empty(); // Limpia cualquier contenido previo

                for (var i = 0; i < cantidadRepeticiones; i++) {
                    var datosAlumnos = `
                        <hr>
                        <div class="accordion" id="datosAlumnoAccordion${i + 1}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingAlumno${i + 1}">
                                    <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseAlumno${i + 1}" aria-expanded="false" aria-controls="collapseAlumno${i + 1}">
                                        <span class="fw-bold text-primary">Datos Alumnos ${i + 1}</span>
                                        <i class="bi bi-chevron-down"></i> <!-- Icono de flecha hacia abajo -->
                                    </button>
                                </h2>
                                <div id="collapseAlumno${i + 1}" class="accordion-collapse collapse" aria-labelledby="headingAlumno${i + 1}" data-parent="#datosAlumnoAccordion${i + 1}">
                                    <form id="datosAlumno${i + 1}" name="datosAlumno${i + 1}" method="POST" action="">
                                        @csrf 
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label for="nombre${i + 1}" class="form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre${i + 1}" name="nombre${i + 1}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="matricula${i + 1}" class="form-label">Matrícula:</label>
                                                <input type="number" class="form-control" id="matricula${i + 1}" name="matricula${i + 1}" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label for="tipoExamen${i + 1}" class="form-label">Tipo de Examen:</label>
                                                <select class="form-control" id="tipoExamen${i + 1}" name="tipoExamen${i + 1}" required>
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
                                                <label for="calificacionCorrecta${i + 1}" class="form-label">Calificación Correcta:</label>
                                                <input type="number" class="form-control" id="calificacionCorrecta${i + 1}" name="calificacionCorrecta${i + 1}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="calificacionIncorrecta${i + 1}" class="form-label">Calificación Incorrecta:</label>
                                                <input type="number" class="form-control" id="calificacionIncorrecta${i + 1}" name="calificacionIncorrecta${i + 1}" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label for="motivo${i + 1}" class="form-label">Motivo:</label>
                                                <textarea class="form-control" id="motivo${i + 1}" name="motivo${i + 1}" rows="4" required></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    `;

                    seccionesDatosAlumnos.append(datosAlumnos); // Agrega la sección al contenedor

                    (function (index) {
                        var formId = "#datosAlumno" + (index + 1);

                        $(formId).validate({
                            errorElement: "div",
                            errorClass: "invalid-feedback",
                            highlight: function (element, errorClass, validClass) {
                                $(element).addClass("is-invalid");
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $(element).removeClass("is-invalid");
                            },
                            rules: {
                                ["nombre" + (index + 1)]:{
                                    required: true,
                                    lettersAndSpaces: true, // Usa la regla personalizada
                                    normalizer: function (value) {
                                        return value.charAt(0).toUpperCase() + value.slice(1);
                                    }
                                },
                                ["matricula" + (index + 1)]: {
                                    required: true,
                                    number: true
                                },
                                ["tipoExamen" + (index + 1)]: {
                                    required: true,
                                    min: 1
                                },
                                ["calificacionCorrecta" + (index + 1)]: {
                                    required: true,
                                    number: true,
                                    range: [0, 100]
                                },
                                ["calificacionIncorrecta" + (index + 1)]: {
                                    required: true,
                                    number: true,
                                    range: [0, 100]
                                },
                                ["motivo" + (index + 1)]: "required"
                            },
                            messages: {
                                ["nombre" + (index + 1)]: {
                                    required: "Por favor, ingrese el nombre"
                                },
                                ["matricula" + (index + 1)]: {
                                    required: "Por favor, ingrese la matrícula",
                                    number: "Por favor, ingrese un número válido"
                                },
                                ["tipoExamen" + (index + 1)]: {
                                    required: "Seleccione un tipo de examen",
                                    min: "Seleccione un tipo de examen válido"
                                },
                                ["calificacionCorrecta" + (index + 1)]: {
                                    required: "Por favor, ingrese la calificación correcta",
                                    number: "Por favor, ingrese un número válido",
                                    range: "La calificación debe estar entre 0 y 100"
                                },
                                ["calificacionIncorrecta" + (index + 1)]: {
                                    required: "Por favor, ingrese la calificación incorrecta",
                                    number: "Por favor, ingrese un número válido",
                                    range: "La calificación debe estar entre 0 y 100"
                                },
                                ["motivo" + (index + 1)]: "Por favor, ingrese el motivo"
                            }
                        });
                    })(i);
                }
                
            });

            $("#datosProfesor").validate({
                rules: {
                    noEmpleado: {
                        required: true,
                        digits: true 
                    },
                    plan: {
                        required: true,
                        min: 1 
                    },
                    materia: {
                        required: true,
                        min: 1
                    },
                    clave: "required",
                    grupo: "required",
                    // Agrega reglas adicionales para los campos restantes
                },
                messages: {
                    noEmpleado: {
                        required: "Por favor, introduce el No. de empleado",
                        digits: "Por favor, introduce un valor numérico válido"
                        // Agrega mensajes de error personalizados para el campo No. de empleado si es necesario
                    },
                    plan: "Por favor, selecciona un plan",
                    materia: "Por favor, selecciona una materia",
                    clave: "Por favor, introduce la clave",
                    grupo: "Por favor, introduce el grupo",
                },
                errorElement: "div",
                errorClass: "invalid-feedback",
                highlight: function (element, errorClass, validClass) {       
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                }
            });
            
            function validaciones() {
                var permiso = true;
                // Verifica la validación del formulario principal
                if (!$("#datosProfesor").valid()) {
                    permiso = false;
                }
                for(let i = 0 ;i<cantidadRepeticiones;i++){
                    if (!$("#datosAlumno"+(i+1)).valid()) {
                        permiso = false;
                    }
                }
                return permiso;
            }
            var inputsEnBlanco = false;
            //Verificar espacios en blanco
            function verificarEspaciosEnBlanco(){
                $(".accordion").each(function(index){            
                    var accordion = $(this);
                    // Verificar cada input que no este en blanco
                    $(this).find('input[type="text"], input[type="number"], textarea').each(function() {
                        if ($(this).val().trim() === '') {
                            accordion.find('.accordion-button').removeClass('collapsed');
                            accordion.find('.accordion-button').attr('aria-expanded', 'true');
                            accordion.find('.accordion-collapse').removeClass('collapse'); 
                            accordion.find('.accordion-collapse').addClass('show'); 
                            return true;
                        }         
                    });
                    //Revisar si el select tiene un valor valido
                    $(this).find('select').each(function() {
                        if ($(this).val() === '0') { 
                            accordion.find('.accordion-button').removeClass('collapsed');
                            accordion.find('.accordion-button').attr('aria-expanded', 'true');
                            accordion.find('.accordion-collapse').removeClass('collapse'); 
                            accordion.find('.accordion-collapse').addClass('show'); 
                            return true;
                        }
                    }); 

                });
            }
            
            $('#btnGuardar').on('click', function() {
                // Obtén la cantidad de cambios de calificación seleccionados
                var cantidadRepeticiones = $('#cambiosCalif').val();
                var permiso = true;
                inputsEnBlanco = verificarEspaciosEnBlanco();
                //Revisar si hay entradas en blanco
                if(inputsEnBlanco){
                    Swal.fire({
                        title: "Aviso",
                        text: "Por favor, llene todos los campos de información del alumno antes de continuar.",
                        icon: "info",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Aceptar"
                    });
                    validaciones();
                } else {
                    //No inputs en blanco por lo que ya se puede realizar el codigo del envio
                    if(cantidadRepeticiones!=0){
                        // Habilitar los campos antes de enviar el formulario
                        $('#noEmpleado').prop('disabled', false);
                        $('#clave').prop('disabled', false);
                        $('#grupo').prop('disabled', false);

                        // Crea un objeto para almacenar todos los datos de los formularios
                        var formData = [];

                    // Recorre los formularios y agrega sus datos al objeto formData
                    for (var i = 0; i <= cantidadRepeticiones; i++) {
                        var formDataItem = {};

                        if (i === 0) {
                            // Procesa el primer formulario especial aquí
                            var form = $('#datosProfesor'); // Esto selecciona el primer formulario en la página

                            if (form.length > 0 && form[0].checkValidity()) {
                                form.serializeArray().forEach(function(input) {
                                    formDataItem[input.name] = input.value;
                                });
                            }
                        } else {
                            var form = $(`form[name="datosAlumno${i}"]`);

                            // Verifica si el formulario actual existe y está completo
                            if (form.length > 0 && form[0].checkValidity()) {
                                form.serializeArray().forEach(function(input) {
                                    formDataItem[input.name] = input.value;
                                });
                            }
                        }

                        formData.push(formDataItem);
                    }

                    console.log(formData);
                    alert("Hola");
                    //console.log("formData:", JSON.stringify(formData, null, 2));
                    // Realiza una solicitud AJAX para enviar todos los datos al controlador
                    if(validaciones()){
                        
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('cambio-calificaciones.solicitud.store') }}",
                            data: { data: formData },
                            success: function(data) {
                                // Maneja la respuesta del servidor (puede mostrar un mensaje de éxito, etc.)
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
                            error: function(xhr, status, error) {
                                swal("Error", "Ha ocurrido un error al procesar los datos.", "error");
                                console.log("Error en la solicitud AJAX:");
                                console.log("Status: " + status);
                                console.log("Error: " + error);
                                console.log(xhr.responseText);
                            }
                        });
                    }
                    
                    // Después de enviar los datos, deshabilita los campos nuevamente
                    $('#noEmpleado').prop('disabled', true);
                    $('#clave').prop('disabled', true);
                    $('#grupo').prop('disabled', true);
                }else{
                     // Maneja la respuesta del servidor (puede mostrar un mensaje de éxito, etc.)
                     Swal.fire({
                        title: "Información",
                        text: "Por favor, seleccione la cantidad de cambios que desea antes de guardar los datos.",
                        icon: "info",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Aceptar"
                    });
                }
                }

            });

            
        });
    </script>
    

@endsection
