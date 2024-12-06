<?php

namespace App\Http\Controllers;
use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function index(){
        $data = Biblioteca::all()->last();
        return view('System.Biblioteca.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicios' => 'required',
            'horarios' => 'required',
            'reglamento' => 'required',
            'link1' => 'sometimes',
            'texto_link1' => 'sometimes',
            'link2',
            'texto_link2' => 'sometimes',
            'link3' => 'sometimes',
            'texto_link3' => 'sometimes',
            'link4' => 'sometimes',
            'texto_link4' => 'sometimes'
        ]);

        $data = new Biblioteca();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.biblioteca.index'));
    }

    public function approve($id)
    {
        $publicacion = Biblioteca::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.biblioteca.index'));
    }


}
