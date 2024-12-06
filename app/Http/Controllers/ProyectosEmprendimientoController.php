<?php

namespace App\Http\Controllers;

use App\Models\ProyectosEmprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectosEmprendimientoController extends Controller
{
    public function index()
    {
        return view('System.Emprendimiento.Proyectos.index');
    }

    public function dataindex(){
        return datatables(ProyectosEmprendimiento::all())
            ->addColumn('btn', 'System.Emprendimiento.Proyectos.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Emprendimiento.Proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estatus' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
        ]);

        $data = new ProyectosEmprendimiento();
        if($request->file('imagen')){
            $data->imagen = $request->file('imagen')->store('proyectos_emprendimiento', 'public');
        }
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.emprendimiento.proyectos.index'));
    }

    public function edit($id)
    {
        $data = ProyectosEmprendimiento::find($id);
        return view('System.Emprendimiento.Proyectos.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estatus' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
        ]);

        $data = ProyectosEmprendimiento::find($id);
        if($request->file('imagen') != ''){
            Storage::delete($data->imagen);

            $data->imagen = $request->file('imagen')->store('proyectos_emprendimiento', 'public');
        }
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Noticia Editada Correctamente')->success();
        return redirect(route('sistema.emprendimiento.proyectos.index'));
    }

    public function destroy($id)
    {
        $noticia = ProyectosEmprendimiento::findOrFail($id);
        $noticia->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.emprendimiento.proyectos.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('proyectos_emprendimiento', 'public');
        // Storage::disk('public')->put('publicaciones_emprendimiento', $request->file('file'));

        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function approve($id)
    {   
        $proyecto = ProyectosEmprendimiento::findOrFail($id);
        $proyecto->active = 1;
        $proyecto->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.emprendimiento.proyectos.index'));
    }
}
