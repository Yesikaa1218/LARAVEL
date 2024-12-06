<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambiosCalificacionesSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('cambios_calificaciones_solicitudes', function (Blueprint $table) {
            $table->increments('idSolicitudCambio');
            $table->integer('fkGrupoMateria')->unsigned();
            $table->integer('fkPlan')->unsigned();
            $table->boolean('Estatus')->default(0); // 0-No enviada, 1-Enviada
            $table->boolean('Activo');
            $table->timestamps();

            $table->foreign('fkGrupoMateria')->references('idGrupoEmpleado')->on('grupos_empleados');
            $table->foreign('fkPlan')->references('idPlan')->on('planes_de_estudio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cambios_calificaciones_solicitudes');
    }
}

