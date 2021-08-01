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
        $produits=Produit::all();
        $pfrapports = Pfrapport::orderBy('created_at','DESC')->paginate(30);

        $data = [
            'pfrapports'  => $pfrapports,
            'produits'  => $produits
        ];    
        return view('analyses.produitfini')->with($data);
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
     * Show the form for creating multiple resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_multiple()
    {
        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(2); // Id 2 is created for Final Product Model
      
        $data = [
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,

        ];
       
        return view('analyses.add_pf_m')->with($data);
    
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
                $Pfrapport = new Pfrapport;
                $Pfrapport->num = $request->input($key.'_num');
               
                $Pfrapport->date_fabrication = $request->input($key.'_date_fabrication');
                $Pfrapport->Identification = $request->input($key.'_identification');
                $id_produit = Produit::where('name','=',$request->input($key.'_produit_id'))->first()->id;

                $Pfrapport->produit_id =$id_produit ;
                $Pfrapport->conformite = $request->input($key.'_conformite');
                $Pfrapport->Commentaire = $request->input($key.'_commentaire');
                $Pfrapport->MSR = $request->input($key.'_MSR');
                $Pfrapport->ACE = $request->input($key.'_ACE');
                $Pfrapport->save();
                $id = Pfrapport::where('num', $request->input($key.'_num'))->first()->id;
                foreach($request->input($key.'_nutriment_id', [])  as $r ){
                  
                
                if(!$request->input($key.'_valeur_surbrute_'.$r) == NULL) {
                    $value = new Value();    
                    $value->value_surbrute = $request->input($key.'_valeur_surbrute_'.$r);
                    $value->pfrapport_id = $id;
                    $value->nutriment_id = $r;
                    $value->save();   
                }
                }
            }
          
            
 
        
    
            }
        
        return redirect()->route('pfrapports.index')
                        ->with('success','Rapport Produit fini ajouté avec success.');

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
        $pfrapports=Pfrapport::findMany($ids_array);
        $produits=Produit::all();
        $nutriments=Nutriment::all();
    
        $standards=Standardtype::find(2); // Id1 is created for Raw Material Model
      
        

        $data = [
            'pfrapports' => $pfrapports ,
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            
          

        ];

        return view('analyses.edit_pf_m')->with($data);
            
            
 
        
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_multiple(Request $request)
    {
        $input = request()->all();
        $lines = $request['line'];
        foreach ($lines as $line => $key) {
            $id=$request->input($key.'_id');
           
            $Pfrapport = Pfrapport::find($id);
                $Pfrapport->num = $request->input($key.'_num');
               
                $Pfrapport->date_fabrication = $request->input($key.'_date_fabrication');
                $Pfrapport->Identification = $request->input($key.'_identification');
                $id_produit = Produit::where('name','=',$request->input($key.'_produit_id'))->first()->id;

                $Pfrapport->produit_id =$id_produit ;                $Pfrapport->conformite = $request->input($key.'_conformite');
                $Pfrapport->Commentaire = $request->input($key.'_commentaire');
                $Pfrapport->MSR = $request->input($key.'_MSR');
                $Pfrapport->ACE = $request->input($key.'_ACE');
                $Pfrapport->update();
                foreach($request->input($key.'_nutriment_id', [])  as $r ){
                    
                    if(!$request->input($key.'_valeur_surbrute_'.$r) == NULL) {
                        $value = Value::where('pfrapport_id', $id)->where('nutriment_id', $r)->first();

                        if ($value !== null) {
                            $value->update(['value_surbrute' => $request->input($key.'_valeur_surbrute_'.$r)]);
                        }
                         else {
                            $value = Value::create([
                                'pfrapport_id'=>$id,
                                'nutriment_id'=> $r,
                                'value_surbrute' => $request->input($key.'_valeur_surbrute_'.$r)]);
                           
                        }
                        
                    }
                    if($request->input($key.'_valeur_surbrute_'.$r) == 0){
                        Value::where('pfrapport_id', $id)->where('nutriment_id', $r)->delete();
                    }

                    
            }
            }
          
            
 
        
    
            
        
        return redirect()->route('pfrapports.index')
                        ->with('success','Rapport Produit fini ajouté avec success.');

    }

    

    public function PDF(Request $request,$id)
    {  
   
        $id = $request->id;
        $rapport=Pfrapport::find($id);
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $produits=Produit::all();
        $standards=Standardtype::find(2);
        $values = Value::all();

        $data = [
        'rapport' => $rapport,
        'standards'=>$standards,
        'produits'=>$produits,
        'nutriments'=>$nutriments,  
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_PF_UNIQUE', $data);
        return  $pdf->download('rapport_Pf.pdf'); 
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
            'identification' => 'nullable',
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
        $value->nutriment_id = $r;
        if(!$request->input("valeur_surbrute_".$r) == NULL) {
            $value->save();   
        }
       
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
            'identification' => 'nullable',
            'conformite' => 'nullable',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_fabrication' => 'nullable',
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
            $nutriment_id = $r;

        
          $value = Value::where('pfrapport_id', $id)->where('nutriment_id', $nutriment_id)->first();
            
          if(!$request->input("valeur_surbrute_".$r) == NULL) {

            if ($value !== null) {
                $value->update(['value_surbrute' => $value_surbrute]);
            } else {
                $value = Value::create([
                    'pfrapport_id'=>$id,
                    'nutriment_id'=> $nutriment_id,
                    'value_surbrute' => $value_surbrute
                ]);
            }
           
          }if($request->input("valeur_surbrute_".$r) == 0)
            Value::where('pfrapport_id', $id)->where('nutriment_id', $nutriment_id)->delete();

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
    public function export(Request $request) 
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
        }else{
            $ids_array = array();
        }
        return Excel::download(new ProduitsfinisExport($ids_array), 'produitsfinis.xlsx');
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
        
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $pfrapports=Pfrapport::findMany($ids_array);
        }else{
            $pfrapports=Pfrapport::all();
        }
       

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
   
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $pfrapports=Pfrapport::findMany($ids_array);
        }else{
            $pfrapports=Pfrapport::all();
        }
       
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

  
    public function search(Request $request){

        if($request->input('search_param')=="produit"){
            $date_start = $request->date_start_p;
            $date_end = $request->date_end_p;
            $id_produit = Produit::where('name','=',$request->input('produit_name'))->first()->id;

            if($date_start!=NULL && $date_end!=NULL){
                $pfrapports = Pfrapport::where('produit_id', '=',$id_produit)->orderBy('date_fabrication','ASC')->whereBetween('date_fabrication', [$date_start, $date_end])->get();
    
            }else{
                $pfrapports = Pfrapport::where('produit_id', '=',$id_produit)->orderBy('date_fabrication','ASC')->get();

            }
          

        }
       
        if($request->input('search_param')=="date_fabrication"){
            $pfrapports = Pfrapport::where('date_fabrication', '=',$request->search)->get();


        }
        if($request->input('search_param')=="identification"){
            $pfrapports = Pfrapport::where('identification', '=',$request->search)->get();


        }
        
        
        $produits=Produit::all();
        
        $data = [
            'pfrapports'  => $pfrapports,
            'produits' => $produits,
          

        ];

        return view('analyses.search_produitfini')->with($data);


    }   
 
}