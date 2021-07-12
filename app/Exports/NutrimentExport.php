<?php

namespace App\Exports;

use App\Nutriment;
use Maatwebsite\Excel\Concerns\FromCollection;

class NutrimentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nutriment::all();
    }
}
