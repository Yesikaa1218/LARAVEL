<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* $this->call([PermissionSeed::class]);
        $this->call([PosgradoSeed::class]);
        $this->call([LicenciaturasSeed::class]); */
        $this->call([UserSeeder::class]);

    }
}
