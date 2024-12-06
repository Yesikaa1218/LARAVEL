<?php

namespace App\Exports;

use App\Models\PlanEstudios;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlanEstudiosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PlanEstudios::all();
    }
}
