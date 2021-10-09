<?php

namespace App\Http\Controllers;

use App\Geolocalisation;
use Illuminate\Http\Request;
use App\client;
use DB;


class GeolocalisationController extends Controller
{
    //
     //
    

     public function __construct()
     {
         $this->middleware('auth');
     }
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
 
     {
             $clients  = Client::all();
             $geolocalisations=Geolocalisation::paginate(30);
     
             $data = [
                 'clients'   => $clients,
                 'geolocalisations'=>$geolocalisations
             ];   
             return view('crm.geolocalisation')->with($data);}
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        
        $data = [
            'clients'=> $clients,

        ];
       
        return view('crm.add_gl')->with($data);

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'long'=>'nullable',
           'lat'=>'nullable',
           'adresse'=>'nullable',
           'description'=>'nullable',
            'client_id'=> 'nullable'
            
        ]);
  
       Geolocalisation::create([input::all() ]);
      
   
        return redirect()->route('geolocalisations.index')
                        ->with('success','Maker a été ajouter avec success.');
    }
   
    
}

