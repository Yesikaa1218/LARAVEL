<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaNuevoIngreso;

class GuiaNIngresoController extends Controller
{
    public function index()
    {
        $data = GuiaNuevoIngreso::all()->last();
        return view('System.GuiaNuevoIngreso.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new GuiaNuevoIngreso();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.guia-nuevo-ingreso.index'));
    }

    public function approve($id)
    {
        $publicacion = GuiaNuevoIngreso::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información aprobada correctamente')->success();
        return redirect(route('sistema.guia-nuevo-ingreso.index'));
    }
}
