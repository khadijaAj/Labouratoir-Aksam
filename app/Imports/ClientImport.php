<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name'  => $row[0], 'adresse'  => $row[1], 'tele'=> $row[2] , 'Reference'=> $row[3] , 'Region'=> $row[4] , 'commercial_id'=> $row[5]

        ]);
    }
}
