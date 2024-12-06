<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLaboratorioInfIdToProblemaLaboratorioExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problema_laboratorio_examen', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratorio_inf_id')->after('id');
            $table->foreign('laboratorio_inf_id')
             ->references('id')->on('laboratorio_informacion')
             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problema_laboratorio_examen', function (Blueprint $table) {
            $table->dropForeign('problema_laboratorio_examen_laboratorio_inf_id_foreign');
            $table->dropColumn('laboratorio_inf_id');
        });
    }
}
