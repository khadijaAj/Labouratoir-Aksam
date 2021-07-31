<?php

namespace App\Exports;

use App\Enrapport;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Xml;
use App\Standardtype;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\Schema;

class RapportsensilageExport implements FromArray, WithHeadings
{
    protected $ids;

    function __construct($ids) {
            $this->ids = $ids;
    }
    public function array(): array{

       if($this->ids){
        $enrapports = Enrapport::findMany($this->ids);

       }else{
        $enrapports = Enrapport::all();
       }
       foreach($enrapports as $enrapport){

        if(!is_null($enrapport->commercial)){
            $commercial = $enrapport->commercial->name;
        }else{
            $commercial = '';
        }
        $collectionA = array(

            'Id'=>$enrapport->id,
            'Interpretation'=>$enrapport->Interpretation,
            'Identifiant'=>$enrapport->Identifiant,
            'Ref Client'=>$enrapport->client->Reference,
            'Client'=>$enrapport->client->name,
            'Commercial'=>$enrapport->commercial,
            'Date_reception'=>$enrapport->date_reception,
            'Type'=>$enrapport->type,
            'num_ech'=>$enrapport->num_ech
        
        );

        $xml_data = Xml::find($enrapport->id);
      
        $values = collect(Xml::find($enrapport->id))->values();
        $arraysA=[];
        foreach($values as $value){
            $record1 = [];
            $record1 = $value;
            $arraysA[] = $record1;
    
        }
    
      

$result [] = $collectionA+$arraysA;
    }
return $result;
    }
    public function headings() :array
    {
        $arraysA=  array("id", "Interpretation","Identifiant","Ref Client","Client","Commercial","Date_Reception","Type","Num Ech");        
        $columns = collect(Xml::first())->keys();

        foreach($columns as $value){
            $record1 = [];
            $record1 = $value;
            $arraysA[] = $record1;
    
        }
        
        
        return $arraysA;
    }


}