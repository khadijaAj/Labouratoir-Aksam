<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Standardtype;


class CreateAnalyseStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyse_standards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('analysetype_id')->unsigned();
            $table->foreign('analysetype_id')->references('id')->on('reports');
            $table->timestamps();
        });

        $data =  array(
            [
                'analysetype_id' => 1
            ],
            [
                'analysetype_id' => 2
            ],
            [
                'analysetype_id' => 3
            ],
            [
                'analysetype_id' => 4
            ]
        );
                foreach ($data as $datum){
                    $standard = new Standardtype();
                    $standard->analysetype_id =$datum['analysetype_id'];
                    $standard->save();
                }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyse_standards');
    }
}
