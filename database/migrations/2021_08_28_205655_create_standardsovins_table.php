<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Standardsovin;

class CreateStandardsovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standardsovins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('valeur');
            $table->timestamps();
        });
         $data= array (
            [
                
            'libelle'=> 'Contrôle de performance',
            'valeur'=> '',      
        ],[
            'libelle'=> 'Santé animal',
            'valeur'=> '',   
        ],
        [
            
            'libelle'=> 'Présence CVM',
            'valeur'=> '',    
        ], 
        [
            
            'libelle'=> 'Présence bloc à lecher',
            'valeur'=> '',    
        ],[
            
            'libelle'=> 'Présence produit hygiène',
            'valeur'=> '',    
        ]
        ,[
            
            'libelle'=> 'Seperation des lots',
            'valeur'=> '',    
        ]
        ,[
            
            'libelle'=> 'Diagonistic:Ration',
            'valeur'=> '',    
        ]
        ,[
            
            'libelle'=> 'Production',
            'valeur'=> '',    
        ]

    );
            foreach ($data as $datum){
                $standardsov = new Standardsovin();
                $standardsov ->libelle=$datum['libelle'];
                $standardsov ->valeur =$datum['valeur'];
                $standardsov->save();
            }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standardsovins');
    }
}
