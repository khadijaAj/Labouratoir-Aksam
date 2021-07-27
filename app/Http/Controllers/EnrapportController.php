<?php

namespace App\Http\Controllers;

use App\Enrapport;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Xml;
use App\Standardtype;
use Illuminate\Support\Facades\Schema;


class EnrapportController extends Controller
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
        
        $Enrapports = Enrapport::all();
        

        $data = [
            'Enrapports'  => $Enrapports,
            


        ];

        return view('analyses.rapportensilage')->with($data);
    }

    

     /**
     * Show the form for creating multiple resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_multiple()
    {
        
    
       
        return view('analyses.add_en_m');
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_multiple(Request $request)
    {
        $input = request()->all();
        $lines = $request['line'];
    
        foreach ($lines as $line => $key) {
            
            if(!$request->input($key.'_num') == NULL) {
                $Mprapport = new Mprapport;
                $Mprapport->num = $request->input($key.'_num');
               
                $Mprapport->date_reception = $request->input($key.'_date_reception');
                $Mprapport->Num_bon = $request->input($key.'_nbon');
                $Mprapport->produit_id = $request->input($key.'_produit_id');
                $Mprapport->fournisseur_id = $request->input($key.'_fournisseur_id');
                $Mprapport->origine_id = $request->input($key.'_origine_id');
                $Mprapport->navire_id = $request->input($key.'_navire_id');
                $Mprapport->conformite = $request->input($key.'_conformite');
                $Mprapport->commentaire = $request->input($key.'_commentaire');
                $Mprapport->certificat = $request->input($key.'_certificat');
                $Mprapport->save();
                $id = Mprapport::where('num', $request->input($key.'_num'))->first()->id;
                foreach($request->input($key.'_nutriment_id', [])  as $r ){
                  
                
                if(!$request->input($key.'_valeur_surbrute_'.$r) == NULL) {
                    $value = new Value();    
                    $value->value_surbrute = $request->input($key.'_valeur_surbrute_'.$r);
                    $value->mprapport_id = $id;
                    $value->nutriment_id = $r;
                    $value->save();   
                }
                }
            }
          
            
 
        
    
            }
        
        return redirect()->route('mprapports.index')
                        ->with('success','Rapport Matiere Premiere ajoutée avec success.');

    }




    public function import(Request $request) 
    {   

        $date_reception = '';
    	$file = $request->file('file');
        $xml = XmlParser::load($file);
        $data = $xml->parse([
            'Lab_Name' => ['uses' => 'Lab_Name::Value'],
            'Sample_No' =>['uses' => 'Sample_Data.Sample_No::Value'],
            'Name' => ['uses' => 'Sample_Data.Name::Value'],
            'Farm_ID' => ['uses' => 'Sample_Data.Farm_ID::Value'],
            'Lot_name' => ['uses' => 'Sample_Data.Lot_name::Value'],
            'Date_Printed' => ['uses' => 'Sample_Data.Date_Printed::Value'],
            'Type' => ['uses' => 'Sample_Data.Type::Value'],
            'Desc_1' => ['uses' => 'Sample_Data.Desc_1::Value'],
            'Desc_2' => ['uses' => 'Sample_Data.Desc_2::Value'],
            'Desc_3' => ['uses' => 'Sample_Data.Desc_3::Value'],
            'Product_code' => ['uses' => 'Sample_Data.Product_code::Value'],
            'Reference_No' => ['uses' => 'Sample_Data.Reference_No::Value'],
            'DM' => ['uses' => 'Sample_Data.DM::Value'],
            'Moisture' => ['uses' => 'Sample_Data.Moisture::Value'],
            'CP' => ['uses' => 'Sample_Data.CP::Value'],
            'SP_CP' => ['uses' => 'Sample_Data.SP_CP::Value'],
            'SP' => ['uses' => 'Sample_Data.SP::Value'],
            'ADICP' => ['uses' => 'Sample_Data.ADICP::Value'],
            'ADICP_CP' => ['uses' => 'Sample_Data.ADICP_CP::Value'],
            'NDICPns' => ['uses' => 'Sample_Data.NDICPns::Value'],
            'NDICPns_CP' => ['uses' => 'Sample_Data.NDICPns_CP::Value'],
            'NDICP' => ['uses' => 'Sample_Data.NDICP::Value'],
            'NDICP_CP' => ['uses' => 'Sample_Data.NDICP_CP::Value'],
            'NH3CPE' => ['uses' => 'Sample_Data.NH3CPE::Value'],
            'NFC' => ['uses' => 'Sample_Data.NFC::Value'],
            'Acetic' => ['uses' => 'Sample_Data.Acetic::Value'],
            'Propionic' => ['uses' => 'Sample_Data.Propionic::Value'],
            'Lactic' => ['uses' => 'Sample_Data.Lactic::Value'],
            'Total_acid' => ['uses' => 'Sample_Data.Total_acid::Value'],
            'Sugar_ESC' => ['uses' => 'Sample_Data.Sugar_ESC::Value'],
            'Sugar_WSC' => ['uses' => 'Sample_Data.Sugar_WSC::Value'],
            'Starch' => ['uses' => 'Sample_Data.Starch::Value'],
            'rSTRD_IV_7hr_4mm' => ['uses' => 'Sample_Data.rSTRD_IV_7hr_4mm::Value'],
            'Starchkd' => ['uses' => 'Sample_Data.Starchkd::Value'],
            'ADF' => ['uses' => 'Sample_Data.ADF::Value'],
            'NDF' => ['uses' => 'Sample_Data.NDF::Value'],
            'aNDFom' => ['uses' => 'Sample_Data.aNDFom::Value'],
            'NDFDom_IV_30hr' => ['uses' => 'Sample_Data.NDFDom_IV_30hr::Value'],
            'Lignin' => ['uses' => 'Sample_Data.Lignin::Value'],
            'Lignin_NDF' => ['uses' => 'Sample_Data.Lignin_NDF::Value'],
            'Fat_EE' => ['uses' => 'Sample_Data.Fat_EE::Value'],
            'TFA' => ['uses' => 'Sample_Data.TFA::Value'],
            'Ash' => ['uses' => 'Sample_Data.Ash::Value'],
            'Ca' => ['uses' => 'Sample_Data.Ca::Value'],
            'P' => ['uses' => 'Sample_Data.P::Value'],
            'Mg' => ['uses' => 'Sample_Data.Mg::Value'],
            'K' => ['uses' => 'Sample_Data.K::Value'],
            'S' => ['uses' => 'Sample_Data.S::Value'],
            'uNDFom_IV_12hr' => ['uses' => 'Sample_Data.uNDFom_IV_12hr::Value'],
            'uNDFom_IV_30hr' => ['uses' => 'Sample_Data.uNDFom_IV_30hr::Value'],
            'uNDFom_IV_120hr' => ['uses' => 'Sample_Data.uNDFom_IV_120hr::Value'],
            'uNDFom_IV_240hr' => ['uses' => 'Sample_Data.uNDFom_IV_240hr::Value'],
            'NDFDom_IV_12hr' => ['uses' => 'Sample_Data.NDFDom_IV_12hr::Value'],
            'NDFDom_IV_120hr' => ['uses' => 'Sample_Data.NDFDom_IV_120hr::Value'],
            'NDFDom_IV_240hr' => ['uses' => 'Sample_Data.NDFDom_IV_240hr::Value'],
            'NELMcallb' => ['uses' => 'Sample_Data.NELMcallb::Value'],
            'NELMcalkg' => ['uses' => 'Sample_Data.NELMcalkg::Value'],
            'NELMJkg' => ['uses' => 'Sample_Data.NELMJkg::Value'],
            'NEMMcallb' => ['uses' => 'Sample_Data.NEMMcallb::Value'],
            'NEMMcalkg' => ['uses' => 'Sample_Data.NEMMcalkg::Value'],
            'NEMMJkg' => ['uses' => 'Sample_Data.NEMMJkg::Value'],
            'NEGMcallb' => ['uses' => 'Sample_Data.NEGMcallb::Value'],
            'NEGMcalkg' => ['uses' => 'Sample_Data.NEGMcalkg::Value'],
            'NEGMJkg' => ['uses' => 'Sample_Data.NEGMJkg::Value'],
            'TDN' => ['uses' => 'Sample_Data.TDN::Value'],
            'MilktonCSn' => ['uses' => 'Sample_Data.MilktonCSn::Value'],
            'MilktonCSp' => ['uses' => 'Sample_Data.MilktonCSp::Value'],
            'NEL_CSnMcallb' => ['uses' => 'Sample_Data.NEL_CSnMcallb::Value'],
            'NEL_CSpMcallb' => ['uses' => 'Sample_Data.NEL_CSpMcallb::Value'],
            'NEL_CSnMcalkg' => ['uses' => 'Sample_Data.NEL_CSnMcalkg::Value'],
            'NEL_CSpMcalkg' => ['uses' => 'Sample_Data.NEL_CSpMcalkg::Value'],
            'NEL_CSnMJkg' => ['uses' => 'Sample_Data.NEL_CSnMJkg::Value'],
            'NEL_CSpMJkg' => ['uses' => 'Sample_Data.NEL_CSpMJkg::Value'],
            'C160' => ['uses' => 'Sample_Data.C160::Value'],
            'C180' => ['uses' => 'Sample_Data.C180::Value'],
            'C181' => ['uses' => 'Sample_Data.C181::Value'],
            'C182' => ['uses' => 'Sample_Data.C182::Value'],
            'C183' => ['uses' => 'Sample_Data.C183::Value'],
            'C160_TFA' => ['uses' => 'Sample_Data.C160_TFA::Value'],
            'C180_TFA' => ['uses' => 'Sample_Data.C180_TFA::Value'],
            'C181_TFA' => ['uses' => 'Sample_Data.C181_TFA::Value'],
            'C182_TFA' => ['uses' => 'Sample_Data.C182_TFA::Value'],
            'C183_TFA' => ['uses' => 'Sample_Data.C183_TFA::Value'],
            'pH' => ['uses' => 'Sample_Data.pH::Value']


        ]);
        
        $xml= Xml::create($data);
        
        try{
            $client_id = Client::where('name','LIKE', $data['Farm_ID'])->orWhere('Reference',$data['Desc_2'])->first()->id;
            $produit_id = Produit::where('name','LIKE',$data['Desc_1'])->first()->id;
    
        }catch (Throwable $e) {
            report($e);
    
            return false;
        }
       
        

        $rapport = Enrapport::create([
            'Identifiant' => $data['Reference_No'] ,
            'Num_ech' => '' ,
            'produit_id' => $produit_id,
            'client_id' => $client_id,
            'date_impression' => $data['Date_Printed'],
            'date_reception' => NULL,
            'type'=> $data['Type']
        ]);
        $xml->update(['enrapport_id'=>$rapport->id]);

        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrapport  $enrapport
     * @return \Illuminate\Http\Response
     */
    public function show(Enrapport $enrapport)
    {
        
        $xml_data = Xml::find($enrapport->id);
       
        
        return view('analyses.show_en',compact('enrapport','xml_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enrapport  $enrapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrapport $enrapport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enrapport  $enrapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrapport $enrapport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enrapport  $enrapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrapport $enrapport)
    {
        $enrapport->delete();
        
  
        return redirect()->route('enrapports.index')
                        ->with('success','Rapport Ensilage supprimé avec success');
    
    }
}
