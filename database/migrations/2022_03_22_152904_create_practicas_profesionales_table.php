<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticasProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicas_profesionales', function (Blueprint $table) {
            $table->id();
            $table->text('content_page');
            $table->string('image_description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('practicas_profesionales');
    }
}
