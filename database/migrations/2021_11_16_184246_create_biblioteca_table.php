<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblioteca', function (Blueprint $table) {
            $table->id();
            $table->text('servicios');
            $table->text('horarios');
            $table->text('reglamento');
            $table->string('link1')->nullable();
            $table->text('texto_link1')->nullable();
            $table->string('link2')->nullable();
            $table->text('texto_link2')->nullable();
            $table->string('link3')->nullable();
            $table->text('texto_link3')->nullable();
            $table->string('link4')->nullable();
            $table->text('texto_link4')->nullable();
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
        Schema::dropIfExists('biblioteca');
    }
}
