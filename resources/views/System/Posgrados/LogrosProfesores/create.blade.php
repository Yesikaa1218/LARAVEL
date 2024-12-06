@extends('layout.System.main')
@section('page_name', 'Registrar Profesor de Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Logro Profesor de Posgrado</h1>
        <a href="{{route('sistema.posgrados.logros-profesores.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.posgrados.logros-profesores.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Logro de Profesor de Posgrado</h6>
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
                    <label for="titulo" class="form-label">Título del logro</label>
                    <input type="text" class="form-control" id="titulo" value="{{old('titulo')}}" name="titulo" placeholder="Título del logro">
                </div>

                <br>

                <div class="mb-3">
                    <label for="nombre_profesor" class="form-label">Nombre del profesor</label>
                    <select class="form-control" required name="nombre_profesor" id="nombre_profesor">
                    <option selected disabled hidden disabled selected value>Seleccione un profesor.</option>
                        @foreach ($profesores as $item)
                            <option value="{{$item->id}}">{{$item->nombre_profesor}}</option>
                        @endforeach
                    </select>
                </div>

                <br>
                
                <div class="mb-3">
                    <label for="semblante" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="content_page" id="descripcion" rows="4" placeholder="Descripción.">{{old('descripcion')}}</textarea>
                </div>
                <br>

                <div class="mb-3">

                    <div class="form-group">
                        <label for="archivo">Seleccionar Archivo PDF</label>
                        <small>*Máximo 4MB</small>
                        <input type="file" class="form-control-file form-control" id="archivo" name="archivo" accept=".pdf" value="{{old('archivo')}}">
                    </div>
                </div>

                <br>

                

                <br>

            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/tinyjs.js')}}></script>
@endsection
