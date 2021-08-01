<?php

namespace App\Http\Controllers;
use App\Categorie;
use Illuminate\Http\Request;
use App\Exports\CategorieExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\CategorieImport; 

class CategorieController extends Controller
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
        
        $categories = Categorie::paginate(30);
  
        return view('dt.categories',compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt.add_categorie');
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
  
        Categorie::create([
            'name' => $request->name,
            'Reference' => $request->Reference
           
        ]);
        return redirect()->route('categories.index')
                        ->with('success','Categorie ajoutée avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
    
        return view('dt.edit_categorie',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'name' => 'required',
            'Reference' => 'nullable',
        ]);
  
        $categorie->update($request->all());
  
        return redirect()->route('categories.index')
                        ->with('success','Categorie modifiée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
  
        return redirect()->route('categories.index')->with('success','Categorie supprimée avec success');
    }

    public function export() 
    {
        return Excel::download(new CategorieExport, 'categories.xlsx');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new CategorieImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function pdf()
    {
        $Categories = DB::select('select * from categories');
        $date = date('Y-m-d');
        $count= collect($Categories)->count();
    	$data = ['title' => 'Categories','date'=>$date,'count'=>$count,'elements'=>$Categories];
        $pdf = PDF::loadView('pdfcnco', $data);
        $pdf->stream();
        return $pdf->download('liste_Categories.pdf');
    }

    public function search(Request $request){
        $search = $request->input('search');
    
        $categories = Categorie::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('Reference', 'LIKE', "%{$search}%")
            ->get();
    
        return view('dt.search_categories', compact('categories'));
    }

}