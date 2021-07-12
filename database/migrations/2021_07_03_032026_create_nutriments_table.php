<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Nutriment;

class CreateNutrimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutriments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('Reference')->unique();
            $table->string('cible')->nullable();
            $table->float('cout')->nullable();

            $table->double('incertitude',5, 4)->nullable();
          
            $table->timestamps();
        });

        $data =  array(
            [
                'name' => 'H',
                'Reference'=> '1',
                'cible'=>'',
                'Incertitude'=>'0.24',
                'cout'=>'27'

            ],
            [
                'name' => 'H NIR',
                'Reference'=> '2',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'0'

            ],
            [
                'name' => 'MS                ',
                'Reference'=> '3',
                'cible'=>'',
                'Incertitude'=>'0.24',
                'cout'=>'0'
            ],
            [
                'name' => 'Pb',
                'Reference'=> '4',
                'cible'=>'',
                'Incertitude'=>'0.75',
                'cout'=>'46'
            ],
            [
                'name' => 'Pb NIR',
                'Reference'=> '5',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'0'
            ],
            [
                'name' => 'MM',
                'Reference'=> '6',
                'cible'=>'',
                'Incertitude'=>'0.24',
                'cout'=>'27'
            ],
            [
                'name' => 'MM NIR',
                'Reference'=> '7',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'0'
                
            ],
            [
                'name' => 'NDF',
                'Reference'=> '8',
                'cible'=>'',
                'Incertitude'=>'1.01',
                'cout'=>'46'
            ],
            [
                'name' => 'ADF',
                'Reference'=> '9',
                'cible'=>'',
                'Incertitude'=>'1.01',
                'cout'=>'46'
            ],
            [
                'name' => 'CB',
                'Reference'=> '10',
                'cible'=>'',
                'Incertitude'=>'1.01',
                'cout'=>'46'
            ],
            [
                'name' => 'CB NIR',
                'Reference'=> '11',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
            ],
            [
                'name' => 'ADL',
                'Reference'=> '12',
                'cible'=>'',
                'Incertitude'=>'1.01',
                'cout'=>'46'
            ],
            [
                'name' => 'CB',
                'Reference'=> '13',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ],
            [
                'name' => 'zearalenone-PF',
                'Reference'=> '14',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ],
            [
                'name' => 'vomitoxine-PF',
                'Reference'=> '15',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ],
            [
                'name' => 'PH',
                'Reference'=> '16',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'50'
            ],
            [
                'name' => 'Aflatonine-MP',
                'Reference'=> '17',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ],
            [
                'name' => 'zearalenone-MP',
                'Reference'=> '18',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ],
            [
                'name' => 'vomitoxine-MP',
                'Reference'=> '19',
                'cible'=>'',
                'Incertitude'=>'0',
                'cout'=>'300'
            ]
            ,[
                'name' => 'MG',
                'Reference'=> '20',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'MG NIR',
                'Reference'=> '21',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'KOH',
                'Reference'=> '22',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Amidon',
                'Reference'=> '23',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Zeara',
                'Reference'=> '24',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Fumo',
                'Reference'=> '25',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Vomi',
                'Reference'=> '26',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Ochra',
                'Reference'=> '27',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Afla',
                'Reference'=> '28',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'NaCl',
                'Reference'=> '29',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'0'
                
            ],[
                'name' => 'Aflatonine-PF',
                'Reference'=> '30',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
                
            ],[
                'name' => 'zearalenone-PF',
                'Reference'=> '31',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
                
            ],[
                'name' => 'vomitoxine-PF',
                'Reference'=> '32',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
                
            ],[
                'name' => 'Aflatonine-MP',
                'Reference'=> '33',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
                
            ],[
                'name' => 'zearalenone',
                'Reference'=> '34',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
            
            ],[
                'name' => 'vomitoxine-MP',
                'Reference'=> '35',
                'cible'=>'',
                'Incertitude'=>'0',
                 'cout'=>'300'
                
            ]
        );
                foreach ($data as $datum){
                    $nutriment = new Nutriment();
                    $nutriment->name =$datum['name'];
                    $nutriment->Reference =$datum['Reference'];
                    $nutriment->cible =$datum['cible'];
                    $nutriment->incertitude =$datum['Incertitude'];
                    $nutriment->cout =$datum['cout'];

                    $nutriment->save();
                }
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutriments');
    }
}
