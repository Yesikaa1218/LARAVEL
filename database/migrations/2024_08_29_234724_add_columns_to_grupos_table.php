<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Agregar nuevas columnas
            $table->integer('grupo')->nullable();
            $table->string('horario')->nullable();
            $table->string('frecuencia', 2)->nullable(); // Limitar a 2 caracteres
            $table->string('aula')->nullable();
            $table->integer('plan')->nullable();
            $table->string('modalidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Eliminar columnas en caso de rollback
            $table->dropColumn(['grupo', 'horario', 'frecuencia', 'aula', 'plan', 'modalidad']);
        });
    }
}
