<?php

namespace App\Exports;

use App\Categorie;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategorieExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categorie::select('id','name','Reference')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence"];
    }
}
