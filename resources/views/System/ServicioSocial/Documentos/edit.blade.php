@extends('layout.System.main')
@section('page_name', 'Editar Documento')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Documentos</h1>
        <a href="{{route('sistema.servicio-social.documentos.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.servicio-social.documentos.update', ['documento' => $data->id])}}"
            method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Documento</h6>
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
                    <label for="nombre_documento" class="form-label">Nombre del Documento</label>
                    <input type="text" class="form-control" id="nombre_documento" value="{{old('nombre_documento', $data->nombre_documento)}}" name="nombre_documento" placeholder="Nombre del documento">
                </div>

                <br>

                <div class="mb-3">

                    <div class="form-group">
                        <label for="url_documento">Seleccionar Archivo PDF</label>
                        <small>*Máximo 4MB</small>
                        <input type="file" class="form-control-file form-control" id="url_documento" name="url_documento" accept=".pdf" value="{{old('url_documento', $data->url_documento)}}" required>
                    </div>
                </div>

                <br>


            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>


        </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
