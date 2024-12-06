<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambiosCalificacionesSolicitudes2Table extends Migration
{
    public function up()
    {
        Schema::create('cambiosCalificacionesSolicitudes', function (Blueprint $table) {
            $table->bigIncrements('idSolicitudCambio');
            $table->bigInteger('fkGrupo')->unsigned();
            $table->bigInteger('fkPlan')->unsigned();
            $table->boolean('Estatus'); // 0-No enviada, 1-enviada
            $table->boolean('Activo');

            // Añade las restricciones (constraints) de clave foránea
            $table->foreign('fkGrupo', 'fk_Grupoccs')->references('idGrupo')->on('grupos');
            $table->foreign('fkPlan', 'fk_planccs')->references('id')->on('planes_de_estudios');
        });
    }

    public function down()
    {
        Schema::table('cambiosCalificacionesSolicitudes', function (Blueprint $table) {
            // Elimina las restricciones (constraints) de clave foránea
            $table->dropForeign('fk_Grupoccs');
            $table->dropForeign('fk_planccs');
        });

        Schema::dropIfExists('cambiosCalificacionesSolicitudes');
    }
}

