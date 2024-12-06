<?php

namespace App\Http\Controllers;

use App\Models\ProfesorEmerito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesoresEmeritosController extends Controller
{
    public function index()
    {
        return view('System.Facultad.ProfesoresEmeritos.index');
    }

    public function dataindex(){
        return datatables(ProfesorEmerito::all())
            ->addColumn('btn', 'System.Facultad.ProfesoresEmeritos.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Facultad.ProfesoresEmeritos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'biography' => 'required',
            'image' => 'required|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
        ]);

        $data = new ProfesorEmerito();
        $data->fill($request->all());
        if($request->file('image')) {
            $data->image = $request->file('image')->store('profesores_emeritos', 'public');
        }
        $data->save();

        flash('Sección agregada Correctamente')->success();
        return redirect(route('sistema.facultad.profesores-emeritos.index'));
    }

    public function edit($id)
    {
        $data = ProfesorEmerito::find($id);
        return view('System.Facultad.ProfesoresEmeritos.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'biography' => 'required',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
        ]);

        $data = ProfesorEmerito::find($id);
        $data->fill($request->all());
        if($request->file('image') != '') {
            Storage::delete($data->image);

            $data->image = $request->file('image')->store('profesores_emeritos', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Registro editado correctamente')->success();
        return redirect(route('sistema.facultad.profesores-emeritos.index'));
    }

    public function destroy($id)
    {
        $profesor = ProfesorEmerito::findOrFail($id);
        $profesor->delete();

        flash('Registro eliminado Correctamente')->success();
        return redirect(route('sistema.facultad.profesores-emeritos.index'));
    }

    public function approve($id)
    {   
        $profesor = ProfesorEmerito::findOrFail($id);
        $profesor->active = 1;
        $profesor->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.facultad.profesores-emeritos.index'));
    }
}
