@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Registrar Cambio de Calificación')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar cambio de calificación</h1>
        <a href="{{route('sistema.escolar.calificaciones.solicitudes.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="POST" action="">
            @csrf 
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="tipoExamen">Tipo de Examen:</label>
                    <select class="form-control" id="tipoExamen" name="tipoExamen" required>
                        <option value="examen1">Examen 1</option>
                        <option value="examen2">Examen 2</option>
                        <option value="examen3">Examen 3</option>
                    </select>
                </div>
            </div>
        
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="calificacionCorrecta">Calificación Correcta:</label>
                    <input type="number" class="form-control" id="calificacionCorrecta" name="calificacionCorrecta" required>
                </div>
                <div class="col-md-6">
                    <label for="calificacionIncorrecta">Calificación Incorrecta:</label>
                    <input type="number" class="form-control" id="calificacionIncorrecta" name="calificacionIncorrecta" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="motivo">Motivo:</label>
                    <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
                </div>
            </div>
        
            <div class="row mt-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
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
                if(valor =="on"){
                    $("#imagenCarruselAviso").show();
                    $("#vacio").hide();
                } else if (valor == "off") {
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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
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
                            <div class"bd-example">
                                <input id="image-${inputIndex}" name="imagenes[]" type="file" accept=".jpg,.png" class="form-control mr-20">

                                <button type="button" id="${inputIndex}" class="remove-image btn btn-danger" >
                                <i class="fas fa-minus text-13"></i>
                                </button>
                             </div>
                        </div>
                        
                    `
                );

                inputIndex++;

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
