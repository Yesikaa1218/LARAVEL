@extends('layout.System.main')
@section('page_name', 'Editar Disciplina Deportiva')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Disciplina Deportiva</h1>
        <a href="{{route('sistema.deportivo.disciplinas.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.deportivo.disciplinas.update', ['proyecto' => $data->id])}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Disciplina Deportiva</h6>
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
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre de la disciplina" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 ">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="content_page" id="descripcion" rows="4" placeholder="Descripción de la disciplina">{!! old('descripcion', $data->descripcion) !!}</textarea>
                    </div>
                    
                    <br>

                    <div>
                        <label for="image_description" class="form-label">Descripción de la imagen a solicitar:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="image_description" id="image_description" value="{{old(image_description, $data->image_description)}}">
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
