<?php

namespace App\Http\Controllers;

use App\Models\Museo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuseoController extends Controller
{
    public function index(){
        return view('System.Museo.index');
    }

    public function dataindex(){
            return datatables(Museo::get())
            ->addColumn('fecha_inicio', function (Museo $museo) {
                return \Carbon\Carbon::parse(strtotime($museo->fecha_inicio))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('fecha_fin', function (Museo $museo) {
                return \Carbon\Carbon::parse(strtotime($museo->fecha_fin))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('btn', 'System.Museo.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create() {
        return view('System.Museo.create');
    }

    public function store(Request $request) {

        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'documento' => 'sometimes|mimes:pdf'
        ]);

        $data = new Museo();
        $data->fill($request->all());  

        if($request->file('imagen')){
            $data->imagen = $request->file('imagen')->store('museo', 'public');
        }
        if($request->file('documento')){
            $data->documento = $request->file('documento')->store('documentos', 'public');
        }
        else {
            $data->documento = null;
        }
        
        $data->save();

        flash('Informacion de Museo Registrado Correctamente')->success();
        return redirect(route('sistema.museo.index'));
    }

    public function edit($id){
        $data = Museo::find($id);
        return view('System.Museo.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max_width=1920,max_height=1080|mimes:jpeg,png,jpg|max:1024',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'documento' => 'sometimes|mimes:pdf'
        ]); 

        $data = Museo::find($id);
        $data->fill($request->all());

        if($request->file('imagen') != ''){
            Storage::delete($data->image);
            $data->imagen = $request->file('imagen')->store('museo', 'public');
        }
        
        if($request->file('documento') != '')
        {
            Storage::delete($data->documento);
            $data->documento = $request->file('documento')->store('documentos', 'public');
        }

        $data->save();

        flash('Informacion de Museo Editado Correctamente')->success();
        return redirect(route('sistema.museo.index'));
    }

    public function destroy($id){
        $data = Museo::find($id);
        $data->delete();
        flash('Informacion de Museo Eliminado Correctamente')->success();
        return redirect(route('sistema.museo.index'));
    }


    public function approve($id)
    {
        $publicacion = Museo::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();
        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.museo.index'));
    }
    
}
