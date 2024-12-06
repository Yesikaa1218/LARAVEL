@extends('layout.System.main')
@section('page_name', 'Registrar Pregunta')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Pregunta</h1>
        <a href="{{route('sistema.servicio-social.preguntas.index')}}"
           class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.servicio-social.preguntas.store')}}" method="post">
        @csrf
        <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Pregunta</h6>
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
                        <label for="nombre_doctorado" class="form-label">Título de la pregunta frecuente</label>
                        <input type="text" class="form-control" id="name" value="{{old('name')}}"
                               name="name" placeholder="Nombre" required>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="content_page" class="form-label">Respuesta a la pregunta</label>
                        <textarea id="content_page" class="content_page"  name="content_page"></textarea>
                    </div>

                    <br>

                    {{-- <div>
                        <label for="image_description" class="form-label">Descripción de la imagen a solicitar para la pregunta:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="image_description" id="image_description" value="">
                    </div> --}}

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
