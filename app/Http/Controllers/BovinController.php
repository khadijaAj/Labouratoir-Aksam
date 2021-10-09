<?php

namespace App\Http\Controllers;

use App\Bovin;
use Illuminate\Http\Request;
use App\Exports\BovinExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\BovinImport; 

class BovinController extends Controller
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
        $bovin = Bovin::paginate(30);
  
        return view('dt.bovin',compact('bovin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt.add_bovin');
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
            'realise' => 'nullable',
          
          


            
        ]);
  
        Bovin::create([
            'libelle' => $request->libelle,
            'valeur' => $request->valeur,
            'realise' => $request->realise,
             
        ]);
        return redirect()->route('bovin.index')
                        ->with('success','bovin ajouté avec success.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bovin $bovin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bovin = Bovin::find($id);
        return view('dt.show_bovin',compact('bovin'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bovin $bovin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bovin = Bovin::find($id);
        return view('dt.edit_bovin',compact('bovin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bovin $bovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bovin $bovin)
    {   

            $request->validate([
                'libelle' => 'required',
                'valeur' => 'nullable',
                'realise' => 'nullable',
              
            ]);
      
            $bovin->update($request->all());
  
        return redirect()->route('bovin.index')
                        ->with('success','bovin modifiée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bovin $bovin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bovin = Bovin::find($id);
        $bovin->delete();
  
        return redirect()->route('bovin.index')
                        ->with('success','bovin supprimée avec success');
    }

    public function export() 
    {
        return Excel::download(new BovinExport, 'ovins.xlsx');
    }
    public function pdf()
    {
        $bovins= DB::select('select * from bovins');
        $date = date('Y-m-d');
        $count= collect($bovins)->count();
        
    	$data = ['title' => 'bovin','date'=>$date,'count'=>$count,'elements'=>$bovins];
        $pdf = PDF::loadView('pdf_bovin', $data);
        $pdf->stream();
        return $pdf->download('BV.pdf');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	    $file = $request->file('file');
        Excel::import(new  BovinImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function search(Request $request){
        $search = $request->input('search');
    
        $bovin= Bovin::query()
            ->where('libelle', 'LIKE', "%{$search}%")
            ->get();
    
        return view('dt.search_bovin', compact('bovin'));
    }
}
