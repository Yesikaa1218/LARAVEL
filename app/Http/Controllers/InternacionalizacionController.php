<?php

namespace App\Http\Controllers;

use App\Models\Internacionalizacion;
use Illuminate\Http\Request;

class InternacionalizacionController extends Controller
{
    public function index(){
        $data = Internacionalizacion::all()->last();
        return view('System.Internacionalizacion.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Internacionalizacion();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.internacionalizacion.index'));
    }

    public function approve($id)
    {   
        $publicacion = Internacionalizacion::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.internacionalizacion.index'));
    }

    
}
