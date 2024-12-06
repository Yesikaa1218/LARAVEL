@extends('layout.System.main')
@section('page_name', 'Guia Nuevo Ingreso')

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
        <h1 class="h3 mb-0 text-gray-800">Guia Nuevo Ingreso</h1>
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
            
            <form id="content_form" method="post">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label for="content_page" class="form-label">Información de la página</label>
                        <textarea id="content_page" class="content_page" name="content_page">@if($data){!! $data->content_page !!}@endif</textarea>
                    </div>

                </div>

                <div class="card-footer" align="right">
                    <button id="actualizar_btn" type="submit" class="btn btn-primary">
                        Actualizar Información
                    </button>
            </form>
                    <a href="{{route('sistema.preview.guia-nuevo-ingreso.show')}}" class="btn btn-light" target="_blank">Ver preview</a>

                    @hasanyrole('SuperAdmin')
                        @if($data && $data->active === 0)
                        <form
                            action="{{route('sistema.guia-nuevo-ingreso.approve', $data->id)}}"
                            class="d-inline formapprove" align="right" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-info data" type="submit">Aprobar
                            </button>
                        </form>
                        @endif
                    @endhasanyrole   
                </div>

                
        </div>

    </div>
@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/summernote-0.8.18-dist/summernote-bs4.min.js')}}></script>

    <script>
        //Se debe poner antes de todo lo que sea editor para obtener la url del ajax
        var _url = "{{ route('sistema.guia-nuevo-ingreso.store', $data->id) }}";
        var _return = "{{ route('sistema.guia-nuevo-ingreso.index') }}";
    </script>

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
    <script src={{asset('/assets/js/tinyjs.js')}}></script>
@endsection
