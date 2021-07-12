<?php

namespace App\Exports;

use App\Fournisseur;
use Maatwebsite\Excel\Concerns\FromCollection;

class FournisseurExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fournisseur::all();
    }
}
