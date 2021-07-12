<?php

namespace App\Imports;

use App\Nutriment;
use Maatwebsite\Excel\Concerns\ToModel;

class NutrimentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nutriment([
            'name'  => $row[0], 'Reference'  => $row[1],'cible'  => $row[2], 'incertitude'  => $row[3], 'cout'  => $row[4]


        ]);
    }
}
