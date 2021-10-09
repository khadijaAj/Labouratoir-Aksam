<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVrapportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vrapports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num')->nullable();
            $table-> string('date_debut')->nullable();
            $table-> string('date_fin')->nullable();
            $table->string('typevisite');
            $table->string('observation')->nullable();
            $table->integer('client_id')->nullable()->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('vrapports');
    }
}
