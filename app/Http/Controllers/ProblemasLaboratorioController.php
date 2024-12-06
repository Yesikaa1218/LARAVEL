<?php

namespace App\Http\Controllers;
use App\Models\ProblemasLaboratorio;
use App\Models\MateriaLaboratorio;
use App\Models\TemaMateria;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProblemasLaboratorioController extends Controller
{
    public function index(){
        return view('System.LaboratorioMatematicas.ProblemaLaboratorio.index'); 
    }

    public function dataindex(){
        return datatables(ProblemasLaboratorio::with('materias')->with('temaateria')->get())
            ->addColumn('btn', 'System.LaboratorioMatematicas.ProblemaLaboratorio.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        $materiaLaboratorio = MateriaLaboratorio::all();
        $temaMateria = TemaMateria::all();
        return view('System.LaboratorioMatematicas.ProblemaLaboratorio.create', compact('materiaLaboratorio', 'temaMateria'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'problema' => 'required|image|mimes:jpeg,png',
        ]);

        $data = new ProblemasLaboratorio();
        $data->fill($request->all());
        if($request->file('problema')){
            // Almacena el archivo y recupera la ruta
            $path = $request->file('problema')->store('storage/problemaLaboratorio', 'public');

            // Ajusta la ruta para quitar el prefijo 'storage/'
            $path = str_replace('storage/', '', $path);

            // Guarda la ruta ajustada en la base de datos
            $data->problema = $path;
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.problemaLaboratorio.index'));
    }

    public function edit($id){
        $data = ProblemasLaboratorio::find($id);
        $materiaLaboratorio = MateriaLaboratorio::all();
        $temaMateria = TemaMateria::all();
        return view('System.LaboratorioMatematicas.ProblemaLaboratorio.edit', compact('data', 'materiaLaboratorio', 'temaMateria'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'problema' => 'sometimes|image|mimes:jpeg,png', 
        ]);

        $data = ProblemasLaboratorio::find($id);
        $data->fill($request->all());
        if($request->file('problema') != ''){
            Storage::delete($data->problema); 
            // Almacena el archivo y recupera la ruta
            $path = $request->file('problema')->store('storage/problemaLaboratorio', 'public');

            // Ajusta la ruta para quitar el prefijo 'storage/'
            $path = str_replace('storage/', '', $path);

            // Guarda la ruta ajustada en la base de datos
            $data->problema = $path;
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.problemaLaboratorio.index'));
    }

    public function destroy($id){
        $problemaLaboratorio = ProblemasLaboratorio::findOrFail($id);
        $problemaLaboratorio->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.laboratorio-matematicas.problemaLaboratorio.index'));
    }

    public function fotoProblema($id){
        $data = ProblemasLaboratorio::find($id);
        return view('System.LaboratorioMatematicas.ProblemaLaboratorio.problema', compact('data'));
    }

    public function getProblemsByType($typeId) {
        $problems = ProblemasLaboratorio::where('tema_materia_id', $typeId)->get();
        return response()->json($problems);
    }

    public function getProblemImage($id) {
        $problem = ProblemasLaboratorio::find($id);
        return response()->json(['problema' => $problem->problema]);
    }
    


}
