<?php

namespace App\Http\Controllers;

use App\Models\EducacionContinua;
use Illuminate\Http\Request;

class EducacionContinuaController extends Controller
{
    public function index(){
        $data = EducacionContinua::all()->last();
        return view('System.EducacionContinua.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new EducacionContinua();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.educacion-continua.index'));
    }

    public function approve($id)
    {
        $publicacion = EducacionContinua::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.educacion-continua.index'));
    }

}
