<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisciplinaDeportiva;

class DisciplinasDeportivasController extends Controller
{
    public function index()
    {
        return view('System.Deportivo.Disciplinas.index');
    }

    public function dataindex()
    {
        return datatables(DisciplinaDeportiva::all())
            ->addColumn('btn', 'System.Deportivo.Disciplinas.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Deportivo.Disciplinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $data = new DisciplinaDeportiva();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.deportivo.disciplinas.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = DisciplinaDeportiva::find($id);
        return view('System.Deportivo.Disciplinas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $data = DisciplinaDeportiva::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.deportivo.disciplinas.index'));
    }

    public function destroy($id)
    {
        $disciplina = DisciplinaDeportiva::findOrFail($id);
        $disciplina->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.deportivo.disciplinas.index'));
    }

    public function approve($id)
    {
        $publicacion = DisciplinaDeportiva::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.deportivo.disciplinas.index'));
    }


}
