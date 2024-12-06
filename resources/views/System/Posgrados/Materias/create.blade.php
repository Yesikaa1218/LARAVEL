@extends('layout.System.main')
@section('page_name', 'Registrar Unidad de Aprendizaje de Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Unidad de Aprendizaje de Posgrado</h1>
        <a href="{{route('sistema.posgrados.materias.index', $plan->id)}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.posgrados.materias.store', $plan->id)}}" method="post" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Unidad de aprendizaje de Posgrado</h6>
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
                    <label for="posgrado_id" class="form-label">Posgrado</label>
                    <select class="form-control" required name="posgrado_id" id="posgrado_id">
                    <option selected disabled hidden disabled selected value>Seleccione un posgrado</option>
                        
                            <option value="{{$posgrado->id}}">{{$posgrado->nombre_posgrado}}</option>
                        
                    </select>
                </div>

                <br>

                <div class="mb-3">
                    <label for="materia_posgrado" class="form-label">Nombre de la unidad de aprendizaje</label>
                    <input type="text" class="form-control" id="materia_posgrado" value="{{old('materia_posgrado')}}" name="materia_posgrado" placeholder="Nombre de la unidad de aprendizaje">
                </div>


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

                <br><br>

                <div class="mb-3">
                    <label for="creditos_materia_pos" class="form-label">Créditos</label>
                    <input type="number" class="form-control" name="creditos_materia_pos" value="{{old('creditos_materia_pos')}}" id="creditos_materia_pos" placeholder="Créditos"
                           min="1" max="34">
                </div>

                <br>

                <div class="mb-3">
                    <label for="horas_semana_materia_pos" class="form-label">Horas por semana</label>
                    <input type="number" class="form-control" name="horas_semana_materia_pos" value="{{old('horas_semana_materia_pos')}}" id="horas_semana_materia_pos" placeholder="Horas por semana"
                           min="1" max="10">
                </div>

                <br>

                <div class="mb-3">
                    <label for="semestre_materia_pos" class="form-label">Semestre</label>
                    <input type="number" class="form-control" name="semestre_materia_pos" value="{{old('semestre_materia_pos')}}" id="semestre_materia_pos" placeholder="Semestre al que pertenece"
                           min="1" max="8">
                </div>

                <br>

                <div class="mb-3">
                    <label for="descripcion_materia_pos" class="form-label">Descripción de la unidad de aprendizaje</label>
                    <textarea name="descripcion_materia_pos" class="content_page" id="descripcion_materia_pos" rows="4" placeholder="Descripción de la unidad de aprendizaje">{{old('descripcion_materia_pos')}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="requisitos_materia_pos" class="form-label">Requisitos</label>
                    <textarea name="requisitos_materia_pos" class="content_page" id="requisitos_materia_pos" rows="4" placeholder="Lista de materias requeridas para cursar esta unidad de estudio">{{old('requisitos_materia_pos')}}</textarea>
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
