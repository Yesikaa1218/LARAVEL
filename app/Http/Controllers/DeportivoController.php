<?php

namespace App\Http\Controllers;

use App\Models\Deportivo;
use Illuminate\Http\Request;

class DeportivoController extends Controller
{
    public function index(){
        $data = Deportivo::all()->last();
        return view('System.Deportivo.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'content_page' => 'required',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'image_description' => 'sometimes'
        ]);

        $data = new Deportivo();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.deportivo.index'));
    }

    public function approve($id)
    {   
        $publicacion = Deportivo::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.deportivo.index'));
    }
   
}
