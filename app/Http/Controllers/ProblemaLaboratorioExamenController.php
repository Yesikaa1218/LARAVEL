<?php

namespace App\Http\Controllers;
use App\Models\ProblemaLaboratorioExamen;
use App\Models\ProblemasLaboratorio;
use App\Models\Examen;
use App\Models\LaboratorioInformacion;
use App\Models\TemaMateria;
use App\Models\MateriaLaboratorio;
use PDF;

use Illuminate\Http\Request;

class ProblemaLaboratorioExamenController extends Controller
{
    public function imprimirExamen($examenId){
        $problemaLaboratorioExamen = ProblemaLaboratorioExamen::with('examen')->where('examen_id', $examenId)->get();
        $problemaLaboratorio = ProblemasLaboratorio::all();
        $examen = Examen::where('id', $examenId)->get();
        $laboratorioInformacion = LaboratorioInformacion::with('temamateria')->where('examen_id', $examenId)->get();
        $temaMateria = TemaMateria::all();
        $materiaLaboratorio = MateriaLaboratorio::all()->take(1);
        return view('System.LaboratorioMatematicas.ProblemasLaboratorioExamen.pdf', 
                compact('problemaLaboratorioExamen', 'problemaLaboratorio', 'examen', 'laboratorioInformacion', 
                        'temaMateria', 'materiaLaboratorio'));
    }
}
