<?php

namespace App\Http\Controllers;
use App\Models\TemaMateria;

use Illuminate\Http\Request;

class TemaMateriaController extends Controller
{
    public function index(){
        return view('System.LaboratorioMatematicas.TemaMateria.index');
    }

    public function dataindex(){
        return datatables(TemaMateria::all())
            ->addColumn('btn', 'System.LaboratorioMatematicas.TemaMateria.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.LaboratorioMatematicas.TemaMateria.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'titulo' => 'sometimes',
            'dato_extra' => 'sometimes', 
        ]);

        $data = new TemaMateria();
        $data->fill($request->all());
        if($request->file('dato_extra')) {
            $data->dato_extra = $request->file('dato_extra')->store('datoExtraLaboratorio', 'public');
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.temaMateria.index'));
    }
    
    public function edit($id){
        $data = TemaMateria::find($id);
        return view('System.LaboratorioMatematicas.TemaMateria.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required',
            'titulo' => 'sometimes',
            'dato_extra' => 'sometimes'
        ]);

        $data = TemaMateria::find($id);
        $data->fill($request->all());
        if($request->file('dato_extra')) {
            Storage::delete($data->dato_extra);
            $data->dato_extra = $request->file('dato_extra')->store('datoExtraLaboratorio', 'public');
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.temaMateria.index'));
    }

    public function destroy($id){
        $temaMateria = TemaMateria::findOrFail($id);
        $temaMateria->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.temaMateria.index'));
    }
}
