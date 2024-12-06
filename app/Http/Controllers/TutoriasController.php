<?php

namespace App\Http\Controllers;

use App\Models\Tutorias;
use App\Models\UniversidadSaludable;
use Illuminate\Http\Request;

class TutoriasController extends Controller
{
    public function index(){
        $data = Tutorias::all()->last();
        return view('System.Tutorias.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Tutorias();
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Información de la página actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.tutorias.index'));
    }

    public function approve($id)
    {
        $publicacion = Tutorias::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información de la página aprobada correctamente')->success();
        return redirect(route('sistema.tutorias.index'));
    }
}
