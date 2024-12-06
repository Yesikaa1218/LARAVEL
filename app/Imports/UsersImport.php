<?php

namespace App\Imports;

use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
     * 
    */
    public function collection(Collection $rows)
    {   
        foreach($rows as $row){
            if (is_null($row['noempleado']) || is_null($row['nombre']) || is_null($row['appaterno']) || is_null($row['apmaterno']) || is_null($row['contrasena'])) {
                // Manejar el caso donde se encuentra un campo NULL
                echo "Se encontró un campo NULL. Deteniendo el proceso.";
                break; // Detener el bucle foreach
            }
            Empleado::create([
                'NoEmpleado' => intval($row['noempleado']),
                'Nombre' => $row['nombre'],
                'ApPaterno' => $row['appaterno'],
                'ApMaterno' => $row['apmaterno'],
                'contrasena' => Hash::make($row['contrasena']),
                'Activo' => TRUE,
            ]);
        }

    }
}
