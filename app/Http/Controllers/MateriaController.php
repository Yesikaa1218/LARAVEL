<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empleado;
use App\Models\EmpleadoMateria;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('System.Licenciaturas.Materias.index');
    }

    public function dataindex(){
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
            return datatables(Materia::with('licenciatura')->get())
        ->addColumn('dtOptativa',  function(Materia $unidadesdeaprendisaje) {
            if($unidadesdeaprendisaje->optativa_materia_lic === 0) {
                return 'No';
            }else{
                return 'Sí';
            }
        })
        ->addColumn('btn', 'System.Licenciaturas.Materias.btn')
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
          ->addColumn('btn', 'System.Licenciaturas.Materias.btn')
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Materia::find($id);
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
        return view('System.Licenciaturas.Materias.edit', compact('data', 'licenciaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $data = Materia::find($id);
        $data->fill($request->all());
        if($request->esOptativa === 'on'){
            $data->optativa_materia_lic = 1;
        }else {
            $data->optativa_materia_lic = 0;
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index'));
    }
    
    public function approve($id)
    {   
        $publicacion = Materia::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index'));
    }

    public function getMateriasByPlan($planId)
    {
        $usuarioActual = Auth::guard('empleado')->user()->NoEmpleado; // Obtén el ID del usuario actual
        
        
        $materias = EmpleadoMateria::join('empleados as e', 'e.id', '=', 'empleados_materias.fkEmpleado')
            ->join('materias as m', 'm.id', '=', 'empleados_materias.fkMateria')
            ->join('planes_de_estudios as p', 'p.id', '=', 'm.plan_de_estudio_id')
            ->select(
                'e.id as idEmpleado',
                'e.NoEmpleado',
                'm.id as idMateria',
                'm.materia_licenciatur',
                'p.id as planId',
                'p.name as plan'
            )
            ->where('e.NoEmpleado', $usuarioActual)
            ->where('p.id', $planId)
            ->get();
    
        return response()->json($materias);
    }

}
