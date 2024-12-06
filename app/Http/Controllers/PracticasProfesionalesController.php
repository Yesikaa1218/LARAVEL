<?php

namespace App\Http\Controllers;

use App\Models\PracticaProfesional;
use Illuminate\Http\Request;

class PracticasProfesionalesController extends Controller
{
    public function index(){
        $data = PracticaProfesional::all()->last();
        return view('System.PracticasProfesionales.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new PracticaProfesional();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.practicas-profesionales.index'));
    }

    public function approve($id)
    {
        $publicacion = PracticaProfesional::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información aprobada correctamente')->success();
        return redirect(route('sistema.practicas-profesionales.index'));
    }
}
