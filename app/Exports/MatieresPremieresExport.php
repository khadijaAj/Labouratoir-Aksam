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

class MatieresPremieresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mprapports = Mprapport::all();
        $standards=Standardtype::find(1);
        $origines=Origine::all();
        $fournisseurs=Fournisseur::all();
        $navires=Navire::all();
        $values = Value::all();
        $nutriments=Nutriment::all();
        $collection = collect([]);

        foreach($mprapports as $mprapport)
        
            foreach($standards->nutriments as $nutriment){
                foreach($values as $value){
                    $collectionA = collect([

                        [   'Num_echantillon'=>$mprapport->Num,
                            'Num_bon'=>$mprapport->Num_bon,
                            'Produit'=>$mprapport->produit->name,
                            'Fournisseur'=>$mprapport->fournisseur->name,
                            'Origine'=>$mprapport->origine->name,
                            'Navire'=>$mprapport->navire->name,
                            'Conformite' => $mprapport->conformite,
                            'Date_reception'=>$mprapport->date_reception,
                            'Nutriment'=>$nutriment->name,
                            'valeur_surbrute'=>$value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute'),
                            'valeur_surseche'=>$value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche')
        
                        ]
                    ]);    
          
            
        }
        $collection = $collection->values()->merge($collectionA);

          
    }
    return $collection;
}   
    
    
   
}
