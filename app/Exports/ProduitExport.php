<?php

namespace App\Exports;

use App\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produit::all();
    }
}
