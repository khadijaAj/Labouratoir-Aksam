<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('statut')->nullable();
            $table->string('civility')->nullable();
            $table->string('code')->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->enum('familleCl',array('cooperative','eleveur','revendeur'))->nullable();
            $table->enum('salleTraite',array('oui','non'))->nullable();
            $table->enum('modeReglement' ,array('cheque','espece','EFFET'))->nullable();
            $table->enum('modelivraison',array('Camion_aksam','Camion_propre'))->nullable();
            $table->string('typeElevage')->default('VL');
            $table->double('tele')->nullable();
            $table->string('province')->nullable();
            $table->integer('commercial_id')->nullable()->unsigned();
            $table->foreign('commercial_id')->references('id')->on('commercials');
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
        Schema::dropIfExists('clients');
    }
}
