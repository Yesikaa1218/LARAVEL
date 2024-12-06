<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongresosUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congresos_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email'); 
            $table->string('password');
            $table->string('phone');
            $table->string('adscripcion')->nullable();
            $table->string('image')->nullable(); 
            $table->timestamps();
            $table->softDeletes(); // olaa oli
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congresos_users');
    }
}
