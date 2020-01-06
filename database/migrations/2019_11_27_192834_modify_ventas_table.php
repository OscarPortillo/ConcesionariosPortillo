<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->integer('id_cliente')->unsigned()->after('id');
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_empleado')->unsigned()->after('id_cliente');
            $table->foreign('id_empleado')->references('id')->on('users');

            $table->string('bastidorCoche')->after('id_empleado');
            $table->foreign('bastidorCoche')->references('numeroBastidor')->on('coches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('ventas_id_cliente_foreign');
            $table->dropcolumn('id_cliente');

            $table->dropForeign('ventas_id_empleado_foreign');
            $table->dropcolumn('id_empleado');

            $table->dropForeign('ventas_bastidorcoche_foreign');
            $table->dropcolumn('bastidorCoche');
        });
    }
}
