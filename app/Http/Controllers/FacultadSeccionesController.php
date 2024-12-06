<?php

namespace App\Http\Controllers;

use App\Models\FacultadSeccion;
use Illuminate\Http\Request;

class FacultadSeccionesController extends Controller
{
    public function index()
    {
        return view('System.Facultad.Secciones.index');
    }

    public function dataindex(){
        return datatables(FacultadSeccion::all())
            ->addColumn('btn', 'System.Facultad.Secciones.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Facultad.Secciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content_page' => 'required',
            'pdf_url' => 'sometimes|mimes:pdf',
        ]);

        $data = new FacultadSeccion();
        $data->fill($request->all());
        if($request->file('pdf_url')) {
            $filePath = $request->file('pdf_url')->store('storage/facultad_pdf', 'custom_public');
            $data->pdf_url = str_replace('storage/', '', $filePath);
        }
        $data->save();

        flash('Sección agregada Correctamente')->success();
        return redirect(route('sistema.facultad.secciones.index'));
    }

    public function edit($id)
    {
        $data = FacultadSeccion::find($id);
        return view('System.Facultad.Secciones.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content_page' => 'required',
        ]);

        $data = FacultadSeccion::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Sección editada correctamente')->success();
        return redirect(route('sistema.facultad.secciones.index'));
    }

    public function destroy($id)
    {
        $seccion = FacultadSeccion::findOrFail($id);
        $seccion->delete();

        flash('Registro eliminado Correctamente')->success();
        return redirect(route('sistema.facultad.secciones.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('facultad', 'public');

        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function approve($id)
    {   
        $seccion = FacultadSeccion::findOrFail($id);
        $seccion->active = 1;
        $seccion->update();

        flash('Sección aprobada correctamente')->success();
        return redirect(route('sistema.facultad.secciones.index'));
    }
}
