<?php

namespace App\Exports;

use App\Navire;
use Maatwebsite\Excel\Concerns\FromCollection;

class NavireExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Navire::all();
    }
}
