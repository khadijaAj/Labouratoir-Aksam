<?php

namespace App\Http\Controllers;


use App\Vrapport;
use Illuminate\Http\Request;
use App\Client;
use App\Commercial;
use App\Ovin;
use App\Bovin;
use App\Vachelaitiere;
use App\Standardsbovin;
use App\Standardsovin;
use App\StandardsVl;
use App\Elevages;
use App\Exports\VrapportExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\VrapportImport; 

class VrapportController extends Controller
{
    //
     //
    

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
            $clients  = Client::all();
            $elevages =Elevages::all();
            $standardsvl=StandardsVl::all();
            $standardsbv= Standardsbovin::all();
            $standardsov= Standardsovin::all();
            $vrapports=Vrapport::paginate(30);
     
             $data = [
                'clients'   => $clients,
                'standardsbv'=>$standardsbv,
                'standardsov'=>$standardsov,
                'standardsvl'=>$standardsvl,
                 'vrapports'=>$vrapports
        
             ];    
             return view('crm.vrapports')->with($data);
        
    }
      
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients  = Client::all();
        $standardsvl=StandardsVl::all();
        $standardsbv= Standardsbovin::all();
        $standardsov= Standardsovin::all();
        $vrapports=Vrapport::all();
        $elevages =Elevages::all();

        $data = [
            'clients'   => $clients,
            'elevages' => $elevages ,
            'standardsbv'=>$standardsbv,
            'standardsov'=>$standardsov,
            'standardsvl'=>$standardsvl,
             'vrapports'=>$vrapports
    
         ];    
       
        return view('crm.add_vrapport')->with($data);

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
            'num'=>'nullable',
            'date_debut'=> 'nullable', 
            'date_fin'=> 'nullable',
            'observation'=> 'nullable',
            'typevisite'=> 'nullable',
            'client_id'=> 'nullable',

        ]);
  
        
        $vrapports =new Vrapport();
        $vrapports->num= $request->num;
        $vrapports->date_debut= $request->date_debut;
        $vrapports->date_fin= $request->date_fin;
        $vrapports->observation= $request->observation;
        $vrapports->typevisite= $request->typevisite;
        $vrapports->client_id= $request->client_id;
        $vrapports->save();

     

        if($vrapports->typevisite=="VL"){
     
            foreach($request->standardsvl_id as $key => $vl){

                $elevages = new ELevages();
                $elevages->standardsvl_id = $vl;  
                $elevages->vrapport_id=$vrapports->id; 
                $elevages->value_cr= $request->value_cr[$key];
                if(!$request->value_cr[$key] == NULL) {
                    $elevages->save();   
                }
            }
            
    }else if($vrapports->typevisite=="OV"){

        foreach($request->standardsov_id as $key => $ov){

            $elevages = new ELevages();
            $elevages->standardsov_id = $ov;  
            $elevages->vrapport_id=$vrapports->id; 
            $elevages->value_cr= $request->value_cr[$key];
            if(!$request->value_cr[$key] == NULL) {
                $elevages->save();   
            }
        }     
        }else
        {           
                    foreach($request->standardsbv_id as $key => $bv){
       
                        $elevages = new ELevages(); 
                        $elevages->standardsbv_id = $bv;   
                        $elevages->value_cr=  $request->value_cr[$key];
                        $elevages->vrapport_id=$vrapports->id;

                        if(!$request->value_cr[$key] == NULL ) {
                            $elevages->save();   
                        
                        }
                    }

                
                }

           
                return redirect()->route('vrapports.index')
                ->with('success','Rapport ajouté avec success.');
           
       
        
       
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Vrapport  $vrapport
     * @return \Illuminate\Http\Response
     */
    public function show(Vrapport  $vrapport)
      
    {
        $clients  = Client::all();
        $standardsvl=StandardsVl::all();
        $standardsbv= Standardsbovin::all();
        $standardsov= Standardsovin::all();
      
        $elevages =Elevages::all();

        $data = [
            'clients'   => $clients,
            'elevages' => $elevages ,
            'standardsbv'=>$standardsbv,
            'standardsov'=>$standardsov,
            'standardsvl'=>$standardsvl,
    
         ];    
        return view('crm.show_vrapport',compact('vrapport'))->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vrapport  $vrapport
     * @return \Illuminate\Http\Response
     */
    
   public function edit(Vrapport  $vrapport)
   {
      
    $clients  = Client::all();
    $standardsvl=StandardsVl::all();
    $standardsbv= Standardsbovin::all();
    $standardsov= Standardsovin::all();
    $elevages =Elevages::all();

    $data = [
        'clients'   => $clients,
        'elevages' => $elevages ,
        'standardsbv'=>$standardsbv,
        'standardsov'=>$standardsov,
        'standardsvl'=>$standardsvl,

     ];  

       return view('crm.edit_vrapport',compact('vrapport'))->with($data);


   }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vrapport $vrapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Vrapport $vrapport)
    {
        $request->validate([
            'num'=>'nullable',
            'date_debut'=> 'nullable', 
            'date_fin'=> 'nullable',
            'observation'=> 'nullable',
            'typevisite'=> 'nullable',
            'client_id'=> 'nullable',

        ]);
  
        
        $vrapports =new Vrapport();
        $vrapports->num= $request->num;
        $vrapports->date_debut= $request->date_debut;
        $vrapports->date_fin= $request->date_fin;
        $vrapports->observation= $request->observation;
        $vrapports->typevisite= $request->typevisite;
        $vrapports->client_id= $request->client_id;
        $vrapports->update();

     

        if($vrapports->typevisite=="VL"){
     
            foreach($request->standardsvl_id as $key => $vl){

                $elevages = new ELevages();
                $elevages->standardsvl_id = $vl;  
                $elevages->vrapport_id=$vrapports->id; 
                $elevages->value_cr= $request->value_cr[$key];
                if(!$request->value_cr[$key] == NULL) {
                    $elevages->update();   
                }
            }
            
    }else if($vrapports->typevisite=="OV"){

        foreach($request->standardsov_id as $key => $ov){

            $elevages = new ELevages();
            $elevages->standardsov_id = $ov;  
            $elevages->vrapport_id=$vrapports->id; 
            $elevages->value_cr= $request->value_cr[$key];
            if(!$request->value_cr[$key] == NULL) {
                $elevages->update();   
            }
        }     
        }else
        {           
                    foreach($request->standardsbv_id as $key => $bv){
       
                        $elevages = new ELevages(); 
                        $elevages->standardsbv_id = $bv;   
                        $elevages->value_cr=  $request->value_cr[$key];
                        $elevages->vrapport_id=$vrapports->id;

                        if(!$request->value_cr[$key] == NULL ) {
                            $elevages->update();   
                        
                        }
                    }

                
                }
  
        return redirect()->route('vrapports.index')
                        ->with('success','vrapport modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vrapport $vrapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vrapport $vrapport)
    {
        $vrapport->delete();
  
        return redirect()->route('vrapports.index')
                        ->with('success','les données sont supprimés avec success');
    }

    
   
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new VrapportImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }


   
    public function search(Request $request){

        $id_client = Client::where('name','=',$request->input('client_name'))->first()->id;
        $vrapports= Vrapport::where('client_id', '=',$id_client)->get();
        
        $clients=Client::all();
        
        $data = [
           
            'clients' => $clients,
          

        ];

        return view('crm.search_vrapports', compact('vrapports'))->with($data);
    } 
  
    public function generatePDF(Request $request)
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $vrapports=Vrapport::findMany($ids_array);
        }else{
            $vrapports=Vrapport::all();
        }
   
        
        $date = date('Y-m-d');
        $standardsbv=Standardsbovin::all();
        $standardsov=Standardsovin::all();
        $standardsvl=StandardsVl::all();
        $elevages=Elevages::all();
        $clients=Client::all();
        $commercial=Commercial::all();

        $data = [
        'vrapports'=>$vrapports,
        'standardsbv' => $standardsbv,
        'standardsov' => $standardsov,
        'standardsvl' => $standardsvl,
        'elevages'=>$elevages,
        'clients'=>$clients, 
        'commercial'=>$commercial,
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_VR', $data);
        return  $pdf->download('visitesrapports.pdf'); ; 
    }

}
