@extends('layout.System.main')
@section('page_name', 'Editar aviso')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Aviso</h1>
        <a href="{{route('sistema.avisos.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.avisos.update', ['aviso' => $data->id])}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Aviso</h6>
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
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio del Aviso</label>
                        <input type="date" class="form-control" id="fecha_inicio" value="{{old('fecha_inicio', $data->fecha_inicio)}}" name="fecha_inicio" placeholder="Fecha de Inicio del Aviso" required>
                    </div>


                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="fehca_final" class="form-label">Fecha Final del Aviso</label>
                        <input type="date" class="form-control" id="fehca_final" value="{{old('fehca_final', $data->fehca_final)}}" name="fehca_final" placeholder="Fecha Final del Aviso" required>
                    </div>
                    <br>

                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="imagen" class="form-label">Imagen Principal del Aviso</label>
                        <input type="file" class="form-control" id="imagen" value="{{old('imagen')}}" accept=".jpg,.png" name="imagen" placeholder="Iamgen del Aviso">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                    </div>

                    <div class="mb-3 col-sm- col-mb-6 col-xl-6 ">
                        <label for="aviso_categoria_id" class="form-label">Categoría del Aviso</label>
                        <select name="aviso_categoria_id" class="form-control" id="aviso_categoria_id" required>
                            <option value="">Selecciona...</option>
                            @foreach($cate as $d)
                                <option value="{{$d->id}}" @if($d->id === $data->aviso_categoria_id) selected @endif>{{$d->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">

                    <div class="form-group">
                        <label for="documento">Seleccionar Archivo PDF</label>
                        <small>*Máximo 4MB</small>
                        <input type="file" class="form-control-file form-control" id="documento" name="documento" accept=".pdf" value="{{old('documento')}}">
                    </div>
                </div>

                <br>
                
                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="" class="form-label" style="margin-right: 1rem;">Colección de imágenes <small>(Opcional)</small></label>
                        <button type="button" id="add-image" class="btn btn-success px-2">
                            Agregar <i class="fas fa-plus ml-15 text-13"></i>
                        </button>
                        
                        <div class="mb-3 col-sm-12 col-mb-6" id="images-list">
                        @if ($data->imagenes)
                             
                            @php
                                $imagenes = json_decode($data->imagenes);
                            @endphp

                            @foreach ($imagenes as $key => $imagen)
                            <div id="old-images-container-{{$key}}" class="row align-items-right" style="marging:10px;">
                                <div class="bd-example">
                                    <input id="old-image-{{$key}}" name="imagenesviejas[]" type="text" class="form-control mr-20" value="{{$imagen}}" style="display:none;">
                                    <img src="/storage/{{$imagen}}" class="rounded mx-auto d-block d-flex" height="125px" width="125px" alt="{{$imagen}}">
                                    <button type="button" id="{{$key}}" class="remove-image btn btn-danger mx-auto d-flex" onclick="$('#old-images-container-{{$key}}').remove()">
                                        <i class="fas fa-minus text-13"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach

                        @endif
                        </div>
                        
                    </div>

                    <br>

                    </div>

                  <div class="mb-3 col-sm-12 ">
                      <label for="contenido" class="form-label">Contenido del Aviso</label>
                      <textarea name="contenido" class="content_page" id="contenido" rows="4" placeholder="Contenido del Aviso">{!! old('contenido', $data->contenido) !!}</textarea>
                  </div>

                  <div style="display:none;">
                      <input name="user_id" id="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" readonly>
                  </div>
                  
                  <?php $checkedMostrar = (old('mostrarInicio', $data->mostrar_aviso) == 1)  ? "checked" : "" ?>
                  <?php $checkedNoMostrar = (old('mostrarInicio', $data->mostrar_aviso) == 0)  ? "checked" : "" ?>

                  <div class="mb-3 col-sm-12">
                    <label class="form-label">¿Mostrar aviso al inicio de la página?: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mostrarInicio" id="mostrar" value="on" <?php echo $checkedMostrar ?>>
                        <label class="form-check-label" for="mostrar">
                            Sí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mostrarInicio" id="noMostrar" value="off" <?php echo $checkedNoMostrar ?>>
                        <label class="form-check-label" for="noMostrar">
                            No
                        </label>
                    </div>
                  </div>

                  <div class="mb-3 col-sm-12 col-mb-6 col-xl-6" id="imagenCarruselAviso" style="display:none">
                    <label for="imagen_inicio" class="form-label">Imagen Principal del carrusel de avisos</label>
                    <input type="file" class="form-control" id="imagen_inicio" value="{{old('imagen_inicio')}}" accept=".jpg,.png" name="imagen_inicio" placeholder="Imagen del carrusel avisos">
                    <small>Resolución Maxima: 800px * 200px</small>
                  </div>
                
                  <div id="vacio" style="display:none;">

                  <br>

                  <div class="row align-items-center py-20">

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

    <script type="text/javascript">
        $(document).ready(function() {
            $("input[type=radio]").click(function(event){
                var valor = $(event.target).val();
                if(valor === "on"){
                    $("#imagenCarruselAviso").show();
                    $("#vacio").hide();
                } else if (valor === "off") {
                    $("#imagenCarruselAviso").hide();
                    $("#vacio").show();
                } else { 
                    // Otra cosa
                }
            });
        }); 
    </script>

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

    <script src="https://cdn.tiny.cloud/1/kvyqt36kra37n6zhvsq2gqdaeqekufvefkejv94yittn0ktd/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    <script type="text/javascript">
        $(document).ready(function () {

            // Index for dynamic elements
            let inputIndex = 0;

            $('#add-image').click(function(){
                // Add social media inputs dynamiclly
               
                $('#empty-images').remove();
                
                $('#images-list').append(
                    `   
                        <div id="images-container-${inputIndex}" class="row align-items-right" style="marging:10px;">
                            <div class="bd-example">
                                <input id="image-${inputIndex}" name="imagenes[]" type="file" accept=".jpg,.png" class="form-control mr-20">

                                <button type="button" id="${inputIndex}" class="remove-image btn btn-danger" >
                                <i class="fas fa-minus text-13"></i>
                                </button>
                             </div>
                        </div>
                        
                    `
                );

                inputIndex++;
                $("#numImg").text(inputIndex);

            });

            $('#images-list').on('click', '.remove-image', function(){
                // Remove selected social media from the list

                let imageId = $(this).attr("id");

                
                $(`#images-container-${imageId}`).remove();



                if($('#images-list').children().length == 0) {
                    // Show social media empty list message

                    // $('#images-list').before('<span id="empty-images" class="text-5 text-red-3 text-center mt-10 mb-90">No se han agregado imágenes.</span>');
                }
            });
            
        });
    </script>
    
@endsection
