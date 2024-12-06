<?php

namespace App\Http\Controllers;
use App\Models\MateriaLaboratorio;
use Illuminate\Http\Request;

class MateriaLaboratorioController extends Controller
{
    public function index(){
        return view('System.LaboratorioMatematicas.MateriaLaboratorio.index');
    }

    public function dataindex(){
        return datatables(MateriaLaboratorio::all())
            ->addColumn('btn', 'System.LaboratorioMatematicas.MateriaLaboratorio.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.LaboratorioMatematicas.MateriaLaboratorio.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
        ]);

        $data = new MateriaLaboratorio();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.materiaLaboratorio.index'));
    }
    
    public function edit($id){
        $data = MateriaLaboratorio::find($id);
        return view('System.LaboratorioMatematicas.MateriaLaboratorio.edit', compact('data'));
    }
 
    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required',
        ]);

        $data = MateriaLaboratorio::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.materiaLaboratorio.index'));
    }

    public function destroy($id){
        $materiaLaboratorio = MateriaLaboratorio::findOrFail($id);
        $materiaLaboratorio->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.materiaLaboratorio.index'));
    }
   
}
