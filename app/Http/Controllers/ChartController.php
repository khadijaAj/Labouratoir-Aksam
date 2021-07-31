<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Mprapport;
use App\Produit;
use App\Origine;
use App\Navire;
use App\Fournisseur;
use App\Nutriment;
use App\Standardtype;
use App\Pfrapport;
use App\Enrapport;
use App\Commercial;
use App\Client;

use App\Value;
use App\Mesure;
use Illuminate\Http\Request;
use DB;

class ChartController extends Controller
{
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $values = Value::all();
        $navires = Navire::all();
        $origines = Origine::all();
        $fournisseurs = Fournisseur::all();
        $mprapports = Mprapport::all();
        $pfrapports = Pfrapport::all();
        $enrapports = Enrapport::all();
        $standardsmp=Standardtype::find(1);;
        $standardspf = Standardtype::find(2);
        $standardsen = Standardtype::find(4);
        $type = $request->type;
        $produit_id = $request->produit_id;
        $nutriment_id = $request->nutriment_id;
        $nutriment_name = Nutriment::find($nutriment_id)->name;
        $produit_name = Produit::find($produit_id)->name;
        $data = [
            'produits'  => $produits,
            'nutriments'  => $nutriments,
            'fournisseurs'  => $fournisseurs,
            'origines'  => $origines,
            'values'  => $values,
            'navires'  => $navires,
            'pfrapports'  => $pfrapports,
            'mprapports'  => $mprapports,
            'enrapports'  => $enrapports,
            'standardsmp'=>  $standardsmp,
            'standardspf'=> $standardspf,
            'standardsen' =>  $standardsen,
            'produit_name'=>$produit_name,
            'Filtrer'=>$request->filter_name

        ];
        
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        
        try{

            $names = [];
            $vals=[];
            $avg=[];
        if($request->type=="MP"){
            if($request->filter_name=="date_range"){

                
                $mprapports = Mprapport::where('produit_id', '=',$produit_id)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();
                
                
                foreach($mprapports as $mprapport){
                    array_push($names,$mprapport->date_reception);
                    $v= Value::where('nutriment_id', $nutriment_id)->where('mprapport_id', '=', $mprapport->id)
                            ->value('value_surbrute');
                            array_push($vals,$v);
                    
                
                 }
            }
            if($request->filter_name=="origines"){

                $origines = Origine::all();                
                
                foreach($origines as $origine){
                    if (count($origine->mprapports->where('produit_id','=',$produit_id)->whereBetween('date_reception', [$date_start, $date_end])))
                    {   array_push($names, $origine->name);
                        $vals=[];
                        foreach($origine->mprapports as $mprapport){
                           
                            $v= Value::where('nutriment_id', $nutriment_id)->where('mprapport_id', '=', $mprapport->id)
                            ->value('value_surbrute');
                            
                            array_push($vals,$v);
                            
                        }
                        
                        $vals = array_filter($vals);
                            if(count($vals) != 0){  
                                $average = array_sum($vals)/count($vals);
                                array_push($avg,$average);
                                


                            }else{
                                array_push($avg,0);
                            }

                   
                        }
                    $vals=$avg;
                    

                }
            }elseif($request->filter_name=="navires"){
            $navires = Navire::all();
            
            foreach($navires as $navire){
                if (count($navire->mprapports->where('produit_id','=',$produit_id)->whereBetween('date_reception', [$date_start, $date_end])))
                     {   array_push($names, $navire->name);
                        $vals=[];

                        foreach($navire->mprapports as $mprapport){
                            $v= Value::where('nutriment_id', $nutriment_id)->where('mprapport_id', '=', $mprapport->id)
                            ->value('value_surbrute');
                            array_push($vals,$v);
                        }
                        $vals = array_filter($vals);
                        if(count($vals) != 0){  
                            $average = array_sum($vals)/count($vals);
                            array_push($avg,$average);
                            


                        }else{
                            array_push($avg,0);
                        }

               
                    }
                $vals=$avg;
            }
        }
        
            elseif($request->filter_name=="fournisseurs"){

            $fournisseurs = Fournisseur::all();
            
            foreach($fournisseurs as $fournisseur){
                if (count($fournisseur->mprapports->where('produit_id','=',$produit_id)->whereBetween('date_reception', [$date_start, $date_end])))
                {   array_push($names, $fournisseur->name);
                    $vals=[];

                    foreach($fournisseur->Mprapports as $mprapport){
                        $v= Value::where('nutriment_id', $nutriment_id)->where('mprapport_id', '=', $mprapport->id)
                        ->value('value_surbrute');
                        array_push($vals,$v);
                    }
                    $vals = array_filter($vals);
                            if(count($vals) != 0){  
                                $average = array_sum($vals)/count($vals);
                                array_push($avg,$average);
                                


                            }else{
                                array_push($avg,0);
                            }

                   
                        
                   

                }else{
                    

                }
                $vals=$avg;


        }
    }
}


  
if($request->type=="PF"){
    if($request->filter_name=="date_range"){

        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $pfrapports = Pfrapport::where('produit_id', '=',$produit_id)->orderBy('date_fabrication','ASC')->whereBetween('date_fabrication', [$date_start, $date_end])->get();
        
        foreach($pfrapports as $pfrapport){
            array_push($names,$pfrapport->date_fabrication);
            $v= Value::where('nutriment_id', $nutriment_id)->where('pfrapport_id', '=', $pfrapport->id)
                    ->value('value_surbrute');
            array_push($vals,$v);
            
        
         }
         
    }


}

 
if($request->type=="EN"){

    if($request->filter_name=="date_range"){

        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $enrapports = Enrapport::where('produit_id', '=',$produit_id)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();
        
        foreach($enrapports as $enrapport){
            array_push($names,$enrapport->date_reception);
            $v= Value::where('nutriment_id', $nutriment_id)->where('enrapport_id', '=', $enrapport->id)
                    ->value('value_surbrute');
                    array_push($vals,$v);
            
        
         }
    }elseif($request->filter_name=="commerciaux"){

        $commerciaux = Commercial::all();
        
        foreach($commerciaux as $commercial){
            if (count($commercial->enrapports->where('produit_id','=',$produit_id)->whereBetween('date_reception', [$date_start, $date_end])))
                 {   array_push($names, $commercial->name);
                    $vals=[];

                    foreach($commercial->enrapports as $enrapport){
                        $v= Value::where('nutriment_id', $nutriment_id)->where('enrapport_id', '=', $enrapport->id)
                        ->value('value_surbrute');
                        array_push($vals,$v);
                    }
                    $vals = array_filter($vals);
                    if(count($vals) != 0){  
                        $average = array_sum($vals)/count($vals);
                        array_push($avg,$average);
                        


                    }else{
                        array_push($avg,0);
                    }

           
                }
            $vals=$avg;
        }
    }
    if($request->filter_name=="clients"){

        $clients = Client::all();
        
        foreach($clients as $client){
            if (count($client->enrapports->where('produit_id','=',$produit_id)->whereBetween('date_reception', [$date_start, $date_end])))
                 {   array_push($names, $client->name);
                    $vals=[];

                    foreach($client->enrapports as $enrapport){
                        $v= Value::where('nutriment_id', $nutriment_id)->where('enrapport_id', '=', $enrapport->id)
                        ->value('value_surbrute');
                        array_push($vals,$v);
                    }
                    $vals = array_filter($vals);
                    if(count($vals) != 0){  
                        $average = array_sum($vals)/count($vals);
                        array_push($avg,$average);
                        


                    }else{
                        array_push($avg,0);
                    }

           
                }
            $vals=$avg;
        }
    }


}
        }catch (Throwable $e) {
            $names = [];
            $vals=[];
    
            return view('chartjs',['names' => $names, 'Data' => $vals,'Nutriment'=> $nutriment_name,'Filter'=> $request->filter_name])->with($data);
        }
        
        return view('chartjs',['names' => $names, 'Data' => $vals,'Nutriment'=> $nutriment_name,'Filter'=> $request->filter_name,'date_start'=>$date_start , 'date_end'=>$date_end])->with($data);
        
     }
           
        

        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}