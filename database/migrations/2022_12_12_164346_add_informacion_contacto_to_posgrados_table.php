<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformacionContactoToPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posgrados', function (Blueprint $table) {
            $table->string('correo')->nullable()->after('nombre_coordinador_posgrado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posgrados', function (Blueprint $table) {
            $table->string('correo');
        });
    }
}
