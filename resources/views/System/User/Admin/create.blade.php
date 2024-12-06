@extends('layout.System.main')
@section('page_name', 'Registrar Administrador')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Administrador</h1>
        <a href="{{route('sistema.user.administrador.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.user.administrador.store')}}" method="post" >
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Administrador</h6>
                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Ha ocurrido un ERROR!</h4>
                            <div class="alert-body">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Nombre">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico </label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="name@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña Temporal: </label>
                        <div class="input-group mb-3">
                        <input type="text" readonly class="form-control" name="password" value="{{old('pass', $pass)}}" id="pass" placeholder="name@example.com">
                            <div class="input-group-append">
                            <button class="btn btn-primary" onclick="copyToClipBoard()" type="button" id="button-addon2">Copiar contraseña</button>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row pt-4">
                        <div class="col-sm-12">
                            <h4>Selecciona los Roles del Usuario</h4>
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
                        </div>

                        @endforeach

                    
                    </div>


                </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>


            </div>
        </form>
    </div>
@endsection

@section('scripts-page')
<script>
    function copyToClipBoard() {

        var content = document.getElementById('pass');

        content.select();
        document.execCommand('copy');

        alert("Copied!");
    }
</script>
@endsection
