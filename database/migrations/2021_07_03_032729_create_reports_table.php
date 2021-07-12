<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Analysetype;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

       
            $data =  array(
                [
                    'name' => 'Matieres Premieres'
                ],
                [
                    'name' => 'Produits finis'
                ],
                [
                    'name' => 'Analyse Client'
                ],
                [
                    'name' => 'Analyse Ensilage'
                ]
            );
                    foreach ($data as $datum){
                        $report = new Analysetype();
                        $report->name =$datum['name'];
                        $report->save();
                    }

                  
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
