<?php

namespace App\Imports;

use App\Crapport;
use App\Standardtype;
use App\Value;
use App\Produit;
use App\Client;
use App\Comemrcial;
use App\Nutriment;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RapportClientImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Crapport::create([
                'num' => $row[0],
                'produit_id' => $row[1],
                'client_id' => $row[2],
                'commercial_id' => $row[3],
                'date_reception' => $row[4],
                'date_analyse' => $row[5],
               'Cout'=>  $row[6],
               'Commentaire'=>  $row[7],
             

            ]);
            $id = Crapport::where('num', $row[0])->first()->id;

            $standards=Standardtype::find(3);
            $i=1;
            $j =0;
            foreach($standards->nutriments as $nutriment){
                $r = 8+$j;
                Value::create([
                    'crapport_id' => $id,
                    'nutriment_id' => $row[$r] ,
                    'value_surbrute' => $row[$r+1] ?? null , 
                    'value_surseche' => $row[$r+2] ?? null,
                ]);
                $j+=3;
            
            }

              


        }
       
    }
}