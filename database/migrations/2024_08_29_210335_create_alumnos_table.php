<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' de tipo BIGINT y la marca como autoincremental y clave primaria
            $table->integer('Matricula'); // Crea una columna 'Matricula' de tipo INT
            $table->string('Nombre'); // Crea una columna 'Nombre' de tipo VARCHAR
            $table->integer('Plan'); // Crea una columna 'Plan' de tipo INT
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
