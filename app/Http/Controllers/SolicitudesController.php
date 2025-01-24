<?php
// SolicitudesController.php
namespace App\Http\Controllers;

use App\Models\CambioCalificacionSolicitud;
use Illuminate\Support\Facades\Auth;

class SolicitudesController extends Controller
{
    // Método para mostrar las solicitudes en progreso
    public function solicitudesEnProgreso()
    {
        // Obtener el usuario actual del guard 'empleado'
        $empleado = Auth::guard('empleado')->user();

        // Obtener las solicitudes en progreso con todas las relaciones necesarias
        $solicitudesEnProgreso = CambioCalificacionSolicitud::with([
            'grupo', // Relación con Grupo
            'grupo.empleadoMateria', // Relación con EmpleadoMateria
            'grupo.empleadoMateria.materia', // Relación con Materia
            'planEstudios', // Relación con PlanEstudios
        ])
            ->whereIn('Estatus', [1, 2, 3, 4, 5, 6]) // Estatus en progreso
            ->where('Activo', 1) // Solo solicitudes activas
            ->orderBy('created_at', 'desc')
            ->get();

        // Retornar la vista con las solicitudes con estatus pendiente
        return view('Request.solicitudpendiente', compact('empleado', 'solicitudesEnProgreso'));
    }

    
}
