<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratorioInformacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorio_informacion', function (Blueprint $table) {
            $table->unsignedBigInteger('examen_id');
            $table->foreign('examen_id')
             ->references('id')->on('examen')
             ->onDelete('cascade');
            $table->unsignedBigInteger('materia_laboratorio_id');
            $table->foreign('materia_laboratorio_id')
             ->references('id')->on('materia_laboratorio')
             ->onDelete('cascade');
            $table->unsignedBigInteger('tema_materia_id');
            $table->foreign('tema_materia_id')
             ->references('id')->on('tema_materia')
             ->onDelete('cascade');
            $table->integer('cantidad_problemas');   
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratorio_informacion');
    }
}
