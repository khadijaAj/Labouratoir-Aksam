<?php

namespace App\Http\Controllers;

use App\Pfrapport;
use App\Produit;
use App\Standardtype;
use App\Nutriment;
use App\Exports\ProduitsfinisExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Value;
use DB;
use Illuminate\Http\Request;
use App\Imports\ProduitfiniImport; 
use PDF;
class PfrapportController extends Controller
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
        $pfrapports = Pfrapport::all();
        return view('analyses.produitfini',compact('pfrapports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(2); // Id 2 is created for Final Product Model
      
        $data = [
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,

        ];
       
        return view('analyses.add_pf')->with($data);
    
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
            'num' => 'required',
            'produit_id' => 'required',
            'identification' => 'required',
            'conformite' => 'nullable',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_fabrication' => 'nullable',
            'commentaire' => 'nullable',
            'ACR' => 'nullable',
            'MSR' => 'nullable',
           
        ]);
        
        if ($files = $request->file('path')) {
            $destinationPath = 'public/pj/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $insert['title'] = "$profilefile";
       
         }else{
            $insert['title'] = "";
         }
          
 
        
        Pfrapport::create([
            'num' => $request->num,
            'produit_id' => $request->produit_id,
            'date_fabrication' => $request->date_fabrication,
            'identification' => $request->identification,
            'conformite' => $request->conformite,
            'commentaire' => $request->commentaire,
            'path' => $insert['title'],
            'MSR' => $request->MSR,
            'ACR' => $request->ACR





           
        ]);
        $id = Pfrapport::where('num', $request->num)->first()->id;
        
       foreach($request->input('nutriment_id', []) as $r){
       
        $value = new Value();    
        $value->value_surbrute = $request->input("valeur_surbrute_".$r);
        $value->pfrapport_id = $id;
        $value->value_surseche  = $request->input("valeur_surseche_".$r);
        $value->nutriment_id = $r;
        $value->save(); 
       }
        
        return redirect()->route('pfrapports.index')
                        ->with('success','Rapport Produit fini ajouté avec success.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pfrapport  $pfrapport
     * @return \Illuminate\Http\Response
     */
    public function show(Pfrapport $pfrapport)
    {
        $standards=Standardtype::find(2);
        $values = Value::all();

        return view('analyses.show_pf',compact('pfrapport','standards','values'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pfrapport  $pfrapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Pfrapport $pfrapport)
    {   
        
        $standards=Standardtype::find(2);
        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $values = Value::all();

        $data = [
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'values' => $values

        ];

        return view('analyses.edit_pf',compact('pfrapport'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pfrapport  $pfrapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pfrapport $pfrapport)
    {
    
        $request->validate([
            'num' => 'required',
            'produit_id' => 'required',
            'identification' => 'required',
            'conformite' => 'required',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_fabrication' => 'required',
            'commentaire' => 'nullable',
           
        ]);

        $pfrapport->update($request->all());
        
        if ($files = $request->file('path')) {
            $destinationPath = 'public/pj/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $insert['title'] = "$profilefile";
            Pfrapport::where('num', $request->num)->update([ 'path' => $insert['title']]);

         }
          
        $id = Pfrapport::where('num', $request->num)->first()->id;

        foreach($request->input('nutriment_id', []) as $r){

   
            
            $value_surbrute = $request->input("valeur_surbrute_".$r);
            $value_surseche  = $request->input("valeur_surseche_".$r);
            $nutriment_id = $r;

            $data = [
            'pfrapport_id'=>$id,
            'nutriment_id'=> $nutriment_id,
            'value_surbrute' => $value_surbrute,
            'value_surseche'=> $value_surseche] ;
            
            DB::table('values')->where('id', $request->input("value_id_".$r))->update($data);

           }
                 return redirect()->route('pfrapports.index')
                        ->with('success','Rapport Produit fini modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pfrapport  $pfrapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pfrapport $pfrapport)
    {
        $pfrapport->delete();
  
        return redirect()->route('pfrapports.index')
                        ->with('success','Rapport Produit fini supprimé avec success');
    }
    public function export() 
    {
        return Excel::download(new ProduitsfinisExport, 'produitsfinis.xlsx');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

    	$file = $request->file('file');
        Excel::import(new ProduitfiniImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function generatePDF(Request $request)
    {
   
        $pfrapports=Pfrapport::all();
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(2);
        $values = Value::all();
    

        $data = [
        'pfrapports' => $pfrapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date

         ];

        $pdf = PDF::loadView('PDFtemplate.PDF_PF', $data);
        $pdf->setPaper('A4', 'landscape');

        return  $pdf->download('rapport_pf.pdf'); 
    }
    public function generatePDF_mycotoxine(Request $request)
    {
   
        $pfrapports=Pfrapport::all();
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(2);
        $values = Value::all();

        $data = [
        'pfrapports' => $pfrapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date
        ];

        $pdf = PDF::loadView('PDFtemplate.PDF_PF_Mycotoxine', $data);
        $pdf->setPaper('A4', 'landscape');

        return  $pdf->download('rapport_mp.pdf'); 
    }
}
