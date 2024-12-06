@extends('layout.System.main')
@section('page_name', 'Editar Laboratorio')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Laboratorio</h1>
        <a href="{{route('sistema.asesorias.laboratorios.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.asesorias.laboratorios.update', ['laboratorio' => $data->id])}}"
            method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Laboratorio</h6>
            </div>

            <div class="card-body">

                @if ($errors->any())

                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">¡Ha ocurrido un ERROR!</h4>
                        <div class="alert-body">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="licenciatura_id" class="form-label">Licenciatura</label>
                    <select class="form-control" required name="licenciatura_id" id="licenciatura_id">
                        <option selected disabled hidden disabled selected value>Seleccione una licenciatura</option>
                        @foreach ($licenciaturas as $item)
                        <?php $selected = (old('licenciatura_id', $data->licenciatura_id) == $item->id) ? "selected" : "" ?>
                            <option <?php echo $selected ?> value="{{$item->id}}">{{$item->nombre_licenciatura}}</option>
                        @endforeach   
                    </select>
                </div>

                <br>

                <div class="mb-3">
                    <label for="nombre_laboratorio" class="form-label">Nombre del laboratorio</label>
                    <input type="text" class="form-control" id="nombre_laboratorio" value="{{old('nombre_laboratorio', $data->nombre_laboratorio)}}" name="nombre_laboratorio" placeholder="Nombre del laboratorio">
                </div>

                <br>

                <div class="mb-3">

                    <div class="form-group">
                        <label for="url_laboratorio">Seleccionar Archivo PDF</label>
                        <small>*Máximo 4MB</small>
                        <input type="file" class="form-control-file form-control" id="url_laboratorio" name="url_laboratorio" accept=".pdf" required value="{{old('url_laboratorio', $data->url_laboratorio)}}">
                    </div>
                </div>

                <br>


            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>


        </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
