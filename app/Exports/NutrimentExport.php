<?php

namespace App\Exports;

use App\Nutriment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NutrimentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nutriment::select('id','name','Reference','incertitude','cout','cible')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence","Incertitude","Cout","Cible"];
    }
}
