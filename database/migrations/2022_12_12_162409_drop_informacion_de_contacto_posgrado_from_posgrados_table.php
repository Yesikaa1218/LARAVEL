<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropInformacionDeContactoPosgradoFromPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posgrados', function (Blueprint $table) {
            $table->dropColumn('informacion_de_contacto_posgrado');
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
            $table->text('informacion_de_contacto_posgrado')->nullable();
        });
    }
}
