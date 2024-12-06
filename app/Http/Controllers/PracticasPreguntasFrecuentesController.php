<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PracticasPreguntasFrecuentes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PracticasPreguntasFrecuentesController extends Controller
{

    public function index()
    {
        return view('System.PracticasProfesionales.PreguntasFrecuentes.index');
    }

    public function dataindex()
    {
        return datatables(PracticasPreguntasFrecuentes::all())
            ->addColumn('fecha', function (PracticasPreguntasFrecuentes $user) {
                return \Carbon\Carbon::parse(strtotime($user->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.PracticasProfesionales.PreguntasFrecuentes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.PracticasProfesionales.PreguntasFrecuentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = new PracticasPreguntasFrecuentes();
        $data->slug = Carbon::now();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.practicas-profesionales.preguntas.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = PracticasPreguntasFrecuentes::find($id);
        return view('System.PracticasProfesionales.PreguntasFrecuentes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = PracticasPreguntasFrecuentes::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.practicas-profesionales.preguntas.index'));
    }

    public function destroy($id)
    {
        $pregunta = PracticasPreguntasFrecuentes::findOrFail($id);
        $pregunta->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.practicas-profesionales.preguntas.index'));
    }

    public function approve($id)
    {
        $publicacion = PracticasPreguntasFrecuentes::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.practicas-profesionales.preguntas.index'));
    }
    
}
