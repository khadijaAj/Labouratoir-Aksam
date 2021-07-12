<?php

namespace App\Exports;

use App\Crapport;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Standardtype;
use App\Nutriment;
use App\Value;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RapportsclientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      
        $crapports = Crapport::all();
        $standards=Standardtype::find(3);
        $values = Value::all();
        $nutriments=Nutriment::all();
        $collection = collect([]);

        foreach($crapports as $crapport)
        
            foreach($standards->nutriments as $nutriment){
                foreach($values as $value){
                    $collectionA = collect([
                        [   'Num'=>$crapport->Num,
                            'Produit'=>$crapport->produit->name,
                            'Client'=>$crapport->client->name,
                            'Commercial'=>$crapport->commercial->name,
                            'Conformite' => $crapport->conformite,
                            'Date_reception'=>$crapport->date_reception,
                            'Date_analyse'=>$crapport->date_analyse,
                            'Cout'=>$crapport->cout,
                            'Nutriment'=>$nutriment->name,
                            'valeur_surbrute'=>$value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute'),
                            'valeur_surseche'=>$value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche')
        
                        ]
                    ]);    
          
            
        }
        $collection = $collection->values()->merge($collectionA);

          
    }
    return $collection;
    }
}
