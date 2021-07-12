<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMprapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mprapports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Num')->unique();
            $table->string('Num_bon')->nullable();
            $table->integer('origine_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->integer('fournisseur_id')->nullable()->unsigned();
            $table->integer('navire_id')->nullable()->unsigned();
            $table->enum('conformite' , array('Oui', 'Non'))->default('Oui');
            $table->date('date_reception')->nullable();
            $table->string('path')->nullable();
            $table->enum('commentaire' , array('intern', 'extern'))->nullable();
            $table->integer('PS')->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->foreign('origine_id')->references('id')->nullable()->on('origines');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('navire_id')->references('id')->nullable()->on('navires');



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
        Schema::dropIfExists('mprapports');
    }
}
