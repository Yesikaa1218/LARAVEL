<?php

namespace App\Http\Controllers;

use App\Models\EducacionContinua;
use App\Models\Escolar;
use Illuminate\Http\Request;

class EscolarController extends Controller
{
    public function index(){
        $data = Escolar::all()->last();
        return view('System.Escolar.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Escolar();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.escolar.index'));
    }

    public function approve($id)
    {   
        $publicacion = Escolar::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.escolar.index'));
    }

}
