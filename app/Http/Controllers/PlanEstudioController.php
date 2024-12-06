<?php
namespace App\Http\Controllers;
use App\Models\PlanEstudios;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanEstudioController extends Controller
{
    public function index()
    {
        return view('System.Licenciaturas.PlanesEstudios.index');
    }

    public function dataindex(){
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
            return datatables(Materia::with('licenciatura')->get())
            ->addColumn('btn', 'System.Licenciaturas.PlanesEstudios.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else{
            if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
            if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
            if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
            if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
            if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
            if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

            return datatables(Materia::with('licenciatura')->where('licenciatura_id', $licenciatura)->get())
            ->addColumn('dtOptativa',  function(Materia $unidadesdeaprendisaje) {
                if($unidadesdeaprendisaje->optativa_materia_lic === 0) {
                    return 'No';
                }else{
                    return 'Sí';
                }
            })
            ->addColumn('btn', 'System.Licenciaturas.PlanesEstudios.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }

    }
 
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        $user = Auth::user();
       if($user->hasanyrole('SuperAdmin')){  
        $licenciaturas = Licenciatura::all();
     }
     else{
         if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
         if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
         if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
         if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
         if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
         if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;
     
         $licenciaturas = Licenciatura::where('id', $licenciatura)->get();
         }


        return view('System.Licenciaturas.Materias.create', compact('licenciaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'licenciatura_id' => 'required',
            'materia_licenciatur' => 'required',
            'creditos_materia_lic' => 'required',
            'horas_semana_materia_lic' => 'required',
            'semestre_materia_lic' => 'required',
            'descripcion_materia_lic' => 'required',
            'requisitos_materia_lic' => 'required',
        ]);

        $data = new Materia();
        $data->fill($request->all());
        if($request->esOptativa === 'on'){
            $data->optativa_materia_lic = 1;
        }else {
            $data->optativa_materia_lic = 0;
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index'));
    }
    
}
