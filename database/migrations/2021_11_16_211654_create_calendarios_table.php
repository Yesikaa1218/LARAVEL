<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('fecha_inicial');
            $table->time('hora_inicial');
            $table->date('fecha_final');
            $table->time('hora_final');
            $table->text('content_page');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
                ->references('id')->on('calendario_categorias')
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
        Schema::dropIfExists('calendarios');
    }
}
