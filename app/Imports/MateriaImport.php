<?php

namespace App\Imports;

use Illuminate\Validation\Rule;
use App\Models\Materia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class MateriaImport implements 
    ToModel, 
    WithHeadingRow, 
    WithValidation,
    WithBatchInserts,
    WithChunkReading
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Materia([
            'materia_licenciatur'       => $row['nombre_unidad_aprendizaje'],
            'creditos_materia_lic'      => $row['creditos'],
            'horas_semana_materia_lic'  => $row['horas_por_semana'],
            'optativa_materia_lic'      => $row['optativa'],
            'semestre_materia_lic'      => $row['semestre'],
            'descripcion_materia_lic'   => $row['descripcion'],
            'requisitos_materia_lic'    => $row['requisitos'],
        ]);
    }

    public function rules(): array
    {
        return[
            '*.materia_licenciatur'       => ['required'],
            '*.creditos_materia_lic'      => ['required'],
            '*.horas_semana_materia_lic'  => ['required'],
            '*.optativa_materia_lic'      => ['required'],
            '*.semestre_materia_lic'      => ['required'],
            '*.descripcion_materia_lic'   => ['required'],
            '*.requisitos_materia_lic'    => ['required'],
        ];
    }

    public function batchSize(): int
    {
        return 50;
    }
    
    public function chunkSize(): int
    {
        return 50;
    }
}