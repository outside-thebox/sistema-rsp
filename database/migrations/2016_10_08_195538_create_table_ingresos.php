<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->string('apellido_declarado',100);
            $table->string('nombre_declarado',100);
            $table->date('fecha_nacimiento');

            $table->integer('tipo_documento_declarado_id')->unsigned()->nullable();
            $table->string('nro_documento_declarado',20);
            $table->string('origen_documento_declarado',50);
            $table->string('apellido_real',100);
            $table->string('nombre_real',100);
            $table->integer('tipo_documento_real_id')->unsigned()->nullable();
            $table->string('nro_documento_real',20);
            $table->string('origen_documento_real',50);
            $table->string('otros_nombres',100);
            $table->string('alias',100);
            $table->integer('nacionalidad_id')->unsigned()->nullable();
            $table->string('lugar_nacimiento',100);
            $table->integer('genero_id')->unsigned()->nullable();
            $table->integer('estado_civil_id')->unsigned()->nullable();
            $table->integer('profesion_id')->unsigned()->nullable();
            $table->string('identificador_local',20);
            $table->date('fecha_egreso');
            $table->boolean('reincidente');
            $table->boolean('curatela');
            $table->boolean('medida_curativa');
            $table->boolean('alojado');
            $table->integer('jurisdiccion_id')->unsigned()->nullable();
            $table->boolean('procesos_pendientes');
            $table->integer('situacion_legal_id')->unsigned()->nullable();
            $table->text('observaciones');
            $table->string('causa_existente_id',100)->nullable();
            $table->timestamps();
            $table->softDeletes();



            $table->foreign('tipo_documento_declarado_id')->references('id')->on('tipos_documentos');
            $table->foreign('tipo_documento_real_id')->references('id')->on('tipos_documentos');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidades');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles');
            $table->foreign('profesion_id')->references('id')->on('profesiones');
            $table->foreign('jurisdiccion_id')->references('id')->on('jurisdicciones');
            $table->foreign('situacion_legal_id')->references('id')->on('situaciones_legales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingresos');
    }
}
