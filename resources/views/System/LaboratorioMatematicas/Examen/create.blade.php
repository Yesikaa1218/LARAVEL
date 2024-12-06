@extends('layout.System.main')
@section('page_name', 'Registrar Laboratorio')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Laboratorio</h1>
        <a href="{{route('sistema.laboratorio-matematicas.examen.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.laboratorio-matematicas.examen.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar laboratorio</h6>
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
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Nombre del laboratorio" required
                               maxlength="50"
                               oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="semestre" class="form-label">Semestre</label>
                        <input type="number" class="form-control" name="semestre" id="semestre" value="{{old('semestre')}}" placeholder="Semestre" required 
                                min="1" max="3">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="cantidad_problemas" class="form-label">Cantidad de problemas</label>
                        <input type="number" name="cantidad_problemas" id="cantidad_problemas" 
                               class="form-control" min="1" max="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="periodo_academico" class="form-label">Periodo academico</label>
                        <input type="text" name="periodo_academico" id="periodo_academico" placeholder="Ej: AGOSTO 2023"
                            class="form-control" onkeypress='return validarInputPeriodoAcademico(event)' required>
                        <small>NO se permite ingresar letras en minusculas</small>
                    </div> 
                </div>
                <div class="card-footer" align="right">
                    <button id="registrar" type="submit" class="btn btn-primary">Registrar</button>
                </div>
                <div id="barra" class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span></span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts-page')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //Funcion para agregar la barra de progreso
        $("#registrar").click(function(){
            var progreso = 0;//Se declara una variable para el incremento de progreso de la barra
            var intervalo = setInterval(function() {
                progreso = progreso + 16; //El No. de progreso de la barra crece de 16 en 16
                $("#barra").css("width", progreso + "%").attr("aria-valuenow", progreso).text(progreso + "%");
                if (progreso >= 100){
                    clearInterval(intervalo);
                }
            }, 100);      
        });
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
