@extends('layout.System.main')
@section('page_name', 'Registrar Unidad de Aprendizaje de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Unidad de Aprendizaje <br><span class="h4 mb-0 text-gray-800">Licenciatura en {{$licenciatura->nombre_licenciatura}} / Plan {{$plan->name}}</span></h1>
        <a href="{{route('sistema.licenciaturas.materias.index', $plan->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.licenciaturas.materias.store', $plan->id)}}" method="post" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Unidad de Aprendizaje de Licenciatura</h6>
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
                    <label for="materia_licenciatur" class="form-label">Nombre de la unidad de aprendizaje</label>
                    <input type="text" class="form-control" id="materia_licenciatur" value="{{old('materia_licenciatur')}}" name="materia_licenciatur" placeholder="Nombre de la unidad de aprendizaje">
                </div>

                <br>

                <div class="mb-3">
                    <label class="form-label">Optativa</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="esOptativa" id="optativa" value="on" {{ old('esOptativa') == 'on' ? 'selected' : '' }}>
                        <label class="form-check-label" for="optativa">
                            Sí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="esOptativa" id="noOptativa" value="off" {{ old('esOptativa') == 'off' ? 'selected' : '' }}>
                        <label class="form-check-label" for="noOptativa">
                            No
                        </label>
                    </div>
                </div>

                <br>

                <div class="mb-3">
                    <label for="creditos_materia_lic" class="form-label">Créditos</label>
                    <input type="number" min="0" class="form-control" name="creditos_materia_lic" value="{{old('creditos_materia_lic')}}" id="creditos_materia_lic" placeholder="Créditos">
                </div>

                <br>

                <div class="mb-3">
                    <label for="horas_semana_materia_lic" class="form-label">Horas por semana</label>
                    <input type="number" min="0" class="form-control" name="horas_semana_materia_lic" value="{{old('horas_semana_materia_lic')}}" id="horas_semana_materia_lic" placeholder="Horas por semana">
                </div>

                <br>

                <div class="mb-3">
                    <label for="semestre_materia_lic" class="form-label">Semestre</label>
                    <input type="number" min="0" class="form-control" name="semestre_materia_lic" value="{{old('semestre_materia_lic')}}" id="semestre_materia_lic" placeholder="Semestre al que pertenece">
                </div>

                <br>

                <div class="mb-3">
                    <label for="descripcion_materia_lic" class="form-label">Descripción de la unidad de aprendizaje</label>
                    <textarea name="descripcion_materia_lic" class="content_page" id="descripcion_materia_lic" rows="4" placeholder="Descripción de la materia">{{old('descripcion_materia_lic')}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="requisitos_materia_lic" class="form-label">Requisitos</label>
                    <textarea name="requisitos_materia_lic" class="content_page" id="requisitos_materia_lic" rows="4" placeholder="Lista de materias requeridas para cursar esta unidad de estudio">{{old('requisitos_materia_lic')}}</textarea>
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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/tinyjs.js')}}></script>
    
@endsection
