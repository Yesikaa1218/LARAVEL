@extends('layout.Auth.main')

@section('content')
    <!-- Outer Row -->
    <div class="pt-5"></div>
    <div class="row justify-content-center pt-5">
        <div class="col-xl-10 col-lg-12 col-md-9 pt-5">
            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenid@!</h1>
                                    <h3>Sistema Escolar</h3><br>
                                </div>
                                <form method="POST" id="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <input id="NoEmpleado" type="text" placeholder="NoEmpleado" class="form-control form-control-user" name="NoEmpleado" value="" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input id="contrasena" type="password" class="form-control form-control-user" name="contrasena" required autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" class="form-check-input">
                                            <label class="custom-control-label" for="remember">Recordarme</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" id="login-button"> Iniciar Sesión</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    {{-- <a class="small" href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-page')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function () {
        $("#login-form").validate({
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            rules: {
                NoEmpleado: {
                    required: true,
                    digits: true  // Añade esta regla para aceptar solo caracteres numéricos
                },
                contrasena: {
                    required: true
                }
            },
            messages: {
                NoEmpleado: {
                    required: "Por favor, ingresa tu NoEmpleado",
                    digits: "Por favor, ingresa solo caracteres numéricos"
                },
                contrasena: {
                    required: "Por favor, ingresa tu contraseña"
                }
            },
            submitHandler: function (form) {
                // Ajax submission logic here
                var formData = {
                    NoEmpleado: $("#NoEmpleado").val(),
                    contrasena: $("#contrasena").val(),
                    remember: $("#remember").is(":checked"),
                    _token: "{{ csrf_token() }}"
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('SistemaEscolar.empleado.auth') }}",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            // Utiliza SweetAlert para mostrar un mensaje de éxito
                            Swal.fire({
                                icon: 'success',
                                title: 'Inicio de sesión exitoso',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = response.redirect;
                            });
                        } else {
                            // Utiliza SweetAlert para mostrar un mensaje de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        // Maneja los errores de la solicitud AJAX
                        console.log(error);

                        // Utiliza SweetAlert para mostrar un mensaje de error en caso de un error de servidor
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Se produjo un error en el servidor'
                        });
                    }
                });
            }
        });
    });

</script>

@endsection
