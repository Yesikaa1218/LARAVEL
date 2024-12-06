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
                                    <h3>Sistema FCFM Intranet</h3><br>
                                </div>
                                <form method="POST" action="{{ route('login') }}" >
                                    @csrf
                                    <div class="form-group">

                                        <input id="email" type="email" placeholder="Correo electrónico" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input"  name="remember" id="remember" class="form-check-input"/>
                                            <label class="custom-control-label" for="remember">Recordarme</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block"> Iniciar Sesión</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
