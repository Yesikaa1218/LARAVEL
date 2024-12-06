@extends('layout.System.main')
@section('page_name', 'Editar datos del laboratorio')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar datos del laboratorio</h1>
        <a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.index', $examen->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.update', ['examenId' => $examen->id, 'id' => $data->id])}}"
            method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar  datos del laboratorio</h6>
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
                    <br>
                    <div class="mb-3">
                        <label for="materia_laboratorio_id" class="form-label">Materia laboratorio</label>
                        <select name="materia_laboratorio_id" id="materia_laboratorio_id" class="form-control" required>
                            <option>Seleccione una materia</option>
                            @foreach($materiaLaboratorio as $mateLab)
                                <option value="{{$mateLab->id}}" @if($mateLab->id === $data->materia_laboratorio_id) selected @endif>{{$mateLab->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="tema_materia_id" class="form-label">Tema materia</label>
                        <select name="tema_materia_id" id="tema_materia_id" class="form-control" required>
                            <option>Seleccione un tema</option>
                            @foreach($temaMateria as $temaM)
                                <option value="{{$temaM->id}}" @if($temaM->id === $data->tema_materia_id) selected @endif>{{$temaM->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="cantidad_problemas" class="form-label">Cantidad de problemas</label>
                        <input type="number" name="cantidad_problemas" id="cantidad_problemas" class="form-control" value="{{old('cantidad_problemas', $data->cantidad_problemas)}}" required
                                min="1" max="15">
                    </div>
                </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

            </div>
        </form>
    </div>
@endsection
