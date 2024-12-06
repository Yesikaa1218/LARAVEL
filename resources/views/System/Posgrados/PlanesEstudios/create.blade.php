<!-- Falta cambiar rutas -->

@extends('layout.System.main')
@section('page_name', 'Registrar Plan de Estudios de Licenciatura')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Plan de Estudios de Posgrado</h1>
        <a href="{{route('sistema.posgrados.planes-posgrado.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> Ver Registros</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('sistema.posgrados.planes-posgrado.store')}}" method="post" >
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Plan de Estudios de Posgrado</h6>
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
                <br>
                     <!-- Posgrado -->
                     <div class="mb-3">
                        <label for="posgrado_id" class="form-label">Posgrado</label>
                        <select class="form-control" required name="posgrado_id" id="posgrado_id">
                            <option selected disabled hidden disabled selected value>Seleccione el posgrado</option>
                            @foreach ( $posgrados as $item)
                                <?php $selected = (old('posgrado_id', $item->posgrado_id) == $item->id) ? "selected" : "" ?>
                                <option <?php echo $selected ?> value="{{$item->id}}">{{$item->nombre_posgrado}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <!-- End del posgrado -->
                    
                    <!-- Periodo Academico -->
                    <div class="mb-3">
                        <label for="periodo_academico" class="form-label">Periodo Académico</label>
                        <select class="form-control" required name="periodo_academico" id="periodo_academico">
                            <option selected disabled hidden disabled selected value>Seleccione el periodo académico</option>
                            @foreach ( $periodo_academico as $item)
                            <?php $selected = (old('periodo_academico', $item->periodo_academico) == $item->id) ? "selected" : "" ?>
                            <option <?php echo $selected ?> value="{{$item->id}}">{{$item->name_periodo_academico}}</option>
                        @endforeach
                        </select>
                    </div>

                    <!-- End del Periodo Academico -->
                    <br>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del plan de estudios</label>
                    <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Número del plan de estudios" 
                           onkeypress='return validaEspacios(event)' required>
                    <small><strong>Solo se acepta el nombre del plan en n&uacute;mero o texto sin espacios</strong></small>       
                </div>

                <br>

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
<script>
    function validaEspacios(event) {
        if(event.charCode != 32){
        return true;
        }
        return false;        
    }
</script>

@endsection
