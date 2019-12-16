<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            //SI NO FUNCIONA, AÑADIR STRING MEDICO Y PACIENTE. Y en todas las tablas.
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('paciente_id');
            $table->unsignedInteger('localizacion_id');
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();

            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('restrict');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('restrict');
            $table->foreign('localizacion_id')->references('id')->on('localizacions')->onDelete('restrict');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');

    }
}
