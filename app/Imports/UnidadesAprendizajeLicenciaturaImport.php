<?php

namespace App\Imports;

use App\Models\Materia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnidadesAprendizajeLicenciaturaImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function model(array $row)
    {
        return new Materia([
            'materia_licenciatur' => $row['nombre'],
            'creditos_materia_lic' => $row['creditos'],
            'horas_semana_materia_lic' => $row['horas'],
            'optativa_materia_lic' => $row['optativa'],
            'semestre_materia_lic' => $row['semestre'],
            'descripcion_materia_lic' => $row['descripcion'],
            'requisitos_materia_lic' => $row['requisitos'],
            'licenciatura_id' => $this->data['licenciaturaId'],
            'plan_de_estudio_id' => $this->data['planId']
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            '*.nombre' => ['required'],
            '*.creditos' => ['required'],
            '*.horas' => ['required', 'integer'],
            '*.optativa' => ['required', 'integer'],
            '*.semestre' => ['required', 'integer'],
            '*.descripcion' => ['required'],
            '*.requisitos' => ['required']
        ];
    }
}
