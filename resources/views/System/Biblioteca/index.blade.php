@extends('layout.System.main')
@section('page_name', 'Biblioteca')

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
        <h1 class="h3 mb-0 text-gray-800">Biblioteca</h1>
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
            <form action="{{route('sistema.biblioteca.store')}}" method="post">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label for="servicios" class="form-label">Divulgación de servicios</label>
                        <br>
                        <textarea id="servicios" name="servicios" class="content_page">@if($data){!! $data->servicios !!}@endif</textarea>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="horarios" class="form-label">Horarios</label>
                        <br>
                        <textarea id="horarios" name="horarios" class="content_page">@if($data){!! $data->horarios !!}@endif</textarea>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="reglamento" class="form-label">Reglamento</label>
                        <br>
                        <textarea id="reglamento" name="reglamento" class="content_page">@if($data){!! $data->reglamento !!}@endif</textarea>
                    </div>

                    <br>

                    <div>
                        <label for="texto_link1" class="form-label">Nombre del link 1:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="texto_link1" id="texto_link1" value="@if($data){!! $data->texto_link1 !!}@endif">
                        <br>
                        <label for="link1" class="form-label">URL del link 1:
                            <small>(Opcional)</small></label>
                        <input type="url" class="form-control" name="link1" id="link1" value="@if($data){!! $data->link1 !!}@endif">
                    </div>

                    <br>
                    <br>

                    <div>
                        <label for="texto_link2" class="form-label">Nombre del link 2:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="texto_link2" id="texto_link2" value="@if($data){!! $data->texto_link2 !!}@endif">
                    <br>
                        <label for="link2" class="form-label">URL del link 2:
                            <small>(Opcional)</small></label>
                        <input type="url" class="form-control" name="link2" id="link2" value="@if($data){!! $data->link2 !!}@endif">
                    </div>

                    <br>
                    <br>
                    <div>
                        <label for="texto_link3" class="form-label">Nombre del link 3:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="texto_link3" id="texto_link3" value="@if($data){!! $data->texto_link3 !!}@endif">
                    <br>
                        <label for="link3" class="form-label">URL del link 3:
                            <small>(Opcional)</small></label>
                        <input type="url" class="form-control" name="link3" id="link3" value="@if($data){!! $data->link3 !!}@endif">
                    </div>

                    <br>
                    <br>

                    <div>
                        <label for="texto_link4" class="form-label">Nombre del link 4:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="texto_link4" id="texto_link4" value="@if($data){!! $data->texto_link4 !!}@endif">
                    <br>
                        <label for="link4" class="form-label">URL del link 4:
                            <small>(Opcional)</small></label>
                        <input type="url" class="form-control" name="link4" id="link4" value="@if($data){!! $data->link4 !!}@endif">
                    </div>

                </div>

                    <div class="card-footer" align="right">
                        <button type="submit" class="btn btn-primary">
                            Actualizar Información
                        </button>

                </form>
                <!-- boton aprobar -->

                    @hasanyrole('SuperAdmin')
                        @if($data && $data->active === 0)
                        <form
                        action="{{route('sistema.biblioteca.approve', $data->id)}}"
                        class="d-inline formapprove" align="right" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-info data" type="submit">Aprobar
                        </button>
                        </form>
                        @endif
                        @endhasanyrole
                        
                        <a href="{{route('sistema.preview.biblioteca.show')}}" class="btn btn-light" target="_blank">Ver preview</a>
                        <!-- end boton aprobar -->      
                    </div>        

        </div>

    </div>
@endsection

@section('scripts-page')
   <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    <script>

        $('.formapprove').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas aprobar el registro?',
            text: "Una vez aprobada, la información se verá reflejada en el sitio web",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
    </script>
@endsection
