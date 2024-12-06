<?php

namespace App\Http\Controllers;

use App\Models\GuiaEXEN;
use Illuminate\Http\Request;

class GuiaEXENController extends Controller
{
    
    public function index()
    {
        $data = GuiaEXEN::all()->last();
        return view('System.GuiaEXEN.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new GuiaEXEN();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.guia-exens.index'));
    }

    public function approve($id)
    {
        $publicacion = GuiaEXEN::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información aprobada correctamente')->success();
        return redirect(route('sistema.guia-exens.index'));
    }

}
