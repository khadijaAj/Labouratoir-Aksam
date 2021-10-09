<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elevages', function (Blueprint $table) {
            $table-> increments('id');
            $table->integer('standardsbv_id')->nullable();
            $table->integer('standardsov_id')->nullable();
            $table->integer('standardsvl_id')->nullable();
            $table->string('value_cr')->nullable();
            $table->integer('vrapport_id')->nullable()->unsigned();
            $table->foreign('vrapport_id')->references('id')->nullable()->on('vrapports')->onDelete('cascade');
            $table->timestamps();  

        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elevages');
    }
}
