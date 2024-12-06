<?php

namespace App\Http\Controllers;

use App\Models\CAADI;
use Illuminate\Http\Request;

class CAADIController extends Controller
{
    public function index(){
        $data = CAADI::all()->last();
        return view('System.CAADI.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'servicios' => 'required',
            'reglamento' => 'required',
            'inscripciones' => 'required',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'image_description' => 'sometimes'
        ]);

        $data = new CAADI();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.caadi.index'));
    }
    public function approve($id)
    {   
        $publicacion = CAADI::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.caadi.index'));
    }
}
