<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('empleados_materias2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fkEmpleado')->unsigned();;
            $table->bigInteger('fkMateria')->unsigned();;
            $table->boolean('Activo');
            $table->timestamps();

            // Definición de las restricciones de clave foránea
            $table->foreign('fkEmpleado')->references('id')->on('empleados');
            $table->foreign('fkMateria')->references('id')->on('materias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados_materias2');
    }
}

