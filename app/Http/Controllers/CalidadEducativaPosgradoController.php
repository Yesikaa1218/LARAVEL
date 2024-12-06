<?php

namespace App\Http\Controllers;

use App\Models\CalidadEducativaPosgrado;
use App\Models\Posgrado;
use Illuminate\Http\Request;

class CalidadEducativaPosgradoController extends Controller
{ 
    public function index()
    {
        return view('System.CalidadEducativa.Posgrados.index');
    }

    public function dataindex() {
        return datatables(CalidadEducativaPosgrado::with('posgrado')->get())
        ->addColumn('btn', 'System.CalidadEducativa.Posgrados.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $posgrados = Posgrado::all();
         
        return view('System.CalidadEducativa.Posgrados.create', compact('posgrados'));
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
            'mision' => 'required',
            'vision' => 'required',
            'objetivos' => 'required',
            'perfil_de_egresados' => 'required',
            'posgrado_id' => 'required',
        ]);

        $data = new CalidadEducativaPosgrado();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.calidad-educativa.posgrados.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CalidadEducativaPosgrado::find($id);
        $posgrados = Posgrado::all();

        return view('System.CalidadEducativa.Posgrados.edit', compact('data', 'posgrados'));
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
            'mision' => 'required',
            'vision' => 'required',
            'objetivos' => 'required',
            'perfil_de_egresados' => 'required',
            'posgrado_id' => 'required',
        ]);

        $data = CalidadEducativaPosgrado::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.calidad-educativa.posgrados.index'));
    }
    public function approve($id)
    {   
        $publicacion = CalidadEducativaPosgrado::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.calidad-educativa.posgrados.index'));
    }
}
