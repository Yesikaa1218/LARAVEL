@extends('layout.System.main')
@section('page_name', 'Editar Indicador de la Facultad')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Indicador de la Facultad</h1>
        <a href="{{route('sistema.escolar.indicadores.facultad.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.escolar.indicadores.facultad.update',  ['indicadores_facultad' => $data->id])}}" method="post" enctype="multipart/form-data">
        @csrf
            @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Indicador de Facultad</h6>
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
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="nombre" class="form-label">Nombre del indicador</label>
                    <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre" required>
                    </div>
  
                    <br>
  
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="valor" class="form-label">Valor del indicador</label>
                        <input type="number" class="form-control" name="valor" value="{{old('valor', $data->valor)}}" id="valor" placeholder="Valor" required>
                    </div>

                    <br>


                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="imagen" class="form-label">Imagen del indicador <small>(Opcional)</small></label>
                        <input type="file" class="form-control" id="imagen" value="{{old('imagen')}}" accept=".jpeg,.jpg,.png,.svg" name="imagen">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="semestre_id" class="form-label">Semestre</label>
                        <select class="form-control" name="semestre_id" id="semestre_id" required>
                        <option selected  hidden disabled  value>Seleccione un semestre</option>
                            @foreach ($semestres as $item)
                                <option value="{{$item->id}}" {{ old('semestre_id', $data->semestre_id) == $item->id ? 'selected' : '' }}>{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
  
  
                </div>

            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>


        </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
