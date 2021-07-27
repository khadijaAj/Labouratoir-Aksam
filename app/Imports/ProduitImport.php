<?php

namespace App\Imports;

use App\Produit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduitImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produit([
            'name'  => $row['nom'], 'Reference'  => $row['reference'] , 'categorie_id'=> $row['categorie_id']

        ]);
    }
}
