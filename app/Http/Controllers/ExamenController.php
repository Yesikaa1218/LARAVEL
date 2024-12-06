<?php

namespace App\Http\Controllers;
use App\Models\Examen;
use App\Models\MateriaLaboratorio;
use App\Models\TemaMateria;

use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index(){
        return view('System.LaboratorioMatematicas.Examen.index');
    }

    public function dataindex(){
        return datatables(Examen::all())
            ->addColumn('fecha_creacion', function (Examen $examen) {
                return \Carbon\Carbon::parse(strtotime($examen->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.LaboratorioMatematicas.Examen.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.LaboratorioMatematicas.Examen.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'periodo_academico' => 'required',
        ]);

        $data = new Examen();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.examen.index'));
    }

    public function edit($id){
        $data = Examen::find($id);
        return view('System.LaboratorioMatematicas.Examen.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'periodo_academico' => 'required',
        ]);

        $data = Examen::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Examen Editada Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.examen.index'));
    }

    public function destroy($id){
        $examen = Examen::findOrFail($id);
        $examen->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.examen.index'));
    }

    public function approve($id){
        $examen = Examen::findOrFail($id);
        $examen->active = 1;
        $examen->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.examen.index'));
    }

}
