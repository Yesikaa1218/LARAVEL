<?php

namespace App\Http\Controllers;
use App\Models\UniversidadSaludable;

use Illuminate\Http\Request;

class UniversidadSaludableController extends Controller
{
     public function index()
    {
        $data = UniversidadSaludable::all()->last();
        return view('System.UniversidadSaludable.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new UniversidadSaludable();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }

    public function approve($id)
    {   
        $publicacion = UniversidadSaludable::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }
}
