<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanesEstudioIdToMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_de_estudio_id');
            $table->foreign('plan_de_estudio_id')
                            ->references('id')->on('planes_de_estudios')
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
        Schema::table('materias', function (Blueprint $table) {
            $table->dropColumn('plan_de_estudio_id');
        });
    }
}
