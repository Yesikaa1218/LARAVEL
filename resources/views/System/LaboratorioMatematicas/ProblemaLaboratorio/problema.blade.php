@extends('layout.System.main')
@section('page_name', 'Problema')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$data->nombre}}</h1>
        <a href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">
             Regresar a la pantalla inicial</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="mb-3 col-sm- col-mb-6 col-xl-6 ">
                        <img src="/storage/{{$data->problema}}">
                    </div>
                    <br>
                </div>
            </div>
        </div>  
    </div>
@endsection