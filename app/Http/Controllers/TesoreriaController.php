<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tesoreria;
use Illuminate\Support\Facades\Storage;

class TesoreriaController extends Controller
{
    public function index(){
        $data = Tesoreria::all()->last();
        return view('System.Tesoreria.index', compact('data'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'content_page' => 'required',
            'calendario_pagos_posgrado' => 'nullable|mimes:pdf',
            'manual_cuota_interna' => 'nullable|mimes:pdf',
            'solicitud_factura' => 'nullable|mimes:pdf',
        ]);

        $lastData = Tesoreria::latest()->first();
        $data = new Tesoreria();
        if($lastData && $lastData->calendario_pagos_posgrado){
            $data->calendario_pagos_posgrado = $lastData->calendario_pagos_posgrado;
        }
        if($lastData && $lastData->manual_cuota_interna){
            $data->manual_cuota_interna = $lastData->manual_cuota_interna;
        }
        if($lastData && $lastData->solicitud_factura){
            $data->solicitud_factura = $lastData->solicitud_factura;
        }
        $data->fill($request->all());
        
        if($request->file('calendario_pagos_posgrado')){
            if($lastData && $lastData->calendario_pagos_posgrado){
                Storage::delete($lastData->calendario_pagos_posgrado);
            }
            $data->calendario_pagos_posgrado = $request->file('calendario_pagos_posgrado')->store('tesoreria', 'public');
        }
        
        if($request->file('manual_cuota_interna')){
            if($lastData && $lastData->manual_cuota_interna){
                Storage::delete($lastData->manual_cuota_interna);
            }
            $data->manual_cuota_interna = $request->file('manual_cuota_interna')->store('tesoreria', 'public');
        }
        
        if($request->file('solicitud_factura')){
            if($lastData && $lastData->solicitud_factura){
                Storage::delete($lastData->solicitud_factura);
            }
            $data->solicitud_factura = $request->file('solicitud_factura')->store('tesoreria', 'public');
        }

        $data->save();

        flash('Información actualizada Correctamente | A LA ESPERA DE SER APROBADA')->success();
        return redirect(route('sistema.tesoreria.index'));
    }

    public function approve($id)
    {   
        $tesoreria = Tesoreria::findOrFail($id);
        $tesoreria->active = 1;
        $tesoreria->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.tesoreria.index'));
    }
}
