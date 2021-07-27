<?php

namespace App\Exports;

use App\Commercial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommercialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Commercial::select('id','name','Reference','adresse','tele')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence", "Adresse","N° Télé"];
    }
}
