<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirmasSolicitud;
use App\Models\CambioCalificacionSolicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FirmasController extends Controller
{
    public function storeFirmaEscolar(Request $request, $solicitudId)
    {
        $request->validate([
            'firma' => 'required|string|max:255',
        ]);
        $empleado = Auth::guard('empleado')->user();
        $id = $empleado->id;
    
        $firmaSolicitud = new FirmasSolicitud;
        $firmaSolicitud->solicitud_id = $solicitudId;
        $firmaSolicitud->firmaEscolar = $id;
        $this->CambiarEstatus($solicitudId, 2);
    
        $firmaSolicitud->save();
    
        return response()->json(['success' => true, 'message' => 'Firma creada correctamente'], 200);
        
    }

    public function agregarFirmas(Request $request,$solicitudId, $tipo)
    {
        $request->validate([
            'firma' => 'required|string|max:255',
        ]);

        $empleado = Auth::guard('empleado')->user();
        $id = $empleado->id;
    
        switch ($tipo) {
            case 'escolar':
                FirmasSolicitud::updateOrCreate(
                    ['solicitud_id' => $solicitudId],
                    ['firmaEscolar' => $id]
                );
                $estatus = 2;
                // Cambiar el estatus
                $this->CambiarEstatus($solicitudId, $estatus);
                break;
            case 'docente':
                FirmasSolicitud::updateOrCreate(
                    ['solicitud_id' => $solicitudId],
                    ['firmaDocente' => $id]
                );
                $estatus = 3;
                $this->CambiarEstatus($solicitudId, $estatus);
                break;
            case 'coordinador':
                FirmasSolicitud::updateOrCreate(
                    ['solicitud_id' => $solicitudId],
                    ['firmaCoordinador' => $id]
                );
                $estatus = 4;
                $this->CambiarEstatus($solicitudId, $estatus);
                break;
            case 'subacademico':
                FirmasSolicitud::updateOrCreate(
                    ['solicitud_id' => $solicitudId],
                    ['firmaSubAcademico' => $id]
                );
                $estatus = 5;
                $this->CambiarEstatus($solicitudId, $estatus);
                break;
        }
    
        return response()->json(['success' => true, 'message' => 'Firma creada correctamente'], 200);
    }
    
    

    public function destroy($id)
    {
        $firmaSolicitud = FirmasSolicitud::find($id);

        if (!$firmaSolicitud) {
            return response()->json(['success' => false,'message' => 'Firma no encontrada'], 404);
        }

        $firmaSolicitud->delete();

        return response()->json(['success' => true,'message' => 'Firma eliminada correctamente'], 200);
    }

    private function CambiarEstatus($solicitudId,$estatus){
        
        try {
            $modelo = CambioCalificacionSolicitud::find($solicitudId);
    
            if (!$modelo) {
                return response()->json(['success' => false, 'message' => 'Solicitud no encontrada'], 404);
            }
    

            /* Estatus 0 no enviada, 1 Enviada a escolar, 2 Firmada por escolar, 
            3 Validacion por docente, 4 Firmada por Coordinador,
            5 firmada por Subdirector Academico, 6 Jefe Escolar Finaliza cambio de calificacion, 
            7 cambio calificacion finalizado, 8 Escolar Rechaza, 9 Coordinador Rechaza,
            10 Subdirector Academico Rechaza */
            $empleado = Auth::guard('empleado')->user()->id;
            $mensaje = "Error";
                switch($estatus){
                    case 1:
                        $mensaje = "Envió la solicitud a escolar.";
                        break;
                    case 2:
                        $mensaje = "Firmó la solicitud como Escolar";
                        break;
                    case 3:
                        $mensaje = "Firmó la solicitud como Docente.";
                        break;
                    case 4:
                        $mensaje = "Firmó la solicitud como Coordinador.";
                        break;
                    case 5:
                        $mensaje = "Firmó la solicitud como Subdirector Académico";
                        break;
                    case 6:
                        $mensaje = "Cerró la solicitud de forma satisfactoria.";
                        break;
                    case 7: 
                        $mensaje = "Proceso finalizado.";
                        break;
                    case 8:
                        $mensaje = "Escolar ha rechazado la solicitud.";
                        break;
                    case 9:
                        $mensaje = "Coordinador ha rechazado la solicitud.";
                        break;
                    case 10:
                        $mensaje = "Subdirector Académico ha rechazado la solicitud.";
                        break;
                }

                // Revisar y actualizar todos los registros en comentariosSolicitud
            if ($estatus == 1) {
                DB::table('comentariosSolicitud')
                    ->where('idSolicitud', $solicitudId)
                    ->where('activo', 1) // Solo actualizar los que tengan activo=1
                    ->update(['activo' => 0]);
            }

            DB::table('historialSolicitudes')->insert([
                'idSolicitud' => $solicitudId,
                'idEmpleado' => $empleado,
                'accion' => $mensaje,
                'fecha' => now(),
            ]);

            $modelo->Estatus = $estatus;
            $modelo->save();
    
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            // Manejar excepciones y devolver una respuesta de error detallada
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
