<?php

namespace App\Imports;

use App\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FournisseurImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fournisseur([
            'name'  => $row['nom'], 'Reference'=> $row['reference'], 'tele'=> $row['tele'] ,'adresse'  => $row['adresse']
        ]);
    }
}
