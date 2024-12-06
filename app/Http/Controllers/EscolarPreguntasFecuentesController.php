<?php

namespace App\Http\Controllers;

use App\Models\EscolarPreguntasFecuentes;
use App\Models\MateriasPosgrado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscolarPreguntasFecuentesController extends Controller
{
    public function index()
    {
        return view('System.Escolar.PreguntasFrecuentes.index');
    }

    public function dataindex()
    {
        return datatables(EscolarPreguntasFecuentes::all())
            ->addColumn('fecha', function (EscolarPreguntasFecuentes $user) {
                return \Carbon\Carbon::parse(strtotime($user->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.Escolar.PreguntasFrecuentes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Escolar.PreguntasFrecuentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = new EscolarPreguntasFecuentes();
        $data->slug = Carbon::now();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.escolar.preguntas.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = EscolarPreguntasFecuentes::find($id);
        return view('System.Escolar.PreguntasFrecuentes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = EscolarPreguntasFecuentes::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.escolar.preguntas.index'));
    }

    public function destroy($id)
    {
        $pregunta = EscolarPreguntasFecuentes::findOrFail($id);
        $pregunta->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.escolar.preguntas.index'));
    }

    public function approve($id)
    {
        $publicacion = EscolarPreguntasFecuentes::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.escolar.preguntas.index'));
    }


}
