@extends('layout.System.main')
@section('page_name', 'Editar Conferencia o Evento de Universidad Saludable')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        .alert2{
            padding: 30px;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Conferencia o Evento de Universidad Saludable</h1>
    </div>
@endsection

@section('content')


    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        <form class="needs-validation"
            action="{{route('sistema.universidad-saludable-eventos.update', ['universidad_saludable_evento' => $data->id])}}"
            method="post">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Editar Conferencia o Evento de Universidad Saludable</h6>
                    </div>
                    <div class="col-sm-12 col-md-6" align="right">
                        <a href="{{route('sistema.universidad-saludable.index')}}" class="btn btn-primary">
                            <i class="fas fa-list fa-sm text-white-50"></i>
                            Ver Registros</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="name" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control" id="name" value="{{old('name', $data->name)}}" name="name" placeholder="Nombre del Evento">
                    </div>

                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="date" class="form-label">Fecha del Evento</label>
                        <input type="date" class="form-control" id="date" value="{{old('date', $data->date)}}" name="date" placeholder="Fecha del Evento">
                    </div>

                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="hour" class="form-label">Hora del Evento</label>
                        <input type="time" class="form-control" id="hour" value="{{old('hour', $data->hour)}}" name="hour" placeholder="Hora del Evento">
                    </div>

                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="image_description" class="form-label">Descripción de imagen <small>(Opcional)</small></label>
                        <input type="text" class="form-control" id="image_description" value="{{old('image_description', $data->image_description)}}" name="image_description" placeholder="Descripción de imagen">
                    </div>

                    <div class="mb-3 col-sm-12">
                        <label for="content_page" class="form-label">Información del evento</label>
                        <textarea id="content_page" name="content_page" class="content_page" >{!!$data->content_page!!}</textarea>
                    </div>

                </div>
            </div>
            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-success">
                    Editar
                </button>
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
