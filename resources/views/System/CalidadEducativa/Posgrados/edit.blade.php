@extends('layout.System.main')
@section('page_name', 'Editar Calidad Educativa de Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Calidad Educativa de Posgrado</h1>
        <a href="{{route('sistema.calidad-educativa.posgrados.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.calidad-educativa.posgrados.update', ['posgrado' => $data->id])}}"
            method="post">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Calidad Educativa de Posgrado</h6>
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
                        @foreach ($posgrados as $item)
                            <?php $selected = (old('posgrado_id', $data->posgrado_id) == $item->id) ? "selected" : "" ?>
                            <option <?php echo $selected ?> value="{{$item->id}}">{{$item->nombre_posgrado}}</option>
                        @endforeach
                    </select>
                </div>

                <br>

                <div class="mb-3">
                    <label for="mision" class="form-label">Misión</label>
                    <textarea id="mision" name="mision" class="content_page">{{old('mision', $data->mision)}}</textarea>
                </div>

                <br>
                
                <div class="mb-3">
                    <label for="vision" class="form-label">Visión</label>
                    <textarea id="vision" name="vision" class="content_page">{{old('vision', $data->vision)}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="objetivos" class="form-label">Objetivos</label>
                    <textarea id="objetivos" name="objetivos" class="content_page">{{old('objetivos', $data->objetivos)}}</textarea>
                </div>
                
                <br>

                <div class="mb-3">
                    <label for="perfil_de_egresados" class="form-label">Perfil de egresados
                    </label>
                    <textarea id="perfil_de_egresados" name="perfil_de_egresados" class="content_page">{{old('perfil_de_egresados', $data->perfil_de_egresados)}}</textarea>
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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/tinyjs.js')}}></script>
    
@endsection
