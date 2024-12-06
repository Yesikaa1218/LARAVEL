<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function edit(){
        $user = User::find(Auth::user()->id);
        return view('System.User.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
        ]);

        if($request->password){
            $request->validate([
                'password' => 'sometimes|min:8',
            ]);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();

        }else{
            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();
        }
       
        
        flash('Perfil Editado Correctamente')->success();
        return redirect(route('sistema.user.perfil'));
    }
}
