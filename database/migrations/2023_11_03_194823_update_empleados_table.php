<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('contrasena', 191)->nullable(false);
            $table->string('Firma', 255)->change();
            $table->unique('NoEmpleado');
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('contrasena', 191)->nullable(false)->change();
            $table->string('Firma', 100)->change();
            $table->dropUnique('empleados_noempleado_unique');
        });
    }
}

