<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosgradoIdToSeccionLibrePosgradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seccion_libre_posgrado', function (Blueprint $table) {
            $table->unsignedBigInteger('posgrado_id');
            $table->foreign('posgrado_id')
            ->references('id')->on('posgrados')
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
        Schema::table('seccion_libre_posgrado', function (Blueprint $table) {
            $table->dropColumn('posgrado_id');
        });
    }
}
