<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcreditacionesIndicadoresPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acreditaciones_indicadores_posgrados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('valor');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('posgrado_id');
            $table->foreign('posgrado_id')
                ->references('id')->on('posgrados')
                ->onDelete('cascade');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acreditaciones_indicadores_posgrados');
    }
}
