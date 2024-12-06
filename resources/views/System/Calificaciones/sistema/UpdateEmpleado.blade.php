@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Modificar Empleado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modificar Empleado</h1>
        <a href="{{route('SistemaEscolar.empleados.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Empleados</a>
    </div>
@endsection

@section('content')
<div class="container">
    <form id="updateEmpleadoForm" method="POST" action="">
        @csrf
        @method('PUT') <!-- Agregar el método PUT para la actualización -->

        <div class="form-group">
            <label for="NoEmpleado">Número de Empleado:</label>
            <input type="text" class="form-control no-letras no-espacios" id="NoEmpleado" name="NoEmpleado" required value="{{ $empleado->NoEmpleado }}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control no-numero" id="nombre" name="nombre" required value="{{ $empleado->Nombre }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control no-numero no-espacios" id="apellido_paterno" name="apellido_paterno" required value="{{ $empleado->ApPaterno }}">
            </div>
            <div class="form-group col-md-6">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" class="form-control no-numero no-espacios" id="apellido_materno" name="apellido_materno" value="{{ $empleado->ApMaterno }}">
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-sm-12">
                <h4>Selecciona los Roles del Empleado</h4>
                <hr>
            </div>
        
            @foreach($roles as $ro)
                <div class="col-sm-12 col-md-4 p-2">
                    <div class="form-check">
                        <input class="form-check-input" 
                            name="roles[]" 
                            type="checkbox" 
                            value="{{$ro->id}}"
                            id="{{$ro->name}}"
                            @if($rolesId->contains($ro->id)) checked @endif> <!-- Cambio de name a id en contains -->
                        <label class="form-check-label" for="{{$ro->name}}">
                            {{$ro->name}}
                        </label>
                    </div>
                    <div id="rolesError" class="invalid-feedback"></div>
                </div>
            @endforeach
        </div>
        

        <div class="form-group text-center">
            <div class="form-group col-md-12 d-flex justify-content-center my-auto">
                <button id="enviar" type="submit" class="btn btn-primary mt-3 w-100 text-center">Modificar</button>
            </div>
        </div>
    </form>
</div>



@endsection

