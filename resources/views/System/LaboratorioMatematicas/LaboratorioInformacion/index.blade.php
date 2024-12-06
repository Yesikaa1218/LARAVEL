@extends('layout.System.main')
@section('page_name', 'Laboratorio informacion')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laboratorio informacion</h1>
        <div>
            <a href="{{route('sistema.laboratorio-matematicas.examen.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">Regresar</a>
            @php $suma = 0; @endphp
            @foreach($laboratoriaInformacion as $labinf)
                @if($labinf->examen_id == $examen->id)
                    @php
                        $suma+=$labinf->cantidad_problemas;
                    @endphp
                @endif
            @endforeach
            
            @if($suma >= $examen->cantidad_problemas)
                <a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.create', $examen->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm" style="visibility:hidden"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Registrar</a>
                @else
                    <a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.create', $examen->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Registrar</a>
            @endif
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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de laboratorio informacion</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data" class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre de la materia</th>
                                <th>Nombre del tema</th>
                                <th>Cantidad de problemas</th>
                                <th width="280px">&nbsp;</th>
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
                "ajax": "{{ url('sistema/laboratorio-matematicas/examen/'.$examen->id.'/laboratorio-informacion/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'materialaboratorio.nombre'},
                    {data: 'temamateria.nombre'},
                    {data: 'cantidad_problemas'},
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
