<?php

namespace App\Http\Controllers;

use App\Models\ServicioSocial;
use Illuminate\Http\Request;

class ServicioSocialController extends Controller
{
    public function index(){
        $data = ServicioSocial::all()->last();
        return view('System.ServicioSocial.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content_page' => 'required',
        ]);

        $data = new ServicioSocial();
        $data->fill($request->all());
        $data->save();

        flash('Información actualizada correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.servicio-social.index'));
    }

    public function approve($id)
    {
        $publicacion = ServicioSocial::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Información aprobada correctamente')->success();
        return redirect(route('sistema.servicio-social.index'));
    }
}
