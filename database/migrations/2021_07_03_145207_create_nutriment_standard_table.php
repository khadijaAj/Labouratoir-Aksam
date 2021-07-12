<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Nutriment;
class CreateNutrimentStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutriment_standardtype', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nutriment_id')->unsigned();
            $table->integer('standardtype_id')->unsigned();
        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutriment_standardtype');
    }
}
