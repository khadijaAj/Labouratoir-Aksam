<?php

namespace App\Exports;

use App\Formule;
use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormuleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $formules = Formule::all();
        $collections = collect([]);

        foreach($formules as $formule){
            $collection = collect([
                   ['ID'=>$formule->id,
                    'Ensilage'=>$formule->ensilage,
                    'Foin'=>$formule->foin,
                    'Paille'=>$formule->paille,
                    'Fourrage'=>$formule->fourrage,
                    'Aliment'=>$formule->aliment,
                    'Trx Soja'=>$formule->trxSoja,
                    'CMV'=>$formule->cmv,
                    'Mais broyé'=>$formule->maisbroye,
                    'Coque de Soja'=>$formule->coquesoja,
                    'psb'=>$formule->psb,
                    'Bicarbonate'=>$formule->bicarbonate, 
                     'niveau Ensilage'=>$formule->niveauensilage,
                     'Niveau de production'=>$formule->niveauproduction,
                     'Autre'=>$formule->autre,
                     'Date de creation'=>$formule->date_creation,
                     'Valeur MS'=>$formule->valeursms,
                     'Client'=>$formule->client->name
                    ]
            
            
            ]);

            $collections = $collections->values()->merge($collection);

        }
        
        return $collections;    
   
    }
    public function headings() :array
    {
        return ["ID", "Ensilage","Foin","Paille","Fourrage","Aliment","Trx soja","CMV","Mais broyé",
        "Coque de Soja","psb","Bicarbonate", "Niveau Ensilage","Niveau de production","Autre","Date de creaion","valeur MS","Client" ];
    }
}


