<?php

namespace App\Http\Controllers;

use App\Models\PublicacionEmprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionesEmprendimientoController extends Controller
{
    public function index()
    {
        return view('System.Emprendimiento.Publicaciones.index');
    }

    public function dataindex(){
        return datatables(PublicacionEmprendimiento::all())
            ->addColumn('btn', 'System.Emprendimiento.Publicaciones.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Emprendimiento.Publicaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
        ]);

        $data = new PublicacionEmprendimiento();
        if($request->file('imagen')){
            $data->imagen = $request->file('imagen')->store('publicaciones_emprendimiento', 'public');
        }
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.emprendimiento.publicaciones.index'));
    }

    public function edit($id)
    {
        $data = PublicacionEmprendimiento::find($id);
        return view('System.Emprendimiento.Publicaciones.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
        ]);

        $data = PublicacionEmprendimiento::find($id);
        if($request->file('imagen') != ''){
            Storage::delete($data->imagen);

            $data->imagen = $request->file('imagen')->store('publicaciones_emprendimiento', 'public');
        }
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Publicación Editada Correctamente')->success();
        return redirect(route('sistema.emprendimiento.publicaciones.index'));
    }

    public function destroy($id)
    {
        $publicacion = PublicacionEmprendimiento::findOrFail($id);
        $publicacion->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.emprendimiento.publicaciones.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('publicaciones_emprendimiento', 'public');
        // Storage::disk('public')->put('publicaciones_emprendimiento', $request->file('file'));

        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function approve($id)
    {   
        $publicacion = PublicacionEmprendimiento::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.emprendimiento.publicaciones.index'));
    }
}
