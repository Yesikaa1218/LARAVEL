@extends('layout.System.main')
@section('page_name', 'Unidades de Aprendizaje de Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Unidades de Aprendizaje de Posgrado</h1>
        <a href="{{route('sistema.posgrados.materias.create', $plan->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Registrar</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Unidades de Aprendizaje de Posgrado</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="data" class="table table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th width="10px">No.</th>
                            <th>Nombre de la unidad de aprendizaje</th>
                            <th>Créditos</th>
                            <th>Horas por semana</th>
                            <th>Optativa</th>
                            <th>Semestre</th>
                            <th>Posgrado</th>
                            <th width="150px">Acciones</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts-page')
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/posgrados/planes-de-estudios/'.$plan->id.'/unidades-de-aprendizaje/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'materia_posgrado'},
                    {data: 'creditos_materia_pos'},
                    {data: 'horas_semana_materia_pos'},
                    {data: 'dtOptativa'},
                    {data: 'semestre_materia_pos'},
                    {data: 'posgrado.nombre_posgrado'},
                    {data: 'btn'}
                ],
                "order": [[5, "asc"]],
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
    <script src={{asset('/assets/js/tinyjs.js')}}></script>
@endsection
