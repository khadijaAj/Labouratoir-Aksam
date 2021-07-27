<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name'  => $row['nom'], 'Reference'=> $row['reference'],'commercial_id'=> $row['commercial_id'] , 'tele'=> $row['tele'] ,'adresse'  => $row['adresse'], 'Region'=> $row['region']  
         

        ]);
    }
}
