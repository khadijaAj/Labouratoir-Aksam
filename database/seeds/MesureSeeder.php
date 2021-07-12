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
           /** Creating nutriment standards for 3 types of analyses */
        $data =  array(
            [    
                'methode' => '',               
                'nutriment_id' => '1',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [   
                'methode' => '',
                'nutriment_id' =>  '2',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                'methode' => '',
                'nutriment_id' => '4',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '6',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '7',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '9',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '12',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '10',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ]
            ,
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '8',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '3',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '20',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '21',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '22',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '23',
                'standardtype_id' => '1' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '28',
                'standardtype_id' => '1' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '24',
                'standardtype_id' => '1' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '25',
                'standardtype_id' => '1' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '26',
                'standardtype_id' => '1' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '27',
                'standardtype_id' => '1' , 
                'unite' =>'ppb'
            ],
            [    
                'methode' => '',               
                'nutriment_id' => '1',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [   
                'methode' => '',
                'nutriment_id' =>  '2',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                'methode' => '',
                'nutriment_id' => '4',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '6',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '7',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '9',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '12',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '10',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ]
            ,
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '8',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '3',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '20',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '21',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '29',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '23',
                'standardtype_id' => '2' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '28',
                'standardtype_id' => '2' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '24',
                'standardtype_id' => '2' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '25',
                'standardtype_id' => '2' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '26',
                'standardtype_id' => '2' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '27',
                'standardtype_id' => '2' , 
                'unite' =>'ppb'
            ],[
                'methode' => 'Etuve',
                'nutriment_id' => '1',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                'methode' => 'Etuve',
                'nutriment_id' =>  '3',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                'methode' => 'Kjeldhal',
                'nutriment_id' => '4',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                'methode' => '',
                'nutriment_id' => '5',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => 'Four',
                'nutriment_id' => '6',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '8',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '9',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '10',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => '',
                'nutriment_id' =>  '11',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ],
            [
                
                'methode' => 'Fibretherme',
                'nutriment_id' =>  '12',
                'standardtype_id' => '3' , 
                'unite' =>'%'
            ]
            ,
          
            [
                
                'methode' => 'PH',
                'nutriment_id' =>  '16',
                'standardtype_id' => '3' , 
                'unite' =>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '30',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '31',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '32',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '33',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '34',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '35',
                'standardtype_id' => '3' , 
                'unite' =>''
            ],
            [
                
                'methode' => 'Elisa',
                'nutriment_id' =>  '23',
                'standardtype_id' => '3' , 
                'unite' =>'ppb'
            ]
        );
                foreach ($data as $datum){
                    $mesure = new Mesure();
                    $mesure->methode =$datum['methode'];
                    $mesure->nutriment_id =$datum['nutriment_id'];
                    $mesure->standardtype_id =$datum['standardtype_id'];
                    $mesure->unite =$datum['unite'];
                    Standardtype::find($datum['standardtype_id'])->nutriments()->attach($datum['nutriment_id']);
                    $mesure->save();
                }  

            
    }
}
