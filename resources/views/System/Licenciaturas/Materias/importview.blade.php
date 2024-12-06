@extends('layout.System.main')
@section('page_name', 'Unidades de Aprendizaje de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Licenciatura en {{$licenciatura->nombre_licenciatura}} / Plan {{$plan->name}}<br><span class="h4 mb-0 text-gray-800">Unidades de Aprendizaje</span></h1>
        
              <div class="d-none d-sm-inline-block">
              <a href="{{route('sistema.licenciaturas.planes.index')}}" class="btn btn-primary shadow-sm" align="right"> Ver planes</a>
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
            </div>
            <div class="card-body">
                <h4>Plantilla para importar Unidades de Aprendizaje</h4>
                <a href="{{route('sistema.licenciaturas.materias.download')}}" class="btn btn-lg btn-success">Descargar Plantilla</a>

                <form action="{{route('sistema.licenciaturas.materias.upload', $plan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1">
                          <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4><i class="icon fa fa-ban"></i> Error!</h4>
                              @foreach($errors->all() as $error)
                              {{ $error }} <br>
                              @endforeach      
                          </div>
                        </div>
                    </div>
                    @endif
      
                    @if (Session::has('success'))
                        <div class="row">
                          <div class="col-md-8 col-md-offset-1">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5>{!! Session::get('success') !!}</h5>   
                            </div>
                          </div>
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <input type="file" name="file" />
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('scripts-page')
   
@endsection
