<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use App\Models\Posgrado;
use App\Models\PosgradoCongreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PosgradoCongresoController extends Controller
{
    public function index() {
        return view('System.Posgrados.Congresos.index');
        //return true;
    }

    
    public function dataindex() {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){ 
        return datatables(PosgradoCongreso::with('posgrado')->get())
        ->addColumn('btn', 'System.Posgrados.Congresos.btn')
        ->rawColumns(['btn'])
        ->toJson();
        }else
        {
            {

                if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){

                    //Retornar el datatable con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas

                    return datatables(PosgradoCongreso::with('posgrado')->whereIn('posgrado_id', [1, 5])->get())
                        ->addColumn('btn', 'System.Posgrados.Congresos.btn')
                        ->rawColumns(['btn'])
                        ->toJson();
                }

                if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
                if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
                if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
                if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;
    
                if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
                if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
                if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;
    
                return datatables(PosgradoCongreso::with('posgrado')->where('posgrado_id', $posgrado)->get())
                    ->addColumn('btn', 'System.Posgrados.Congresos.btn')
                    ->rawColumns(['btn'])
                    ->toJson();
                
            }
        }
    }

    public function create()
    {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){  
            $posgrados = Posgrado::all();
        }
        else{
          

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;

            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;
         
            $posgrados = Posgrado::where('id', $posgrado)->get();

             
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgrados = Posgrado::whereIn('id', [1, 5])->get();
            }

        }
        return view('System.Posgrados.Congresos.create', compact('posgrados'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'fecha_evento' => 'required',
            'fecha_inicial_registro' => 'required',
            'fecha_final_registro' => 'required',
            'content_page' => 'required',
            'image_description' => 'sometimes',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png|max:1024',
            'posgrado_id' => 'required'
        ]);

        $data = new PosgradoCongreso();
        $data->fill($request->all());
        if($request->file('image')) {
            $data->image = $request->file('image')->store('congreso', 'public');
        }
        $data->save();

        flash('Información principal Actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.posgrados.congresos.index'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'fecha_evento' => 'required',
            'fecha_inicial_registro' => 'required',
            'fecha_final_registro' => 'required',
            'content_page' => 'required',
            'image_description' => 'sometimes',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png|max:1024',
            'posgrado_id' => 'required'
        ]);

        $data = PosgradoCongreso::find($id);
        $data->fill($request->all());
        if($request->file('imagen') != '')
        {
            Storage::delete($data->imagen);
            $data->imagen = $request->file('imagen')->store('congreso', 'public');
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.posgrados.congresos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = PosgradoCongreso::findOrFail($id);
        $profesor->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.posgrados.congresos.index'));
    }

    public function approve($id)
    {   
        $publicacion = PosgradoCongreso::findOrFail($id);
        $publicacion->status = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.posgrados.congresos.index'));
    }

    public function active($id)
    {   
        $publicacion = PosgradoCongreso::findOrFail($id);
        if($publicacion->registro_activo == 0){
            $publicacion->registro_activo = 1;
            $text = "activo";
        }else{
            $publicacion->registro_activo = 0;
            $text = "inactivo";
        }
  
        $publicacion->update();

        flash('El registro del congreso ahora está '.$text)->success();
        return redirect(route('sistema.posgrados.congresos.index'));
    }

    public function edit($id)
    {
        $data = PosgradoCongreso::find($id);
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){  
            $posgrados = Posgrado::all();
        }
        else
        {
          

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;

            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;

            $posgrados = Posgrado::where('id', $posgrado)->get();

             
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgrados = Posgrado::whereIn('id', [1, 5])->get();
            }
        }

        return view('System.Posgrados.Congresos.edit', compact('data', 'posgrados'));
    }

}
