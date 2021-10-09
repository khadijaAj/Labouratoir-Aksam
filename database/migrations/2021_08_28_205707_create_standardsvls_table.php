<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\StandardsVl;

class CreateStandardsvlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards_vls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('valeur');
            $table->timestamps();
        });

        $data= array (
            [
                
            'libelle'=> 'DIAGNOSTIC :Ration',
            'valeur'=> '',      
        ],
        [
            'libelle'=> 'DIAGNOSTIC : SANTE - MAMITE',
            'valeur'=> '',   
        ],
        [
            
            'libelle'=> 'DIAGNOSTIC : SANTE - ACIDOSSE ',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'DIAGNOSTIC : SANTE - BOITERIEE',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'DIAGNOSTIC : QUALITE ENSILAGE ',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'LACTOSE REMPLACEUR',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'CMV',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'PRESENCE PRODUIT HYGIENE',
            'valeur'=> '',    
        ],
        [
            
            'libelle'=> 'PERFORMANCE VL',
            'valeur'=> '',    
        ],
       
        [
            
            'libelle'=> 'Qté Ensilage',
            'valeur'=> '',    
        ]
        

    );
            foreach ($data as $datum){
                $standardsov = new StandardsVl();
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
        Schema::dropIfExists('standards_vls');
    }
}
