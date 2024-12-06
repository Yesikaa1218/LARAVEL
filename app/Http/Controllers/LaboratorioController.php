<?php

namespace App\Http\Controllers;
use App\Models\ConfiguracionLaboratorio;

use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function approve($id)
    {
        $publicacion = LaboratorioController::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.laboratorio.index'));
    }

    public function guardarConfiguracion(Request $request, $laboratorioId)
    {
        try {
            // Validar los datos del request
            $this->validate($request, [
                'configuraciones' => 'required|array',
                'configuraciones.*.id' => 'required|string',
                'configuraciones.*.tipo' => 'required|string',
                'configuraciones.*.top' => 'required|string',
                'configuraciones.*.left' => 'required|string',
                'configuraciones.*.width' => 'required|string',
                'configuraciones.*.height' => 'required|string'
            ]);
    
            $configuraciones = $request->input('configuraciones');
    
            // Elimina configuraciones existentes para este laboratorio
            ConfiguracionLaboratorio::where('laboratorio_id', $laboratorioId)->delete();
    
            // Guarda las nuevas configuraciones
            foreach ($configuraciones as $config) {
                $data = [
                    'laboratorio_id' => $laboratorioId,
                    'elemento_id' => $config['id'],
                    'tipo_elemento' => $config['tipo'],
                    'posicion_top' => $config['top'],
                    'posicion_left' => $config['left'],
                    'width' => $config['width'],
                    'height' => $config['height']
                ];
                //Solo agregar el src si existe.
                if (isset($config['src'])) {
                    $data['src'] = $config['src'];
                }

                //Creamos el nuevo registro
                ConfiguracionLaboratorio::create($data);
            }

    
            return response()->json(['status' => 'success', 'message' => '¡Sus cambios han sido guardados con éxito!']);
        } catch (\Exception $e) {
            // Devuelve un mensaje de error detallado
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    

    public function cargarConfiguracion($laboratorioId)
    {
        try {
            // Obtén las configuraciones para el laboratorio especificado
            $configuraciones = ConfiguracionLaboratorio::where('laboratorio_id', $laboratorioId)->get();

            // Verificar si hay configuraciones
            if ($configuraciones->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No se encontraron configuraciones para el laboratorio especificado',
                    'data' => []
                ]);
            }

            return response()->json([
                'status' => 'success',
                'data' => $configuraciones
            ]);
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    
    
}
