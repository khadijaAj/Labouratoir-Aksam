<?php

namespace App\Http\Controllers;

use App\Crapport;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Standardtype;
use App\Nutriment;
use App\Value;
use DB;
use PDF;
use App\Imports\RapportClientImport; 

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\RapportsclientsExport;

class CrapportController extends Controller
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
        $Crapports = Crapport::all();
        return view('analyses.rapportanalyse',compact('Crapports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits=Produit::all();
        $commerciaux=Commercial::all();
        $clients=Client::all();
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(3);
        $data = [
            'produits'  => $produits,
            'commerciaux'   => $commerciaux,
            'clients' => $clients,
            'standards'  => $standards,
            'nutriments'  => $nutriments,

        ];
        return view('analyses.add_ra')->with($data);
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
            'client_id' => 'required',
            'commercial_id' => 'required',
            'produit_id' => 'required',
            'Cout' => 'required',
            'date_reception' => 'nullable',
            'date_analyse' => 'nullable',
            'commentaire' => 'nullable',
        ]);
      
       
        
        Crapport::create([
            'num' => $request->num,
            'client_id' => $request->client_id,
            'commercial_id' => $request->commercial_id,
            'produit_id' => $request->produit_id,
            'Cout' => $request->Cout,
            'date_analyse' => $request->date_analyse,
            'date_reception' => $request->date_reception,
            'commentaire' => $request->commentaire
        ]);
        $id = Crapport::where('num', $request->num)->first()->id;
        
       foreach($request->input('nutriment_id', []) as $r){
       
        $value = new Value();    
        $value->value_surbrute = $request->input("valeur_surbrute_".$r);
        $value->crapport_id = $id;
        $value->value_surseche  = $request->input("valeur_surseche_".$r);
        $value->nutriment_id = $r;
        $value->save(); 
       }
        
       
           

        return redirect()->route('crapports.index')
                        ->with('success','Rapport Client ajouté avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crapport  $crapport
     * @return \Illuminate\Http\Response
     */
    public function show(Crapport $crapport)
    {
        $standards=Standardtype::find(3);
        $values = Value::all();

        return view('analyses.show_ra',compact('crapport','standards','values'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crapport  $crapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Crapport $crapport)
    {
        $standards=Standardtype::find(3);
        $produits=Produit::all();
        $commerciaux=Commercial::all();
        $clients=Client::all();
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(3);
        $values = Value::all();

        $data = [
            'produits'  => $produits,
            'commerciaux'   => $commerciaux,
            'clients' => $clients,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'values' => $values

        ];

        return view('analyses.edit_ra',compact('crapport'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crapport  $crapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crapport $crapport)
    {
        $request->validate([
            'num' => 'required',
            'client_id' => 'required',
            'commercial_id' => 'required',
            'produit_id' => 'required',
            'Cout' => 'required',
            'date_reception' => 'nullable',
            'date_analyse' => 'nullable',
            'commentaire' => 'nullable'
            
          
        ]);
  
        $crapport->update($request->all());

        $id = Crapport::where('num', $request->num)->first()->id;

        foreach($request->input('nutriment_id', []) as $r){
            $value_surbrute = $request->input("valeur_surbrute_".$r);
            $value_surseche  = $request->input("valeur_surseche_".$r);
            $nutriment_id = $r;

            $data = [
            'crapport_id'=>$id,
            'nutriment_id'=> $nutriment_id,
            'value_surbrute' => $value_surbrute,
            'value_surseche'=> $value_surseche] ;
           
            DB::table('values')->where('id', $request->input("value_id_".$r))->update($data);

           }
         
            return redirect()->route('crapports.index')->with('success','Rapport client modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crapport  $crapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crapport $crapport)
    {
        $crapport->delete();
  
        return redirect()->route('crapports.index')
                        ->with('success','Rapport client supprimé avec success');
    }
    public function export() 
    {
        return Excel::download(new RapportsclientsExport, 'Rapportsclients.xlsx');
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

    	$file = $request->file('file');
        Excel::import(new RapportClientImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function generatePDF(Request $request)
    {
   
        $id = $request->input('id');
        
        $rapport=Crapport::find($id);
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(3);
        $values = Value::all();
        $clients=Client::all();

        $data = [
        'rapport' => $rapport,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.Rapport_Client', $data);
        return  $pdf->download('rapport_client.pdf'); 
    }
}