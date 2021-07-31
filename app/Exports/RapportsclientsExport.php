<?php

namespace App\Exports;

use App\Crapport;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Standardtype;
use App\Nutriment;
use App\Value;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;


class RapportsclientsExport implements FromArray, WithHeadings
{
    protected $ids;

    function __construct($ids) {
            $this->ids = $ids;
    }
    public function array(): array{

       if($this->ids){
        $crapports = Crapport::findMany($this->ids);

       }else{
        $crapports = Crapport::all();
       }
        $standards=Standardtype::find(3);
        $values = Value::all();
        $nutriments=Nutriment::all();
        foreach($crapports as $crapport){
            $collectionA = array(
                'Id'=>$crapport->id,
                'Num'=>$crapport->Num,
                'Client'=>$crapport->client->name,
                'Commercial'=>$crapport->commercial->name,
                'Date_reception'=>$crapport->date_reception,
                'Date_analyse'=>$crapport->date_analyse,
                'Produit'=>$crapport->produit->name,
                'Cout'=>$crapport->Cout
            );
            $arraysA=[];
            foreach($standards->nutriments as $nutriment){

                foreach($values as $value){
                    if($nutriment->name=="Pb" || $nutriment->name=="CB" ){
                        $record1 = [];
                        $record2 = [];
                        $record1 = $value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute');
                        $record2 = $value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche');
                    }else{
                        $record2 = [];
                        $record1 = NULL;

                        $record2 = $value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche');
                    }
                   
                    }

                    $arraysA[] = $record1;
                    $arraysA[] = $record2;

            
            }
        $result [] = $collectionA+$arraysA;
    }

    return $result;
 
    }
    public function headings() :array
    {
        $standards=Standardtype::find(3);
        $nutriments=Nutriment::all();
        $arraysA=  array("id", "N° d’Ech","Client","Commercial","Date_Reception","Date_analyse","Produit","Cout"); 
        
        foreach($standards->nutriments as $nutriment){
            $record1 = [];
            $var_1 = "_SB";
            $var_2 = "_SS";
            if($nutriment->name=="Pb" || $nutriment->name=="CB" ){
                $record1 = $nutriment->name." ".$var_1." ";
                $record2 = $nutriment->name." ".$var_2." ";
    
                $arraysA[] = $record1;
                $arraysA[] = $record2;
            }else{
                $record2 = $nutriment->name;
                $arraysA[] = $record2;

            }
            
        }

        
        return $arraysA;
    }
}