<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminRegister;
use App\Notifications\AlumnoRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdministradoresController extends Controller
{
    public function index()
    {      
        return view('System.User.Admin.index');
    }

    public function dataindex()
    {
        return datatables(User::all())
            ->addColumn('fecha', function (User $user) {
                return \Carbon\Carbon::parse(strtotime($user->created_at))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('roles',  function(User $user) {
                return $user->getRoleNames();
            })
            ->addColumn('btn', 'System.User.Admin..btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        $roles = Role::all();
        $pass = str::random(10);
        return view('System.User.Admin.create', compact('roles', 'pass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'required',
        ]);

    
        $data = new User();
        $data->fill($request->all());
        $data->password = Hash::make($request->password);
        $data->assignRole($request->roles);
        $data->save();

        // Notification::route('mail', $data->email)->notify(new AdminRegister($data->name, $request->password));

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.user.administrador.index'));
    }

    public function edit($id)
    {
        $data = User::with('roles')->find($id);
        $roles = Role::all();
        $userRoles = $data->roles;
        return view('System.User.Admin.edit', compact('data', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'roles' => 'required',
        ]);

        if($request->password){
            $request->validate([
                'password' => 'sometimes|min:8',
            ]);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->syncRoles($request->roles);
            $data->save();

        }else{
            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->syncRoles($request->roles);
            $data->save();
        }

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.user.administrador.index'));
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.user.administrador.index'));
    }

}
