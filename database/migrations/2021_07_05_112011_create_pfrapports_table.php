<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePfrapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pfrapports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Num')->unique();
            $table->integer('produit_id')->unsigned();
            $table->string('Identification');
            $table->enum('Commentaire' , array('intern', 'extern'))->nullable();
            $table->string('path')->nullable();
            $table->float('ACE')->nullable();
            $table->float('MSR')->nullable();
            $table->enum('conformite' , array('Oui', 'Non'))->default('Oui');
            $table->date('date_fabrication')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits');
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
        Schema::dropIfExists('Pfrapports');
    }
}
