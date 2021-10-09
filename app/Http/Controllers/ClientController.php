<?php

namespace App\Http\Controllers;


use App\Client;
use App\Commercial;
use App\Crapport;
use App\Produit;
use App\Formule;
use App\Commande;
use App\Detailscommande;
use App\Standardtype;
use App\Nutriment;
use App\Value;
use App\Vrapport;
use App\ELevages;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\ClientImport; 


class ClientController extends Controller
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
        $clients = Client::paginate(30);
        $crapports=Crapport::all();
        return view('partenaires.clients',compact('clients'));


    }
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commercials=Commercial::all();

        return view('partenaires.add_client')->with('commercials',$commercials);

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
            'name'  => 'required',
            'civility'=> 'nullable',
            'code'=> 'nullable',
            'email'=> 'nullable',
            'adresse'=> 'nullable',
            'ville'=> 'nullable',
            'pays'=> 'nullable',
            'familleCl'=> 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'modeReglement'=> 'nullable',
            'salleTraite'=> 'nullable',
            'modelivrainson'=> 'nullable',
            'province'=> 'nullable',
            'typeElevage'=>'nullable',
            'statut'=>'nullable',
            'commercial_id'=>'nullable'
               
        ]);
        
        Client::create([
            'name'   => $request->name,
            'civility' => $request->civility,
            'code' => $request->code,
            'email'=>  $request->email,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'pays'=>  $request->pays,
           'familleCl' => $request->familleCl,
           'tele'  => $request->tele,
           'modeReglement' => $request->modeRgelement,
           'salleTraite' => $request->salleTraite,
           'modelivrainson' => $request->modelivraison,
            'province' => $request->province,
            'statut'=>$request->statut,
            'typeElevage'=> implode(",",$request->typeElevage),
            'commercial_id' => $request->commercial_id
           
        ]);
       
        return redirect()->route('clients.index')
                        ->with('success','Client ajouté avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)

    {     
        $standards=Standardtype::find(3);
        $values = Value::all();
        $crapports =Crapport::all();
        $details=Detailscommande::all();
        $commandes=Commande::all();
        $formules=Formule::all();
        $vrapports=Vrapport::all();
        $elevages=Elevages::all();

        return view('partenaires.show_client',compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        $commercials=Commercial::all();

        return view('partenaires.edit_client',compact('client'))->with('commercials',$commercials);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
        'name'  => 'required',
        'civility'=> 'nullable',
        'code'=> 'nullable',
        'email'=>'nullable',
        'adresse'=> 'nullable',
        'ville'=> 'nullable',
        'pays'=> 'nullable',
        'familleCl'=> 'nullable',
        'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'modeReglement'=> 'nullable',
        'salleTraite'=> 'nullable',
        'modelivrainson'=> 'nullable',
        'province'=> 'nullable',
        'statut'=>'nullable',
        'typeElevage'=> explode(",",$request->typeElevage),
        'commercial_id'=>'nullable'
           
        
        ]);
  
        $client->update($request->all());
  
        return redirect()->route('clients.index')
                        ->with('success','Client modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
  
        return redirect()->route('clients.index')
                        ->with('success','client supprimé avec success');
    }

    public function export() 
    {
        return Excel::download(new ClientExport, 'clients.xlsx');
    }

   
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new ClientImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }



    public function search(Request $request){
        $search = $request->input('search');
        $clients = Client::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('Reference', 'LIKE', "%{$search}%")
            ->get();
    
        return view('partenaires.search_clients', compact('clients'));
    }

    public function pdf()
    {
        $clients = DB::select('select * from clients');
        $date = date('Y-m-d');
        $count= collect($clients)->count();
    	$data = ['title' => 'clients','date'=>$date,'count'=>$count,'elements'=>$clients];
        $pdf = PDF::loadView('pdf_client', $data);
        $pdf->stream();
        return $pdf->download('liste_clients.pdf');
    }

 
}
