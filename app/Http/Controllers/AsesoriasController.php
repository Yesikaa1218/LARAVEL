<?php

namespace App\Http\Controllers;

use App\Models\Asesorias;
use Illuminate\Http\Request;

class AsesoriasController extends Controller
{
    public function index()
    {
        $data = Asesorias::all()->last();
        return view('System.Asesorias.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Asesorias();
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Información principal actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.asesorias.informacion.index'));
    }
    
    public function approve($id)
    {
        $publicacion = Asesorias::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información principal aprobada correctamente')->success();
        return redirect(route('sistema.asesorias.informacion.index'));
    }


}
