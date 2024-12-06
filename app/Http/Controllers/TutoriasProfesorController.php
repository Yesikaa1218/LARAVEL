<?php

namespace App\Http\Controllers;

use App\Models\TutoriasProfesor;

use Illuminate\Http\Request;

class TutoriasProfesorController extends Controller
{
    public function index()
    {
        return view('System.Asesorias.Profesores.index');
    }

    public function dataindex() {
            
        return datatables(TutoriasProfesor::all())
        ->addColumn('btn', 'System.Asesorias.Profesores.btn')
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
        return view('System.Asesorias.Profesores.create');
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
            'nombre_profesor' => 'required',
            'email' => 'required',
            'semestre' => 'required',
        ]);

        $data = new TutoriasProfesor();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.asesorias.profesores.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TutoriasProfesor::find($id);

        return view('System.Asesorias.Profesores.edit', compact('data'));
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
            'nombre_profesor' => 'required',
            'email' => 'required',
            'semestre' => 'required',
        ]);

        $data = TutoriasProfesor::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.asesorias.profesores.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = TutoriasProfesor::findOrFail($id);
        $profesor->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.asesorias.profesores.index'));
    }

    public function approve($id)
    {   
        $publicacion = TutoriasProfesor::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.asesorias.profesores.index'));
    }
}
