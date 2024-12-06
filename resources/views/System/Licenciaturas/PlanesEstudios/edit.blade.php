@extends('layout.System.main')
@section('page_name', 'Registrar Plan de Estudios de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Plan de Estudios de Licenciatura</h1>
        <a href="{{route('sistema.licenciaturas.planes.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.licenciaturas.planes.update', ['planes_de_estudio' => $data->id])}}" method="post">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Plan de Estudios de Licenciatura</h6>
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
                    <label for="name" class="form-label">Nombre del plan de estudios</label>
                    <input type="text" class="form-control" id="name" value="{{old('name', $data->name)}}" name="name" placeholder="Número del plan de estudios" required>
                </div>

                <br>

                <br>

            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
