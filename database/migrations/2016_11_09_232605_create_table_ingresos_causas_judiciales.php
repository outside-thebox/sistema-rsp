<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngresosCausasJudiciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_causas_existentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingreso_id')->unsigned();
            $table->integer('causa_existente_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ingreso_id')->references('id')->on('ingresos');
            $table->foreign('causa_existente_id')->references('id')->on('causas_existentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingresos_causas_judiciales');
    }
}