@section('scripts-page')

    <script type="text/javascript">
        $(document).ready(function() {
            $("input[type=radio]").click(function(event){
                var valor = $(event.target).val();
                if(valor =="on"){
                    $("#imagenCarruselAviso").show();
                    $("#vacio").hide();
                } else if (valor == "off") {
                    $("#imagenCarruselAviso").hide();
                    $("#vacio").show();
                } else { 
                    // Otra cosa
                }
            });
        });
    </script>

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    {{-- Visibilidad de contraseña --}}
    <script>
        $(document).ready(function() {
            // Inicialmente, la contraseña está oculta
            let contrasenaVisible = false;

/*             $("#ver-contrasena").click(function() {
                const contrasenaInput = $("#contrasena");
                const icono = $(this).find("i");

                if (contrasenaVisible) {
                    // Si la contraseña es visible, ocúltala y cambia el icono
                    contrasenaInput.attr("type", "password");
                    icono.removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    // Si la contraseña está oculta, muéstrala y cambia el icono
                    contrasenaInput.attr("type", "text");
                    icono.removeClass("fa-eye").addClass("fa-eye-slash");
                }

                // Cambia el estado de la contraseña
                contrasenaVisible = !contrasenaVisible;
            }); */
        });
    </script>

    {{-- Mandar datos al servidor --}}
    <script>
        $(document).ready(function() {
            // Función para prevenir números
            function bloquearNumeros(event) {
                const tecla = event.keyCode || event.which;
                if ((tecla >= 48 && tecla <= 57)) {
                    event.preventDefault();
                }
            }

            // Función para prevenir letras
            function bloquearLetras(event) {
                const tecla = event.keyCode || event.which;
                if ((tecla >= 65 && tecla <= 90) || (tecla >= 97 && tecla <= 122)) {
                    event.preventDefault();
                }
            }

            // Función para prevenir espacios
            function bloquearEspacios(event) {
                const tecla = event.keyCode || event.which;
                if (tecla === 32) {
                    event.preventDefault();
                }
            }
            const camposNoNumero = document.querySelectorAll('.no-numero');
            const camposNoLetras = document.querySelectorAll('.no-letras');
            const camposNoEspacios = document.querySelectorAll('.no-espacios');

            camposNoNumero.forEach(campo => campo.addEventListener('keypress', bloquearNumeros));
            camposNoLetras.forEach(campo => campo.addEventListener('keypress', bloquearLetras));
            camposNoEspacios.forEach(campo => campo.addEventListener('keypress', bloquearEspacios));

            //Validacion y envio de datos
            // Agregar método de validación
            jQuery.validator.addMethod("validName", function(value, element) {
                return this.optional(element) || /^[A-Za-záéíóúüÁÉÍÓÚÜ\s]+$/.test(value);
            }, "Por favor, ingrese un valor válido (sin números ni símbolos, excepto espacios)");
            $("#updateEmpleadoForm").validate({
                rules: {
                    NoEmpleado: {
                        required: true,
                        number: true,
                        minlength: 5,
                        maxlength: 10
                    },
                    nombre: {
                        required: true,
                        validName: true
                    },
                    apellido_paterno: {
                        required: true,
                        validName: true
                    },
                    apellido_materno: {
                        required: true,
                        validName: true
                    },
                    contrasena: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    NoEmpleado: {
                        required: "Por favor, ingrese el número de empleado",
                        number: "Por favor, ingrese solo números",
                        minlength: "El número de empleado debe tener al menos 5 caracteres",
                        maxlength: "El número de empleado no debe tener más de 10 caracteres"
                    },
                    nombre: {
                        required: "Por favor, ingrese el nombre",
                        validName: "Por favor, ingrese un nombre válido"
                    },
                    apellido_paterno: {
                        required: "Por favor, ingrese el apellido paterno",
                        validName: "Por favor, ingrese un apellido paterno válido"
                    },
                    apellido_materno: {
                        required: "Por favor, ingrese el apellido materno",
                        validName: "Por favor, ingrese un apellido materno válido"
                    },
                    contrasena: {
                        required: "Por favor, ingrese la contraseña",
                        minlength: "La contraseña debe tener al menos 8 caracteres"
                    },
                    roles: "Por favor, seleccione al menos un rol"
                },
                errorElement: "div", // Elemento para los mensajes de error
                errorClass: "invalid-feedback", // Clase para los mensajes de error
                highlight: function (element) {
                    // Estilo para resaltar campos con errores
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    // Estilo para quitar el resaltado cuando se corrige el error
                    $(element).removeClass("is-invalid");
                },
                errorPlacement: function (error, element) {
                    // Coloca el mensaje de error en la posición específica de Bootstrap
                    if (element.attr("name") === "roles[]") {
                        // Si es el campo de roles, coloca el mensaje de error en el div específico
                        error.appendTo("#rolesError");
                    } else if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    // Esta función se ejecuta cuando el formulario es válido
                    const formData = new FormData($('#updateEmpleadoForm')[0]);
                    const jsonData = convertFormDataToJson(formData);
                    jsonData['']
                    confirmAndSendRequest(jsonData);
                   
                }

            });

            function convertFormDataToJson(formData) {
                const formDataObject = {};
                formData.forEach(function(value, key) {
                    // Normaliza las claves para que 'roles[]' se convierta en 'roles'
                    const normalizedKey = key.replace('[]', '');
                    if (formDataObject.hasOwnProperty(normalizedKey)) {
                        if (!Array.isArray(formDataObject[normalizedKey])) {
                            formDataObject[normalizedKey] = [formDataObject[normalizedKey]];
                        }
                        formDataObject[normalizedKey].push(value);
                    } else {
                        formDataObject[normalizedKey] = value;
                    }
                });
                return JSON.stringify(formDataObject);
            }



            function confirmAndSendRequest(jsonData) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Los datos del empleado se modificarán y no se podrán restablecer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, estoy seguro',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        sendUpdateRequest(jsonData);
                    }
                });
            }

            function sendUpdateRequest(jsonData) {
            console.log(jsonData)
                $.ajax({
                    type: 'PUT',
                    url: '{{ route("SistemaEscolar.empleados.update", $empleado->id) }}',
                    contentType: 'application/json',
                    data: jsonData,
                    success: function (response) {
                        handleUpdateResponse(response);
                    },
                    error: function (xhr, status, error) {
                        handleUpdateError();
                    }
                });
            }

            function handleUpdateResponse(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Empleado registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location.href = '{{ route("SistemaEscolar.empleados.index") }}';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al registrar el empleado'
                    });
                }
            }

            function handleUpdateError() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error en la solicitud'
                });
            }
        });
    </script>
    

@endsection
