<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crapports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Num')->unique();
            $table->integer('produit_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('commercial_id')->unsigned();
            $table->enum('Commentaire' , array('interne', 'externe'))->nullable();
            $table->float('Cout');
            $table->date('date_reception')->nullable();
            $table->date('date_analyse')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('crapports');
    }
}
