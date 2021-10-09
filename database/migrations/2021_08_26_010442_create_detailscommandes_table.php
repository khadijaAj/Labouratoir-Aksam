<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailscommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailscommandes', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('commande_id')->unsigned();
                $table->integer('produit_id')->unsigned();
                $table->double('quantity');
                $table->string('total')->nullable();
                $table->string('unite');
                $table->foreign('produit_id')->references('id')->nullable()->on('produits')->onDelete('cascade');
                $table->foreign('commande_id')->references('id')->nullable()->on('commandes')->onDelete('cascade');
            
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
        Schema::dropIfExists('detailscommandes');
    }
}
