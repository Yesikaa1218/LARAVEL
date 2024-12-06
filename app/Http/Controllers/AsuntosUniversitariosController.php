<?php

namespace App\Http\Controllers;

use App\Models\AsuntosUniversitarios;
use Illuminate\Http\Request;

class AsuntosUniversitariosController extends Controller
{
    public function index(){
        $data = AsuntosUniversitarios::all()->last();
        return view('System.AsuntosUniversitarios.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new AsuntosUniversitarios();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.asuntos.universitarios.index'));
    }

    public function approve($id)
    {
        $publicacion = AsuntosUniversitarios::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.asuntos.universitarios.index'));
    }


}
