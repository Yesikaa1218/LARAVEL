@extends('layout.System.main')
@section('page_name', 'Unidades de Aprendizaje de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Licenciatura en {{$licenciatura->nombre_licenciatura}} / Plan {{$plan->name}}<br><span class="h4 mb-0 text-gray-800">Unidades de Aprendizaje</span></h1>
        
              <div class="d-none d-sm-inline-block">
              <a href="{{route('sistema.licenciaturas.planes.index')}}" class="btn btn-primary shadow-sm" align="right"> Regresar</a>

                <a href="{{route('sistema.licenciaturas.materias.create', $plan->id)}}" class="btn btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Registrar</a>
              </div>

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
            <div class="card-header py-3 row">
                <div class=" col-sm-12 col-md-10">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Unidades de aprendizaje de Licenciatura</h6>
                </div>
                <div class=" col-sm-12 col-md-2" align="right">
                <a href="{{route('sistema.licenciaturas.materias.import', $plan->id)}}" class="d-none d-sm-inline-block btn  btn-success shadow-sm"><i
                class="fas fa-file-excel fa-sm text-white-50"></i> Importar</a>
                <a href="{{route('sistema.licenciaturas.materias.export', $plan->id)}}" class="d-none d-sm-inline-block btn  btn-success shadow-sm"><i
                class="fas fa-file-excel fa-sm text-white-50"></i> Exportar</a>
                </div>
              

                
   
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
                            <th width="200px">Acciones</th>
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
                "ajax": "{{ url('sistema/licenciaturas/planes-de-estudios/'.$plan->id.'/unidades-de-aprendizaje/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'materia_licenciatur'},
                    {data: 'creditos_materia_lic'},
                    {data: 'horas_semana_materia_lic'},
                    {data: 'dtOptativa'},
                    {data: 'semestre_materia_lic'},
                    {data: 'btn'},
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
@endsection
