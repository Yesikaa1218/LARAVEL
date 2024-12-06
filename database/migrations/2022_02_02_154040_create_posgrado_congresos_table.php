<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosgradoCongresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posgrado_congresos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('fecha_evento');
            $table->date('fecha_inicial_registro');
            $table->date('fecha_final_registro');
            $table->text('content_page');
            $table->string('image_description'); 
            $table->string('image')->nullable();;
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('registro_activo')->default(0);
            $table->unsignedBigInteger('posgrado_id');
            $table->foreign('posgrado_id')
            ->references('id')->on('posgrados')
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
        Schema::dropIfExists('posgrado_congresos');
    }
}
