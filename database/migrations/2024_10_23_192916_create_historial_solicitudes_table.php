<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialSolicitudes', function (Blueprint $table) {
            $table->id();
            $table->integer('idSolicitud'); 
            $table->integer('idEmpleado');
            $table->string('accion', 150);
            $table->timestamp('fecha')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_solicitudes');
    }
}
