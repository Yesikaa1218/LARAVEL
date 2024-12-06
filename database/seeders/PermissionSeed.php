<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superAdmin = Role::create(['name' => 'SuperAdmin']);
          // Coordinadores de licenciatura
          $licenciaturas = Role::create(['name' =>'Licenciatura']);
          $coordinadorLicenciaturaLMAD = Role::create(['name' => 'CoordinadorLicenciaturaLMAD']);
          $coordinadorLicenciaturaLCC = Role::create(['name' => 'CoordinadorLicenciaturaLCC']);
          $coordinadorLicenciaturaLA = Role::create(['name' => 'CoordinadorLicenciaturaLA']);
          $coordinadorLicenciaturaLSTI = Role::create(['name' => 'CoordinadorLicenciaturaLSTI']);
          $coordinadorLicenciaturaLM = Role::create(['name' => 'CoordinadorLicenciaturaLM']);
          $coordinadorLicenciaturaLF = Role::create(['name' => 'CoordinadorLicenciaturaLF']);

          // Coordinadores de maestrías
          $posgrados = Role::create(['name' =>'Posgrado']);
          $coordinadorMaestriaCOM = Role::create(['name' => 'CoordinadorMaestriaCOM']);
          $coordinadorMaestriaIF = Role::create(['name' => 'CoordinadorMaestriaIF']);
          $coordinadorMaestriaISI = Role::create(['name' => 'CoordinadorMaestriaISI']);
          $coordinadorMaestriaAPTA = Role::create(['name' => 'CoordinadorMaestriaAPTA']);

          // Coordinadores de doctorado
          $coordinadorDoctoradoM = Role::create(['name' => 'CoordinadorDoctoradoM']);
          $coordinadorDoctoradoIF = Role::create(['name' => 'CoordinadorDoctoradoIF']);

          // Departamentos
          $avisos = Role::create(['name' => 'Avisos']);
          $calendario = Role::create(['name' => 'Calendario']);
          $facultad = Role::create(['name' => 'Facultad']);
          $asesoria = Role::create(['name' => 'Asesoria']);
          $universidadSaludable = Role::create(['name' => 'Universidad_saludable']);
          $actividades = Role::create(['name' => 'ActividadesCulturales']);
          $caadi = Role::create(['name' => 'CAADI']);
          $biblioteca = Role::create(['name' => 'Biblioteca']);
          $internacionalizacion = Role::create(['name' => 'Internacionalizacion']);
          $asuntosUniversitarios = Role::create(['name' => 'AsuntosUniversitarios']);
          $deportivo = Role::create(['name' => 'Deportivo']);
          $emprendedores = Role::create(['name' => 'Emprendedores']);
          $becas = Role::create(['name' => 'Becas']);

          $educacionContinua = Role::create(['name' => 'EducacionContinua']);
          $sustentabilidad = Role::create(['name' => 'Sustentabilidad']);
            $calidadEducativa = Role::create(['name' => 'CalidadEducativa']);

        $escolar = Role::create(['name' => 'Escolar']);


        $estrategiadigital = Role::create(['name'=> 'EstrategiaDigital']);
        $unidadlinares = Role::create(['name'=> 'UnidadLinares']);

        $servicioSocial = Role::create(['name'=> 'ServicioSocial']);

        // Super Admin
        Permission::create(['name' => 'SuperAdmin'])->syncRoles([$superAdmin]);

        // Modificar licenciaturas
        Permission::create(['name' => 'licenciaturas'])->syncRoles([$licenciaturas]);
        Permission::create(['name' => 'licenciaturas.lmad'])->syncRoles([$coordinadorLicenciaturaLMAD]);
        Permission::create(['name' => 'licenciaturas.lcc'])->syncRoles([$coordinadorLicenciaturaLCC]);
        Permission::create(['name' => 'licenciaturas.la'])->syncRoles([$coordinadorLicenciaturaLA]);
        Permission::create(['name' => 'licenciaturas.lsti'])->syncRoles([$coordinadorLicenciaturaLSTI]);
        Permission::create(['name' => 'licenciaturas.lf'])->syncRoles([$coordinadorLicenciaturaLF]);
        Permission::create(['name' => 'licenciaturas.lm'])->syncRoles([$coordinadorLicenciaturaLM]);

        Permission::create(['name' => 'posgrados'])->syncRoles([$posgrados]);
        // Modificar maestrías
        Permission::create(['name' => 'posgrado.maestria.com'])->syncRoles([$coordinadorMaestriaCOM]);
        Permission::create(['name' => 'posgrado.maestria.if'])->syncRoles([$coordinadorMaestriaIF]);
        Permission::create(['name' => 'posgrado.maestria.isi'])->syncRoles([$coordinadorMaestriaISI]);
        Permission::create(['name' => 'posgrado.maestria.apta'])->syncRoles([$coordinadorMaestriaAPTA]);

        // Modificar doctorados
        Permission::create(['name' => 'posgrado.doctorado.m'])->syncRoles([$coordinadorDoctoradoM]);
        Permission::create(['name' => 'posgrado.doctorado.if'])->syncRoles([$coordinadorDoctoradoIF]);

        // Modificar departamentos
        Permission::create(['name' => 'avisos'])->syncRoles([$avisos]);
        Permission::create(['name' => 'calendario'])->syncRoles([$calendario]);
        Permission::create(['name' => 'facultad'])->syncRoles([$facultad]);
        Permission::create(['name' => 'asesorias'])->syncRoles([$asesoria]);
        Permission::create(['name' => 'universidad_saludable'])->syncRoles([$universidadSaludable]);
        Permission::create(['name' => 'actividades-culturales'])->syncRoles([$actividades]);
        Permission::create(['name' => 'asuntos-universtiarios'])->syncRoles([$asuntosUniversitarios]);
        Permission::create(['name' => 'caadi'])->syncRoles([$caadi]);
        Permission::create(['name' => 'biblioteca'])->syncRoles([$biblioteca]);
        Permission::create(['name' => 'internacionalizacion'])->syncRoles([$internacionalizacion]);
        Permission::create(['name' => 'deportivo'])->syncRoles([$deportivo]);
        Permission::create(['name' => 'emprendedores'])->syncRoles([$emprendedores]);
        Permission::create(['name' => 'becas'])->syncRoles([$becas]);

        Permission::create(['name' => 'educacion-continua'])->syncRoles([$educacionContinua]);
        Permission::create(['name' => 'sustentabilidad'])->syncRoles([$sustentabilidad]);

        Permission::create(['name' => 'calidad-educativa'])->syncRoles([$calidadEducativa]);

        Permission::create(['name' => 'escolar'])->syncRoles([$escolar]);
        $coordinadorMaestriaCDD = Role::create(['name' => 'CoordinadorMaestriaCDD']);
        Permission::create(['name' => 'posgrado.maestria.cdd'])->syncRoles([$coordinadorMaestriaCDD]);


        Permission::create(['name' => 'estrategia-digital'])->syncRoles([$estrategiadigital]);
        Permission::create(['name' => 'unidad-linares'])->syncRoles([$unidadlinares]);



        Permission::create(['name' => 'servicio-social'])->syncRoles([$servicioSocial]);

    }
}
