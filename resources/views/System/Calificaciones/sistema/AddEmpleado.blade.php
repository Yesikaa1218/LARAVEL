@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Registrar Empleado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Empleado</h1>
        <a href="{{route('SistemaEscolar.empleados.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Empleados</a>
    </div>
@endsection

@section('content')
<div class="container">
    <form id="registroEmpleadoForm" method="POST" action="">
        @csrf
        <div class="form-group">
            <label for="NoEmpleado">Número de Empleado:</label>
            <input type="text" class="form-control" id="NoEmpleado" name="NoEmpleado" >
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" >
            </div>
            <div class="form-group col-md-6">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
            </div>
        </div>

        <div class="form-row d-flex align-items-center">
            <div class="form-group col-md-11">
                <label for="contrasena">Contraseña:</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena"  disabled>
            </div>
            <div class="form-group col-md-1 d-flex align-items-center">
                <button type="button" id="regeneratePassword" class="btn btn-secondary mt-3 align-self-center w-100" style="position:relative;top:7px;">
                    <i class="fas fa-sync"></i>
                </button>
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
                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{$ro->name}}" id="{{$ro->name}}">
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
                <button id="enviar" type="submit" class="btn btn-primary mt-3 w-100 text-center">Registrar</button>
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

    <script>
        $("#titulo").keyup(function () {
            var cadena = $(this).val();
            string_to_slug(cadena);
        });

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, '');
            str = str.toLowerCase();

            //quita acentos, cambia la ñ por n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
                .replace(/\s+/g, '-') // reemplaza los espacios por -
                .replace(/-+/g, '-'); // quita las plecas

            return $("#slug").val(str);
        }

    </script>

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
    
    {{-- Generador de contraseña --}}
    <script>
        function generatePassword() {
            const symbols = '!@#$%^&*()_-+=<>?/[]{}|';
            const numbers = '0123456789';
            const letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
            function getRandomItem(arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }
    
            function generateRandomPassword() {
                const symbol = getRandomItem(symbols);
                const symbol2 = getRandomItem(symbols);
                const number = getRandomItem(numbers);
                const number2 = getRandomItem(numbers);
                const number3 = getRandomItem(numbers);
                const letter1 = getRandomItem(letters);
                const letter2 = getRandomItem(letters);
                const letter3 = getRandomItem(letters);
                const password = [symbol, number, letter1, letter2, letter3,symbol2,number2,number3];
    
                // Shuffle the characters to make the password more random
                for (let i = password.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [password[i], password[j]] = [password[j], password[i]];
                }
    
                return password.join('');
            }
    
            const newPassword = generateRandomPassword();
            document.getElementById('contrasena').value = newPassword;
        }
        document.addEventListener('DOMContentLoaded', generatePassword);
        document.getElementById('regeneratePassword').addEventListener('click', generatePassword);
    </script>
    {{-- Mandar datos al servidor --}}
    <script>
        $(document).ready(function() {
            function datosEmpleadoForm(){
                document.getElementById('contrasena').disabled = false;
                // Captura los datos del formulario utilizando FormData
                const formData = new FormData($('#registroEmpleadoForm')[0]);
                const formDataObject = {};

                document.getElementById('contrasena').disabled = true;

                formData.forEach(function(value, key) {
                    formDataObject[key] = value;
                });

                // Agrega el valor del rol al objeto formDataObject
                const roles = $('input[name="roles[]"]:checked').map(function(){
                    return $(this).val();
                }).get();
                formDataObject['roles'] = roles;

                // Convierte el objeto formDataObject a JSON
                return jsonData = JSON.stringify(formDataObject);
            }
            function enviarFormulario() {
                // Obtener datos del formulario
                var jsonData = datosEmpleadoForm();

                $.ajax({
                    type: 'POST',
                    url: '{{ route("SistemaEscolar.empleados.store") }}',
                    contentType: 'application/json',
                    data: jsonData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Empleado registrado exitosamente',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location.href = '{{ route("SistemaEscolar.empleados.index") }}';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                text: "Por favor, revise los datos que envió, y si esta mandando todos los datos solicitados"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un error en la solicitud'
                        });
                    }
                });
            }

            // Agregar método de validación
            jQuery.validator.addMethod("validName", function(value, element) {
                return this.optional(element) || /^[A-Za-záéíóúüÁÉÍÓÚÜ\s]+$/.test(value);
            }, "Por favor, ingrese un valor válido (sin números ni símbolos, excepto espacios)");

            jQuery.validator.addMethod("checkRoles", function(value, element) {
                var permiso = true;
                var rolesSeleccionados = $('input[name="roles[]"]:checked').map(function(){
                    return $(this).val();
                }).get();
                if(!rolesSeleccionados){
                  permiso = false;  
                }
                return permiso;
            }, "Por favor, seleccione al menos un rol");

            //Validacion y envio de datos
            $("#registroEmpleadoForm").validate({
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
                    },
                    roles: {
                        checkRoles: true
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
                    enviarFormulario();
                   
                }

            });

        });
    </script>
        
        
    

@endsection
