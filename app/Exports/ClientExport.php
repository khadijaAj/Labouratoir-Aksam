<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $clients = Client::all();
        $collections = collect([]);

        foreach($clients as $client){
            $collection = collect([
                [   'id'=>$client->id,
                    'Nom'=>$client->name,
                    'Référence'=>$client->Reference,
                    'Commercial'=>$client->commercial->name,
                    'Adresse'=>$client->adresse,
                    'Region'=>$client->Region,
                    'N° Télé'=>$client->tele
            
                ]
            ]);
            $collections = $collections->values()->merge($collection);

        }
        
        return $collections;    
   
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence","Commercial", "Adresse","Region","N° Télé"];
    }
}
