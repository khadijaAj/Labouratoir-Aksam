<?php

namespace App\Imports;

use App\Navire;
use Maatwebsite\Excel\Concerns\ToModel;

class NaviresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Navire([
             'name'  => $row[0], 'Reference'  => $row[1]
        ]);
    }
}
