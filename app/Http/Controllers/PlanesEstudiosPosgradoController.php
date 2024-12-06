<?php

namespace App\Http\Controllers;

use App\Models\PlanesEstudioPosgrado;
use App\Models\Posgrado;
use App\Models\Materia;
use App\Models\MateriasPosgrado;
use App\Models\PeriodoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanesEstudiosPosgradoController extends Controller {
    
    public function index() {
        return view('System.Posgrados.PlanesEstudios.index');
    }

    public function dataindex() {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin')){  
            return datatables(PlanesEstudioPosgrado::with('posgrado')->with('periodo_academico')->get())
            ->addColumn('btn', 'System.Posgrados.PlanesEstudios.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else{ 

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

            return datatables(PlanesEstudioPosgrado::with('posgrado')->with('periodo_academico')->where('posgrados.posgrado_id', $posgrados)->get())
            ->addColumn('btn', 'System.Posgrados.PlanesEstudios.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $periodo_academico= PeriodoAcademico::all();   
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
        $posgrados = Posgrado::all();
        }
        else{
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


        return view('System.Posgrados.PlanesEstudios.create', compact('posgrados','periodo_academico'));
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
            'name' => 'required',
            'periodo_academico'=> 'required',
            'posgrado_id' => 'required',
        ]);

        $posgrado = Posgrado::where('id',$request->posgrado_id)->get()->first();
        $periodo = PeriodoAcademico::where('id',$request->periodo_academico)->get()->first();
        
        $data = new PlanesEstudioPosgrado();
        $data->fill($request->all());
        $data->posgrado_id = $posgrado->id;
        $data->periodo_academico_id = $periodo->id;
        $data->save();
        
        
        flash('Plan de Estudios Registrado Correctamente')->success();
        return redirect(route('sistema.posgrados.planes-posgrado.index'));
    }
    
    public function edit($id){
        $data = PlanesEstudioPosgrado::find($id);
        $posgrados  = Posgrado::all();
        $periodo_academico= PeriodoAcademico::all();  
        return view('System.Posgrados.PlanesEstudios.edit', compact('data', 'posgrados','periodo_academico'));
}

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'periodo_academico'=> 'required',
            'posgrado_id' => 'required',
        ]);
        $posgrado = Posgrado::where('id',$request->posgrado_id)->get()->first();
        $periodo = PeriodoAcademico::where('id',$request->periodo_academico)->get()->first();
        
        $data =  PlanesEstudioPosgrado::find($id);
        $data->fill($request->all());
        $data->posgrado_id = $posgrado->id;
        $data->periodo_academico_id = $periodo->id;
        $data->save();
        flash('Plan de Estudios Editado Correctamente')->success();
        return redirect(route('sistema.posgrados.planes-posgrado.index'));
    }


    public function destroy($id)
    {
        $data = PlanesEstudioPosgrado::findOrFail($id);
        $data->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.posgrados.planes-posgrado.index'));
    }
}
