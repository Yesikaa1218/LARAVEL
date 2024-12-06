<?php

namespace App\Http\Controllers;
use App\Models\Licenciatura;
use App\Models\Posgrado;
use App\Models\ActividadesCulturalesClubes;
use App\Models\AcreditacionesIndicadoresFacultad;
use App\Models\Noticia;
use App\Models\Anuncios;
use App\Models\User;
use App\Models\PosgradoProfesor;
use App\Models\LicenciaturaProfesor;
use App\Models\PosgradoCongreso;
use App\Models\LicenciaturaCongreso;
use App\Models\LogrosPosgrado;
use App\Models\SeccionLibrePosgrado;
use App\Models\Asesorias;
use App\Models\TutoriasLaboratorio;
use App\Models\TutoriasProfesor;
use App\Models\Beca;
use App\Models\Emprendimiento;
use App\Models\PublicacionEmprendimiento;
use App\Models\Escolar;
use App\Models\EscolarPreguntasFecuentes;
use App\Models\AcreditacionesIndicadoresLicenciaturas;
use App\Models\AcreditacionesIndicadoresPosgrado;
use App\Models\ExDirector;
use App\Models\FacultadInforme;
use App\Models\ProfesorEmerito;
use App\Models\FacultadSeccion;
use App\Models\PracticaProfesional;
use App\Models\PracticasPreguntasFrecuentes;
use App\Models\ServicioSocial;
use App\Models\ServicioPreguntasFrecuentes;
use App\Models\ServicioDocumentos;
use App\Models\Tesoreria;
use App\Models\TesoreriaPreguntasFrecuentes;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // Cookie::forget('XSRF-TOKEN', '/', '127.0.0.1');
        $indicadores = AcreditacionesIndicadoresFacultad::count();
        $licenciaturas = Licenciatura::count();
        $posgrados = Posgrado::count();
        $clubes = ActividadesCulturalesClubes::count();
        $noticias = Noticia::where('active',0)->count();
        $anuncios = Anuncios::where('active',0)->count();
        $usuarios = User::count();
        $posgradoPendiente = PosgradoProfesor::where('active',0)->count() 
                    + PosgradoCongreso::where('status',0)->count()
                    + LogrosPosgrado::where('active',0)->count()
                    + SeccionLibrePosgrado::where('active',0)->count();
        $licenciaturaPendiente = LicenciaturaProfesor::where('active',0)->count()
                    + LicenciaturaCongreso::where('status',0)->count();
        $asesoriaPendiente = Asesorias::where('id', Asesorias::max('id'))->where('active',0)->count()
                    + TutoriasLaboratorio::where('active',0)->count()
                    + TutoriasProfesor::where('active',0)->count();
        $becaPendiente = Beca::where('id', Beca::max('id'))->where('active',0)->count();
        $emprendedoresPendiente = Emprendimiento::where('id', Emprendimiento::max('id'))->where('active',0)->count()
                    + PublicacionEmprendimiento::where('active',0)->count();
        $escolarPendiente = Escolar::where('id', Escolar::max('id'))->where('active',0)->count()
                    + EscolarPreguntasFecuentes::where('active',0)->count()
                    + AcreditacionesIndicadoresFacultad::where('active',0)->count()
                    + AcreditacionesIndicadoresLicenciaturas::where('active',0)->count()
                    + AcreditacionesIndicadoresPosgrado::where('active',0)->count();
        $facultadPendiente = ExDirector::where('active',0)->count()
                    + FacultadInforme::where('active',0)->count()
                    + ProfesorEmerito::where('active',0)->count()
                    + FacultadSeccion::where('active',0)->count();
        $practicaPendiente = PracticaProfesional::where('id', PracticaProfesional::max('id'))->where('active',0)->count()
                    + PracticasPreguntasFrecuentes::where('active',0)->count();
        $servicioPendiente = ServicioSocial::where('id', ServicioSocial::max('id'))->where('active',0)->count()
                    + ServicioPreguntasFrecuentes::where('active',0)->count()
                    + ServicioDocumentos::where('active',0)->count();
        $tesoreriaPendiente = Tesoreria::where('id', Tesoreria::max('id'))->where('active',0)->count()
                    + TesoreriaPreguntasFrecuentes::where('active',0)->count();                                                             
        return view('home', compact('licenciaturas', 'posgrados', 'indicadores', 'clubes', 'noticias', 
                            'anuncios', 'usuarios', 'posgradoPendiente', 'licenciaturaPendiente',
                            'asesoriaPendiente', 'becaPendiente', 'emprendedoresPendiente',
                            'escolarPendiente', 'facultadPendiente', 'practicaPendiente', 'servicioPendiente',
                            'tesoreriaPendiente'
                        ));
    }


}
