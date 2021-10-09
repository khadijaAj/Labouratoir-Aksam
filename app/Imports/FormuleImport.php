<?php

namespace App\Imports;


use App\Client;
use App\Formule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormuleImport implements ToModel , WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //
        return new Formule([
        
        'date_creation'=> $row['Date de creation'],
        'ensilage'=> $row['Ensilage'],
        'foin'=> $row['Foin'],
        'paille'=> $row['Paille'],
        'fourrage'=> $row['Fourrage'],
        'aliment'=> $row['Paille'],
        'trxSoja'=> $row['Trx Soja'],
        'cmv'=> $row['CMV'],
        'maisbroye'=> $row['Mais broyé'],
        'coquesoja'=> $row['Coque de Soja'],
        'psb'=> $row['psb'],
        'bicarbonate'=> $row['Bicarbonate'], 
         'niveauensilage'=> $row['Niveau Ensilage'],
         'niveauproduction'=> $row['Niveau deproduction,'],
         'autre'=> $row['Autre'],
         ' valeursms,'=> $row['Valeur MS'] ,
         'client_id'=> $row['client_id']
        


]);
 }
}
