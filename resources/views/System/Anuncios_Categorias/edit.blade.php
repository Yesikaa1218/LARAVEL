@extends('layout.System.main')
@section('page_name', 'Editar Categoría de Avisos')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Categoría del Aviso</h1>
        <a href="{{route('sistema.avisos.categoria.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.avisos.categoria.update',['avisos_categoria' => $data->id])}}" method="post" >
        @csrf
            @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Categoría del Aviso</h6>
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
                  <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                      <label for="nombre" class="form-label">Nombre de la Categoría</label>
                      <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre">
                  </div>

                  <br>

                  <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                      <label for="color" class="form-label">Color de la Categoría para indentificar</label>
                      <input type="color" class="form-control" name="color" value="{{old('color', $data->color)}}" id="color" placeholder="Seleccina un color">
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
