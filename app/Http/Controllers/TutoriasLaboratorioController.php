<?php

namespace App\Http\Controllers;

use App\Models\TutoriasLaboratorio;
use App\Models\Licenciatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutoriasLaboratorioController extends Controller
{
    public function index()
    {
        return view('System.Asesorias.Laboratorios.index');
    }

    public function dataindex(){
        return datatables(TutoriasLaboratorio::with('licenciatura')->get())
        ->addColumn('btn', 'System.Asesorias.Laboratorios.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function create()
    {
        $licenciaturas = Licenciatura::all();

        return view('System.Asesorias.Laboratorios.create', compact('licenciaturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'licenciatura_id' => 'required',
            'nombre_laboratorio' => 'required',
            'url_laboratorio' => 'required|mimes:pdf'
        ]);


        $data = new TutoriasLaboratorio();
        $data->fill($request->all());
        if($request->file('url_laboratorio')){
            $data->url_laboratorio = $request->file('url_laboratorio')->store('laboratorios', 'public');
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.asesorias.laboratorios.index'));
    }

    public function edit($id)
    {
        $data = TutoriasLaboratorio::find($id);
        $licenciaturas = Licenciatura::all();

        return view('System.Asesorias.Laboratorios.edit', compact('data', 'licenciaturas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'licenciatura_id' => 'required',
            'nombre_laboratorio' => 'required',
            'url_laboratorio' => 'required|mimes:pdf',
        ]);

        $data = TutoriasLaboratorio::find($id);
        $data->fill($request->all());
        if($request->file('url_laboratorio') != '')
        {
            Storage::delete($data->url_laboratorio);
            $data->url_laboratorio = $request->file('url_laboratorio')->store('laboratorios', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.asesorias.laboratorios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laboratorio = TutoriasLaboratorio::findOrFail($id);
        Storage::delete($laboratorio->url_laboratorio);
        $laboratorio->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.asesorias.laboratorios.index'));
    }

    public function approve($id)
    {   
        $publicacion = TutoriasLaboratorio::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.asesorias.laboratorios.index'));
    }
}
