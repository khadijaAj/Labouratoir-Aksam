<?php

namespace App\Imports;


use App\Prospecteur;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProspecteurImport implements ToModel , WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prospcteur([
        
         "name" => $row['Nom'],
         "type" => $row['Type'],
         "code" => $row['Code'],
         "province" => $row['Province'],
         "adresse"=> $row['Adresse'],
         "ville"=> $row['Ville'],
         "pays"=> $row['pays'],
         "modeReglement"=> $row['Mode Régelment'],
        "familleCl"=> $row['Famille Client'],
        "salletraite"=> $row['Salle traite'],
        "modeLivraison"=> $row['Mode de Livraison'],
        "tele"=> $row['N° Télé'],
        "email"=> $row['Email']
    ]);
    
}
}
?>