<?php

namespace App\Exports;

use App\Models\Materia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UnidadesAprendizajeLicenciaturaExport implements FromView
{
    /*
     @return \Illuminate\Support\Collection
    
    public function collection()
    {
        return Materia::all();
    }
    */
    public $planId;
    
    public function __construct($planId)
    {
        $this->planId = $planId;
    }

    public function view(): View
    {
        return view('exports.unidadesaprendizaje', [
            'unidades' => Materia::where('plan_de_estudio_id', $this->planId)->get()
        ]);
    }
}
