<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEstudiosCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_estudios_cambios', function (Blueprint $table) {
            $table->id(); // Columna 'id'
            $table->string('nombre'); // Columna 'nombre'
            $table->integer('año'); // Columna 'año'
            $table->timestamps(); // Crea 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_estudios_cambios');
    }
}
