<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EscolarPreguntasFecuentes;
use App\Models\ServicioPreguntasFrecuentes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServicioPreguntasFrecuentesController extends Controller
{
    public function index()
    {
        return view('System.ServicioSocial.PreguntasFrecuentes.index');
    }

    public function dataindex()
    {
        return datatables(ServicioPreguntasFrecuentes::all())
            ->addColumn('fecha', function (ServicioPreguntasFrecuentes $user) {
                return \Carbon\Carbon::parse(strtotime($user->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.ServicioSocial.PreguntasFrecuentes.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.ServicioSocial.PreguntasFrecuentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = new ServicioPreguntasFrecuentes();
        $data->slug = Carbon::now();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.servicio-social.preguntas.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = ServicioPreguntasFrecuentes::find($id);
        return view('System.ServicioSocial.PreguntasFrecuentes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content_page' => 'required',
        ]);

        $data = ServicioPreguntasFrecuentes::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.servicio-social.preguntas.index'));
    }

    public function destroy($id)
    {
        $pregunta = ServicioPreguntasFrecuentes::findOrFail($id);
        $pregunta->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.servicio-social.preguntas.index'));
    }

    public function approve($id)
    {
        $publicacion = ServicioPreguntasFrecuentes::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.servicio-social.preguntas.index'));
    }


}
