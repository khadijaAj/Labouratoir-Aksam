<?php

namespace App\Http\Controllers;

use App\Standardsovin;
use App\Ovin;
use Illuminate\Http\Request;
use DB;


class StandardsovinController extends Controller
{
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

        $standardsov  = Standardsovin::paginate(30);;
        $ovin= Ovin::paginate(30);
  
       $data = [
  
        'standardsov'   => $standardsov,
        'ovin'=> $ovin
       ];  
       return view('users.standardsov')->with($data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    
   public function create()

   {
       
    $standardsov  = Standardsovin::all();
    $ovin= Ovin::all();
  
    $data = [

        'standardsov'   => $standardsov,
        'ovin'=> $ovin
    ];  
       return view('users.add_standardsov')->with($data);
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
           'libelle' => 'required',
           'valeur' => 'nullable' 
          
       ]);
 
       Standardsovin::create([
           'libelle' => $request->libelle,
           'valeur' => $request->valeur,
            
       ]);
       return redirect()->route('standardsov.index')
                       ->with('success','OV ajouté avec success.');

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Standardsovin  $standardsov
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
     //

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Standardsovin $standardsov
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Standardsovin $standardsov
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,Standardsovin  $standardsov)
   {
      
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Standardsovin  $standardsov
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $standardsov = Standardsovin::find($id);
       $standardsov->delete();

       return redirect()->route('standardsov.index')
                       ->with('success','Critère est supprimée avec success');
   }

}