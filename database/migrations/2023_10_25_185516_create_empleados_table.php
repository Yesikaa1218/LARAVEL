<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('NoEmpleado');
            $table->string('Nombre', 25);
            $table->string('ApPaterno', 25);
            $table->string('ApMaterno', 25);
            $table->string('Firma', 100)->nullable();
            $table->boolean('Activo');
            $table->unsignedBigInteger('user_id'); // Agregamos una columna para la clave foránea
            $table->timestamps();

            // Definimos la restricción de clave foránea
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}

