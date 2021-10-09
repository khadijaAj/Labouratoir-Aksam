<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspecteurTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospecteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('civility')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('email')->nullable();
            $table->string('pays')->nullable();
            $table->string('code')->nullable()->unique();
            $table->enum('familleCl', array('cooperative','eleveur','revendeur'))->nullable();
            $table->enum('salleTraite', array('oui','non'))->nullable();
            $table->enum('modeReglement' , array('cheque','espece','EFFET' ))->nullable();
            $table->enum('modelivraison', array('Camion_aksam','Camion_propre'));
            $table->string('tele')->nullable();
            $table->string('province')->nullable();
            $table->enum('type' , array('prospect', 'client'))->default('prospect');
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
        Schema::dropIfExists('prospecteur');
    }
}
