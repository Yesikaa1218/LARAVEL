<?php

namespace App\Http\Controllers;

use App\Models\Sustentabilidad;
use Illuminate\Http\Request;

class SustentabilidadController extends Controller
{
    public function index(){
        $data = Sustentabilidad::all()->last();
        return view('System.Sustentabilidad.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Sustentabilidad();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.sustentabilidad.index'));
    }

    public function approve($id)
    {
        $publicacion = Sustentabilidad::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.sustentabilidad.index'));
    }

}
