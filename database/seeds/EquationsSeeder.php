<?php

use Illuminate\Database\Seeder;
use App\Equation;
use App\Equation1;

class EquationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
//* Equations : CORN SILAGE





$data = array(['nom' => 'UFL',
'equation' =>'(NELMcalkg*1000)/1760'],
['nom' => 'CB',
'equation' =>'(13.23+0.85*ADF*10)/10'],
['nom' => 'MO',
'equation' =>'1000-Ash*10'],
['nom' => 'CPO',
'equation' =>'(CP*10*1000)/MO'],
['nom' => 'CFO',
'equation' =>'(CB*10*1000)/MO'],
['nom' => 'TDN',
'equation' =>'(79.6-(0.0609*0.958*CFO))+(0.0687*0.940*CPO)'],
['nom' => 'VDMIL',
'equation' =>'-76.4+2.39*TDN+1.44*DM'],
['nom' => 'VDMIB',
'equation' =>'-45.49+1.34*TDN+1.15*DM'],
['nom' => 'VDMIM',
'equation' =>'(-1701+(48.92*TDN))-(0.34*(TDN*TDN))'],
['nom' => 'UEM',
'equation' =>'75/VDMIM'],
['nom' => 'UEL',
'equation' =>'140/VDMIL'],
['nom' => 'UEB',
'equation' =>'95/VDMIB'],
['nom' => 'PDIA',
'equation' =>'(CP*10)*(1.11*(1-0.72)*0.7)'],
['nom' => 'PDIMN',
'equation' =>'(CP*10)*((1-1.11*(1-0.72))*0.9*0.8*0.8)'],
['nom' => 'PDIN',
'equation' =>'PDIA+PDIMN'],
['nom' => 'Ed',
'equation' =>'-2.86+1.001*TDN'],
['nom' => 'MOF',
'equation' =>'MO*TDN*0.01-Fat_EE*10-CP*10*(1-0.7)-10*(Acetic+Propionic)'],
['nom' => 'PDIME',
'equation' =>'MOF*0.145*0.8*0.8'],
['nom' => 'PDIE',
'equation' =>'PDIA+PDIME'],
['nom' => 'PDIA',
'equation' =>'(CP*10)*(1.11*(1-0.72)*0.7)'],
['nom' => 'GE2',
'equation' =>'4722-0.458*Starch*10*MO/1000+1.42*CP*10*MO/1000'],
['nom' => 'GE',
'equation' =>'(GE2*MO)/1000'],
['nom' => 'DE',
'equation' =>'(Ed*GE)/100'],
['nom' => 'EU%GE',
'equation' =>'2.9+0.017*CP*10-0.47*1.44'],
['nom' => 'EU',
'equation' =>'EU%GE*GE*0.01'],
['nom' => 'DOM',
'equation' =>'MO*TDN*0.01'],
['nom' => 'ECH4',
'equation' =>'37.3848*0.001*DOM*12.5'],
['nom' => 'ME',
'equation' =>'DE-ECH4-EU'],
['nom' => 'q',
'equation' =>'ME/GE'],
['nom' => 'Km',
'equation' =>'0.287*q+0.554'],
['nom' => 'Kf',
'equation' =>'0.78*q+0.006'],
['nom' => 'KLs',
'equation' =>'0,65+0,247*([q]-0,63)'],
['nom' => 'NEL',
'equation' =>'ME*KLs'],
['nom' => 'Kmf',
'equation' =>'(Km*Kf*1.5)/(Kf+0.5*Km)'],
['nom' => 'NEmg',
'equation' =>'Kmf*ME'],
['nom' => 'UFV',
'equation' =>'NEmg/1760']

); 

foreach ($data as $datum){

    $equation = new Equation();
    $equation->nom =$datum['nom'];
    $equation->equation =$datum['equation'];
    $equation->save();
}

//* SMALL SILAGE EQUATIONS


$data1 = array(['nom' => 'UFL',
'equation' =>'(NELMcalkg*1000)/1760'],
['nom' => 'CB',
'equation' =>'((1.01*(ADF*10))-50)/10'],
['nom' => 'MO',
'equation' =>'1000-Ash*10'],
['nom' => 'TDN',
'equation' =>'123.6-0.169*(ADF*10)'],
['nom' => 'VDMIL',
'equation' =>'66.3+(0.655*TDN)+(0.098*CP)+(0.626*DM)-3.7'],
['nom' => 'VDMIB',
'equation' =>'6.44+(0.782*TDN)+(0.112*(CP*10))+(0.679*DM)-1.7'],
['nom' => 'UEL',
'equation' =>'140/VDMIL'],
['nom' => 'UEB',
'equation' =>'95/VDMIB'],
['nom' => 'PDIA',
'equation' =>'((CP)*10)*(1.11*(1-0.72)*(0.7))'],
['nom' => 'PDIMN',
'equation' =>'(CP*10)*(1-1.11*(1-0.72))*0.9*0.8*0.8'],
['nom' => 'PDIN',
'equation' =>'PDIA+PDIMN'],
['nom' => 'Ed',
'equation' =>'-2.86+1.001*TDN'],
['nom' => 'MOF',
'equation' =>'MO*TDN*0.01-Fat_EE*10-CP*10*(1-0.7)'],
['nom' => 'PDIME',
'equation' =>'MOF*0.145*0.8*0.8'],
['nom' => 'PDIE',
'equation' =>'PDIA+PDIME'],
['nom' => 'GE2',
'equation' =>'4722-0.458*Starch*10*MO/1000+1.42*CP*10*MO/1000'],
['nom' => 'GE',
'equation' =>'(GE2*MO)/1000'],
['nom' => 'DE',
'equation' =>'(Ed*GE)/100'],
['nom' => 'EU%GE',
'equation' =>'2.9+0.017*CP*10-0.47*1.44'],
['nom' => 'EU',
'equation' =>'EU%GE*GE*0.01'],
['nom' => 'DOM',
'equation' =>'MO*TDN*0.01'],
['nom' => 'ECH4',
'equation' =>'37.3848*0.001*DOM*12.5'],
['nom' => 'ME',
'equation' =>'DE-ECH4-EU'],
['nom' => 'q',
'equation' =>'ME/GE'],
['nom' => 'Km',
'equation' =>'0.287*q+0.554'],
['nom' => 'Kf',
'equation' =>'0.78*q+0.006'],
['nom' => 'KLs',
'equation' =>'0.65+0.247*(q-0.63)'],
['nom' => 'NEL',
'equation' =>'ME*KLs'],
['nom' => 'Kmf',
'equation' =>'(Km*Kf*1.5)/(Kf+0.5*Km)'],
['nom' => 'NEmg',
'equation' =>'Kmf*ME'],
['nom' => 'UFV',
'equation' =>'NEmg/1760']

); 



foreach ($data1 as $datum){

$equation1 = new Equation1();
$equation1->nom =$datum['nom'];
$equation1->equation =$datum['equation'];
$equation1->save();
}



    }
}
