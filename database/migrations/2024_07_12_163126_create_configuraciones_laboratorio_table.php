<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionesLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laboratorio_id')->constrained('examen')->onDelete('cascade');
            $table->string('elemento_id');
            $table->string('tipo_elemento');
            $table->string('posicion_top');
            $table->string('posicion_left');
            $table->string('width');
            $table->string('height');
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
        Schema::dropIfExists('configuraciones_laboratorio');
    }
}
