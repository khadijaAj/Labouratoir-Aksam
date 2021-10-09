<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ensilage')->nullable();
            $table->string('foin')->nullable();
            $table->string('paille')->nullable();
            $table->string('fourrage')->nullable();
            $table->string('aliment')->nullable();
            $table->string('trxSoja')->nullable();
            $table->string('cmv')->nullable();
            $table->string('maisbroye')->nullable();
            $table->string('coqueSoja')->nullable();
            $table->string('psb')->nullable();
            $table->string('bicarbonate')->nullable();
            $table->string('niveauensilage')->nullable();
            $table->string('niveauproduction')->nullable();
            $table->string('autre')->nullable();
            $table->string('valeurms')->nullable();
            $table->date('date_creation')->nullable();
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
        Schema::dropIfExists('formules');
    }
}
