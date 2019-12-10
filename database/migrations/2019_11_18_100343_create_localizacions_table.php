<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hospital');
            $table->string('consulta');
            $table->timestamps();
            /**/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizacions');
    }
    //
    //
    //use Illuminate\Support\Facades\Schema;
    //use Illuminate\Database\Schema\Blueprint;
    //use Illuminate\Database\Migrations\Migration;
    //
    //class AddLocationToCitas extends Migration
    //{
    //    /**
    //     * Run the migrations.
    //     *
    //     * @return void
    //     */
    //    public function up()
    //    {
    //        Schema::table('citas', function (Blueprint $table){
    //            $table-> unsignedInteger('localizacion_id');
    //            $table->foreign('localizacion_id')->references('id')->on('localizacions');
    //        });
    //
    //
    //    }
    //
    //    /**
    //     * Reverse the migrations.
    //     *
    //     * @return void
    //     */
    //    public function down()
    //    {
    //        Schema::dropIfExists('AddLocationToCitas');
    //    }
    //}
}
