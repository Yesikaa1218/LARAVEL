@extends('layout.System.main')
@section('page_name', 'Deportivo')

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
        <h1 class="h3 mb-0 text-gray-800">Deportivo</h1>
    </div>
@endsection

@section('content')


    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        @if($data)
            @if($data->active === 0)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert2 alert-warning" role="alert">
                            <h4 class="alert-heading">¡En proceso de autorización para publicar!</h4>
                            <hr>
                            <p class="mb-0">Se ha enviado una actualización y se encuentra a la espera de aprobación</p>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Información de la página</h6>
            </div>
            <form action="{{route('sistema.deportivo.store')}}" method="post">
                @csrf

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

                <div class="card-body">

                    <div class="mb-3">
                        <label for="content_page" class="form-label">Descripción del departamento</label>
                        <textarea id="content_page" name="content_page" class="content_page">@if($data){!! $data->content_page !!}@endif</textarea>
                    </div>

                    <br>

                    <div>
                        <label for="image_description" class="form-label">Descripción de la imagen a solicitar para la sección:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="image_description" id="image_description" value="@if($data){!! $data->image_description !!}@endif">
                    </div>
                        
                    <br><br>

              


                </div>

                <div class="card-footer " align="right">
                    <button type="submit" class="btn btn-primary">
                        Actualizar Información
                    </button>

                </form>
                    @hasanyrole('SuperAdmin')
                        @if($data && $data->active === 0)
                            <form
                            action="{{route('sistema.deportivo.approve', $data->id)}}"
                            class="d-inline formapprove" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-info  data" type="submit">Aprobar
                                </button>
                            </form>
                        @endif
                    @endhasanyrole  
                </div>
                <a href="{{route('sistema.preview.deportivo.show')}}" class="btn btn-light" target="_blank">Ver preview</a>
           
        </div>

    </div>
@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
@endsection
