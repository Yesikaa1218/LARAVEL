<?php

namespace App\Http\Controllers;

use App\Models\ActividadesCulturalesClubes;
use Illuminate\Http\Request;

class ActividadeCulturalesClubesController extends Controller
{
    public function dataindex(){
        return datatables(ActividadesCulturalesClubes::all())
            ->addColumn('fecha', function (ActividadesCulturalesClubes $actividadesCulturalesClubes) {
                return \Carbon\Carbon::parse(strtotime($actividadesCulturalesClubes->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.ActividadesCulturales.Clubes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.ActividadesCulturales.Clubes.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
            'slug' => 'required'
        ]);

        $data = new ActividadesCulturalesClubes();
        $data->fill($request->all());
        $data->save();

        flash('Club Agregado Correctamente')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }

    public function edit($id){
        $data = ActividadesCulturalesClubes::find($id);
        return view('System.ActividadesCulturales.Clubes.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
            'slug' => 'required'
        ]);

        $data = ActividadesCulturalesClubes::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Club Editado Correctamente')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }

    public function destroy($id)
    {
        $admin = ActividadesCulturalesClubes::findOrFail($id);
        $admin->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }

    public function approve($id)
    {
        $publicacion = ActividadesCulturalesClubes::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }

}
