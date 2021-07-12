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
                'num' => $row[0],
                'num_bon' => $row[1],
                'origine_id' => $row[2],
                'produit_id' => $row[3],
                'fournisseur_id' => $row[4],
                'navire_id' => $row[5],
               'date_reception'=>  $row[6],
               'conformite'=>  $row[7],
               'Commentaire'=>  $row[8]
             

            ]);
            $id = Mprapport::where('num', $row[0])->first()->id;

            $standards=Standardtype::find(1);
            $i=1;
            $j =0;
            foreach($standards->nutriments as $nutriment){
                $r = 9+$j;
                Value::create([
                    'mprapport_id' => $id,
                    'nutriment_id' => $row[$r] ,
                    'value_surbrute' => $row[$r+1] ?? null , 
                    'value_surseche' => $row[$r+2] ?? null,
                ]);
                $j+=3;
            
            }

              


        }
       
    }
}