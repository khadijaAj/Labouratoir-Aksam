<?php

namespace App\Imports;

use App\Commercial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CommercialImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Commercial([
            'name'  => $row['nom'], 'Reference'=> $row['reference'], 'adresse'  => $row['adresse'], 'tele'=> $row['tele'] 

        ]);
    }
}
