<?php

namespace Database\Seeders;

use App\Models\Posgrado;
use Illuminate\Database\Seeder;

class PosgradoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Posgrado::create([
            'nombre_posgrado' => 'Maestría en Ciencias con Orientación en Matemáticas',
            'slug' => 'maestria-en-ciencias-con-orientacion-en-matematicas'
        ]);
        Posgrado::create([
            'nombre_posgrado' => 'Maestría en Ingeniería Física',
            'slug' => 'maestria-en-ingenieria-fisica'
        ]);
        Posgrado::create([
            'nombre_posgrado' => 'Maestría en Ing. en Seguridad de la Información',
            'slug' => 'maestria-en-ing-en-seguridad-de-la-informacion'
        ]);
        Posgrado::create([
            'nombre_posgrado' => 'Maestría en Astrofísica Planetaria y Tecnologías Afines',
              'slug' => 'maestria-en-astrofisica-planetaria-y-tecnologias-afines'
        ]);
        Posgrado::create([
            'nombre_posgrado' => 'Doctorado en Matemáticas',
            'slug' => 'doctorado-en-matematicas'
        ]);

        Posgrado::create([
            'nombre_posgrado' => 'Doctorado en Ingeniería Física',
            'slug' => 'doctorado-en-ingenieria-fisica'
        ]);

        Posgrado::create([
            'nombre_posgrado' => 'Maestría en Ciencia de Datos',
            'slug' => 'maestria-en-ciencia-de-datos'
        ]);
    }
}
