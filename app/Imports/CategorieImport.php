<?php

namespace App\Imports;

use App\Categorie;
use Maatwebsite\Excel\Concerns\ToModel;

class CategorieImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categorie([
            'name'  => $row[0], 'Reference'  => $row[1]
        ]);
    }
}
