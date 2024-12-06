<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function indexRoles(){
        return view('System.Roles.index');
    }

    public function dataRoles(){
        return datatables(Role::all())
            ->addColumn('btn', 'System.Roles.btn')
            ->addColumn('permissions',  function(Role $role) {
                return $role->getPermissionNames();
            })
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function createRoles(){
        $permissions = Permission::all();
        return view('System.Roles.create', compact('permissions'));
    }

    public function sotreRoles(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $data = new Role();
        $data->fill($request->all());
        $data->givePermissionTo($request->permissions);
        $data->save();

        flash('Rol Registrado Correctamente')->success();
        return redirect(route('sistema.roles.index'));
    }

    public function edit($id){
        $data = Role::with('permissions')->find($id);
        $permissions = Permission::all();
        $rolePermissions = $data->permissions;
        return view('System.Roles.edit', compact('data', 'permissions', 'rolePermissions'));
    }

    public function updateRoles(Request $request, $id)
    { 
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $data = Role::find($id);
        $data->name = $request->name;
        $data->syncPermissions($request->permissions);
        $data->save();

        flash('Rol Editado Correctamente')->success();
        return redirect(route('sistema.roles.index'));
    }

    public function deleteRoles(Request $request){
        $data = Role::find($request->role);
        $data->delete();
        flash('Rol Eliminado Correctamente')->success();
        return redirect(route('sistema.roles.index'));

    }

    public function approve($id)
    {   
        $publicacion = Role::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->updateRoles();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.roles.index'));
    }
}
