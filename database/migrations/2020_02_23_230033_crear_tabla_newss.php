<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaNewss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 150);
            $table->string('subtitle', 180);
            $table->string('body', 250);
            $table->string('file', 250);
            $table->unsignedSmallInteger('type_id');
            $table->SmallInteger('country_id');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');            
            $table->foreign('country_id')->references('id')->on('countries');            
            $table->foreign('region_id')->references('id')->on('regions');            
            $table->foreign('city_id')->references('id')->on('cities');            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
