@extends('layout.System.main')
@section('page_name', 'Editar Congreso de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Congreso de Licenciatura</h1>
        <a href="{{route('sistema.licenciaturas.congresos.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form class="needs-validation"
            action="{{route('sistema.licenciaturas.congresos.update', ['congreso' => $data->id])}}"
            method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Congreso de Licenciatura</h6>
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
                <div class="row">
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="name" class="form-label">Nombre del congreso</label>
                        <input type="text" class="form-control" id="name" value="{{old('name', $data->name)}}" name="name" placeholder="Nombre del congreso">
                    </div>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug', $data->slug)}}" id="slug" readonly>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                        <label for="fecha_evento" class="form-label">Fecha del evento</label>
                        <input type="date" class="form-control" id="fecha_evento" value="{{old('fecha_evento', $data->fecha_evento)}}" name="fecha_evento" placeholder="Fecha del evento" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="fecha_inicial_registro" class="form-label">Fecha inicial del registro</label>
                        <input type="date" class="form-control" id="fecha_inicial_registro" value="{{old('fecha_inicial_registro', $data->fecha_inicial_registro)}}" name="fecha_inicial_registro" placeholder="Fecha inicial del registro" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="fecha_final_registro" class="form-label">Fecha final del registro</label>
                        <input type="date" class="form-control" id="fecha_final_registro" value="{{old('fecha_final_registro', $data->fecha_final_registro)}}" name="fecha_final_registro" placeholder="Fecha final del registro" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="image" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="image" value="{{old('image', $data->image)}}" accept=".jpeg,.jpg,.png" name="image" placeholder="Imagen">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="image_description" class="form-label">Descripción de la imagen</label>
                        <input type="text" class="form-control" id="image_description" value="{{old('image_description', $data->image_description)}}" name="image_description" placeholder="Descripción de la imagen">
                    </div>
                </div>

                <br>

                <div class="mb-3 col-sm-12 ">
                    <label for="content_page" class="form-label">Información del congreso</label>
                    <textarea name="content_page" class="content_page" id="content_page" rows="8">{{old('content_page', $data->content_page)}}</textarea>
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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    <script>
        $("#name").keyup(function () {
            var cadena = $(this).val();
            string_to_slug(cadena);
        });

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, '');
            str = str.toLowerCase();

            //quita acentos, cambia la ñ por n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
                .replace(/\s+/g, '-') // reemplaza los espacios por -
                .replace(/-+/g, '-'); // quita las plecas

            return $("#slug").val(str);
        }

    </script>
@endsection
