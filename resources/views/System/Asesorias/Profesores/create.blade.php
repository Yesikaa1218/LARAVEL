@extends('layout.System.main')
@section('page_name', 'Registrar Profesor de Tutorías')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Profesor de Tutorías</h1>
        <a href="{{route('sistema.asesorias.profesores.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.asesorias.profesores.store')}}" method="post" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Profesor de Tutorías</h6>
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
                    <label for="nombre_profesor" class="form-label">Nombre del profesor</label>
                    <input type="text" class="form-control" id="nombre_profesor" value="{{old('nombre_profesor')}}" name="nombre_profesor" placeholder="Nombre del profesor">
                </div>

                <br>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="name@example.com">
                </div>

                <br>

                <div class="mb-3">
                    <label for="semestre" class="form-label">Semestre</label>
                    <input type="number" min="0" name="semestre" class="form-control" id="semestre" rows="4" placeholder="Semestre" value="{{old('semestre')}}">
                </div>
                
                <br>


            </div>

                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>


        </div>
        </form>
    </div>
@endsection

@section('scripts-page')

@endsection
