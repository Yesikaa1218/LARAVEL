<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CongresoLicenciaturaRegistro;
use App\Models\CongresoRegister;
use App\Models\CongresosPosgradoRegistro;
use Illuminate\Http\Request;
use App\Models\CongresoUser;
use Illuminate\Support\Facades\Hash;

class CongresosUsersController extends Controller
{
    
    public function store(Request $request){

        
        if (CongresoUser::where('email', $request->email )->exists()) 
            $emailExists = true;
        else
            $emailExists = false;

        if(!$emailExists){

            $request->validate([
                'name' => 'required',
                'email'  => 'required',
                'password'  => 'required',
                'phone'  => 'sometimes',
                'image'  => 'sometimes',
                'adscripcion' => 'sometimes',
                'licenciatura_congresos_id' => 'sometimes'
            ]);

            $data = new CongresoUser();
            $data->fill($request->all());
            if($request->file('image')) {
                $data->image = $request->file('image')->store('congresos_users', 'public');
            }

            $data->password = Hash::make($request->password);

            $data->save();

            $user = new CongresoUser();
            $user = CongresoUser::where('email', $request->email)->first(); // Obtener información del usuario con base en el email
            
            $congresoExists = CongresoLicenciaturaRegistro::where('licenciatura_congresos_id', $request->licenciatura_congresos_id)->exists(); // Si el congreso existe 
            $userExists = CongresoLicenciaturaRegistro::where('congresos_users_id', $user->id)->exists(); // Si el usuario existe

            
            if($congresoExists && $userExists){
                    return false; // Ya está registrado
            }else{
                    // Registramos al usuario 
                    $data = new CongresoLicenciaturaRegistro();
                    $data->congresos_users_id = $user->id; 
                    $data->licenciatura_congresos_id = $request->licenciatura_congresos_id;
                    $data->save();
                    return true; // Registrado con éxito
            }
            
        }else{
            return false; 
        }
        //return redirect(view('From.home'));
    }
    

    public function emailValidation(Request $request){
        if (CongresoUser::where('email', $request->email )->exists()) 
            return 'true';
        else
            return 'false';
    }

    public function registerLicenciatura(Request $request){

        $user = new CongresoUser();
        $user = CongresoUser::where('email', $request->email)->first(); // Obtener información del usuario con base en el email
        
        $hashedPassword = bcrypt($request->password);

       // $correctPassword = CongresoUser::where('email', $user->email)->where('password',)->exists(); // Si el correo y contraseña coinciden
        //$correctPassword = CongresoUser::where('email', $request->email)->exists();
        $congresoExists = CongresoLicenciaturaRegistro::where('licenciatura_congresos_id', $request->licenciatura_congresos_id)->exists(); // Si el congreso existe 
        $userExists = CongresoLicenciaturaRegistro::where('congresos_users_id', $user->id)->exists(); // Si el usuario existe

        if(Hash::check($request->password,$user->password)) {
            if($congresoExists && $userExists){
                return 1; // Ya está registrado
           }else{
                // Registramos al usuario 
                $data = new CongresoLicenciaturaRegistro();
                $data->congresos_users_id = $user->id; 
                $data->licenciatura_congresos_id = $request->licenciatura_congresos_id;
                $data->save();
                return 2; // Registrado con éxito
           }
        }else{
            return 3; // Email o contraseña incorrectos 
        }
            
    }
    
    public function seeUsers(){
        $users = CongresoUser::all();
    }

    /* --------------------------------- CONGRESOS DE POSGRADO --------------------------------- */
    public function storePosgrado(Request $request){

        
        if (CongresoUser::where('email', $request->email )->exists()) 
            $emailExists = true;
        else
            $emailExists = false;

        if(!$emailExists){

            $request->validate([
                'name' => 'required',
                'email'  => 'required',
                'password'  => 'required',
                'phone'  => 'sometimes',
                'image'  => 'sometimes',
                'adscripcion' => 'sometimes',
                'posgrado_congresos_id' => 'sometimes'
            ]);

            $data = new CongresoUser();
            $data->fill($request->all());
            if($request->file('image')) {
                $data->image = $request->file('image')->store('congresos_users', 'public');
            }

            $data->password = Hash::make($request->password);

            $data->save();

            $user = new CongresoUser();
            $user = CongresoUser::where('email', $request->email)->first(); // Obtener información del usuario con base en el email
            
            $congresoExists = CongresosPosgradoRegistro::where('posgrado_congresos_id', $request->posgrado_congresos_id)->exists(); // Si el congreso existe 
            $userExists = CongresosPosgradoRegistro::where('congresos_users_id', $user->id)->exists(); // Si el usuario existe

            
            if($congresoExists && $userExists){
                    return false; // Ya está registrado
            }else{
                    // Registramos al usuario 
                    $data = new CongresosPosgradoRegistro();
                    $data->congresos_users_id = $user->id; 
                    $data->posgrado_congresos_id = $request->posgrado_congresos_id;
                    $data->save();
                    return true; // Registrado con éxito
            }
            
        }else{
            return false; 
        }
        //return redirect(view('From.home'));
    }

     public function registerPosgrado(Request $request){

        $user = new CongresoUser();
        $user = CongresoUser::where('email', $request->email)->first(); // Obtener información del usuario con base en el email
        
        $hashedPassword = bcrypt($request->password);

       // $correctPassword = CongresoUser::where('email', $user->email)->where('password',)->exists(); // Si el correo y contraseña coinciden
        //$correctPassword = CongresoUser::where('email', $request->email)->exists();
        $congresoExists = CongresosPosgradoRegistro::where('posgrado_congresos_id', $request->posgrado_congresos_id)->exists(); // Si el congreso existe 
        $userExists = CongresosPosgradoRegistro::where('congresos_users_id', $user->id)->exists(); // Si el usuario existe

        if(Hash::check($request->password,$user->password)) {
            if($congresoExists && $userExists){
                return 1; // Ya está registrado
           }else{
                // Registramos al usuario 
                $data = new CongresosPosgradoRegistro();
                $data->congresos_users_id = $user->id; 
                $data->posgrado_congresos_id = $request->posgrado_congresos_id;
                $data->save();
                return 2; // Registrado con éxito
           }
        }else{
            return 3; // Email o contraseña incorrectos 
        }
            
    }

}
