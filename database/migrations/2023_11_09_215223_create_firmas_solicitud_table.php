<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmasSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FirmasSolicitud', function (Blueprint $table) {
            $table->id(); // Esto creará una columna 'id' autoincremental

            $table->bigInteger('solicitud_id')->unsigned();
            $table->foreign('solicitud_id')->references('idSolicitudCambio')->on('cambioscalificacionessolicitudes');

            $table->string('firmaEscolar', 255)->nullable();
            $table->string('firmaDocente', 255)->nullable();
            $table->string('firmaCoordinador', 255)->nullable();
            $table->string('firmaSubAcademico', 255)->nullable();

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FirmasSolicitud');
    }
}

