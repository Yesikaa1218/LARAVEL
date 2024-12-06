<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesEstudiosPosgrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_estudios_posgrado', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('posgrado_id');
            $table->foreign('posgrado_id')
            ->references('id')->on('posgrados')
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
        Schema::dropIfExists('planes_estudios_posgrado');
    }
}
