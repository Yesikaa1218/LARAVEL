@extends('layout.System.main')
@section('page_name', 'Editar Roles')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Roles</h1>
        <a href="{{route('sistema.roles.index')}}" class="btn btn-primary">
                <i class="fas fa-list fa-sm text-white-50"></i>Ver Registros</a>
    </div> 
@endsection

@section('content')


    <div class="container-fluid">
        <!--<div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>-->
        <form class="needs-validation" action="{{route('sistema.roles.update', ['role' => $data->id])}}" 
              method="post" enctype="multipart/form-data">
            @csrf    
            @method('PATCH')

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Editar un Rol</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">¡Ha ocurrido un ERROR!</h4>
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
                        <div class="mb-3 col-sm-12 ">
                            <label for="name" class="form-label">Nombre del Rol</label>
                            <input type="text" class="form-control" id="name" value="{{old('name', $data->name)}}" name="name" placeholder="Nombre del Rol">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Selecciona los Permisos del Rol</h4><hr>
                    </div>
                    @foreach($permissions as $pe)
                        <div class="col-sm-12 col-md-4 p-2">
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$pe->name}}" id="{{$pe->name}}"
                                    @foreach ($rolePermissions as $rolePer)
                                        @if ($rolePer->name == $pe->name)
                                            checked
                                        @endif
                                    @endforeach
                                >
                                <label class="form-check-label" for="{{$pe->name}}">
                                    {{$pe->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach                 
                </div>
            </div>
                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">
                        Editar Rol
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts-page')
 
@endsection
