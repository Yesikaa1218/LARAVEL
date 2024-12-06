<?php

namespace App\Http\Controllers;

use App\Models\ExDirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExDirectoresController extends Controller
{
    public function index()
    {
        return view('System.Facultad.ExDirectores.index');
    }

    public function dataindex(){
        return datatables(ExDirector::all())
            ->addColumn('btn', 'System.Facultad.ExDirectores.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Facultad.ExDirectores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'biography' => 'required',
            'image' => 'required|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
        ]);

        $data = new ExDirector();
        $data->fill($request->all());
        if($request->file('image') != '') {
            $data->image = $request->file('image')->store('facultad', 'public');
        }
        $data->save();

        flash('Sección agregada Correctamente')->success();
        return redirect(route('sistema.facultad.ex-directores.index'));
    }

    public function edit($id)
    {
        $data = ExDirector::find($id);
        return view('System.Facultad.ExDirectores.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'biography' => 'required',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
        ]);

        $data = ExDirector::find($id);
        $data->fill($request->all());
        if($request->file('image')) {
            Storage::delete($data->image);

            $data->image = $request->file('image')->store('facultad', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Registro editado correctamente')->success();
        return redirect(route('sistema.facultad.ex-directores.index'));
    }

    public function destroy($id)
    {
        $profesor = ExDirector::findOrFail($id);
        $profesor->delete();

        flash('Registro eliminado Correctamente')->success();
        return redirect(route('sistema.facultad.ex-directores.index'));
    }

    public function approve($id)
    {   
        $profesor = ExDirector::findOrFail($id);
        $profesor->active = 1;
        $profesor->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.facultad.ex-directores.index'));
    }
}
