<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongresoLicenciaturaRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congreso_licenciatura_registro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('congresos_users_id');
            $table->unsignedBigInteger('licenciatura_congresos_id')->nullable();
            $table->foreign('congresos_users_id')
                            ->references('id')->on('congresos_users')
                            ->onDelete('cascade'); 
            $table->foreign('licenciatura_congresos_id')
            ->references('id')->on('licenciatura_congresos')
            ->onDelete('cascade'); 
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
        Schema::dropIfExists('congreso_licenciatura_registro');
    }
}
