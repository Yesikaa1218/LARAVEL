<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemaLaboratorioExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problema_laboratorio_examen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examen_id');
            $table->foreign('examen_id')
             ->references('id')->on('examen')
             ->onDelete('cascade');
            $table->unsignedBigInteger('problema_laboratorio_id');
            $table->foreign('problema_laboratorio_id')
             ->references('id')->on('problema_laboratorio')
             ->onDelete('cascade');  
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
        Schema::dropIfExists('problema_laboratorio_examen');
    }
}
