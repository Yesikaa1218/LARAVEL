<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumnos;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Alumnos::factory()->count(20)->create();
    }
}
