@extends('layout.System.main')
@section('page_name', 'Editar problemas matematicas')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar problemas matematicas</h1>
        <a href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.update', ['problemaLaboratorio' => $data->id])}}"
            method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar problemas matematicas</h6>
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
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre problema"
                               maxlength="20"
                               oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                    <br>
                    <div class="mb-3">
                        <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                            <label for="problema" class="form-label">Imagen del problema</label>
                            <input type="file" class="form-control" id="problema" value="{{old('problema', $data->problema)}}" accept=".jpg,.png" name="problema" placeholder="Imagen del problema">
                            <small>Tamaño Maximo 1MB, Resolución Maxima: </small>
                        </div>
                    </div>
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
