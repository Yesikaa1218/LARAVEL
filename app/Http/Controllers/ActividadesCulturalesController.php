<?php

namespace App\Http\Controllers;
use App\Models\ActividadesCulturales;
use Illuminate\Http\Request;

class ActividadesCulturalesController extends Controller
{
    public function index(){
        $data = ActividadesCulturales::all()->last();
        return view('System.ActividadesCulturales.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new ActividadesCulturales();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }
    public function approve($id)
    {   
        $publicacion = ActividadesCulturales::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.actividades-culturales.index'));
    }
}
