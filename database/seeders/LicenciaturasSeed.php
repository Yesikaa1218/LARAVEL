<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Licenciatura;
class LicenciaturasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Licenciatura::create([
            'nombre_licenciatura' => 'Matemáticas',
            'slug' => 'matematicas'
        ]);
        Licenciatura::create([
            'nombre_licenciatura' => 'Física',
            'slug' => 'fisica'
        ]);
        Licenciatura::create([
            'nombre_licenciatura' => 'Ciencias Computacionales',
            'slug' => 'ciencias-computacionales'
        ]);
        Licenciatura::create([
            'nombre_licenciatura' => 'Actuaría',
            'slug' => 'actuaria'
        ]);
        Licenciatura::create([
            'nombre_licenciatura' => 'Multimedia y Animación Digital',
            'slug' => 'multimedia-y-animacion-digital'
        ]);
        Licenciatura::create([
            'nombre_licenciatura' => 'Seguridad en T.I.',
            'slug' => 'seguridad-en-ti'
        ]);

    }
}
