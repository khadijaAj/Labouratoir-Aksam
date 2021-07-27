<?php

namespace App\Exports;

use App\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProduitExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $produits = Produit::all();
        $collections = collect([]);

        foreach($produits as $produit){
            $collection = collect([
                [   'id'=>$produit->id,
                    'Nom'=>$produit->name,
                    'Référence'=>$produit->Reference,
                    'Categorie'=>$produit->categorie->name,
                    
            
                ]
            ]);
            $collections = $collections->values()->merge($collection);

        }
        
        return $collections;    
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence","Categorie"];
    }
}
