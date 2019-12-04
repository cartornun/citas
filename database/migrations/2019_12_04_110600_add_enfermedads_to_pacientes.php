<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnfermedadsToPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pacientes');

        Schema::create('pacientes', function (Blueprint $table) {

            $table->unsignedInteger('enfermedad_id');
            $table->foreign('enfermedad_id')->references('id')->on('enfermedads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addEnfermedadsToPacientes');

    }
}
