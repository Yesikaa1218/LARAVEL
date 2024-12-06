<?php

namespace App\Http\Controllers;

use App\Models\DestiladoAgave;
use Illuminate\Http\Request;

class DestiladoAgaveController extends Controller
{
    public function index(){
        $data = DestiladoAgave::all()->last();
        return view('System.Observatorio.DestiladoAgave.index', compact('data'));
    }

    public function store(Request $request) {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new DestiladoAgave();
        $data->fill($request->all());
        $data->save();

        flash('Informacion agregada exitosamente')->success();
        return redirect(route('sistema.destilado.index'));
    }

    public function approve($id) {
        $destilado = DestiladoAgave::findOrFail($id);
        $destilado->active = 1;
        $destilado->update();

        flash('Informacion aprovada exitosamente')->success();
        return redirect(route('sistema.destilado.index'));
    }

}
