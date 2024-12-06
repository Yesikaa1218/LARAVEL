@extends('layout.System.main')
@section('page_name', 'Registrar problemas matematicas')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar problemas matematicas</h1>
        <a href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar problemas matematicas</h6>
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
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Nombre problema" required
                               maxlength="20"
                               oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                    <br>
                    <div class="mb-3">
                        <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                            <label for="problema" class="form-label">Imagen del problema</label>
                            <input type="file" class="form-control" id="problema" value="{{old('problema')}}" accept=".jpg,.png" name="problema" placeholder="Imagen del problema" required>
                            <small>Tamaño Maximo 1MB, Resolución Maxima: </small>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="materia_laboratorio_id" class="form-label">Materia laboratorio</label>
                        <select name="materia_laboratorio_id" id="materia_laboratorio_id" class="form-control" required>
                            <option>Seleccione una materia</option>
                            @foreach($materiaLaboratorio as $mateLab)
                                <option value="{{$mateLab->id}}">{{$mateLab->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="tema_materia_id" class="form-label">Tema materia</label>
                        <select name="tema_materia_id" id="tema_materia_id" class="form-control" required>
                            <option>Seleccione un tema</option>
                            @foreach($temaMateria as $temaM)
                                <option value="{{$temaM->id}}">{{$temaM->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
