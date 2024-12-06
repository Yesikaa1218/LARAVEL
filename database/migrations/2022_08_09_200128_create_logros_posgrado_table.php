<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogrosPosgradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logros_posgrado', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('nombre_profesor');
            $table->tinyInteger('active')->default(0);
            $table->string('archivo')->nullable();
            $table->unsignedBigInteger('posgrado_profesores_id');
            $table->foreign('posgrado_profesores_id')
            ->references('id')->on('posgrado_profesores')
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
        Schema::dropIfExists('logros_posgrado');
    }
}
