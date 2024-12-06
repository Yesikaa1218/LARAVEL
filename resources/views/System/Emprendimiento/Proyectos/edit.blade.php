@extends('layout.System.main')
@section('page_name', 'Editar Proyecto de Emprendedores')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Proyecto de Emprendedores</h1>
        <a href="{{route('sistema.emprendimiento.proyectos.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.emprendimiento.proyectos.update', ['proyecto' => $data->id])}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Proyecto de Emprendedores</h6>
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
                        <label for="nombre" class="form-label">Nombre del proyecto</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('nombre', $data->nombre)}}" name="nombre" placeholder="Nombre del proyecto" required>
                    </div>

                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug', $data->slug)}}" id="slug" readonly>
                    </div>
                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="imagen" class="form-label">Imagen del Proyecto (Opcional)</label>
                        <input type="file" class="form-control" id="imagen" value="{{old('imagen')}}" accept=".jpg,.png" name="imagen" placeholder="Imagen del Proyecto">
                        <small>Tamaño Máximo 1MB, Resolución Máxima: 1920px * 1080px</small>
                    </div>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="estatus" class="form-label">Estatus</label>
                        <input type="text" class="form-control" name="estatus" value="{{old('estatus', $data->estatus)}}" id="estatus" placeholder="Estatus" required>
                    </div>
                    <br>

                    <div class="mb-3 col-sm-12 ">
                        <label for="descripcion" class="form-label">Descripción del proyecto</label>
                        <textarea name="descripcion" class="content_page" id="descripcion" rows="4" placeholder="Descripción del proyecto">{!! old('descripcion', $data->descripcion) !!}</textarea>
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
        $("#nombre").keyup(function () {
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
     
    <script>
        tinymce.init({
        selector: '.content_page',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker image code media link wordcount',
        toolbar: 'insertfile undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table | image code | wordcount',
        height: 600,
        image_title: true,
        automatic_uploads: true,
        relative_urls: false,
        remove_script_host: false,
        images_upload_url: "/sistema/noticias/upload",
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        },
        toolbar_mode: 'sliding',
        language: 'es_MX',
        height: 700,
        toolbar_sticky: true,
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        spellchecker_language: 'es_MX',
        });
    </script>

    
@endsection
