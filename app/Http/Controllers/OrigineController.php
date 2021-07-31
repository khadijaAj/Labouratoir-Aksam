<?php

namespace App\Http\Controllers;

use App\Origine;
use Illuminate\Http\Request;
use App\Exports\OrigineExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\OrigineImport; 

class OrigineController extends Controller
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
        $origines = Origine::paginate(30);
        return view('dt.origines',compact('origines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt.add_origine');

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
            'Reference' => 'nullable',
            
        ]);
  
        Origine::create([
            'name' => $request->name,
            'Reference' => $request->Reference
           
        ]);
        return redirect()->route('origines.index')
                        ->with('success','Origine ajoutée avec success.');


        
    }

  

    /**
     * Display the specified resource.
     *
     * @param  \App\Origine  $origine
     * @return \Illuminate\Http\Response
     */
    public function show(Origine $origine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Origine  $origine
     * @return \Illuminate\Http\Response
     */
    public function edit(Origine $origine)
    {
        return view('dt.edit_origine',compact('origine'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Origine  $origine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Origine $origine)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'nullable',
          
        ]);
  
        $origine->update($request->all());
  
        return redirect()->route('origines.index')
                        ->with('success','Origine modifiée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Origine  $origine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Origine $origine)
    {
        $origine->delete();
  
        return redirect()->route('origines.index')
                        ->with('success','Origine supprimée avec success');
    }
    public function export() 
    {
        return Excel::download(new OrigineExport, 'origines.xlsx');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new OrigineImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function pdf()
    {
        $Origines = DB::select('select * from origines');
        $date = date('Y-m-d');
        $count= collect($Origines)->count();
    	$data = ['title' => 'Origines','date'=>$date,'count'=>$count,'elements'=>$Origines];
        $pdf = PDF::loadView('pdfcnco', $data);
        $pdf->stream();
        return $pdf->download('liste_Origines.pdf');
    }
}
