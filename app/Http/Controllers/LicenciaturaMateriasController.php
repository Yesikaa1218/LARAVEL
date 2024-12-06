<?php

namespace App\Http\Controllers;

use App\Exports\UnidadesAprendizajeLicenciaturaExport;
use App\Imports\UnidadesAprendizajeLicenciaturaImport;
use App\Models\Licenciatura;
use App\Models\Materia;
use App\Models\PlanEstudios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use PharIo\Manifest\License;

class LicenciaturaMateriasController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $plan = PlanEstudios::find($id);
        $licenciatura = Licenciatura::find($plan->licenciatura_id);
        return view('System.Licenciaturas.Materias.index', compact('plan', 'licenciatura'));
    }

    public function dataindex($planId){
        $user = Auth::user();
        // if($user->hasanyrole('SuperAdmin')){  
        //         return datatables(Materia::with('licenciatura')->get())
        //     ->addColumn('dtOptativa',  function(Materia $unidadesdeaprendisaje) {
        //         if($unidadesdeaprendisaje->optativa_materia_lic === 0) {
        //             return 'No';
        //         }else{
        //             return 'Sí';
        //         }
        //     })
        //     ->addColumn('btn', 'System.Licenciaturas.Materias.btn')
        //     ->rawColumns(['btn'])
        //     ->toJson();
        // }
        // else{
        //   if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
        //   if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
        //   if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
        //   if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
        //   if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
        //   if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

        // }



        $plan = PlanEstudios::find($planId);

        return datatables(Materia::where('plan_de_estudio_id', $planId)->where('licenciatura_id', $plan->licenciatura_id)->get())
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
 
    public function create($planId) {  
        $user = Auth::user();

        // if($user->hasanyrole('SuperAdmin')) {  
        //     $licenciaturas = Licenciatura::all();
        // }
        // else {
        //}

        $plan = PlanEstudios::find($planId);
        $licenciatura = Licenciatura::find($plan->licenciatura_id);

        return view('System.Licenciaturas.Materias.create', compact('licenciatura', 'plan'));
    }

    public function store(Request $request, $planId)
    {
        $request->validate([
            'materia_licenciatur' => 'required',
            'creditos_materia_lic' => 'required',
            'horas_semana_materia_lic' => 'required',
            'semestre_materia_lic' => 'required',
            'descripcion_materia_lic' => 'required',
            'requisitos_materia_lic' => 'required',
        ]);

        $data = new Materia();
        $data->fill($request->all());
        $data->plan_de_estudio_id = $planId;

        $plan = PlanEstudios::find($planId);
        $data->licenciatura_id = $plan->licenciatura_id;

        if($request->esOptativa === 'on'){
            $data->optativa_materia_lic = 1;
        }else {
            $data->optativa_materia_lic = 0;
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index', ['planId' => $planId]));
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
    public function edit($planId, $id) {
        $data = Materia::find($id);
        $user = Auth::user(); 
        $plan = PlanEstudios::find($planId);
        $licenciatura = Licenciatura::find($plan->licenciatura_id);

        return view('System.Licenciaturas.Materias.edit', compact('data', 'licenciatura', 'plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Planid, $id)
    {
        $request->validate([
            'materia_licenciatur' => 'required',
            'creditos_materia_lic' => 'required',
            'horas_semana_materia_lic' => 'required',
            'semestre_materia_lic' => 'required',
            'descripcion_materia_lic' => 'required',
            'requisitos_materia_lic' => 'required',
        ]);

        $data = Materia::find($id);
        $data->fill($request->all());

        $planId = $data->plan_de_estudio_id;

        if($request->esOptativa === 'on'){
            $data->optativa_materia_lic = 1;
        }else {
            $data->optativa_materia_lic = 0;
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index', ['planId' => $planId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($planId, $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index', $planId));
    }
    
    public function approve($id)
    {   
        $publicacion = Materia::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.licenciaturas.materias.index'));
    }

    public function import($planId){
        $plan = PlanEstudios::find($planId);
        $licenciatura = Licenciatura::find($plan->licenciatura_id);
        return view('System.Licenciaturas.Materias.importview', compact( 'licenciatura', 'plan'));
    }

    public function importUpload(Request $request, $planId){
        $plan = PlanEstudios::find($planId);
        $licenciatura = Licenciatura::find($plan->licenciatura_id);

        $data = [
            'planId' => $planId,
            'licenciaturaId' => $plan->licenciatura_id,
        ]; 

        $file = $request->file('file');
        Excel::import(new UnidadesAprendizajeLicenciaturaImport($data), $file);
        return back()->with('success', 'User Imported Successfully.');
    }

    public function export($planId){
        $plan = PlanEstudios::with('licenciatura')->where('id', $planId)->first();
        return Excel::download(new UnidadesAprendizajeLicenciaturaExport($planId), 'Unidades Aprendizaje '.$plan->licenciatura->nombre_licenciatura.' - PLAN '.$plan->name.'.xlsx');
    }

    public function download(){
        $file= public_path(). "/assets/plantillas/PlantillaUnidadAprendizajeLicenciatura.xlsx";

        $headers = array(
            'Content-Type: application/xlsx',
        );
    
        return Response::download($file, 'PlantillaUnidadAprendizajeLicenciatura.xlsx', $headers);
    }
}
