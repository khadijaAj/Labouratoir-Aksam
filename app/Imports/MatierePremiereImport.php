<?php

namespace App\Imports;

use App\Mprapport;
use App\Standardtype;
use App\Value;

use App\Nutriment;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MatierePremiereImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Mprapport::create([
                'num' => $row['num'],
                'num_bon' => $row['num_bon'],
                'origine_id' => $row['origine_id'],
                'produit_id' => $row['produit_id'],
                'fournisseur_id' => $row['fournisseur_id'],
                'navire_id' => $row['navire_id'],
               'date_reception'=>  $row['date_reception'],
               'Commentaire'=>  $row['commentaire']
             

            ]);
            $id = Mprapport::where('num', $row[0])->first()->id;

            $standards=Standardtype::find(1);
            $i=1;
            $j =0;
            foreach($standards->nutriments as $nutriment){
            
                $record1 = $nutriment->name;
                $record1 = strtolower($record1); 
                Value::create([
                    'crapport_id' => $id,
                    'nutriment_id' => $nutriment->id ,
                    'value_surbrute' => $row[$record1] ?? null , 
                ]);
            }

              


        }
       
    }
}