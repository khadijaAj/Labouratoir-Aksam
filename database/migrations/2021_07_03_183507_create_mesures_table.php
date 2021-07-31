<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Mesure;
class CreateMesuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesures', function (Blueprint $table) {
            $table->id();
            $table->string('methode')->nullable();
            $table->string('unite')->nullable();
            $table->string('equation')->nullable();
            $table->string('equation1')->nullable();
            $table->string('xml_equivalent')->nullable();
            $table->integer('standardtype_id')->unsigned();
            $table->foreign('standardtype_id')->references('id')->on('analyse_standards');
            $table->integer('nutriment_id')->unsigned();
            $table->foreign('nutriment_id')->references('id')->on('nutriments')->onDelete('cascade');
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
        Schema::dropIfExists('mesures');
    }
}
