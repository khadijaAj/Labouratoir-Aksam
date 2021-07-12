<?php

namespace App\Imports;

use App\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;

class FournisseurImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fournisseur([
            'name'  => $row[0], 'adresse'  => $row[1], 'tele'=> $row[2] , 'Reference'=> $row[3]

        ]);
    }
}
