<?php

namespace App\Http\Controllers;

use App\Models\SociedadAlumnos;
use Illuminate\Http\Request;

class SociedadAlumnosController extends Controller
{
    public function index(){ 
        $data = SociedadAlumnos::all()->last();
        return view('System.SociedadAlumnos.index', compact('data')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new SociedadAlumnos();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        
        return redirect(route('sistema.sociedad-alumnos.index'));
    }

    public function approve($id)
    {
        $data = SociedadAlumnos::findOrFail($id);
        $data->active = 1;
        $data->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.sociedad-alumnos.index'));
    }
}
