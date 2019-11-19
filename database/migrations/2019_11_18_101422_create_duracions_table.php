<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duracions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->unsignedInteger('cita_id');
            $table->timestamps();
            /**/

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duracions');
    }
}
