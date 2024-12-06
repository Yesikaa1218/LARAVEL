@extends('layout.System.main')
@section('page_name', 'Permisos')

@section('styles-page')
    
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permisos</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        <form action="{{route('sistema.roles.permisos.store')}}" method="post" >
            @method('PUT')
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Registrar un permiso</h6>
                        </div>
                        <div class="col-sm-12 col-md-6" align="right">
                            <a href="{{route('sistema.roles.permisos.index')}}" class="btn btn-primary">
                                <i class="fas fa-list fa-sm text-white-50"></i>
                                Ver Registros</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-sm-12 ">
                            <label for="name" class="form-label">Nombre del permiso</label>
                            <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Nombre del permiso">
                        </div>

                    </div>
                </div>
                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">
                        Registrar permiso
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
