<?php

namespace App\Exports;

use App\Origine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrigineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Origine::select('id','name','Reference')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence"];
    }
}
