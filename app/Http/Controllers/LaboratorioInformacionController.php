<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\LaboratorioInformacion;
use App\Models\TemaMateria;
use App\Models\MateriaLaboratorio;
use App\Models\ProblemaLaboratorioExamen;
use DB;

class LaboratorioInformacionController extends Controller
{
    public function index($id) {
        $examen = Examen::find($id);
        $laboratoriaInformacion = LaboratorioInformacion::all();
        return view('System.LaboratorioMatematicas.LaboratorioInformacion.index', compact('examen', 'laboratoriaInformacion'));
    }

    public function dataindex($examenId) {
        $examen = Examen::find($examenId);
        $laboratorioInformacion = LaboratorioInformacion::all();
        return datatables(LaboratorioInformacion::with('materialaboratorio')->with('temamateria')->where('examen_id', $examenId)->get())
            ->addColumn('btn', 'System.LaboratorioMatematicas.LaboratorioInformacion.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create($examenId) {
        $examen = Examen::find($examenId);
        $materiaLaboratorio = MateriaLaboratorio::all();
        $temaMateria = TemaMateria::all();
        return view('System.LaboratorioMatematicas.LaboratorioInformacion.create', 
                compact('examen', 'materiaLaboratorio', 'temaMateria'));
    }

    public function store(Request $request, $examenId) {
        $request->validate([
            'materia_laboratorio_id' => 'required',
            'tema_materia_id' => 'required',
            'cantidad_problemas' => 'required',
        ]);

        $data = new LaboratorioInformacion();
        $data->fill($request->all());
        $data->examen_id = $examenId;

        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.laboratorio-informacion.index', ['examenId' => $examenId]));
    }

    public function edit($examenId, $id) { 
        $data = LaboratorioInformacion::find($id);
        $materiaLaboratorio = MateriaLaboratorio::all();
        $temaMateria = TemaMateria::all();
        $examen = Examen::find($examenId);

        return view('System.LaboratorioMatematicas.LaboratorioInformacion.edit', 
                compact('data', 'materiaLaboratorio', 'temaMateria', 'examen'));
    }

    public function update(Request $request, $examenId, $id)
    {
        $request->validate([
            'materia_laboratorio_id' => 'required',
            'tema_materia_id' => 'required',
            'cantidad_problemas' => 'required',
        ]);

        $data = LaboratorioInformacion::find($id);
        $data->fill($request->all());

        $examenId = $data->examen_id;

        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.laboratorio-informacion.index', ['examenId' => $examenId]));
    }

    public function destroy($examenId, $id)
    {
        $laboratorioInformacion = LaboratorioInformacion::findOrFail($id);
        $laboratorioInformacion->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.laboratorio-informacion.index', $examenId));
    }

    public function problemaLaboratorio($examenId,$id){
        $p_laboratorio = DB::select('CALL agregar_problemas_laboratorio(?,?)',array($examenId,$id));
        flash('El laboratorio ya genero los problemas del respectivo tema y materia')->success();
        return view('System.LaboratorioMatematicas.Examen.index', compact('p_laboratorio'));
    }

}
