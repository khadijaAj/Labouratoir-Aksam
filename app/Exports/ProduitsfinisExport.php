<?php

namespace App\Exports;

use App\Pfrapport;
use App\Standardtype;
use App\Value;
use App\Nutriment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitsfinisExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pfrapports = Pfrapport::all();
        $standards=Standardtype::find(2);
        $values = Value::all();
        $nutriments=Nutriment::all();
        $collection = collect([]);

        foreach($pfrapports as $pfrapport)
        
            foreach($standards->nutriments as $nutriment){
                foreach($values as $value){
                    $collectionA = collect([
                        [   'Num_echantillon'=>$pfrapport->Num,
                            'Produit'=>$pfrapport->produit->name,
                            'Identification'=>$pfrapport->Identification,
                            'Conformite' => $pfrapport->conformite,
                            'Date_fabrication'=>$pfrapport->date_fabrication,
                            'Nutriment'=>$nutriment->name,
                            'valeur_surbrute'=>$value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute'),
                            'valeur_surseche'=>$value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche')
        
                        ]
                    ]);    
          
            
        }
        $collection = $collection->values()->merge($collectionA);

          
    }
    return $collection;
}   
    
    
    public function headings() :array
    {
        return ["id", "Produit", "N Echantillon","conformité","date_fabrication", "Nutriment","valeur_surbrute","valeur_surseche"];
    }
}