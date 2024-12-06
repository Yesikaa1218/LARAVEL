<?php

namespace App\Http\Controllers;
use App\Models\Licenciatura;
use App\Models\LicenciaturaCongreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LicenciaturaCongresoController extends Controller
{
    
    public function index() {

        return view('System.Licenciaturas.Congresos.index');
        //return true;
    }

    public function dataindex() {
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
            return datatables(LicenciaturaCongreso::with('licenciatura')->get())
            ->addColumn('btn', 'System.Licenciaturas.Congresos.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else
        { 
            { 
                if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
                if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
                if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
                if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
                if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
                if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

    
                return datatables(LicenciaturaCongreso::with('licenciatura')->where('licenciatura_id', $licenciatura)->get())
                    ->addColumn('btn', 'System.Licenciaturas.Congresos.btn')
                    ->rawColumns(['btn'])
                    ->toJson();
                
            }
        }
    }

    public function create()
    {
        $user = Auth::user();
        $licenciatura = 0;
        if($user->hasanyrole('SuperAdmin')){  
            $licenciaturas = Licenciatura::all();
         }
         else{
             if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
             if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
             if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
             if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
             if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
             if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;
         
             $licenciaturas = Licenciatura::where('id', $licenciatura)->get();
             }
        return view('System.Licenciaturas.Congresos.create', compact('licenciaturas'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'fecha_evento' => 'required',
            'fecha_inicial_registro' => 'required',
            'fecha_final_registro' => 'required',
            'content_page' => 'required',
            'image_description' => 'sometimes',
            'licenciatura_id' => 'sometimes',
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024'
        ]);

        $data = new LicenciaturaCongreso();
        $data->fill($request->all());
        if($request->file('image')) {
            $data->image = $request->file('image')->store('congreso', 'public');
        }
        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.licenciaturas.congresos.index'));
    }
    
    public function edit($id)
    {
        $data = LicenciaturaCongreso::find($id);
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
            $licenciaturas = Licenciatura::all();
         }
         else{
             if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
             if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
             if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
             if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
             if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
             if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;
         
             $licenciaturas = Licenciatura::where('id', $licenciatura)->get();
             }

        return view('System.Licenciaturas.Congresos.edit', compact('data', 'licenciaturas'));
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
            'image' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpg,jpeg,png|max:1024',
            'image_description' => 'sometimes',
            'licenciatura_id' => 'sometimes'
        ]);

        $data = LicenciaturaCongreso::find($id);
        $data->fill($request->all());
        if($request->file('image') != '') {
            Storage::delete($data->image);

            $data->image = $request->file('image')->store('congreso', 'public');
        }
        $data->status = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.congresos.index'));
    }

    public function destroy($id)
    {
        $profesor = LicenciaturaCongreso::findOrFail($id);
        $profesor->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.congresos.index'));
    }

    public function approve($id)
    {   
        $profesor = LicenciaturaCongreso::findOrFail($id);
        $profesor->status = 1;
        $profesor->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.licenciaturas.congresos.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('congresos', 'public');
        return response()->json(['location' => "/storage/$imagePath"]);
    }
    
    public function active($id)
    {   
        $publicacion = LicenciaturaCongreso::findOrFail($id);
        if($publicacion->registro_activo == 0){
            $publicacion->registro_activo = 1;
            $text = "activo";
        }else{
            $publicacion->registro_activo = 0;
            $text = "inactivo";
        }
  
        $publicacion->update();

        flash('El registro del congreso ahora está '.$text)->success();
        return redirect(route('sistema.licenciaturas.congresos.index'));
    }
    

}
