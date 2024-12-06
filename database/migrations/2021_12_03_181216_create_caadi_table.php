<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caadi', function (Blueprint $table) {
            $table->id();
            $table->text('servicios');
            $table->string('image')->nullable();
            $table->string('image_description')->nullable();
            $table->text('reglamento');
            $table->text('inscripciones');
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
        Schema::dropIfExists('caadi');
    }
}
