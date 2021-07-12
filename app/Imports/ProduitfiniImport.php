<?php

namespace App\Imports;

use App\Pfrapport;
use App\Standardtype;
use App\Value;
use App\Produit;
use App\Nutriment;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProduitfiniImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Pfrapport::create([
                'num' => $row[0],
                'produit_id' => $row[1],
                'identification' => $row[2],
                'date_fabrication' => $row[3],
               'conformite'=>  $row[4],
               'Commentaire' =>  $row[5] ?? null
             

            ]);
            $id = Pfrapport::where('num', $row[0])->first()->id;

            $standards=Standardtype::find(2);
            $i=1;
            $j =0;
            foreach($standards->nutriments as $nutriment){
                $r = 6+$j;
                Value::create([
                    'pfrapport_id' => $id,
                    'nutriment_id' => $row[$r] ,
                    'value_surbrute' => $row[$r+1] ?? null , 
                    'value_surseche' => $row[$r+2] ?? null,
                ]);
                $j+=3;
            
            }

              


        }
       
    }
}