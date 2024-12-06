<?php

namespace App\Http\Controllers;
use App\Models\MateriasPosgrado;
use App\Models\PlanesEstudioPosgrado;
use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriasPosgradoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($planId)
    {
        $plan = PlanesEstudioPosgrado::find($planId);
        $posgrado = Posgrado::find($plan->posgrado_id);
        return view('System.Posgrados.Materias.index',compact('plan', 'posgrado'));
    }

    public function dataindex($planId){

        $user = Auth::user();
        $plan = PlanesEstudioPosgrado::find($planId);
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){
            
            return datatables(MateriasPosgrado::with('posgrado')->where('plan_estudios_id', $planId)->get())
            ->addColumn('dtOptativa',  function(MateriasPosgrado $unidadesdeaprendizaje) {
                if($unidadesdeaprendizaje->optativa_materia_pos === 0) {
                    return 'No';
                }else{
                    return 'Sí';
                }
            })
            ->addColumn('btn', 'System.Posgrados.Materias.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else {

            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar el datatable con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                return datatables(MateriasPosgrado::with('posgrado')->where('plan_estudios_id', $planId)->whereIn('posgrado_id', [1, 5])->get())
                    ->addColumn('dtOptativa',  function(MateriasPosgrado $unidadesdeaprendizaje) {
                        if($unidadesdeaprendizaje->optativa_materia_pos === 0) {
                            return 'No';
                        }else{
                            return 'Sí';
                        }
                    })
                    ->addColumn('btn', 'System.Posgrados.Materias.btn')
                    ->rawColumns(['btn'])
                    ->toJson();
            }

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;
            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;



            return datatables(MateriasPosgrado::with('posgrado')->where('posgrado_id', $posgrado)->get())
            ->addColumn('dtOptativa',  function(MateriasPosgrado $unidadesdeaprendizaje) {
                if($unidadesdeaprendizaje->optativa_materia_pos === 0) {
                    return 'No';
                }else{
                    return 'Sí';
                }
            })
            ->addColumn('btn', 'System.Posgrados.Materias.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($planId)
    {
        $user = Auth::user();
        $plan = PlanesEstudioPosgrado::where('id',$planId)->get()->first();
        $posgrado = Posgrado::where('id',$plan->posgrado_id)->get()->first();
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){
            $posgra = Posgrado::all();
        }
        else
        {

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;
            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;
            $posgra = Posgrado::where('id', $posgrado)->get();
             
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgra = Posgrado::whereIn('id', [1, 5])->get();
            }

        }


        return view('System.Posgrados.Materias.create', compact('posgra', 'plan','posgrado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $planId)
    {
        $request->validate([
            'posgrado_id' => 'required',
            'materia_posgrado' => 'required',
            'creditos_materia_pos' => 'required',
            'horas_semana_materia_pos' => 'required',
            'semestre_materia_pos' => 'required',
            'descripcion_materia_pos' => 'required',
            'requisitos_materia_pos' => 'required',
        ]);

        $data = new MateriasPosgrado();
        $data->fill($request->all());
        $data->plan_estudios_id = $planId;
        if($request->esOptativa === 'on'){
            $data->optativa_materia_pos = 1;
        }else{
            $data->optativa_materia_pos = 0;
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.posgrados.materias.index', $planId));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($planId, $id)
    {
        $data = MateriasPosgrado::find($id);
        $plan = PlanesEstudioPosgrado::where('id',$planId)->get()->first();
        $posgrado = Posgrado::where('id',$plan->posgrado_id)->get()->first();
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){
            $posgrados = Posgrado::all();
        }
        else
        {

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;
            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;

            $posgrados = Posgrado::where('id', $posgrado)->get();

             
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgrados = Posgrado::whereIn('id', [1, 5])->get();
            }

        }

        return view('System.Posgrados.Materias.edit', compact('data', 'posgrados', 'plan','posgrado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $planId, $id)
    {
        $request->validate([
            'posgrado_id' => 'required',
            'materia_posgrado' => 'required',
            'creditos_materia_pos' => 'required',
            'horas_semana_materia_pos' => 'required',
            'semestre_materia_pos' => 'required',
            'descripcion_materia_pos' => 'required',
            'requisitos_materia_pos' => 'required',
        ]);

        $data = MateriasPosgrado::find($id);
        $data->fill($request->all());
        $data->plan_estudios_id = $planId;
        if($request->esOptativa === 'on'){
            $data->optativa_materia_pos = 1;
        }else{
            $data->optativa_materia_pos = 0;
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.posgrados.materias.index', $planId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($planId, $id)
    {
        $materia = MateriasPosgrado::findOrFail($id);
        $materia->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.posgrados.materias.index', $planId));
    }
}
