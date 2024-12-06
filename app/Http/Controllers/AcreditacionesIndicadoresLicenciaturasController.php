<?php

namespace App\Http\Controllers;

use App\Models\Semestres;
use App\Models\AcreditacionesIndicadoresLicenciaturas;
use App\Models\Licenciatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcreditacionesIndicadoresLicenciaturasController extends Controller
{
    public function index()
    {
        return view('System.Escolar.IndicadoresLicenciaturas.index');
    }


    public function dataindex()
    {
        return datatables(AcreditacionesIndicadoresLicenciaturas::with('licenciatura')->with('semestre')->get())
            ->addColumn('btn', 'System.Escolar.IndicadoresLicenciaturas.btn')
            ->rawColumns(['btn', 'color_data'])
            ->toJson();
    }

    public function create()
    {
        $semestres = Semestres::all();
        $data = Licenciatura::all();
        return view('System.Escolar.IndicadoresLicenciaturas.create', compact('data', 'semestres'));
    }

    public function data()
    {
        return datatables(AcreditacionesIndicadoresLicenciaturas::with('licenciatura')->with('semestre')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'licenciatura_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = new AcreditacionesIndicadoresLicenciaturas();
        $data->fill($request->all());
        if ($request->file('imagen')) {
            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->save();

        flash('Indicador Registrado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.licenciaturas.index'));
    }

    public function edit($id){
        $data = AcreditacionesIndicadoresLicenciaturas::find($id);
        $licenciaturas = Licenciatura::all();
        $semestres = Semestres::all();

        return view('System.Escolar.IndicadoresLicenciaturas.edit', compact('data', 'licenciaturas', 'semestres'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'semestre_id' => 'required',
            'licenciatura_id' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $data = AcreditacionesIndicadoresLicenciaturas::find($id);
        $data->fill($request->all());
        if($request->file('imagen')) {
            Storage::delete($data->imagen);

            $data->imagen = $request->file('imagen')->store('indicadores', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Indicador Editador Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.licenciaturas.index'));
    }

    public function destroy($id){
        $data = AcreditacionesIndicadoresLicenciaturas::find($id);
        $data->delete();

        flash('Indicador Eliminado Correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.licenciaturas.index'));
    }

    public function approve($id)
    {   
        $publicacion = AcreditacionesIndicadoresLicenciaturas::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.escolar.indicadores.licenciaturas.index'));
    }
}
