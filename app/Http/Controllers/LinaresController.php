<?php

namespace App\Http\Controllers;

use App\Models\Linares;
use Illuminate\Http\Request;

class LinaresController extends Controller
{
    public function index(){
        $data = Linares::all()->last();
        return view('System.Linares.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Linares();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.unidad-linares.index'));
    }

    public function approve($id)
    {   
        $publicacion = Linares::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.unidad-linares.index'));
    }
}
