<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nutriment_id');
            $table->string('value_surbrute')->nullable();
            $table->string('value_surseche')->nullable();
            $table->integer('crapport_id')->nullable()->unsigned();
            $table->integer('pfrapport_id')->nullable()->unsigned();
            $table->integer('mprapport_id')->nullable()->unsigned();

            $table->foreign('crapport_id')->references('id')->nullable()->on('crapports')->onDelete('cascade');
            $table->foreign('pfrapport_id')->references('id')->nullable()->on('pfrapports')->onDelete('cascade');
            $table->foreign('mprapport_id')->references('id')->nullable()->on('mprapports')->onDelete('cascade');

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
        Schema::dropIfExists('values');
    }
}
