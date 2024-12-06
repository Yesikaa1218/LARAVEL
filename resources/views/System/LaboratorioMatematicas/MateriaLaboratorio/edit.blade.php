@extends('layout.System.main')
@section('page_name', 'Editar Materias de Laboratorio')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar materias laboratorio</h1>
        <a href="{{route('sistema.laboratorio-matematicas.materiaLaboratorio.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
              action="{{route('sistema.laboratorio-matematicas.materiaLaboratorio.update', ['materiaLaboratorio' => $data->id])}}" 
              method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Materias de Laboratorio</h6>
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
                    <br>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la materia</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre de la materia" required>
                    </div>
                    <br> 
                </div>
                <div class="card-footer" align="right">
                    <button id="registrar" type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
