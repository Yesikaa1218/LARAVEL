@extends('layout.System.main')
@section('page_name', 'Editar Club Cultural')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Club Cultural</h1>
        <a href="{{route('sistema.actividades-culturales.index')}}"
           class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form    action="{{route('sistema.actividades-culturales.clubes.update', ['clube' => $data->id])}}"
                 method="post">
        @method('PATCH')
        @csrf
        <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Club Cultural</h6>
                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Ha ocurrido un ERROR!</h4>
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
                            <label for="name" class="form-label">Nombre del club</label>
                            <input type="text" class="form-control" id="name" value="{{old('name', $data->name)}}"
                                name="name" placeholder="Nombre del Club" required>
                        </div>

                        <br>

                        <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{old('slug', $data->slug)}}" id="slug" readonly>
                        </div>

                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="content_page" class="form-label">Información del club</label>
                        <textarea id="content_page" name="content_page" required>{!!$data->content_page!!}</textarea>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="image_description" class="form-label">Descripción de la imagen <small>(Opcional)</small></label>
                        <input type="text" name="image_description" id="image_description" class="form-control" value="{{old('image_description', $data->image_description)}}">
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
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content_page',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist   pageembed permanentpen powerpaste table advtable  tinymcespellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table',
            toolbar_mode: 'sliding',
            language: 'es_MX',
            height: 500,
            toolbar_sticky: true,
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

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
