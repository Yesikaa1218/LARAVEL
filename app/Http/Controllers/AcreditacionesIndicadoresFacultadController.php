<?php

namespace App\Http\Controllers;

use App\Models\AcreditacionesIndicadoresFacultad;
use App\Models\Semestres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcreditacionesIndicadoresFacultadController extends Controller
{
    public function index()
    {
        return view('System.Escolar.IndicadoresFacultad.index');
    }


    public function dataindex()
    {
        return datatables(AcreditacionesIndicadoresFacultad::with('semestre')->get())
            ->addColumn('btn', 'System.Escolar.IndicadoresFacultad.btn')
            ->rawColumns(['btn', 'color_data'])
            ->toJson();
    }

    public function create()
    {
        $semestres = Semestres::all();
        return view('System.Escolar.IndicadoresFacultad.create', compact('semestres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = new AcreditacionesIndicadoresFacultad();
        $data->fill($request->all());
        if ($request->file('imagen')) {
            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->save();

        flash('Indicador Registrado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.facultad.index'));
    }

    public function edit($id)
    {
        $semestres = Semestres::all();
        $data = AcreditacionesIndicadoresFacultad::find($id);
        return view('System.Escolar.IndicadoresFacultad.edit', compact('data', 'semestres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = AcreditacionesIndicadoresFacultad::find($id);
        $data->fill($request->all());
        if($request->file('imagen')) {
            Storage::delete($data->imagen);

            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Indicador Editado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.facultad.index'));
    }

    public function destroy($id)
    {
        $data = AcreditacionesIndicadoresFacultad::find($id);
        $data->delete();
        flash('Indicador Eliminado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.facultad.index'));
    }

    public function approve($id)
    {   
        $publicacion = AcreditacionesIndicadoresFacultad::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.facultad.index'));
    }
}
