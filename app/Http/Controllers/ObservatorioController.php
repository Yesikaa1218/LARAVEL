<?php

namespace App\Http\Controllers;

use App\Models\Observatorio;
use Illuminate\Http\Request;

class ObservatorioController extends Controller
{

    public function index() {
        $data = Observatorio::all()->last();
        return view('System.Observatorio.index', compact('data'));
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'content_page' => 'required',
        ]);

        $data = new Observatorio();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.observatorio.index'));
    }

    public function approve($id) {
        $observatorio = Observatorio::findOrFail($id);
        $observatorio->active = 1;
        $observatorio->update();

        flash('Información aprobada correctamente')->success();
        return redirect(route('sistema.observatorio.index'));
    }

}
