<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function index(){
        return view('System.Roles.Permisos.index');
    }

    public function data(){
        return datatables(Permission::all())
            ->addColumn('btn', 'System.Roles.Permisos.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        return view('System.Roles.Permisos.create');
    }

    public function sotre(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $data = new Permission();
        $data->fill($request->all());
        $data->save();

        flash('Permiso Registrado Correctamente')->success();
        return redirect(route('sistema.roles.permisos.index'));
    }

    public function delete(Request $request){
        $data = Permisos::find($request->permiso);
        $data->delete();
        flash('Permisos Eliminado Correctamente')->success();
        return redirect(route('sistema.roles.permisos.index'));
    }
}
