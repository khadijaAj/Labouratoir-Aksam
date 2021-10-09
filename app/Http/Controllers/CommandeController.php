<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;
use App\Produit;
use App\client;
use App\Detailscommande;
use App\Exports\CommandeExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\CommandeImport; 

class CommandeController extends Controller
{
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
        $commandes = Commande::paginate(30);
        $produits=Produit::paginate(30);
        $details=Detailscommande::all();
        $data = [

            'commandes'   => $commandes,
            'produits'=>$produits,
            'details'=>$details
        ];  



        return view('crm.commandes')->with($data);


    }
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $clients=Client::all();
        $produits=Produit::all();
        $details=Detailscommande::all();
        $commande=Commande::all();

            $data = [
                'commande'=>$commande,
                'details'=>$details,
                'clients'   => $clients,
                'produits'=>$produits
            ];  


        
        return view('crm.add_commande')->with($data);
       

    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
    
        
        $commande = new Commande();
        $commande->client_id = $request->client_id;
        $commande->reference = $request->reference;
        $commande->date = $request->date;
        $commande->due_date = $request->due_date;
        $commande->save();

       if(!empty($request->client_id)){

       
        foreach($request->produit_id as  $key => $produit){

            $details= new Detailscommande();
            $details->produit_id =$produit;
            $details->quantity =$request->quantity[$key];
            $details->unite =$request->unite[$key];
            $details->commande_id =$commande->id;
            $details->save();   
        }
        return redirect()->route('commandes.index')
        ->with('success','Commande ajouté avec success.');
    }
       
     
        
        
 }
       
       
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Commande $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return view('crm.show_commande',compact('commande'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande $commande
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
    
      
        $commande =Commande::where('id',$id)->first();
        $clients=Client::all();
        $produits=Produit::all();
          $details=Detailscommande::all();
        
       

            $data = [
              
                'details'=>$details,
                'clients'   => $clients,
                'produits'=>$produits
            ];  
        
        return view('crm.edit_commande',compact('commande'))->with($data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Commande $commande,$id)
    
    {

        $request->validate([
            'reference' => 'nullable',
            'client_id' => 'nullable',
            'date' => 'nullable',
            'conditionReglement' => 'nullable',
           
        ]);

        $commande->update($request->all());

        $id = Commande::where('date', $request->date)->first()->id;
        foreach($request->produit_id as  $key => $produit){
         
             $produit_id =$produit;
             $quantity =$request->quantity[$key];
             $unite =$request->unite[$key];
            

             $details = Detailscommande::where('commande_id', $id)->where('produit_id ', $produit_id)->first();
            
            
            if(!$request->quantity[$key]==NULL)
            {
                if(!$details!== null){
                $details->update(['produit_id' => $produit_id]);
                }
             } else {
                $details = Detailscommande::create([
                  
                    'produit_id '=>$produit_id,
                    'quantity' =>$quantity,
                    'unite '=>$unite,
                    'commande_id' =>$id
                    
                ]);
            }
               
        }
        if($request->quantity[$key]== 0){
            $details = Detailscommande::where('commande_id', $id)->where('produit_id ', $produit_id )->delete();

        }
       
        
        return redirect()->route('commandes.index')
                        ->with('success','Commande modifié avec success');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
  
        return redirect()->route('commandes.index')
                        ->with('success','Commande supprimé avec success');
    }
    

    public function search(Request $request){
        $id_client = Client::where('name','=',$request->input('client_name'))->first()->id;
        $commandes= Commande::where('client_id', '=',$id_client)->get();
        
        $clients=Client::all();
        
        $data = [
           
            'clients' => $clients,
          

        ];

        return view('crm.search_commandes', compact('commandes'))->with($data);
    }
      

    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

    	$file = $request->file('file');
        Excel::import(new CommandeImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }
    public function generatePDF(Request $request)
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $commandes=Commande::findMany($ids_array);
        }else{
            $commandes=Commande::all();
        }
   
        
        $date = date('Y-m-d');
        $produits=Produit::all();
        $details=Detailscommande::all();
        $clients=Client::all();

        $data = [
        'commandes' => $commandes,
        'produits'=>$produits,
        'details'=>$details, 
        'clients'=>$clients, 
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_Commande', $data);
        return  $pdf->download('commandes.pdf'); ; 
    }

}
