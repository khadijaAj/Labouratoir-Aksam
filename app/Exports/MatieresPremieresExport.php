<?php

namespace App\Exports;

use App\Mprapport;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Produit;
use App\Origine;
use App\Navire;
use App\Fournisseur;
use App\Standardtype;
use App\Value;
use App\Nutriment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class MatieresPremieresExport implements FromArray, WithHeadings
{
    protected $ids;

    function __construct($ids) {
            $this->ids = $ids;
    }
    public function array(): array{

       if($this->ids){
        $mprapports=Mprapport::findMany($this->ids);

       }else{
        $mprapports=Mprapport::all();
       }

   
        $standards=Standardtype::find(1);
        $origines=Origine::all();
        $fournisseurs=Fournisseur::all();
        $navires=Navire::all();
        $values = Value::all();
        $nutriments=Nutriment::all();
        $collection = collect([]);

        foreach($mprapports as $mprapport){
            $collectionA = array(
                'Id'=>$mprapport->id,
                'Date_reception'=>$mprapport->date_reception,
                'Produit'=>$mprapport->produit->name,
                'Num_echantillon'=>$mprapport->Num,
                'Num_bon'=>$mprapport->Num_bon,
                'Fournisseur'=>$mprapport->fournisseur->name,
                'Origine'=>$mprapport->origine->name,
                'Navire'=>$mprapport->navire->name,
                'Commentaire'=>$mprapport->commentaire,

            );
            $arraysA=[];
            foreach($standards->nutriments as $nutriment){
               
                foreach($values as $value){
                    $record1 = [];
                    $record1 = $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute');
                    }
                    $arraysA[] = $record1;

            
            }
        $result [] = $collectionA+$arraysA;
    }

    return $result;
 
    }
    public function headings() :array
    {
        $standards=Standardtype::find(1);
        $nutriments=Nutriment::all();
        $arraysA=  array("id","Date_Reception", "Produit","N° d’Ech","N° Bon","Fournisseur","Origine","Navire","Commentaire"); 
        
        foreach($standards->nutriments as $nutriment){
            $record1 = [];
           
            $record1 = $nutriment->name;

            $arraysA[] = $record1;
        }

        
        return $arraysA;
    }
}