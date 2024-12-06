<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniversidadSaludableEventos;

class UniversidadSaludableEventosController extends Controller
{
    public function dataindex(){
        return datatables(UniversidadSaludableEventos::all())
            ->addColumn('fecha', function (UniversidadSaludableEventos $universidad) {
                return \Carbon\Carbon::parse(strtotime($universidad->date))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.UniversidadSaludable.EventosConferencias.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.UniversidadSaludable.EventosConferencias.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'content_page' => 'required',
            'hour' => 'required',
        ]);

        $data = new UniversidadSaludableEventos();
        $data->fill($request->all());
        $data->save();

        flash('Evento Registrado Correctamente | A LA ESPERA DE SER APROBADO')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }

    public function edit($id){
        $data = UniversidadSaludableEventos::find($id);
        return view('System.UniversidadSaludable.EventosConferencias.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'content_page' => 'required',
            'hour' => 'required',
        ]);

        $data = UniversidadSaludableEventos::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Evento Editado Correctamente | A LA ESPERA DE SER APROBADO')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }

    public function destroy($id)
    {
        $data = UniversidadSaludableEventos::find($id);
        $data->delete();

        flash('Evento Eliminado Correctamente')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }

    public function approve($id)
    {
        $publicacion = UniversidadSaludableEventos::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.universidad-saludable.index'));
    }
}
