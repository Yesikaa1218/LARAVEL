@extends('layout.System.main')
@section('page_name', 'Registrar Calidad Educativa de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Calidad Educativa de Licenciatura</h1>
        <a href="{{route('sistema.calidad-educativa.licenciaturas.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.calidad-educativa.licenciaturas.store')}}" method="post" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Calidad Educativa de Licenciatura</h6>
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
                            <option value="{{$item->id}}" {{ old('licenciatura_id') == $item->id ? 'selected' : '' }}>{{$item->nombre_licenciatura}}</option>
                        @endforeach
                    </select>
                </div>

                <br>

                <div class="mb-3">
                    <label for="mision" class="form-label">Misión</label>
                    <textarea id="mision" name="mision" class="content_page">{{old('mision')}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="vision" class="form-label">Visión</label>
                    <textarea id="vision" name="vision" class="content_page">{{old('vision')}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="objetivos" class="form-label">Objetivos</label>
                    <textarea id="objetivos" name="objetivos" class="content_page">{{old('objetivos')}}</textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="perfil_de_egresados" class="form-label">Perfil de egresados
                    </label>
                    <textarea id="perfil_de_egresados" name="perfil_de_egresados" class="content_page">{{old('perfil_de_egresados')}}</textarea>
                </div>

                <br>

                <!-- <div class="container">
                    <h6 class="m-0 font-weight-bold text-secondary">Logos de acreditaciones</h6>
                    
                    <br>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="container">

                                <div class="form-group">
                                    <form name="acreditacion" id="acreditacion">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="dynamic_field">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Nombre de la acreditación</th>
                                                    <th>URL del logo de la acreditación</th>
                                                    <th>Acción</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="nombreAcreditacion[]" class="form-control" placeholder="Nombre de la acreditación"></td>
                                                    <td><input type="url" name="urlAcreditacion[]" class="form-control" placeholder="URL del logo de la acreditación"></td>
                                                    <td><button type="button" name="add" id="add" class="btn btn-success">Agregar Más</button></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->

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
    

    <!-- <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="nombreAcreditacion[]" class="form-control" placeholder="Nombre de la acreditación"></td><td><input type="url" name="urlAcreditacion[]" class="form-control" placeholder="URL del logo de la acreditación"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id"); 
                $('#row'+button_id+'').remove();
            });

        });

    </script> -->
@endsection
