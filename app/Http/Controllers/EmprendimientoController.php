<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\Request;

class EmprendimientoController extends Controller
{
    public function index(){
        $data = Emprendimiento::all()->last();
        return view('System.Emprendimiento.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new Emprendimiento();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.emprendimiento.index'));
    }

    public function approve($id)
    {
        $publicacion = Emprendimiento::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.emprendimiento.index'));
    }
}
