<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use App\Exports\FournisseurExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\FournisseurImport; 


class FournisseurController extends Controller
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
        $fournisseurs = Fournisseur::all();
  
        return view('partenaires.fournisseurs',compact('fournisseurs'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.add_fournisseur');
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
            'adresse' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            
        ]);
  
        Fournisseur::create([
            'name' => $request->name,
            'Reference' => $request->Reference,
            'adresse' => $request->adresse,
            'tele' => $request->tele
           
        ]);
        return redirect()->route('fournisseurs.index')
                        ->with('success','Fournisseur ajouté avec success.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('partenaires.show_fournisseur',compact('fournisseur'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
       
        return view('partenaires.edit_fournisseur',compact('fournisseur'));

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'required',
            'adresse' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
  
        $fournisseur->update($request->all());
  
        return redirect()->route('fournisseurs.index')
                        ->with('success','Fournisseur modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
  
        return redirect()->route('fournisseurs.index')
                        ->with('success','Fournisseur supprimé avec success');
    }
    public function export() 
    {
        return Excel::download(new FournisseurExport, 'fournisseurs.xlsx');
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new FournisseurImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function pdf()
    {
        $fournisseurs = DB::select('select * from fournisseurs');
        $date = date('Y-m-d');
        $count= collect($fournisseurs)->count();
    	$data = ['title' => 'Fournisseurs','date'=>$date,'count'=>$count,'elements'=>$fournisseurs];
        $pdf = PDF::loadView('pdf_fournisseur', $data);
        $pdf->stream();
        return $pdf->download('liste_fournisseurs.pdf');
    }

}
