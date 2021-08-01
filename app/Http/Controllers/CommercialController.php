<?php

namespace App\Http\Controllers;
use DB;
use App\Commercial;
use Illuminate\Http\Request;
use App\Exports\CommercialExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CommercialImport; 


use PDF;


class CommercialController extends Controller
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
        $commerciaux = Commercial::paginate(30);
        return view('partenaires.commerciaux',compact('commerciaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.add_commercial');

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
            'adresse' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            
        ]);
  
        Commercial::create([
            'name' => $request->name,
            'Reference' => $request->Reference,
            'adresse' => $request->adresse,
            'tele' => $request->tele
           
        ]);
        return redirect()->route('commercials.index')->with('success','Commercial ajouté avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function show(Commercial $commercial)
    {
        return view('partenaires.show_commercial',compact('commercial'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function edit(Commercial $commercial)
    {
        return view('partenaires.edit_commercial',compact('commercial'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commercial $commercial)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'nullable',
            'adresse' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
  
        $commercial->update($request->all());
  
        return redirect()->route('commercials.index')->with('success','Commercial modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commercial $commercial)
    {
        $commercial->delete();
  
        return redirect()->route('commercials.index')
                        ->with('success','Commercial supprimé avec success');
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new CommercialImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function pdf()
    {
        $commerciaux = DB::select('select * from commercials');
        $date = date('Y-m-d');
        $count= collect($commerciaux)->count();
    	$data = ['title' => 'Commerciaux','date'=>$date,'count'=>$count,'elements'=>$commerciaux];
        $pdf = PDF::loadView('pdfcnco', $data);
        $pdf->stream();
        return $pdf->download('liste_commerciaux.pdf');
    }

    public function export() 
    {
        return Excel::download(new CommercialExport, 'commercial.xlsx');
    }


    public function search(Request $request){
        $search = $request->input('search');
    
        $commerciaux = Commercial::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('Reference', 'LIKE', "%{$search}%")
            ->get();
    
        return view('partenaires.search_commerciaux', compact('commerciaux'));
    }

    }
