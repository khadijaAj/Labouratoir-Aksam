<?php

namespace App\Http\Controllers;

use App\Nutriment;
use Illuminate\Http\Request;
use App\Exports\NutrimentExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\NutrimentImport; 
class NutrimentController extends Controller
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
        $nutriments = Nutriment::paginate(30);
  
        return view('dt.nutriments',compact('nutriments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt.add_nutriment');
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
            'cout' => 'nullable',
            'incertitude' => 'nullable',
            'cible' => 'nullable',
          


            
        ]);
  
        Nutriment::create([
            'name' => $request->name,
            'Reference' => $request->Reference,
            'cout' => $request->cout,
            'incertitude' => $request->incertitude,
            'cible' => $request->cible,
            
           
        ]);
        return redirect()->route('Nutriment.index')
                        ->with('success','Nutriment ajouté avec success.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nutriment  $nutriment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nutriment = Nutriment::find($id);
        return view('dt.show_nutriment',compact('nutriment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nutriment  $nutriment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nutriment = Nutriment::find($id);
        return view('dt.edit_nutriment',compact('nutriment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nutriment  $nutriment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nutriment $nutriment,$id)
    {
        $nutriment = Nutriment::find($id);

        $request->validate([
            'name' => 'required',
            'Reference' => 'nullable',
            'cout' => 'nullable',
            'incertitude' => 'nullable',
            'cible' => 'nullable',
           

          
        ]);
  
        $nutriment->update($request->all());
  
        return redirect()->route('Nutriment.index')
                        ->with('success','Nutriment modifiée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nutriment  $nutriment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nutriment = Nutriment::find($id);
        $nutriment->delete();
  
        return redirect()->route('Nutriment.index')
                        ->with('success','Nutriment supprimée avec success');
    }

    public function export() 
    {
        return Excel::download(new NutrimentExport, 'nutriments.xlsx');
    }
    public function pdf()
    {
        $Nutriments = DB::select('select * from nutriments');
        $date = date('Y-m-d');
        $count= collect($Nutriments)->count();
        
    	$data = ['title' => 'Nutriments','date'=>$date,'count'=>$count,'elements'=>$Nutriments];
        $pdf = PDF::loadView('pdfcnco', $data);
        $pdf->stream();
        return $pdf->download('liste_Nutriments.pdf');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	    $file = $request->file('file');
        Excel::import(new  NutrimentImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function search(Request $request){
        $search = $request->input('search');
    
        $nutriments = Nutriment::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('Reference', 'LIKE', "%{$search}%")
            ->get();
    
        return view('dt.search_nutriments', compact('nutriments'));
    }
}
