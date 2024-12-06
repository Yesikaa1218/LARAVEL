<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            //slider
            $table->string('slider_title')->nullable();
            $table->string('slider_sub_title')->nullable();
            $table->string('slider_image')->nullable();
            //Mensaje Director
            $table->string('director_sub_title')->nullable();
            $table->string('director_name')->nullable();
            $table->string('director_image')->nullable();
            $table->text('director_content')->nullable();
            //Video Director
            $table->string('video_sub_title')->nullable();
            $table->string('video_image')->nullable();
            $table->string('video_url')->nullable();
            //Indicadores
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
        Schema::dropIfExists('home_page');
    }
}
