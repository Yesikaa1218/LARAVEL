@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Cambiar Contraseña')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cambiar Contraseña</h1>
    </div>
@endsection

@section('content')
<div class="container">
    <form id="changePasswordForm" method="POST" action="">
        @csrf
        @method('PATCH') 

        <div class="form-row d-flex align-items-center">
            <div class="form-group col-md-11">
                <label for="current_password">Contraseña actual:</label>
                <input type="password" class="form-control no-espacios" id="current_password" name="current_password" required>
            </div>
            <div class="form-group col-md-1 d-flex align-items-center">
                <button type="button" id="ver-contrasena" class="btn btn-secondary mt-3 align-self-center w-100 "
                    style="position:relative;top:7px;">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-row d-flex align-items-center">
            <div class="form-group col-md-11">
                <label for="new_password">Nueva contraseña:</label>
                <input type="password" class="form-control no-espacios" id="new_password" name="new_password" required>
            </div>
            <div class="form-group col-md-1 d-flex align-items-center">
                <button type="button" id="ver-contrasena2" class="btn btn-secondary mt-3 align-self-center w-100 "
                    style="position:relative;top:7px;">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>
        <div class="form-row d-flex align-items-center">
            <div class="form-group col-md-11">
                <label for="newContrasenaConfirm">Confirma nueva contraseña:</label>
                <input type="password" class="form-control no-espacios" id="newContrasenaConfirm" name="newContrasenaConfirm" required>
            </div>
            <div class="form-group col-md-1 d-flex align-items-center">
                <button type="button" id="ver-contrasena3" class="btn btn-secondary mt-3 align-self-center w-100 "
                    style="position:relative;top:7px;">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    {{-- Visibilidad de contraseña --}}
    <script>
        $(document).ready(function() {
            // Inicialmente, la contraseña está oculta
            let contrasenaVisible = false;

            $("#ver-contrasena").click(function() {
                const contrasenaInput = $("#current_password");
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
            });
            $("#ver-contrasena2").click(function() {
                const contrasenaInput = $("#new_password");
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
            });
            $("#ver-contrasena3").click(function() {
                const contrasenaInput = $("#newContrasenaConfirm");
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
            });
            
        });
    </script>

    {{-- Mandar datos al servidor --}}
    <script>
        $(document).ready(function() {

            //Validacion y envio de datos
            // Agrega reglas personalizadas al validador
            $.validator.addMethod("strongPassword", function(value, element) {
                // Al menos 8 caracteres, 1 letra mayúscula, 1 número y 1 símbolo
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
            }, "La contraseña debe tener al menos 8 caracteres, 1 letra mayúscula, 1 número y 1 símbolo.");

            // Configura las reglas de validación para el formulario
            $("#changePasswordForm").validate({
                errorElement: 'div',
                errorClass: 'invalid-feedback',
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    current_password: {
                        required: true
                    },
                    new_password: {
                        required: true,
                        strongPassword: true
                    },
                    newContrasenaConfirm: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    current_password: {
                        required: "Por favor, ingrese la contraseña actual."
                    },
                    new_password: {
                        required: "Por favor, ingrese la nueva contraseña."
                    },
                    newContrasenaConfirm: {
                        required: "Por favor, confirme la nueva contraseña.",
                        equalTo: "Las contraseñas no coinciden."
                    }
                },
                submitHandler: function(form) {
                    var currentPassword = $("#current_password").val();
                    var newPassword = $("#new_password").val();
                    var confirmPassword = $("#newContrasenaConfirm").val();
                    var requestData = {
                        current_password: currentPassword,
                        new_password: newPassword,
                        new_password_confirmation: confirmPassword
                    };

                    // Realizar la solicitud Ajax
                    $.ajax({
                        type: 'PATCH', // Método HTTP PATCH para actualizar la contraseña
                        url: '{{ route("SistemaEscolar.empleados.cambiar-contrasena") }}',
                        contentType: 'application/json',
                        data: JSON.stringify(requestData),
                        success: function(response) {
                            // Manejar la respuesta exitosa
                            handleUpdateResponse(response);
                            
                        },
                        error: function(xhr, status, error) {
                            // Manejar errores de la solicitud Ajax
                            handleUpdateError();
                            
                        }
                    });
                   
                }
            });

            function handleUpdateResponse(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Contraseña cambiada exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location.href = '{{ route("SistemaEscolar.empleados.index") }}';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al cambiar la contraseña'
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
