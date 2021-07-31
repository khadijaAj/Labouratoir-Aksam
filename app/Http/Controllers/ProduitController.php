<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Categorie;
use Illuminate\Http\Request;
use App\Exports\ProduitExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\ProduitImport; 

class ProduitController extends Controller
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

        $produits = Produit::paginate(30);


        return view('dt.produits',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();


       
        return view('dt.add_produit')->with('categories',$categories);

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
            'categorie_id' => 'nullable'
            
        ]);
  
        Produit::create([
            'name' => $request->name,
            'Reference' => $request->Reference,
            'categorie_id' => $request->categorie_id,
           
        ]);
        return redirect()->route('produits.index')
                        ->with('success','Produit ajouté avec success.');


    }
    public function pdf()
    {
        $produits = DB::select('select * from produits');
        $date = date('Y-m-d');
        $count= collect($produits)->count();

    	$data = ['title' => 'produits','date'=>$date,'count'=>$count,'elements'=>$produits];
        $pdf = PDF::loadView('pdf_produit', $data);
        $pdf->stream();
        return $pdf->download('liste_produits.pdf');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories=Categorie::all();

        return view('dt.edit_produit',compact('produit'))->with('categories',$categories);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'nullable',
            'categorie_id' => 'nullable'
            
          
        ]);
  
        $produit->update($request->all());
  
        return redirect()->route('produits.index')
                        ->with('success','Produit modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
  
        return redirect()->route('produits.index')
                        ->with('success','Produit supprimé avec success');
    }

    public function export() 
    {
        return Excel::download(new ProduitExport, 'Produits.xlsx');
    }

 
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new ProduitImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
}
