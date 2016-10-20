<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngresosFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingreso_id')->unsigned();
            $table->string('foto',100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ingreso_id')->references('id')->on('ingresos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingresos_fotos');
    }
}
