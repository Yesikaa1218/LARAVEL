<?php

namespace App\Http\Controllers;

use App\Models\Semestres;
use App\Models\AcreditacionesIndicadoresPosgrado;
use App\Models\Licenciatura;
use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcreditacionesIndicadoresPosgradoController extends Controller
{
    public function index()
    {
        return view('System.Escolar.IndicadoresPosgrados.index');
    }


    public function dataindex()
    {
        return datatables(AcreditacionesIndicadoresPosgrado::with('posgrado')->with('semestre')->get())
            ->addColumn('btn', 'System.Escolar.IndicadoresPosgrados.btn')
            ->rawColumns(['btn', 'color_data'])
            ->toJson();
    }

    public function create()
    {
        $semestres = Semestres::all();
        $posgrados = Posgrado::all();
        return view('System.Escolar.IndicadoresPosgrados.create', compact('posgrados', 'semestres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'posgrado_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = new AcreditacionesIndicadoresPosgrado();
        $data->fill($request->all());
        if ($request->file('imagen')) {
            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->save();

        flash('Indicador Registrado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.posgrados.index'));
    }

    public function edit($id){
        $data = AcreditacionesIndicadoresPosgrado::find($id);
        $posgrados = Posgrado::all();
        $semestres = Semestres::all();

        return view('System.Escolar.IndicadoresPosgrados.edit', compact('data', 'posgrados', 'semestres'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'posgrado_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = AcreditacionesIndicadoresPosgrado::find($id);
        $data->fill($request->all());
        if($request->file('imagen')) {
            Storage::delete($data->imagen);

            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Indicador Editador Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.posgrados.index'));
    }

    public function destroy($id){
        $data = AcreditacionesIndicadoresPosgrado::find($id);
        $data->delete();

        flash('Indicador Eliminado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.posgrados.index'));
    }

    public function approve($id)
    {   
        $publicacion = AcreditacionesIndicadoresPosgrado::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.posgrados.index'));
    }
}
