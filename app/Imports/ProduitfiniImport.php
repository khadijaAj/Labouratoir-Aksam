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
                'num' => $row['num'],
                'produit_id' => $row['produit_id'],
                'identification' => $row['identification'],
                'date_fabrication' => $row['date_fabrication'],
               'conformite'=>  $row['conformite'] ?? null,
               'Commentaire' =>  $row['commentaire'] ?? null
             

            ]);
            $id = Pfrapport::where('num', $row[0])->first()->id;

            $standards=Standardtype::find(2);
            
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