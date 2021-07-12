<?php

namespace App\Exports;

use App\Commercial;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommercialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Commercial::all();
    }
}
