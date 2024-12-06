<?php

namespace App\Http\Controllers;

use App\Models\CalidadEducativa;
use Illuminate\Http\Request;

class CalidadEducativaController extends Controller
{
    public function index(){
        $data = CalidadEducativa::all()->last();
        return view('System.CalidadEducativa.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new CalidadEducativa();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.calidad-educativa.informacion.index'));
    }

    public function approve($id)
    {   
        $publicacion = CalidadEducativa::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.calidad-educativa.informacion.index'));
    }

    
}
