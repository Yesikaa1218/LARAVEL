<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LicenciaturaController extends Controller
{
    public function index() {
        return view('System.Licenciaturas.licenciaturas');
        //return true;
    }

    public function dataindex() {
        //return datatables(\Corcel\Model\Post::type('licenciaturas')->status('publish')->get())
            //->toJson();
         //    auth()->user()->can('edit articles')


         $user = Auth::user();

       if($user->hasanyrole('SuperAdmin')){
           return datatables(Licenciatura::all())
            ->addColumn('btn', 'System.Licenciaturas.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else{
            if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
            if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
            if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
            if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
            if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
            if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

            return datatables(Licenciatura::where('id', $licenciatura)->get())
                ->addColumn('btn', 'System.Licenciaturas.btn')
                ->rawColumns(['btn'])
                ->toJson();
            }

    }



    public function create() {
        return view('System.Licenciaturas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre_licenciatura' => 'required',
            'nombre_coordinador' => 'required',
            'informacion_contacto' => 'required',
            'foto_coordinador' => 'required|image|dimensions:max_width=2036,max_height=328|mimes:jpeg,png,jpg|max:1024',
            'banner_licenciatura' => 'required|image|dimensions:max_width=1282,max_height=855|mimes:jpeg,png,jpg|max:1024',
            'descripcion' => 'required',
            'duracion' => 'required',
            'perfil_ingreso' => 'required',
            'perfil_egreso' => 'required',
        ]);

        $data = new Licenciatura();
        $data->fill($request->all());
        if($request->file('foto_coordinador')){
            $data->foto_coordinador = $request->file('foto_coordinador')->store('coordinadores', 'public');
        }
        if($request->file('banner_licenciatura')){
            $data->banner_licenciatura = $request->file('banner_licenciatura')->store('banner_licenciaturas', 'public');
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.licenciatura.index'));
    }

    public function edit($id)
    {
        $data = Licenciatura::find($id);

        return view('System.Licenciaturas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_licenciatura' => 'required',
            'nombre_coordinador' => 'required',
            'informacion_contacto' => 'required',
            'foto_coordinador' => 'sometimes|image|dimensions:max_width=2500,max_height=3500|mimes:jpeg,png,jpg|max:1024',
            'banner_licenciatura' => 'sometimes|image|dimensions:max_width=1282,max_height=855|mimes:jpeg,png,jpg|max:1024',
            'descripcion' => 'required',
            'duracion' => 'required',
            'perfil_ingreso' => 'required',
            'perfil_egreso' => 'required',
        ]);

        $data = Licenciatura::find($id);
        $data->fill($request->all());
        if($request->file('foto_coordinador') != '')
        {
            Storage::delete($data->foto_coordinador);
            $data->foto_coordinador = $request->file('foto_coordinador')->store('coordinadores', 'public');
        }
        if($request->file('banner_licenciatura') != '')
        {
            Storage::delete($data->banner_licenciatura);
            $data->banner_licenciatura = $request->file('banner_licenciatura')->store('banner_licenciaturas', 'public');
        }
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.licenciatura.index'));
    } 

    public function destroy($id)
    {
        $licenciatura = Licenciatura::findOrFail($id);
        $licenciatura->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.licenciatura.index'));
    }

    public function confirm($id){


    }

    public function approve($id)
    {   
        $publicacion = Licenciatura::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.licenciaturas.licenciatura.index'));
    }
    
}
