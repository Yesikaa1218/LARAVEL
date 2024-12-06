@extends('layout.System.main')
@section('page_name', 'Editar Semestre')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Semestre</h1>
        <a href="{{route('sistema.semestres.index')}}"
           class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver semestres</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form    action="{{route('sistema.semestres.update', ['semestre' => $data->id])}}"
                 method="post">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar semestre</h6>
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
                        <label for="nombre" class="form-label">Nombre del semestre</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="row">
    
                        <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                          <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                          <input type="date" class="form-control" id="fecha_inicio" value="{{old('fecha_inicio', $data->fecha_inicio)}}" name="fecha_inicio" placeholder="Fecha de inicio del semestre" required>
                        </div>
    
    
                        <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                            <label for="fecha_final" class="form-label">Fecha de finalización</label>
                            <input type="date" class="form-control" id="fecha_final" value="{{old('fecha_final', $data->fecha_final)}}" name="fecha_final" placeholder="Fecha de finalización del semestre" required>
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
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/tinyjs.js')}}></script>
  
@endsection
