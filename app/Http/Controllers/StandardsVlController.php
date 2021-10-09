<?php

namespace App\Http\Controllers;

use App\StandardsVl;
use App\Vachelaitiere;
use Illuminate\Http\Request;
use DB;

class StandardsVlController extends Controller
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
        $standardsvl  = StandardsVl::paginate(30);
        $vachelaitiere= Vachelaitiere::paginate(30);
      
        $data = [

            'standardsvl'   => $standardsvl,
            'vachelaitiere'=> $vachelaitiere
        ];  
 
       return view('users.standardsvl')->with($data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    
   public function create()

   {
       
    $standardsvl  = StandardsVl::all();
    $vachelaitiere= Vachelaitiere::all();
  
    $data = [

        'standardsvl'   => $standardsvl,
        'vachelaitiere'=> $vachelaitiere
    ];  
       return view('users.add_standardsvl')->with($data);
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
           'valeur' => 'nullable',

          
       ]);
 
       StandardsVl::create([
           'libelle' => $request->libelle,
           'valeur' => $request->valeur,
            
       ]);
       return redirect()->route('standardsvl.index')
                       ->with('success','VL ajouté avec success.');

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\StandardsVl  $standardsvl
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
     //

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\StandardsVl $standardsvl
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
    * @param  \App\StandardsVl $standardsvl
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,StandardsVl  $standardsvl)
   {
      
       //
   }
    
   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\StandardsVl  $standardsvl
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       
       $standardsvl = StandardsVl::find($id);
       $standardsvl->delete();
       
       return redirect()->route('standardsvl.index')
        ->with('success','VL  est supprimée avec success');

   }

}