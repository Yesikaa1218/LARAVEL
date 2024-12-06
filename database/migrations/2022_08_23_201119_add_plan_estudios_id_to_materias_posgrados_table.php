<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanEstudiosIdToMateriasPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materias_posgrados', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_estudios_id')->nullable();
            $table->foreign('plan_estudios_id')
                            ->references('id')->on('planes_estudios_posgrado')
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
        Schema::table('materias_posgrados', function (Blueprint $table) {
            $table->dropColumn('plan_estudios_id');
        });
    }
}
