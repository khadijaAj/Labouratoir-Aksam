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
use App\Mesure;
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
        $Mprapports = Mprapport::orderBy('created_at','DESC')->paginate(30);
        $nutriments=Nutriment::all();
        $standards=Standardtype::find(1);
        $values = Value::all();
        $produits=Produit::all();
        $fournisseurs=Fournisseur::all();
        $origines=Origine::all();
        $navires=Navire::all();
        $data = [
            'Mprapports'  => $Mprapports,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'values'   => $values,
            'produits' => $produits,
            'fournisseurs'=>$fournisseurs,
            'origines'=>$origines,
            'navires'=>$navires

        ];

        return view('analyses.matierepremiere')->with($data);
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
            'fournisseur_id' => 'nullable',
            'origine_id' => 'nullable',
            'navire_id' => 'nullable',
            'conformite' => 'nullable',
            'certificat' => 'sometimes',
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

         $request->certificat = isset($request->certificat) ? 1 : 0;
 
        
        Mprapport::create([
            'num' => $request->num,
            'num_bon' => $request->num_bon,
            'produit_id' => $request->produit_id,
            'fournisseur_id' => $request->fournisseur_id,
            'origine_id' => $request->origine_id,
            'navire_id' => $request->navire_id,
            'date_reception' => $request->date_reception,
            'conformite' => $request->conformite,
            'certificat' => $request->certificat,
            'commentaire' => $request->commentaire,
            'path' => $insert['title']  ,
            'PS' => $request->PS

        ]);
        $id = Mprapport::where('num', $request->num)->first()->id;
        
       foreach($request->input('nutriment_id', []) as $r){
       
        $value = new Value();    
        $value->value_surbrute = $request->input("valeur_surbrute_".$r);
        $value->mprapport_id = $id;
        $value->nutriment_id = $r;
        if(!$request->input("valeur_surbrute_".$r) == NULL ) {
            $value->save();   
        }
       }
        
        return redirect()->route('mprapports.index')
                        ->with('success','Rapport Matiere Premiere ajouté avec success.');

    }

    
    public function PDF(Request $request,$id)
    {  
        $id = $request->id;
        $rapport=Mprapport::find($id);
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
        $produits=Produit::all();
        $origines=Origine::all();
        $fournisseurs=Fournisseur::all();
        $navires=Navire::all();
        $standards=Standardtype::find(1);
        $values = Value::all();

        $data = [
        'rapport' => $rapport,
        'standards'=>$standards,
        'produits'=>$produits,
        'origines'=>$origines, 
        'fournisseurs'=>$fournisseurs, 
        'navires'=>$navires,
        'nutriments'=>$nutriments,  
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_MP_UNIQUE', $data);
        return  $pdf->download('rapport_Mp.pdf'); 
    }



     /**
     * Show the form for creating multiple resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_multiple()
    {
        $nutriments=Nutriment::all();
        $produits=Produit::all();
        $fournisseurs=Fournisseur::all();
        $origines=Origine::all();
        $navires=Navire::all();
        $standards=Standardtype::find(1); // Id1 is created for Raw Material Model
      
        $data = [
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'fournisseurs'  => $fournisseurs,
            'origines'  => $origines,
            'navires'  => $navires
        ];
       
        return view('analyses.add_mp_m')->with($data);
    
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
                $id_produit = Produit::where('name','=',$request->input($key.'_produit_id'))->first()->id;
                if(!empty($request->input($key.'_fournisseur_id') )){
                    $id_fournisseur = Fournisseur::where('name','=', $request->input($key.'_fournisseur_id'))->first()->id;
                    $Mprapport->fournisseur_id = $id_fournisseur;

                }
                if(!empty($request->input($key.'_origine_id') )){
                    
                    $id_origine = Origine::where('name','=',$request->input($key.'_origine_id'))->first()->id;
                    $Mprapport->origine_id = $id_origine;

                }
                if(!empty($request->input($key.'_navire_id') )){
                    $id_navire = Navire::where('name','=',$request->input($key.'_navire_id'))->first()->id;
                    $Mprapport->navire_id = $id_navire;

                }
                $Mprapport->produit_id =$id_produit;
               
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_multiple(Request $request)
    {
        
        $ids_array = explode(",",$request->get('ids'));
        $mprapports=Mprapport::findMany($ids_array);
        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $fournisseurs=Fournisseur::all();
        $origines=Origine::all();
        $navires=Navire::all();
        $standards=Standardtype::find(1); // Id1 is created for Raw Material Model
      
        

        $data = [
            'mprapports' => $mprapports ,
            'produits'  => $produits,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'fournisseurs'  => $fournisseurs,
            'origines'  => $origines,
            'navires'  => $navires
          

        ];

        return view('analyses.edit_mp_m')->with($data);
            
            
 
        
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
                
                $Mprapport = Mprapport::find($id);
                $Mprapport->num = $request->input($key.'_num');
               
                $Mprapport->date_reception = $request->input($key.'_date_reception');
                $Mprapport->Num_bon = $request->input($key.'_nbon');
                $id_produit = Produit::where('name','=',$request->input($key.'_produit_id'))->first()->id;
                if(!empty($request->input($key.'_fournisseur_id') )){
                    $id_fournisseur = Fournisseur::where('name','=', $request->input($key.'_fournisseur_id'))->first()->id;
                    $Mprapport->fournisseur_id = $id_fournisseur;

                }else{
                    $id_fournisseur= NULL;
                    $Mprapport->fournisseur_id = $id_fournisseur;

                }
                if(!empty($request->input($key.'_origine_id') )){
                    
                    $id_origine = Origine::where('name','=',$request->input($key.'_origine_id'))->first()->id;
                    $Mprapport->origine_id = $id_origine;

                }else{
                    $id_origine= NULL;
                    $Mprapport->origine_id = $id_origine;

                }
                if(!empty($request->input($key.'_navire_id') )){
                    $id_navire = Navire::where('name','=',$request->input($key.'_navire_id'))->first()->id;
                    $Mprapport->navire_id = $id_navire;

                }else{
                    $id_navire= NULL;
                    $Mprapport->navire_id = $id_navire;

                }
                $Mprapport->produit_id = $id_produit;
                $Mprapport->conformite = $request->input($key.'_conformite');
                $Mprapport->commentaire = $request->input($key.'_commentaire');
                $Mprapport->certificat = $request->input($key.'_certificat');
                $Mprapport->update();
                foreach($request->input($key.'_nutriment_id', [])  as $r ){
                    
                    if(!$request->input($key.'_valeur_surbrute_'.$r) == NULL) {
                        $value = Value::where('mprapport_id', $id)->where('nutriment_id', $r)->first();

                        if ($value !== null) {
                            $value->update(['value_surbrute' => $request->input($key.'_valeur_surbrute_'.$r)]);
                        }
                         else {
                            $value = Value::create([
                                'mprapport_id'=>$id,
                                'nutriment_id'=> $r,
                                'value_surbrute' => $request->input($key.'_valeur_surbrute_'.$r)]);
                           
                        }
                        
                    }if($request->input($key.'_valeur_surbrute_'.$r) == 0){
                        Value::where('mprapport_id', $id)->where('nutriment_id', $r)->delete();
                    }
                    
            }
          
            
 
        
    
            }
        
        return redirect()->route('mprapports.index')
                        ->with('success','les rapports Matiere Premiere modifiés avec success.');

    
        
        

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


  

    function action(Request $request)
    {
     if($request->ajax())
     {  
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('mprapports')
         ->where('CustomerName', 'like', '%'.$query.'%')
         ->orWhere('Address', 'like', '%'.$query.'%')
         ->orWhere('City', 'like', '%'.$query.'%')
         ->orWhere('PostalCode', 'like', '%'.$query.'%')
         ->orWhere('Country', 'like', '%'.$query.'%')
         ->orderBy('CustomerID', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('tbl_customer')
         ->orderBy('CustomerID', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->CustomerName.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->PostalCode.'</td>
         <td>'.$row->Country.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
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
            'num_bon' => 'nullable',
            'produit_id' => 'required',
            'fournisseur_id' => 'nullable',
            'origine_id' => 'nullable',
            'navire_id' => 'nullable',
            'certificat' => 'sometimes',
            'conformite' => 'nullable',
            'path'  => 'nullable|mimes:png,doc,docx,pdf,txt|max:2048',
            'date_reception' => 'nullable',
            'commentaire' => 'nullable',
            'PS' => 'nullable'
    
        ]);
        $request->certificat = isset($request->certificat) ? 1 : 0;
 
       
        $mprapport->update($request->all());
        Mprapport::where('num', $request->num)->update(['certificat' => $request->certificat]);
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
            $nutriment_id = $r;
            $value = Value::where('mprapport_id', $id)->where('nutriment_id', $nutriment_id)->first();
            
            if(!$request->input("valeur_surbrute_".$r) == NULL) {
  
              if ($value !== null) {
                  $value->update(['value_surbrute' => $value_surbrute]);
              } else {
                  $value = Value::create([
                      'mprapport_id'=>$id,
                      'nutriment_id'=> $nutriment_id,
                      'value_surbrute' => $value_surbrute
                  ]);
              }
             
            }if($request->input("valeur_surbrute_".$r) == 0)
              Value::where('mprapport_id', $id)->where('nutriment_id', $nutriment_id)->delete();
  
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
    public function export(Request $request) 
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
        }else{
            $ids_array = array();
        }
        return Excel::download(new MatieresPremieresExport($ids_array), 'matierespremires.xlsx');

        

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
        function array_average_by_key( $arr )
{
    $sums = array();
    $counts = array();
    foreach( $arr as $k => &$v )
    {
        foreach( $v as $sub_k => $sub_v )
        {
            if( !array_key_exists( $sub_k, $counts ) )
            {
                $counts[$sub_k] = 0;
                $sums[$sub_k]   = 0;
            }
            $counts[$sub_k]++;
            $sums[$sub_k]  += $sub_v;
        }
    }
    $avg = array();
    foreach( $sums as $k => $v )
    {
        $avg[$k] = $v / $counts[$k];
    }
    return $avg;
}
        $ids = $request->input('ids');
        $standards=Standardtype::find(1);
        $values = Value::all();
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $mprapports=Mprapport::findMany($ids_array);
        }else{
            $mprapports=Mprapport::all();
        }
     
        $date = date('Y-m-d');
        $nutriments=Nutriment::all();
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
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $mprapports=Mprapport::findMany($ids_array);
        }else{
            $mprapports=Mprapport::all();
        }
       
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
    

 


    public function search(Request $request){

        if($request->input('search_param')=="produit"){
            $date_start = $request->date_start_p;
            $date_end = $request->date_end_p;
            $id_produit = Produit::where('name','=',$request->input('produit_name'))->first()->id;

            if($date_start!=NULL && $date_end!=NULL){
                $mprapports = Mprapport::where('produit_id', '=',$id_produit)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();
    
            }else{
                $mprapports = Mprapport::where('produit_id', '=',$id_produit)->orderBy('date_reception','ASC')->get();

            }
          

        }
        if($request->input('search_param')=="origine"){
            $date_start = $request->date_start_o;
            dd($request->date_start);

            $date_end = $request->date_end_o;

            $id_origine = Origine::where('name','=',$request->input('origine_name'))->first()->id;
            if($date_start!=NULL && $date_end!=NULL){
                $mprapports = Mprapport::where('origine_id', '=',$id_origine)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();

            }else{
                $mprapports = Mprapport::where('origine_id', '=',$id_origine)->orderBy('date_reception','ASC')->get();

            }

        }
        if($request->input('search_param')=="fournisseur"){
            $date_start = $request->date_start_f;
            $date_end = $request->date_end_f;
            $id_fournisseur = Fournisseur::where('name','=',$request->input('fournisseur_name'))->first()->id;

            if($date_start!=NULL && $date_end!=NULL){
                $mprapports = Mprapport::where('fournisseur_id', '=',$id_fournisseur)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();

            }else{
                $mprapports = Mprapport::where('fournisseur_id', '=',$id_fournisseur)->orderBy('date_reception','ASC')->get();

            }


        }
        if($request->input('search_param')=="navire"){
            $date_start = $request->date_start_n;
            $date_end = $request->date_end_n;
            $id_navire = Navire::where('name','=',$request->input('navire_name'))->first()->id;

            if($date_start!=NULL && $date_end!=NULL){
                $mprapports = Mprapport::where('navire_id', '=',$id_navire)->orderBy('date_reception','ASC')->whereBetween('date_reception', [$date_start, $date_end])->get();

            }else{
                $mprapports = Mprapport::where('navire_id', '=',$id_navire)->orderBy('date_reception','ASC')->get();

            }

        }
        if($request->input('search_param')=="date_reception"){
            $mprapports = Mprapport::where('date_reception', '=',$request->search)->get();


        }
        if($request->input('search_param')=="multiple"){
            $date_start = $request->date_start_m;
            $date_end = $request->date_end_m;
            $mprapports = Mprapport::where('date_reception', '=',$request->search);

          
            if($date_start !=NULL && $date_end !=NULL){
                $mprapports = Mprapport::whereBetween('date_reception', [$date_start, $date_end])
                ->when(request()->input('produit_name_m'), function ($query) {
                    $query->where('produit_id', Produit::where('name','=',request()->input('produit_name_m'))->first()->id);
                })->when($request->input('fournisseur_name_m'), function ($query) {
                    $query->where('fournisseur_id', Fournisseur::where('name','=',request()->input('fournisseur_name_m'))->first()->id);
                })  ->when($request->input('origine_name_m'), function ($query) {
                    $query->where('origine_id', Origine::where('name','=',request()->input('origine_name_m'))->first()->id);
                })  ->when($request->input('navire_name_m'), function ($query) {
                    $query->where('navire_id', Navire::where('name','=', request()->input('navire_name_m'))->first()->id);
                })
                ->get();

            }else{
                $mprapports = Mprapport::when(request()->input('produit_name_m'), function ($query) {
                    $query->where('produit_id', Produit::where('name','=',request()->input('produit_name_m'))->first()->id);
                })->when($request->input('fournisseur_name_m'), function ($query) {
                    $query->where('fournisseur_id', Fournisseur::where('name','=',request()->input('fournisseur_name_m'))->first()->id);
                })  ->when($request->input('origine_name_m'), function ($query) {
                    $query->where('origine_id', Origine::where('name','=',request()->input('origine_name_m'))->first()->id);
                })  ->when($request->input('navire_name_m'), function ($query) {
                    $query->where('navire_id', Navire::where('name','=', request()->input('navire_name_m'))->first()->id);
                })
                ->get();
            }
       
        }

        $nutriments=Nutriment::all();
        $standards=Standardtype::find(1);
        $values = Value::all();
        $produits=Produit::all();
        $fournisseurs=Fournisseur::all();
        $origines=Origine::all();
        $navires=Navire::all();
        $data = [
            'Mprapports'  => $mprapports,
            'standards'  => $standards,
            'nutriments'  => $nutriments,
            'values'   => $values,
            'produits' => $produits,
            'fournisseurs'=>$fournisseurs,
            'origines'=>$origines,
            'navires'=>$navires

        ];

        return view('analyses.search_matierepremiere')->with($data);


    }   
   
}