<?php

namespace App\Http\Controllers;

use App\Mprapport;
use App\Produit;
use App\Origine;
use App\Navire;
use App\Fournisseur;
use App\Nutriment;
use App\Standardtype;
use App\Value;
use App\Client;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MatieresPremieresExport;
use Illuminate\Http\Request;
use App\Imports\MatierePremiereImport; 
use File;


class MprapportController extends Controller
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
        $Mprapports = Mprapport::all();


        return view('analyses.matierepremiere',compact('Mprapports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $produits=Produit::all();
        $origines=Origine::all();
        $fournisseurs=Fournisseur::all();
        $navires=Navire::all();
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(1);

        $data = [
            'produits'  => $produits,
            'fournisseurs'   => $fournisseurs,
            'origines'   => $origines,
            'navires' => $navires,
            'standards'  => $standards,
            'nutriments'  => $nutriments,

        ];
    
        return view('analyses.add_mp')->with($data);
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
            'num_bon' => 'required',
            'produit_id' => 'required',
            'fournisseur_id' => 'required',
            'origine_id' => 'nullable',
            'navire_id' => 'nullable',
            'conformite' => 'required',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_reception' => 'nullable',
            'commentaire' => 'nullable',
            'PS' => 'nullable'

        ]);
        
        if ($files = $request->file('path')) {
            $destinationPath = 'public/pj/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $insert['title'] = "$profilefile";
       
         }else{
            $insert['title'] = "";
         }
          
 
        
        Mprapport::create([
            'num' => $request->num,
            'num_bon' => $request->num_bon,
            'produit_id' => $request->produit_id,
            'fournisseur_id' => $request->fournisseur_id,
            'origine_id' => $request->origine_id,
            'navire_id' => $request->navire_id,
            'date_reception' => $request->date_reception,
            'conformite' => $request->conformite,
            'commentaire' => $request->commentaire,
            'path' => $insert['title']  ,
            'PS' => $request->PS

        ]);
        $id = Mprapport::where('num', $request->num)->first()->id;
        
       foreach($request->input('nutriment_id', []) as $r){
       
        $value = new Value();    
        $value->value_surbrute = $request->input("valeur_surbrute_".$r);
        $value->mprapport_id = $id;
        $value->value_surseche  = $request->input("valeur_surseche_".$r);
        $value->nutriment_id = $r;
        $value->save(); 
       }
        
        return redirect()->route('mprapports.index')
                        ->with('success','Rapport Matiere Premiere ajouté avec success.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mprapport  $mprapport
     * @return \Illuminate\Http\Response
     */
    public function show(Mprapport $mprapport)
    {
        $standards=Standardtype::find(1);
        $values = Value::all();

        return view('analyses.show_mp',compact('mprapport','standards','values'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mprapport  $mprapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Mprapport $mprapport)
    {
        $standards=Standardtype::find(1);
        $produits=Produit::all();
        $fournisseurs=Fournisseur::all();
        $origines=Origine::all();
        $navires=Navire::all();
        $nutriments=Nutriment::all();
        $values = Value::all();

        $data = [
            'produits'  => $produits,
            'fournisseurs'   => $fournisseurs,
            'navires' => $navires,
            'origines' => $origines,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'values' => $values

        ];

        return view('analyses.edit_mp',compact('mprapport'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mprapport  $mprapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mprapport $mprapport)
    {
        $request->validate([
            'num' => 'required',
            'num_bon' => 'required',
            'produit_id' => 'required',
            'fournisseur_id' => 'required',
            'origine_id' => 'nullable',
            'navire_id' => 'nullable',
            'conformite' => 'required',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_reception' => 'nullable',
            'commentaire' => 'nullable',
            'PS' => 'nullable'
    
        ]);
        $mprapport->update($request->all());

        if ($files = $request->file('path')) {
            $destinationPath = 'public/pj/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $insert['title'] = "$profilefile";
            Mprapport::where('num', $request->num)->update([ 'path' => $insert['title']]);

         }
          
         
        $id = Mprapport::where('num', $request->num)->first()->id;
      
        foreach($request->input('nutriment_id', []) as $r){

   
            
            $value_surbrute = $request->input("valeur_surbrute_".$r);
            $value_surseche  = $request->input("valeur_surseche_".$r);
            $nutriment_id = $r;

            $data = [
            'mprapport_id'=>$id,
            'nutriment_id'=> $nutriment_id,
            'value_surbrute' => $value_surbrute,
            'value_surseche'=> $value_surseche] ;
            DB::table('values')->where('id', $request->input("value_id_".$r))->update($data);

           }
            return redirect()->route('mprapports.index')->with('success','Rapport Matiere premiere modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mprapport  $mprapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mprapport $mprapport)
    {
        $file= "public/pj/$mprapport->path";
  
        File::delete($file);
        if (file_exists($mprapport->path)) {

            unlink(public_path() .  'public/js/' . $mprapport->path );

        }
        $mprapport->delete();
        
  
        return redirect()->route('mprapports.index')
                        ->with('success','Rapport Matiere Premiere supprimé avec success');
    }
    public function export() 
    {
        return Excel::download(new MatieresPremieresExport, 'matierespremires.xlsx');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

    	$file = $request->file('file');
        Excel::import(new MatierePremiereImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }

    public function generatePDF(Request $request)
    {
   
        $mprapports=Mprapport::all();
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(1);
        $values = Value::all();
        $clients=Client::all();

        $data = [
        'mprapports' => $mprapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date

        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_MP', $data);
        $pdf->setPaper('A4', 'landscape');

        return  $pdf->download('rapport_mp.pdf'); 
    }
    public function generatePDF_mycotoxine(Request $request)
    {
        $mprapports=Mprapport::all();
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(1);
        $values = Value::all();
        $clients=Client::all();

        $data = [
        'mprapports' => $mprapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date
         ];
        $pdf = PDF::loadView('PDFtemplate.PDF_MP_Mycotoxine', $data);
        $pdf->setPaper('A4', 'landscape');

        return  $pdf->download('rapport_mp.pdf'); 
    }
   
}