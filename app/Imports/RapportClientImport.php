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
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RapportClientImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Crapport::create([
                'num'  => $row['num'],
                'produit_id' => $row['produit_id'],
                'client_id' => $row['client_id'],
                'commercial_id' => $row['commercial_id'],
                'date_reception' => $row['date_reception'],
                'date_analyse' => $row['date_analyse'],
               'Cout'=>  $row['cout'],
               'Commentaire'=>  $row['commentaire'],
             

            ]);
           
              
            

            $id = Crapport::where('num', $row['num'])->first()->id;

            $standards=Standardtype::find(3);

            foreach($standards->nutriments as $nutriment){
                $var_1 = "_SB";
                $var_2 = "_SS";
                $record1 = $nutriment->name;
                $record1 .=$var_1;
                $record1 = strtolower($record1); 
                $record2 = $nutriment->name;
                $record2 .=$var_2;
                $record2 = strtolower($record2);
                Value::create([
                    'crapport_id' => $id,
                    'nutriment_id' => $nutriment->id ,
                    'value_surbrute' => $row[$record1] ?? null , 
                    'value_surseche' => $row[ $record2] ?? null,
                ]);
            
 }


        }
       
    }
}