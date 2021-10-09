<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Standardsbovin;

class CreateStandardsbovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standardsbovins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('valeur');
            $table->timestamps();
        });
        $data= array (
            [
                'libelle'=> 'Diagonistic:Ration',
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
        ] ,[

        'libelle'=> 'Contrôle de performance',
        'valeur'=> '',   
        ]
        ,[
            
            'libelle'=> 'Reproduction',
            'valeur'=> '',    
        ]

    );
            foreach ($data as $datum){
                $standardsbv = new Standardsbovin();
                $standardsbv ->libelle=$datum['libelle'];
                $standardsbv ->valeur =$datum['valeur'];
                $standardsbv->save();
            }

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standardsbovins');
    }
}
