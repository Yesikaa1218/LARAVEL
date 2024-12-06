<?php

namespace App\Http\Controllers;
use App\Models\EstrategiaDigital;

use Illuminate\Http\Request;

class EstrategiaDigitalController extends Controller
{
    public function index(){
        $data = EstrategiaDigital::all()->last();
        return view('System.EstrategiaDigital.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new EstrategiaDigital();
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.estrategia-digital.index'));
    }

    public function approve($id)
    {
        $estrategia = EstrategiaDigital::findOrFail($id);
        $estrategia->active = 1;
        $estrategia->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.estrategia-digital.index'));
    }


}
