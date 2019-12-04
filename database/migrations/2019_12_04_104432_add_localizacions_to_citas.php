<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocalizacionsToCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('citas');
        Schema::create('citas', function (Blueprint $table){
            $table-> unsignedInteger('localizacion_id');
            $table->foreign('localizacion_id')->references('id')->on('localizacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addLocalizacionsToCitas');
    }
}

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