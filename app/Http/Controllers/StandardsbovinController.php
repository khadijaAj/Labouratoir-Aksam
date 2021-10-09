<?php

namespace App\Http\Controllers;

use App\Standardsbovin;
use App\Bovin;
use Illuminate\Http\Request;
use DB;

class StandardsbovinController extends Controller
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

        $standardsbv  = Standardsbovin::paginate(30);;
        $bovin= Bovin::paginate(30);
  
       $data = [
  
        'standardsbv'   => $standardsbv,
        'bovin'=> $bovin
       ];  
       return view('users.standardsbv')->with($data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    
   public function create()

   {
       
    $standardsbv  = Standardsbovin::all();
    $bovin= Bovin::all();
  
    $data = [

        'standardsbv'   => $standardsbv,
        'bovin'=> $bovin
    ];  
       return view('users.add_standardsbv')->with($data);
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
 
       Standardsbovin::create([
           'libelle' => $request->libelle,
           'valeur' => $request->valeur,
          
            
       ]);
       return redirect()->route('standardsbv.index')
                       ->with('success','BV ajouté avec success.');

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Standardsbovin  $standardsbv
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
     //

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Standardsbovin $standardsbv
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
    * @param  \App\Standardsbovin $standardsbv
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,Standardsbovin  $standardsbv)
   {
      
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Standardsbovin  $standardsbv
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $standardsbv = Standardsbovin::find($id);
       $standardsbv->delete();
 
       return redirect()->route('standardsbv.index')
                       ->with('success','BV est supprimée avec success');
   }

}