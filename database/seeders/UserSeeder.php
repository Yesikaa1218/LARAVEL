<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



         User::create([
         'name' => 'Usuario Admin',
         'email' => 'admin@fcfm.com',
         'email_verified_at' => now(),
         'password' => Hash::make('uCoTcL@#riKt'),
         'created_at' => now(),
         'updated_at' => now()
    ])->assignRole(['SuperAdmin']);
        /*

                User::create([
                     'name' => 'ALMA PATRICIA CALDERÓN MARTÍNEZ',
                     'email' => 'alma.calderonmrt@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('aIv&%lD^TOeK'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['CoordinadorLicenciaturaLMAD', 'Licenciatura']);
                     //  ])->assignRole(['CoordinadorMaestriaCOM', 'Posgrado']);


                 User::create([
                     'name' => 'MARIANA GABRIELA CARDENAS LOZANO',
                     'email' => 'mariana.cardenaslo@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('Hm%kpYTPJk%5'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Universidad_saludable']);


                 User::create([
                     'name' => 'LILIA GUADALUPE GARCÍA FIGUEROA',
                     'email' => 'lilia.garciafg@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('26fq5hCd!VrM'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Asesoria']);


                 User::create([
                     'name' => 'ABIGAIL CONTRERAS MENDOZA',
                     'email' => 'abigail.contrerasmnd@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['CoordinadorLicenciaturaLA', 'Licenciatura']);

                 //contraseñas pls
                 User::create([
                     'name' => 'ARTURO ERICK TORRES CAVAZOS',
                     'email' => 'arturo.torrescv@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'AZUCENA YOLOXOCHITL RIOS MERCADO',
                     'email' => 'azucena.riosmr@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'ESMERALDA ROMERO HERNANDEZ',
                     'email' => 'esmeralda.romerohdz@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'EDGAR MARTINEZ GUERRA',
                     'email' => 'edgar.martinezgrr@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'OMAR JORGE IBARRA ROJAS',
                     'email' => 'omar.ibarrarj@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'JOSE FERNANDO CAMACHO VALLEJO',
                     'email' => 'jose.camachovl@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                 User::create([
                     'name' => 'FRANCISCO JOSE SOLIS POMAR',
                     'email' => 'francisco.solispm@uanl.edu.mx',
                     'email_verified_at' => now(),
                     'password' => Hash::make('N9A4CnyNhIe%'),
                     'created_at' => now(),
                     'updated_at' => now()
                     ])->assignRole(['Posgrado']);


                   User::create([
                       'name' => 'PERLA MARLENE VIERA GONZALEZ',
                       'email' => 'perla.vieragn@uanl.edu.mx',
                       'email_verified_at' => now(),
                       'password' => Hash::make('N3A8XnyAhIb%'),
                       'created_at' => now(),
                       'updated_at' => now()
                   ])->assignRole(['CoordinadorLicenciaturaLCC', 'Licenciatura']);


                     User::create([
                           'name' => 'FRANCISCO JOSE SOLIS POMAR',
                           'email' => 'francisco.solispm@uanl.edu.mx',
                           'email_verified_at' => now(),
                           'password' => Hash::make('N9A4CnyNhIe%'),
                           'created_at' => now(),
                           'updated_at' => now()
                       ])->assignRole(['Posgrado']);


                    User::create([
                        'name' => 'FRANCISCO RODRIGUEZ RAMIREZ',
                        'email' => 'francisco.rodriguezrm@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('4dWno0CnTJ$C'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Biblioteca']);


                    User::create([
                        'name' => 'ADRIANA ARIAS AGUILAR',
                        'email' => 'adriana.ariasagl@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('QjJ$G8thAv$R'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Biblioteca']);

                    User::create([
                        'name' => 'MARIA ESTHER GRIMALDO REYNA',
                        'email' => 'maria.grimaldory@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('O^*8@aEKCq8f'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Licenciatura', 'CoordinadorLicenciaturaLM']);

                    User::create([
                        'name' => 'GUILLERMO EZEQUIEL SANCHEZ GUERRERO',
                        'email' => 'guillermo.sanchezgr@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('dJ6CSI$%w3w5'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Licenciatura', 'CoordinadorLicenciaturaLCC']);



                    User::create([
                        'name' => 'MIGUEL ALEJANDRO CANDELARIA CORONADO',
                        'email' => 'miguel.candelariacr@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('E@csN4XNiGNy'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['EducacionContinua']);

                    User::create([
                        'name' => 'MARIA DEL CONSUELO VAZQUEZ GRACIA',
                        'email' => 'consuelo.vazquezgr@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('h9LUI%eq*Cfn'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Sustentabilidad']);

                    User::create([
                        'name' => 'ALEIDA MAGDALENA GIL GONZALEZ',
                        'email' => 'aleida.gilgn@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('$Q^xaL^lvTN@'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['CalidadEducativa']);



                    User::create([
                        'name' => 'MIRIAM PATRICIA VARGAS ZUÑIGA',
                        'email' => 'miriam.vargaszn@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('$L^xrL^jvWx@'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Escolar', 'Avisos']);

                    User::create([
                        'name' => 'EULALIA LARA ALVAREZ',
                        'email' => 'elara018427@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('$X^r5Y^jvUh@'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Escolar', 'Avisos']);


                    User::create([
                        'name' => 'ERICK AZAEL RAMIREZ AGUILAR',
                        'email' => 'erick.ramirezgl@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('$Y^r2Y=jTUj$'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['AsuntosUniversitarios', 'Avisos']);

                    User::create([
                        'name' => 'GLORIA SUSANA CASTAÑEDA REYNA',
                        'email' => 'gloria.castanedar@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('$X^T2h*rZaj@'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['AsuntosUniversitarios', 'Avisos']);

                     User::create([
                        'name' => 'ADRIANA CARRILLO LEAL',
                        'email' => 'acarrillol@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('#X*B8h^rMar$'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['SuperAdmin']);


                    User::create([
                        'name' => 'NORA ELBA ALEJO CASTILLO',
                        'email' => 'nalejo0fm080@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('#T*M8j^yMos$'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['CAADI']);




                    User::create([
                        'name' => 'LAZARO TREVIÑO CASTILLO',
                        'email' => 'lazaro.trevinocs@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('#U*N7p^yYeZ$'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Internacionalizacion']);

                    User::create([
                        'name' => 'ELI MARTÍN LAFUENTE GUERRA',
                        'email' => 'elag099782@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('5o#H&EtQ^b%t'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['EstrategiaDigital']);

                    User::create([
                        'name' => 'DILIA CECILIA MORENO SALDIVAR',
                        'email' => 'dilia.morenosldv@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('Ap4Ih&YMGAl1'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['UnidadLinares']);



                    User::create([
                        'name' => 'RAFAEL ALBERTO ROSAS TORRES',
                        'email' => 'rafael.rosastr@uanl.edu.mx',
                        'email_verified_at' => now(),
                        'password' => Hash::make('r8IigPr3Z^#3'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ])->assignRole(['Emprendedores']);

             User::create([
                 'name' => 'DILIA MARIA SALDIVAR FLORES',
                 'email' => 'dilia.saldivarfl@uanl.edu.mx',
                 'email_verified_at' => now(),
                 'password' => Hash::make('H&M5t0&5Up#*'),
                 'created_at' => now(),
                 'updated_at' => now()
             ])->assignRole(['UnidadLinares']);



             User::create([
                 'name' => 'DANIEL RAUL ACOSTA MARTINEZ',
                 'email' => 'daniel.acostamrt@uanl.edu.mx',
                 'email_verified_at' => now(),
                 'password' => Hash::make('$R^T5k*wZtj@'),
                 'created_at' => now(),
                 'updated_at' => now()
             ])->assignRole(['AsuntosUniversitarios', 'Avisos']);

         */

    }
}
