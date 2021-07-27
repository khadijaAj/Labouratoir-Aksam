<?php

namespace App\Imports;

use App\Nutriment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NutrimentImport implements ToModel  , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nutriment([
            'name'  => $row['nom'], 'Reference'  => $row['reference'],'cible'  => $row['cible'], 'incertitude'  => $row['incertitude'], 'cout'  => $row['cout']


        ]);
    }
}
