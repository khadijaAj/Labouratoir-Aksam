<?php

namespace App\Imports;

use App\Produit;
use Maatwebsite\Excel\Concerns\ToModel;

class ProduitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produit([
            'name'  => $row[0], 'Reference'=> $row[1] , 'categorie_id'=> $row[2]

        ]);
    }
}
