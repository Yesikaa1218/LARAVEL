<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    public function Index(){
        return view('System.Calificaciones.sistema.IndexEmpleado');
    }

    public function create()
    {
        $roles = Role::where('guard_name','empleado')
                        ->get();
        return view('System.Calificaciones.sistema.AddEmpleado',compact('roles'));
    }
    public function modificar($id)
    {
        $empleado = Empleado::findorfail($id);
        $roles = Role::where('guard_name','empleado')
                        ->get();
        $rolesId = $empleado->roles->pluck('id');
        return view('System.Calificaciones.sistema.UpdateEmpleado',compact('empleado','roles','rolesId'));
    }

    public function updateSignature()
    {
        return view('System.Calificaciones.sistema.AddFirma');
    }

    public function cambioContrasena(){
        $empleado = Auth::guard('empleado')->user();
        return view('System.Calificaciones.sistema.CambiarContrasena',compact('empleado'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'NoEmpleado' => 'required|numeric',
                'nombre' => 'required|alpha',
                'apellido_paterno' => 'required|regex:/^[a-zA-Z]+$/',
                'apellido_materno' => 'required|regex:/^[a-zA-Z]+$/',
                'contrasena' => 'required',
                'roles' => 'required|array',
            ]);
    
            DB::beginTransaction();
    
            $empleado = new Empleado([
                'NoEmpleado' => $request->input('NoEmpleado'),
                'Nombre' => $request->input('nombre'),
                'ApPaterno' => $request->input('apellido_paterno'),
                'ApMaterno' => $request->input('apellido_materno'),
                'contrasena' => Hash::make($request->input('contrasena')),
                'Activo' => true,
            ]);
    
            $empleado->save();
    
            // Asignar roles después de guardar el empleado
            $empleado->assignRole($request->roles);
    
            DB::commit();
    
            return response()->json(['success' => true, 'message' => 'Empleado registrado exitosamente']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Hubo un error en la solicitud', 'error' => $e->getMessage()]);
        }
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $empleado = Auth::guard('empleado')->user();

        // Verificar si la contraseña actual coincide
        if (!Hash::check($request->current_password, $empleado->contrasena)) {
            return response()->json(['success' => false, 'message' => 'Hubo un error al actualizar la contraseña', 'error' => $e->getMessage()]);
        }

        // Cambiar y guardar la nueva contraseña
        $empleado->contrasena = bcrypt($request->new_password);
        $empleado->save();

        return response()->json(['success' => true, 'message' => 'Contraseña actualizada correctamente'],200);
    }
    
    public function get(){
        $empleados = Empleado::where('Activo',1)
                             ->get();
        return response()->json($empleados);
    }

    public function getById($id){
        $empleado = Empleado::findorfail($id);
        return response()->json($empleado);
    }

    public function getByNoEmp($noEmp){
        $empleado = Empleado::where('NoEmpleado',$noEmp)
                            ->where('Activo',1)
                            ->get();
        return response()->json($empleado);
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos de entrada
        $request->validate([
            'NoEmpleado' => 'required|numeric', // 'NoEmpleado' debe contener solo números
            'nombre' => ['required', 'regex:/^\b[a-zA-Z]+(?:\s[a-zA-Z]+)?\b$/'], // 'Nombre' debe contener solo letras
            'apellido_paterno' => 'required|alpha', // 'ApPaterno' debe contener solo letras
            'apellido_materno' => 'alpha', // 'ApMaterno' debe contener solo letras (puede ser opcional)
            'roles' => 'required',
        ]);
        
        // Buscar al empleado por su ID
        $empleado = Empleado::find($id);
    
        // Actualizar los campos del empleado
        $empleado->NoEmpleado = $request->input('NoEmpleado');
        $empleado->Nombre = $request->input('nombre');
        $empleado->ApPaterno = $request->input('apellido_paterno');
        $empleado->ApMaterno = $request->input('apellido_materno');
        
        // Guardar los cambios
        $empleado->save();
    
        // Sincronizar roles
        $empleado->roles()->sync($request->input('roles'));
    
        return response()->json(['success' => true]);
    }
    

    public function delete($id)
    {
        // Buscar al empleado por su ID
        $empleado = Empleado::find($id);
    
        if ($empleado) {
            // Realizar el borrado lógico (desactivar empleado)
            $empleado->Activo = false;
            $empleado->save();
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function actualizarFirma(Request $request)
    {
        try {
            $firmaBase64 = $request->input('firmaBase64');
    
            // Decodificar la firma base64 y guardarla en el sistema de archivos
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firmaBase64));
    
            $imagenNombre = time() . '.png';
            
            // Guardar el nombre de la firma en la base de datos
            $usuario = Auth::guard('empleado')->user();
    
            // Verificar si el empleado ya tiene una firma anterior
            if (!empty($usuario->Firma)) {
                // Eliminar la firma anterior
                Storage::disk('custom_public')->delete('storage/Firmas/' . $usuario->Firma);
            }
    
            // Guardar la firma en el sistema de archivos
            Storage::disk('custom_public')->put('storage/Firmas/' . $imagenNombre, $imageData);
    
            $usuario->Firma = $imagenNombre;
            $usuario->save();
    
            return response()->json(['success' => true, 'message' => 'Firma actualizada correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Hubo un error al actualizar la firma: ' . $e->getMessage()], 400);
        }
    }


    public function cargarFirmaUsuario()
    {
        // Obtener el usuario en línea
        $usuario = Auth::user();
    
        // Consultar en la tabla empleados usando el id del usuario
        $empleado = Empleado::where('id', $usuario->id)->first();
    
        // Obtener el campo firma
        $firma = $empleado->Firma; // Asegúrate de que "Firma" es el nombre del campo
    
        if ($firma) {
            // Crear la URL completa para la imagen
            $urlFirma = asset('storage/Firmas/' . $firma);
            return response()->json(['firma' => $urlFirma]);
        } else {
            return response()->json(['firma' => null]);
        }
    }
    
    


}
