<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosgradoProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posgrado_profesores', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('nombre_profesor');
            $table->string('email');
            $table->string('contacto')->nullable();
            $table->string('imagen')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('posgrado_profesores');
    }
}
