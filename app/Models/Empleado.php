<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class Empleado extends Model implements Authenticatable
{
    use HasFactory,HasRoles;

    protected $table = 'empleados';
    protected $primaryKey = 'id';
    protected $guard = 'empleado';
    protected $fillable = [
        'NoEmpleado',
        'Nombre',
        'ApPaterno',
        'ApMaterno',
        'contrasena',
        'Firma',
        'Activo',
        'remember_token',
    ];
    protected $hidden = [
        'contrasena',
        'remember_token', // Ocultar recordar token en respuestas JSON
    ];

    // Define la relación con la tabla grupos_empleados
    public function gruposEmpleados()
    {
        return $this->hasMany(GrupoEmpleado::class, 'fkEmpleado', 'id');
    }

    public function materias()
    {
        return $this->belongsToMany(EmpleadoMateria::class, 'empleados_materias', 'fkEmpleado', 'fkMateria')
            ->where('Activo', true);
    }
        // Métodos requeridos por la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Nombre de la columna de identificación (clave primaria).
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Valor de la clave primaria.
    }

    public function getAuthPassword()
    {
        return $this->contrasena; // Nombre de la columna que almacena la contraseña.
    }

    // Implementa los métodos para el "remember token"
    public function getRememberToken()
    {
        return $this->remember_token; // Asegúrate de que la columna que almacena el "remember token" se llame 'remember_token'.
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Asegúrate de que la columna que almacena el "remember token" se llame 'remember_token'.
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Nombre de la columna que almacena el "remember token".
    }
}
