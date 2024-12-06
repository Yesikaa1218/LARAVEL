@extends('layout.System.main')
@section('page_name', 'Universidad Saludable')

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
        <h1 class="h3 mb-0 text-gray-800">Universidad Saludable</h1>
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
            <form action="{{route('sistema.universidad-saludable.store')}}" method="post">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label for="content_page" class="form-label">Información de la página</label>
                        <textarea id="content_page" class="content_page" name="content_page">@if($data){!! $data->content_page !!}@endif</textarea>
                    </div>

                    <div>
                        <label for="image_description" class="form-label">Descripción de la imagen a solicitar para la sección:
                            <small>(Opcional)</small></label>
                        <input type="text" class="form-control" name="image_description" id="image_description" value="@if($data){!! $data->image_description !!}@endif">
                    </div>

                </div>


                <div class="card-footer" align="right">

                    <button type="submit" class="btn btn-primary">
                        Actualizar Información
                    </button>

                </form>
                    @hasanyrole('SuperAdmin')
                        @if($data && $data->active === 0)
                            <form
                                action="{{route('sistema.universidadsaludable.approve', $data->id)}}"
                                class="d-inline formapprove" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-info data" type="submit">Aprobar
                                </button>
                            </form>
                        @endif
                    @endhasanyrole

                    <a href="{{route('sistema.preview.universidad-saludable.show')}}" class="btn btn-light" target="_blank">Ver preview</a>
                </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Lista de Conferencias y Eventos para Universidad Saludable</h6>
                    </div>
                    <div class="col-sm-12 col-md-6" align="right">
                        <a href="{{route('sistema.universidad-saludable-eventos.create')}}" class="btn btn-primary">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            Registrar</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="data" class="table table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th width="10px">No.</th>
                            <th>Nombre</th>
                            <th width="200px">Fecha Del Evento</th>
                            <th width="200px">&nbsp;</th>
                        </tr>
                        </thead>
                    </table>

                </div>
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

    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/universidad-saludable-eventos-data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'fecha'},
                    {data: 'btn'},
                ],
                "language": {
                    "info": "_TOTAL_ Registro(s)",
                    "search": "Buscar",
                    "paginate": {
                        "next": ">",
                        "previous": "<",
                    },
                    "lengthMenu": 'Mostrar <select >' +
                        '<option value="10">10</option>' +
                        '<option value="30">30</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="-1">Todos</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }
            });
        });
    </script>

@endsection
