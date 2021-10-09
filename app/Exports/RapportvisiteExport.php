<?php

namespace App\Exports;

use App\Vrapport;
use App\Standardsbovin;
use App\Standardsovin;
use App\StandardVl;
use App\Elevages;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class RapportvisiteExport implements  FromArray, WithHeadings
{
    protected $ids;

    function __construct($ids) {
            $this->ids = $ids;
    }
    public function array(): array{

        if($this->ids){
         $vrapports=Vrapport::findMany($this->ids);
 
        }else{
         $vrapports=Vrapport::all();
        }
        $standardsbv=Standardsbovin::all();
        $standardsov=Standardsovin::all();
        $standardsvl=StandardsVl::all();
        $elevages = Elevages::all();
      
        foreach($vrapports as $vrapport){

        }
    }

        /*
            $collectionA = array(
                'date_debut', 'date_fin','observation','typevisite','client_id','ovin_id'
            'Id'=>$vrapport->id,
            'num'=>$vrapport->Num,
            'Produit'=>$pfrapport->produit->name,
            'Identification'=>$pfrapport->Identification,
            'Date_fabrication'=>$pfrapport->date_fabrication
            );
            $arraysA=[];
}

    

       
        
            if($vrapport->typevisite =='ovins')
            foreach($standardsov as $standardsov){
               
                foreach($elevages as $el){
                    $record1 = [];
                    $record1 = $el->where('vrapport_id','=',$vrapport->id,)->where('$standardsovt_id','=',$standardsov->id,)->value('value_cr');
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
    }*/
}