<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromEmpleados extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            // En la reversión, puedes volver a agregar la columna 'user_id' si es necesario
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
