<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_cambios', function (Blueprint $table) {
            $table->id(); // Columna 'id'
            $table->string('nombre'); // Columna 'nombre'
            $table->integer('plan_estudios_id'); // Columna 'plan_estudios_id'
            $table->integer('active'); // Columna 'active'
            $table->string('clave', 255); // Columna 'clave' (varchar con longitud por defecto de 255)
            $table->timestamps(); // Crea 'created_at' y 'updated_at'
            $table->softDeletes(); // Crea 'deleted_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias_cambios');
    }
}
