<?php

namespace App\Exports;

use App\Pfrapport;
use App\Standardtype;
use App\Value;
use App\Nutriment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class ProduitsfinisExport implements FromArray, WithHeadings
{
    protected $ids;

    function __construct($ids) {
            $this->ids = $ids;
    }
    public function array(): array{

       if($this->ids){
        $pfrapports=Pfrapport::findMany($this->ids);

       }else{
        $pfrapports=Pfrapport::all();
       }

        $standards=Standardtype::find(2);
        $values = Value::all();
        $nutriments=Nutriment::all();
        
        foreach($pfrapports as $pfrapport){

        
            $collectionA = array(
            'Id'=>$pfrapport->id,
            'Num_echantillon'=>$pfrapport->Num,
            'Produit'=>$pfrapport->produit->name,
            'Identification'=>$pfrapport->Identification,
            'Date_fabrication'=>$pfrapport->date_fabrication
            );
            $arraysA=[];
            foreach($standards->nutriments as $nutriment){
               
                foreach($values as $value){
                    $record1 = [];
                    $record1 = $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute');
                    }
                    $arraysA[] = $record1;

            
            }
        $result [] = $collectionA+$arraysA;
    }

    return $result;
 
    }
    public function headings() :array
    {
        $standards=Standardtype::find(2);
        $nutriments=Nutriment::all();
        $arraysA=  array("id", "N° d’Ech","Produit","Identification","Date_fabrication"); 
        
        foreach($standards->nutriments as $nutriment){
            $record1 = [];
           
            $record1 = $nutriment->name;

            $arraysA[] = $record1;
        }

        
        return $arraysA;
    }
}