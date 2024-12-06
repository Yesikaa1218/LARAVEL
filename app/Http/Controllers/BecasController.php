<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use Illuminate\Http\Request;

class BecasController extends Controller
{
    public function index(){
        $data = Beca::all()->last();
        return view('System.Becas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'information' => 'required'
        ]);

        $data = new Beca();
        $data->fill($request->all());
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.becas.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('becas', 'public');

        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function approve($id)
    {   
        $publicacion = Beca::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.becas.index'));
    }
}
