@extends('layout.System.main')

@section('content')
    <div class="row">

        <div  class="col-xl-12 col-md-12 mb-12">
            <div class="card-body">
                <h1 align="center">Informacion principal</h1>
            </div>    
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Licenciaturas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$licenciaturas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Posgrados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$posgrados}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Usuarios activos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$usuarios}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Clubs escolares</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$clubes}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div  class="col-xl-12 col-md-12 mb-12">
            <div class="card-body">
                <h2 align="center">Cantidad de actividades por aprovar en los modulos:</h2>
            </div>    
        </div>

        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Difusion</div>
                            <div class="h5 mb-0">Aviso: {{$anuncios}}</div>
                            <div class="h5 mb-0">Noticias: {{$noticias}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Oferta Educativa</div>
                            <div class="h5 mb-0">Licenciatura: {{$licenciaturaPendiente}}</div>
                            <div class="h5 mb-0">Posgrado: {{$posgradoPendiente}}</div>  
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Departamentos</div>
                            <div class="h5 mb-0">Asesorias: {{$asesoriaPendiente}}</div>
                            <div class="h5 mb-0">Becas: {{$becaPendiente}}</div>
                            <div class="h5 mb-0">Emprendedores: {{$emprendedoresPendiente}}</div>
                            <div class="h5 mb-0">Escolar: {{$escolarPendiente}}</div>
                            <div class="h5 mb-0">Facultad: {{$facultadPendiente}}</div>
                            <div class="h5 mb-0">Practicas profesionales: {{$practicaPendiente}}</div>
                            <div class="h5 mb-0">Servicio social: {{$servicioPendiente}}</div>
                            <div class="h5 mb-0">Tesoreria: {{$tesoreriaPendiente}}</div>      
                        </div>
                        <div class="col-auto">
                            <i class="far fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
