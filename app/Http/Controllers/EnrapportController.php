<?php

namespace App\Http\Controllers;

use App\Enrapport;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Produit;
use App\Client;
use App\Commercial;
use App\Nutriment;
use App\Mesure;
use App\Equation;
use App\Equation1;
use DB;
use App\Mprapport;
use PDF;
use App\Value;
use App\Xml;
use App\Standardtype;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RapportsensilageExport;

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
        
        $Enrapports = Enrapport::orderBy('created_at','DESC')->paginate(30);
        

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
   

    
        
        
       
        
    public function import(Request $request) 
    {        
        function ReplaceTxtwithValue($text,$array){
            $texts = strtoupper($text);
            echo "$texts";

            foreach($array as $key => $val){
                $texts = str_replace(strtoupper($key),$val,$texts);
            }
            echo "</br>";
            echo "$texts";


            $results =   evalmath($texts);

            return $results;
            }
            function evalmath($equation)
            {
                $result = 0;
                // sanitize imput
                $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/","",$equation);
                // convert alphabet to $variabel 
                $equation = preg_replace("/([a-z])+/i", "\$$0", $equation); 
                // convert percentages to decimal
                 $equation = preg_replace("/([+-])([0-9]{1})(%)/","*(1\$1.0\$2)",$equation);
                $equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation);
                $equation = preg_replace("/([0-9]{1})(%)/",".0\$1",$equation);
                $equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation);
                if ( $equation != "" ){
                    $result = @eval("return " . $equation . ";" );
                }
                if ($result == null) {
                    throw new Exception("Unable to calculate equation");
                }
                return $result;
               // return $equation;
            }
        $date_reception = '';
        foreach($request->file('filenames') as $file)
        {
 
    
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
            'pH' => ['uses' => 'Sample_Data.pH::Value'],
            'Ca' => ['uses' => 'Sample_Data.Ca::Value'],
            'P' => ['uses' => 'Sample_Data.P::Value'],
            'Mg' => ['uses' => 'Sample_Data.Mg::Value'],
            'K' => ['uses' => 'Sample_Data.K::Value'],
            'S' => ['uses' => 'Sample_Data.S::Value']


        ]);
        $xml= Xml::create($data);
        
        try{
            if(Client::where('name','LIKE', strtolower($data['Farm_ID']))->orWhere('Reference',$data['Desc_2'])){
                $client_id = Client::where('name','LIKE', $data['Farm_ID'])->orWhere('Reference',$data['Desc_2'])->first()->id;

            }else{
                $client_id = NULL; // CLIENT DOESNT EXIST IN DB

            }
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
  
        $equations= Equation::orderBy('id','ASC')->get();

        $xml_cal= $data;
        $xml_cal1= $data;
        
      
    foreach($equations as $equation){
            $nom = $equation->nom;
            uksort($xml_cal,function($a,$b){
                return strlen($b) - strlen($a);
            });
            $result = ReplaceTxtwithValue($equation->equation,$xml_cal);
            echo "<br>";
            echo "<br>";

            echo "$nom => $result";
            echo "<br>";
            $xml_cal[strtoupper($nom)] = "$result";
            //echo "<pre>".print_r($xml_cal)."</pre>";
        } 
        
        $corn_sil_values = $xml_cal;

        $equations1= Equation1::orderBy('id','ASC')->get();
        foreach($equations1 as $equation){
            echo'rapport2';
            $nom = $equation->nom;
            uksort($xml_cal1,function($a,$b){
                return strlen($b) - strlen($a);
            });
            $result = ReplaceTxtwithValue($equation->equation,$xml_cal1);
          
            $xml_cal1[strtoupper($nom)] = "$result";

        }
        $small_sil_values = $xml_cal1;


        $nutriments=Nutriment::all();
        $standards=Standardtype::find(4);

        $mesure = Mesure::all();
        foreach($standards->nutriments as $nutriment){
           
            // this for calculating Values with Method="Infra rouge"
            if(DB::table('mesures')->where('standardtype_id','=',4)->where('nutriment_id','=',$nutriment->id)->value('methode')=='Infra Rouge' && DB::table('mesures')->where('standardtype_id','=',4)->where('nutriment_id','=',$nutriment->id)->value('xml_equivalent') !=NULL){
            $xml_equivalent= DB::table('mesures')->where('standardtype_id','=',4)->where('nutriment_id','=',$nutriment->id)->value('xml_equivalent');
            $value = new Value(); 
            
            $value->value_surbrute = $data[$xml_equivalent];
            $value->enrapport_id = $rapport->id;
            $value->nutriment_id = $nutriment->id;
            $value->save();   
            }
            // this for calculating Values with Method="Valeur calculée"

            if(DB::table('mesures')->where('standardtype_id','=',4)->where('nutriment_id','=',$nutriment->id)->value('methode')=='Valeur calculée'){
              
                $value = new Value();    
                $value->value_surbrute = $corn_sil_values[strtoupper($nutriment->name)];
                $value->value_surseche =  $small_sil_values[strtoupper($nutriment->name)];
                $value->enrapport_id = $rapport->id;
                $value->nutriment_id = $nutriment->id;
                $value->save();
            }

    }
    
}
return redirect()->route('enrapports.index')
                        ->with('success','les rapports Ensilage crées avec success.');


    }


    public function generate_rations(Request $request) 
    {   
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $enrapports=Enrapport::findMany($ids_array);
        }else{
            $enrapports=Enrapport::all();
        }

        $date = date('Y-m-d');
        $nutriments=Nutriment::all();       

        $standards=Standardtype::find(4);

        $data = [
        'enrapports' => $enrapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date,


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_EN_RATIONS', $data);
        return  $pdf->download('rapport_en_rations.pdf'); 

    }
    public function generate_fourrages(Request $request) 
    {   
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $enrapports=Enrapport::findMany($ids_array);
        }else{
            $enrapports=Enrapport::all();
        }

        $date = date('Y-m-d');
        $nutriments=Nutriment::all();       

        $standards=Standardtype::find(4);

        $data = [
        'enrapports' => $enrapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date,


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_EN_FOURRAGE', $data);
        return  $pdf->download('rapport_en_fourrage.pdf'); 

    }

    public function generate_tritical(Request $request) 
    {   
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $enrapports=Enrapport::findMany($ids_array);
        }else{
            $enrapports=Enrapport::all();
        }

        $date = date('Y-m-d');
        $nutriments=Nutriment::all();       

        $standards=Standardtype::find(4);

        $data = [
        'enrapports' => $enrapports,
        'standards'=>$standards,
        'nutriments'=>$nutriments,  
        'date'=>$date,


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_EN_FOURRAGE', $data);
        return  $pdf->download('rapport_en_tritical.pdf'); 

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


    public function export(Request $request) 
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
        }else{
            $ids_array = array();
        }
        return Excel::download(new RapportsensilageExport($ids_array), 'Rapportsensilage.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_multiple(Request $request)
    {
        $ids_array = explode(",",$request->get('ids'));
        $enrapports=Enrapport::findMany($ids_array);
        $xml_keys=Xml::all()->first();
        $produits=Produit::all();
        $commerciaux=Commercial::all();
        $clients=Client::all();
        $standards=Standardtype::find(4); // Id1 is created for Raw Material Model
      
        $data = [
            'enrapports' => $enrapports,
            'produits'  => $produits,
            'commerciaux'  => $commerciaux,
            'clients'  => $clients,
            'xml_keys'=> $xml_keys

        ];
       
        return view('analyses.edit_en_m')->with($data);
    
    }

    public function update_multiple(Request $request)
    {
        
        $input = request()->all();
        $lines = $request['line'];
    
        foreach ($lines as $line => $key) {
                $id=$request->input($key.'_id');
                
                $Enrapport = Enrapport::find($id);               
                $Enrapport->date_reception = $request->input($key.'_date_reception');
                $id_produit = Produit::where('name','=',$request->input($key.'_produit_id'))->first()->id;
                $Enrapport->produit_id = $id_produit;
                if(!empty($request->input($key.'_commercial_id') )){
                    $id_commercial = Commercial::where('name','=',$request->input($key.'_commercial_id'))->first()->id;
                    $Enrapport->commercial_id= $id_commercial;

                }else{
                    $id_commercial= NULL;
                    $Enrapport->commercial_id = $id_commercial;

                }
                if(!empty($request->input($key.'_client_id') )){
                    $id_client = Client::where('name','=',$request->input($key.'_client_id'))->first()->id;
                    $Enrapport->client_id= $id_client;

                }else{
                    $id_client= NULL;
                    $Enrapport->client_id = $id_client;

                }
                $Enrapport->num_ech = $request->input($key.'_num_ech');
                $Enrapport->Identifiant = $request->input($key.'_identifiant');
                $Enrapport->Interpretation = $request->input($key.'_interpretation');
                $Enrapport->update();
                
            }
        
        return redirect()->route('enrapports.index')
                        ->with('success','les rapports Ensilage modifiés avec success.');

    
        
        

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
        $pdf = PDF::loadView('PDFtemplate.PDF_EN', $data);

        return  $pdf->download('rapport_mp.pdf'); 
    }
}