<?php

namespace App\Exports;

use App\Origine;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrigineExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Origine::all();
    }
}
