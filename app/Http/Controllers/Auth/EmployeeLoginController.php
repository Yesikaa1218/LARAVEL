<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;

class EmployeeLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'SistemaEscolar/homeEscolar';

    public function __construct()
    {
        $this->middleware('guest:empleado')->except('logout');
    }

    public function showLoginForm()
    {

        // Verifica si el usuario ya está autenticado
        if (Auth::guard('empleado')->check()) {
            return redirect($this->redirectTo);
        }
        
        // Si no está autenticado, muestra el formulario de inicio de sesión
        return view('auth.loginEscolar');
    }

    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout(); // Cierra la sesión del usuario

        return redirect(route('SistemaEscolar.empleado.login'));
    }
    
    
    public function login(Request $request)
    {
        // Validación de los campos del formulario
        $this->validate($request, [
            'NoEmpleado' => 'required',
            'contrasena' => 'required',
        ]);
        
        // Busca al usuario por el número de empleado
        $user = Empleado::where('NoEmpleado', $request->NoEmpleado)->first();
    
        // Verifica si se encontró un usuario con el número de empleado proporcionado
        if (!$user) {
            return response()->json(['success' => false, 'error' => 'Empleado no encontrado']);
        }
    
        // Verifica si la contraseña proporcionada coincide con el hash almacenado en la base de datos
        if (Hash::check($request->contrasena, $user->contrasena)) {
            // Inicio de sesión exitoso
            Auth::guard('empleado')->login($user,$request->remember);
            return response()->json(['success' => true, 'redirect' => $this->redirectTo],200);
        }
    
        // Si el inicio de sesión falla, devuelve una respuesta JSON con un mensaje de error
        return response()->json(['success' => false, 'error' => 'Credenciales incorrectas']); 
    }
}
