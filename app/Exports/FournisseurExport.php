<?php

namespace App\Exports;

use App\Fournisseur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FournisseurExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fournisseur::select('id','name','Reference','adresse','tele')->get();
    }
    public function headings() :array
    {
        return ["id", "Nom","Référence", "Adresse","N° Télé"];
    }
}
