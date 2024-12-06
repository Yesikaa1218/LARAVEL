<?php

namespace App\Http\Controllers;

use App\Models\LogrosPosgrado;
use App\Models\PosgradoProfesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogrosPosgradoController extends Controller
{
    public function dataindex(){
            return datatables(LogrosPosgrado::get())
            ->addColumn('btn', 'System.Posgrados.LogrosProfesores.btn')
            ->rawColumns(['btn'])
            ->toJson();
    
    }

    public function index(){
        $data = LogrosPosgrado::get();
        return view('System.Posgrados.LogrosProfesores.index', compact('data'));
    }

    public function create(){
        $profesores = PosgradoProfesor::all();
        return view('System.Posgrados.LogrosProfesores.create', compact('profesores'));
    }

    public function store(Request $request){
        $request->validate([
            'descripcion' => 'required',
            'nombre_profesor' => 'required',
            'archivo' => 'mimes:pdf',
            'titulo' => 'required',
        ]);

        $profesor = PosgradoProfesor::where('id', $request->nombre_profesor)->get()->first();
        /* $logro = LogrosPosgrado::create([
            'descripcion' => $request->descripcion,
            'nombre_profesor' => $profesor->nombre_profesor,
            'posgrado_profesores_id' => $profesor->id,
            'archivo' => $request->archivo,
        ]); */
        $logro = new LogrosPosgrado();
        $logro->fill($request->all());
        $logro->nombre_profesor = $profesor->nombre_profesor;
        $logro->posgrado_profesores_id = $profesor->id;
        if($request->file('archivo')){
            $logro->archivo = $request->file('archivo')->store('documentos', 'public');
        }

        //$logro->fill($request->all());
        $logro->active = 0;
        $logro->save();
        flash('Registro creado correctamente')->success();
        return redirect()->route('sistema.posgrados.logros-profesores.index'); 
    }

    public function edit($id){
        $data = LogrosPosgrado::findOrFail($id);
        $profesores = PosgradoProfesor::get();
        return view('System.Posgrados.LogrosProfesores.edit', compact('data', 'profesores'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'descripcion' => 'required',
            'nombre_profesor' => 'required',
            'archivo' => 'mimes:pdf',
            'titulo' => 'required',
        ]); 
        $logro = LogrosPosgrado::findOrFail($id);
        $profesor = PosgradoProfesor::where('id', $request->nombre_profesor)->get()->first();
        if($request->archivo){
            $logro->fill($request->all());
            if($request->file('archivo')){
                Storage::delete($logro->archivo);
                $logro->archivo = $request->file('archivo')->store('documentos', 'public');
            }
            
        }else{
            $logro->descripcion = $request->descripcion;
            $logro->titulo = $request->titulo;
        }
        $logro->nombre_profesor = $profesor->nombre_profesor;
        $logro->posgrado_profesores_id = $profesor->id;
        
        $logro->update();
        //$logro->active = 0;
        flash('Registro actualizado correctamente')->success();
        return redirect()->route('sistema.posgrados.logros-profesores.index'); 
    }

    public function destroy($id){
        $logro = LogrosPosgrado::findOrFail($id);
        $logro->delete();
        flash('Registro eliminado correctamente')->success();
        return redirect()->route('sistema.posgrados.logros-profesores.index');
       
    }

    public function approve($id){
        $logrosData = LogrosPosgrado::findOrFail($id);

        $logrosData->active = 1;
        $logrosData->update();
        flash('Registro aprobado correctamente')->success();
        return redirect()->route('sistema.posgrados.logros-profesores.index');
    }
}
