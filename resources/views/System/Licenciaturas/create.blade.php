@extends('layout.System.main')
@section('page_name', 'Registrar Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Licenciatura</h1>
        <a href="{{route('sistema.licenciaturas.licenciatura.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.licenciaturas.licenciatura.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Licenciatura</h6>
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
                    <label for="nombre_licenciatura" class="form-label">Nombre de la licenciatura</label>
                    <input type="text" class="form-control" id="nombre_licenciatura" value="{{old('nombre_licenciatura')}}" name="nombre_licenciatura" placeholder="Nombre de la licenciatura">
                </div>

                <br>

                <div class="mb-3">
                    <label for="banner_licenciatura" class="form-label">Banner de la licenciatura</label>
                    <input type="file" class="form-control" id="banner_licenciatura" value="{{old('banner_licenciatura')}}" accept=".jpeg,.jpg,.png" name="banner_licenciatura" placeholder="Banner de la licenciatura">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 1282px * 855px</small>
                </div>

                <br>

                <div class="mb-3">
                    <label for="nombre_coordinador" class="form-label">Nombre del coordinador(a)</label>
                    <input type="text" class="form-control" name="nombre_coordinador" value="{{old('nombre_coordinador')}}" id="nombre_coordinador" placeholder="Nombre del coordinador(a)">
                </div>

                <br>

                <div class="mb-3">
                    <label for="foto_coordinador" class="form-label">Fotografía del coordinador(a)</label>
                    <input type="file" class="form-control" id="foto_coordinador" value="{{old('foto_coordinador')}}" accept=".jpeg,.jpg,.png" name="foto_coordinador" placeholder="Fotografía del coordinador(a)">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 2014px * 2820px</small>
                </div>

                <br>

                <div class="mb-3">
                    <label for="informacion_contacto" class="form-label">Información de contacto</label>
                    <textarea name="informacion_contacto" class="form-control" id="informacion_contacto" rows="4" placeholder="Información de contacto" required>{{old('informacion_contacto')}}</textarea>
                    {{-- <input type="text" class="form-control" name="informacion_contacto" value="{{old('informacion_contacto')}}" id="informacion_contacto" placeholder="Información de contacto"> --}}
                </div>


                <br>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción de la licenciatura</label>
                    <textarea name="descripcion"  class="content_page" id="descripcion" rows="4" placeholder="Descripción de la licenciatura">{{old('descripcion')}}</textarea>
                    {{-- <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" id="descripcion" placeholder="Descripción de la licenciatura"> --}}
                </div>


                <br>

                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración de la licenciatura</label>
                    <input type="text" class="form-control" name="duracion" value="{{old('duracion')}}" id="duracion" placeholder="Duración de la licenciatura">
                </div>


                <br>

                <div class="mb-3">
                    <label for="perfil_ingreso" class="form-label">Perfil de ingreso</label>
                    <textarea name="perfil_ingreso"  class="content_page" id="perfil_ingreso" rows="4" placeholder="Perfil de ingreso">{{old('perfil_ingreso')}}</textarea>
                    {{-- <input type="text" class="form-control" name="perfil_ingreso" value="{{old('perfil_ingreso')}}" id="perfil_ingreso" placeholder="Perfil de ingreso"> --}}
                </div>


                <br>

                <div class="mb-3">
                    <label for="perfil_egreso" class="form-label">Perfil de egreso</label>
                    <textarea name="perfil_egreso"  class="content_page" id="perfil_egreso" rows="4" placeholder="Perfil de egreso">{{old('perfil_egreso')}}</textarea>
                    {{-- <input type="text" class="form-control" name="perfil_egreso" value="{{old('perfil_egreso')}}" id="perfil_egreso" placeholder="Perfil de egreso"> --}}
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

@endsection
