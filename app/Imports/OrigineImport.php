<?php

namespace App\Imports;

use App\Origine;
use Maatwebsite\Excel\Concerns\ToModel;

class OrigineImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Origine([
            'name'  => $row[0], 'Reference'  => $row[1]
        ]);
    }
}
