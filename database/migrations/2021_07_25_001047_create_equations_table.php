<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use App\Equation;

class CreateEquationsTable extends Migration
{   
    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('equation');
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
        Schema::dropIfExists('equations');
    }
}
