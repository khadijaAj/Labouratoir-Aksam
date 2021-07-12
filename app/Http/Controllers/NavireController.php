<?php

namespace App\Http\Controllers;

use App\Navire;
use Illuminate\Http\Request;
use App\Exports\NavireExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NaviresImport; 
use PDF;
use DB;

class NavireController extends Controller
{
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
        $navires = Navire::all();
  
        return view('partenaires.navires',compact('navires'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.add_navire');
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
            'name' => 'required',
            'Reference' => 'required',
            
        ]);
  
        Navire::create([
            'name' => $request->name,
            'Reference' => $request->Reference
           
        ]);
        return redirect()->route('navires.index')
                        ->with('success','Navire ajouté avec success.');


        
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Navire  $navire
     * @return \Illuminate\Http\Response
     */
    public function show(Navire $navire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Navire  $navire
     * @return \Illuminate\Http\Response
     */
    public function edit(Navire $navire)
    {
       

        return view('partenaires.edit_navire',compact('navire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Navire  $navire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navire $navire)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'required',
          
        ]);
  
        $navire->update($request->all());
  
        return redirect()->route('navires.index')
                        ->with('success','Navire modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Navire  $navire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navire $navire)
    {
        $navire->delete();
  
        return redirect()->route('navires.index')
                        ->with('success','Navire supprimé avec success');
    }
    public function export() 
    {
        return Excel::download(new NavireExport, 'Navires.xlsx');
    }
  


    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new NaviresImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function pdf()
    {
        $Navires = DB::select('select * from navires');
        $date = date('Y-m-d');
        $count= collect($Navires)->count();
        
    	$data = ['title' => 'Navires','date'=>$date,'count'=>$count,'elements'=>$Navires];
        $pdf = PDF::loadView('pdfcnco', $data);
        $pdf->stream();
        return $pdf->download('liste_Navires.pdf');
    }


}
