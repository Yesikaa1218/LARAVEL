@extends('layout.System.main')
@section('page_name', 'Registrar Posgrado')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Posgrado</h1>
        <a href="{{route('sistema.posgrados.posgrado.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.posgrados.posgrado.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Posgrado</h6>
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

                    <div class="mb-3">
                        <label for="nombre_posgrado" class="form-label">Nombre del posgrado</label>
                        <input type="text" class="form-control" id="nombre_posgrado" value="{{old('nombre_posgrado')}}" name="nombre_posgrado" placeholder="Nombre del posgrado">
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="banner_del_posgrado" class="form-label">Banner del posgrado</label>
                        <input type="file" class="form-control" id="banner_del_posgrado" value="{{old('banner_del_posgrado')}}" accept=".jpeg,.jpg,.png" name="banner_del_posgrado" placeholder="Banner del posgrado">
                        <small>Tamaño Maximo 1MB, Resolución Maxima: 1282px * 855px</small>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="nombre_coordinador_posgrado" class="form-label">Nombre del Coordinador(a)</label>
                        <input type="text" class="form-control" name="nombre_coordinador_posgrado" value="{{old('nombre_coordinador_posgrado')}}" id="nombre_coordinador_posgrado" placeholder="Nombre del coordinador(a)">
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo(s) del coordinador(a)</label>
                        <textarea name="correo" class="form-control" id="correo" rows="4" placeholder="Correo(s) del coordinador(a)">{{old('correo')}}</textarea>
                        <small>En caso de agregar mas de un correo, favor de separarlos por punto y coma</small>
                    </div>
                    <br>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono del coordinador(a)</label>
                        <textarea name="telefono" class="form-control" id="telefono" rows="4" placeholder="Telefono del coordinador(a)">{{old('telefono')}}</textarea>
                    </div>
                    <br>

                    <div class="mb-3">
                        <label for="extension" class="form-label">Extension(es) del coordinador(a)</label>
                        <input type="text" class="form-control" name="extension" value="{{old('extension')}}" id="extension" placeholder="Extension(es) del coordinador(a)">
                    </div>
                    <br>

                    <div class="mb-3">
                        <label for="informacion_extra" class="form-label">Informacion extra del coordinador(a)</label>
                        <textarea name="informacion_extra" class="form-control" id="informacion_extra" rows="4" placeholder="Informacion extra del coordinador(a)">{{old('informacion_extra')}}</textarea>
                        <small>Cuenta de teams, texto de presentacion, etc..</small>
                    </div>
                    <br>
                    
                    <div class="mb-3">
                        <label for="foto_del_coordinador" class="form-label">Foto del coordinador(a)</label>
                        <input type="file" class="form-control" id="foto_del_coordinador" value="{{old('foto_del_coordinador')}}" accept=".jpeg,.jpg,.png" name="foto_del_coordinador" placeholder="Foto del coordinador(a)">
                    </div>
                    <br>    

                    <div class="mb-3">
                        <label for="descripcion_general_posgrado" class="form-label">Descripción general del posgrado</label>
                        <textarea name="descripcion_general_posgrado" class="content_page" id="descripcion_general_posgrado" rows="4" placeholder="Descripción general de la posgrado">{{old('descripcion_general_posgrado')}}</textarea>
                    </div>


                    <br>

                    <div class="mb-3">
                        <label for="duracion_de_posgrado" class="form-label">Semestres</label>
                        <input type="number" min="0" class="form-control" name="duracion_de_posgrado" value="{{old('duracion_de_posgrado')}}" id="duracion_de_posgrado" placeholder="Duración de la posgrado">
                    </div>


                    <br>

                    <div class="mb-3">
                        <label for="tipo_periodo" class="form-label">Periodo</label> 
                        <select class="form-control" name="tipo_periodo" value="{{old('tipo_periodo')}}" id="tipo_periodo" >
                            <option>Tetramestre</option>
                            <option>Semestre</option>
                        </select>
                    </div>

    
                    <br>

                    <div class="mb-3">
                        <label for="perfil_de_ingreso_posgrado" class="form-label">Perfil de ingreso</label>
                        <textarea name="perfil_de_ingreso_posgrado" class="content_page" id="perfil_de_ingreso_posgrado" placeholder="Perfil de ingreso">{{old('perfil_de_ingreso_posgrado')}}</textarea>
                    </div>


                    <br>

                    <div class="mb-3">
                        <label for="perfil_de_egreso_posgrado" class="form-label">Perfil de egreso</label>
                        <textarea name="perfil_de_egreso_posgrado" class="content_page" id="perfil_de_egreso_posgrado" rows="4" placeholder="Perfil de egreso">{{old('perfil_de_egreso_posgrado')}}</textarea>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="mision" class="form-label">Misión <small>(Opcional)</small></label>
                        <textarea name="mision"  class="content_page" id="mision" rows="4" placeholder="Misión">{{old('mision')}}</textarea>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="vision" class="form-label">Visión <small>(Opcional)</small></label>
                        <textarea name="vision"  class="content_page" id="vision" rows="4" placeholder="Visión">{{old('vision')}}</textarea>
                    </div>


                    <!--</div>-->

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

    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>

    
@endsection
