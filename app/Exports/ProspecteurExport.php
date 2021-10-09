<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\ Prospecteur;

class ProspecteurExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $prospecteur = Prospecteur::all();
        $collections = collect([]);

        foreach( $prospecteur as $p){
            $collection = collect([
                [   'Id'=>$p->id,
                    'Nom'=>$p->name,
                    'Code'=>$p->code,
                    'Province'=>$p->province,
                    'Adresse'=>$p->adresse,
                    'Ville'=>$p->ville,
                    'Mode Réglement'=>$p->modeRegelemnt,
                    'Famille Client'=>$p->familleCl,
                    'Salle traite'=>$p->salleTraite,
                    'Mode de Livraison'=>$p->modelivraison,
                    'N° Télé'=>$p->tele,
                    'Email'=>$p->email
            
                ]
            ]);
            $collections = $collections->values()->merge($collection);

        }
        
        return $collections;    
   
    }
    public function headings() :array
    {
        return ["Id", "Nom","Code","Province","Adresse","Ville", "mode Régelment","Famille Client",
        "Salle traite","Mode de Livraison","N° Télé","Email"];
    }
}

