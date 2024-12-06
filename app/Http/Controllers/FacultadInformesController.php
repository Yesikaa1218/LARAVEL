<?php

namespace App\Http\Controllers;

use App\Models\FacultadInforme;
use Illuminate\Http\Request;

class FacultadInformesController extends Controller
{
    public function index()
    {
        return view('System.Facultad.Informes.index');
    }

    public function dataindex(){
        return datatables(FacultadInforme::all())
            ->addColumn('btn', 'System.Facultad.Informes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Facultad.Informes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf' => 'sometimes|mimes:pdf',
        ]);

        $data = new FacultadInforme();
        $data->fill($request->all());
        if($request->file('pdf')) {
            $data->pdf = $request->file('pdf')->store('facultad_pdf', 'public');
        }
        $data->save();

        flash('Informe agregado correctamente')->success();
        return redirect(route('sistema.facultad.informes.index'));
    }

    public function edit($id)
    {
        $data = FacultadInforme::find($id);
        return view('System.Facultad.Informes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = FacultadInforme::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Informe editado correctamente')->success();
        return redirect(route('sistema.facultad.informes.index'));
    }

    public function destroy($id)
    {
        $informe = FacultadInforme::findOrFail($id);
        $informe->delete();

        flash('Registro eliminado Correctamente')->success();
        return redirect(route('sistema.facultad.informes.index'));
    }

    public function approve($id)
    {   
        $informe = FacultadInforme::findOrFail($id);
        $informe->active = 1;
        $informe->update();

        flash('Informe aprobado correctamente')->success();
        return redirect(route('sistema.facultad.informes.index'));
    }
}
