<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TesoreriaPreguntasFrecuentes;
use Illuminate\Support\Facades\Auth;

class TesoreriaPreguntasFrecuentesController extends Controller
{
    public function index()
    {
        return view('System.Tesoreria.PreguntasFrecuentes.index');
    }

    public function dataindex()
    {
        return datatables(TesoreriaPreguntasFrecuentes::all())
            ->addColumn('fecha', function (TesoreriaPreguntasFrecuentes $user) {
                return \Carbon\Carbon::parse(strtotime($user->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.Tesoreria.PreguntasFrecuentes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Tesoreria.PreguntasFrecuentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = new TesoreriaPreguntasFrecuentes();
        $data->slug = Carbon::now();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.tesoreria.preguntas.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = TesoreriaPreguntasFrecuentes::find($id);
        return view('System.Tesoreria.PreguntasFrecuentes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = TesoreriaPreguntasFrecuentes::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.tesoreria.preguntas.index'));
    }

    public function destroy($id)
    {
        $pregunta = TesoreriaPreguntasFrecuentes::findOrFail($id);
        $pregunta->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.tesoreria.preguntas.index'));
    }

    public function approve($id)
    {
        $publicacion = TesoreriaPreguntasFrecuentes::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.tesoreria.preguntas.index'));
    }}
