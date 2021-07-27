<?php

use Illuminate\Database\Seeder;
use App\Mesure;
use App\Standardtype;
class MesureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           /** Creating nutriment standards for 4 types of analyses */
        $data =  array(
            [    
                'methode' => '',               
                'nutriment_id' => '1',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [   
                'methode' => '',
                'nutriment_id' =>  '2',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                'methode' => '',
                'nutriment_id' => '4',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '6',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '7',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '9',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '12',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '10',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ]
            ,
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '8',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '3',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '20',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '21',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '22',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '23',
                'standardtype_id' => '1' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '28',
                'standardtype_id' => '1' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '24',
                'standardtype_id' => '1' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '25',
                'standardtype_id' => '1' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '26',
                'standardtype_id' => '1' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '27',
                'standardtype_id' => '1' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [    
                'methode' => '',               
                'nutriment_id' => '1',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [   
                'methode' => '',
                'nutriment_id' =>  '2',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                'methode' => '',
                'nutriment_id' => '4',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '6',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '7',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '9',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '12',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '10',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ]
            ,
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '8',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '3',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '20',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '21',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '29',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '23',
                'standardtype_id' => '2' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '28',
                'standardtype_id' => '2' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '24',
                'standardtype_id' => '2' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '25',
                'standardtype_id' => '2' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '26',
                'standardtype_id' => '2' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '27',
                'standardtype_id' => '2' , 
                'unite' =>'ppb',
                'equation'=>''
            ],[
                'methode' => 'Etuve',
                'nutriment_id' => '1',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                'methode' => 'Etuve',
                'nutriment_id' =>  '3',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                'methode' => 'Kjeldhal',
                'nutriment_id' => '4',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => 'Four',
                'nutriment_id' => '6',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '8',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '9',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '10',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '12',
                'standardtype_id' => '3' , 
                'unite' =>'%',
                'equation'=>''
            ]
            ,
          
            [
                
                'methode' => 'PH',
                'nutriment_id' =>  '16',
                'standardtype_id' => '3' , 
                'unite' =>'',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '30',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '31',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '32',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '33',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '34',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '35',
                'standardtype_id' => '3' , 
                'unite' =>'',
                'equation'=>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '23',
                'standardtype_id' => '3' , 
                'unite' =>'ppb',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' => '8',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '9',
		'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' => '12',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Valeur Calculée',
                'nutriment_id' => '10',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
	        	'equation'=>'(13,23+(0,85*([ADF]*10)))/10'
            ],
            [
                
                'methode' => 'Valeur Calculée',
                'nutriment_id' => '36',
                'standardtype_id' => '4' , 
                'unite' =>'/Kg',
	        	'equation'=>'140/[VDMIL]'
            ],
            [
                
                'methode' => 'Valeur Calculée',
                'nutriment_id' =>  '37',
                'standardtype_id' => '4' , 
                'unite' =>'/Kg',
	        	'equation'=>'95/[VDMIB]'

            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '38',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
               'methode' => 'Infra Rouge',
                'nutriment_id' =>  '39',
                'standardtype_id' => '4' , 
                'unite' =>'%PB',
                'equation'=>''
            ],
[
                'methode' => 'Valeur calculée',
                'nutriment_id' =>  '42',
                'standardtype_id' => '4' , 
                'unite' =>'g/Kg MS',
		        'equation'=>'[PDIA]+[PDIME]'
            ],
            [
                'methode' => 'Valeur calculée',
                'nutriment_id' =>  '40',
                'standardtype_id' => '4' , 
                'unite' =>'g/Kg MS',
	        	'equation'=>'[PDIA]+[PDIME]'
            ],
            [
               'methode' => 'Valeur calculée',
                'nutriment_id' =>  '41',
                'standardtype_id' => '4' , 
                'unite' =>'g/Kg MS',
	        	'equation'=>'[PDIA]+[PDIMN]'
            ],[
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '23',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '43',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '44',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
			[
                 'methode' => 'Infra Rouge',
                'nutriment_id' =>  '45',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                
                 'methode' => 'Valeur calculée',
                'nutriment_id' =>  '46',
                'standardtype_id' => '4' , 
                'unite' =>'/Kg MS',
		        'equation' => '[NELMcalkg]*1000)/1760'
            ],[
            
                
                'methode' => 'Valeur calculée',
                'nutriment_id' =>  '47',
                'standardtype_id' => '4' , 
                'unite' =>'/Kg MS',
		        'equation' => '[NEmg]/1760'
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '48',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '49',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '50',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '51',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => 'Infra Rouge',
                'nutriment_id' =>  '52',
                'standardtype_id' => '4' , 
                'unite' =>'%MS',
                'equation'=>''
            ],
            [
                'methode' => '',
                'nutriment_id' =>  '16',
                'standardtype_id' => '4' , 
                'unite' =>'',
                'equation'=>''
            ]
        );
                foreach ($data as $datum){
                    $mesure = new Mesure();
                    $mesure->methode =$datum['methode'];
                    $mesure->nutriment_id =$datum['nutriment_id'];
                    $mesure->standardtype_id =$datum['standardtype_id'];
                    $mesure->equation =$datum['equation'];
                    $mesure->unite =$datum['unite'];
                    Standardtype::find($datum['standardtype_id'])->nutriments()->attach($datum['nutriment_id']);
                    $mesure->save();
                } 

               
                                
                                
                                
                              
                                
                               
                               

    }
}
