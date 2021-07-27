<?php

namespace App\Exports;

use App\Navire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NavireExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Navire::select('id','name','Reference')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence"];
    }
}
