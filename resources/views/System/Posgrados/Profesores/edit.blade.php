@extends('layout.System.main')
@section('page_name', 'Editar Profesor de Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Profesor de Posgrado</h1>
        <a href="{{route('sistema.posgrados.profesores.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.posgrados.profesores.update', ['profesore' => $data->id])}}"
            method="post"
            enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Profesor de Posgrado</h6>
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
                        <option selected disabled hidden disabled selected value>Seleccione una posgrado</option>
                        @foreach ($posgrados as $item)
                        <?php $selected = (old('posgrado_id', $data->posgrado_id) == $item->id) ? "selected" : "" ?>
                            <option <?php echo $selected ?> value="{{$item->id}}">{{$item->nombre_posgrado}}</option>
                        @endforeach   
                    </select>
                </div>

                <br>

                <div class="mb-3">
                    <label for="nombre_profesor" class="form-label">Nombre del profesor</label> 
                    <input type="text" class="form-control" id="nombre_profesor" value="{{old('nombre_profesor', $data->nombre_profesor)}}" name="nombre_profesor" placeholder="Nombre del profesor">
                </div>

                <br>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" value="{{old('email', $data->email)}}" id="email" placeholder="name@example.com">
                </div>

                <br>

                <div class="mb-3">
                    <label for="contacto" class="form-label">Contacto (opcional)</label>
                    <input type="url" class="form-control" name="contacto" value="{{old('contacto', $data->contacto)}}" id="contacto" placeholder="LinkedIn">
                </div>

                <br>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="imagen" class="form-label">Fotografía</label>
                        <input type="file" class="form-control" id="imagen" value="{{old('imagen')}}" accept=".jpeg,.jpg,.png" name="imagen" placeholder="Fotografía">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                    </div>

                <br>

                <div class="mb-3">
                    <label for="semblante" class="form-label">Semblanza</label>
                    <textarea name="semblante" class="content_page" id="semblante" rows="4" placeholder="Semblanza">{{old('semblante', $data->semblante)}}</textarea>
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
