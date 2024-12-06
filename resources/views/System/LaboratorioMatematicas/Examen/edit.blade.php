@extends('layout.System.main')
@section('page_name', 'Editar Laboratorio')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Laboratorio</h1>
        <a href="{{route('sistema.laboratorio-matematicas.examen.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.laboratorio-matematicas.examen.update', ['examan' => $data->id])}}"
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
                    <br>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del laboratorio</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre del laboratorio"
                               maxlength="50"
                               oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="semestre" class="form-label">Semestre</label>
                        <input type="number" class="form-control" name="semestre" id="semestre" value="{{old('semestre', $data->semestre)}}" placeholder="Semestre" required 
                                min="1" max="3">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="cantidad_problemas" class="form-label">Cantidad de problemas</label>
                        <input type="number" name="cantidad_problemas" id="cantidad_problemas" class="form-control" 
                               value="{{old('cantidad_problemas', $data->cantidad_problemas)}}" required min="1" max="15">
                    </div>
                    <div class="mb-3">
                        <label for="periodo_academico" class="form-label">Periodo academico</label>
                        <input type="text" name="periodo_academico" id="periodo_academico" value="{{old('periodo_academico', $data->periodo_academico)}}"  
                            class="form-control" onkeypress='return validarInputPeriodoAcademico(event)' required>
                        <small>NO se permite ingresar letras en minusculas</small>    
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
    <script>
        //Validar que no se ingresen letras en minuscula
        function validarInputPeriodoAcademico(event) {
            if(event.charCode > 95 && event.charCode < 125) {
                return false;
            } else {
                return true;
            }
        }
    </script>
@endsection
