@extends('layout.System.main')
@section('page_name', 'Editar Publicación de Emprendedores')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Publicación de Emprendedores</h1>
        <a href="{{route('sistema.emprendimiento.publicaciones.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.emprendimiento.publicaciones.update', ['publicacione' => $data->id])}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Publicación de Emprendedores</h6>
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

                <div class="row">
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" value="{{old('titulo', $data->titulo)}}" name="titulo" placeholder="Título" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug', $data->slug)}}" id="slug" readonly>
                    </div>
                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="imagen" class="form-label">Imagen de la Publicación (Opcional)</label>
                        <input type="file" class="form-control" id="imagen" value="{{old('imagen')}}" accept=".jpg,.png" name="imagen" placeholder="Imagen de la Publicación">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                    </div>
                    
                    <br>

                    <div class="mb-3 col-sm-12 ">
                        <label for="contenido" class="form-label">Contenido de la Publicación</label>
                        <textarea name="contenido" class="content_page" id="contenido" rows="4" placeholder="Contenido de la Publicación">{!! old('contenido', $data->contenido) !!}</textarea>
                    </div>


                </div>


            </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>


        </div>
        </form>
    </div>
@endsection

@section('scripts-page')
    <script>
        $("#titulo").keyup(function () {
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


    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    
@endsection
