@extends('layout.System.main')
@section('page_name', 'Perfil')

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
        <hr>

        
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{route('sistema.user.perfil.update', ['id' => $user->id])}}"  method="post">
        @method('PUT')
    @csrf
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Perfil</h6>
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

            <div class="row">
                <div class="col-sm-12">
                    @include('flash::message')
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" value="{{old('name', $user->name)}}" name="name" placeholder="Nombre" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico </label>
                <input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}" id="email" placeholder="name@example.com" required
                        readonly="true">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña (Opcional)</label>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="password" class="form-label">Contraseña </label>
                    <input type="password" class="form-control" name="password" value="" id="password" placeholder="Contraseña" minlength="8">
                
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña </label>
                    <input type="password" class="form-control" name="password_confirmation" value="" id="password_confirmation" placeholder="Confirmar Contraseña">
                
                </div>
            </div>

        </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-success">Editar Perfil</button>
            </div>


    </div>
    </form>
</div>
@endsection
