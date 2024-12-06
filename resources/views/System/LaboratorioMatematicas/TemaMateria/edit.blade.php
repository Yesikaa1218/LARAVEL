@extends('layout.System.main')
@section('page_name', 'Editar temas de las materias')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar temas de las materias</h1>
        <a href="{{route('sistema.laboratorio-matematicas.temaMateria.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
              action="{{route('sistema.laboratorio-matematicas.temaMateria.update', ['temaMaterium' => $data->id])}}" 
              method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Temas de las Materias</h6>
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
                        <label for="nombre" class="form-label">Nombre del tema</label>
                        <!-- Para el nombre del tema pueden seguir una nomenclatura como: Nombre del tema, Laboratorio #, especificar si es de senos, cosenos, tangente, etc.-->
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre del tema" required>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo del tema</label>
                        <textarea name="titulo" class="content_page" id="titulo" rows="4" placeholder="Titulo del tema">{{old('titulo', $data->titulo)}}</textarea>
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

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
@endsection