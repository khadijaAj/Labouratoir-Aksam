<?php

namespace App\Http\Controllers;

use App\Prospecteur;
use App\Client;
use Illuminate\Http\Request;
use App\Exports\ProspecteurExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\ProspecteurImport; 


class ProspecteurController extends Controller
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
        $prospecteurs = Prospecteur::paginate(30);
        $clients =Client::all();
        return view('crm.prospecteurs',compact('prospecteurs'));

    }
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();

        return view('crm.add_prospecteur')->with('clients',$clients);
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
            'type'=>'required',
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
            'client_id'=>'nullable'
               
            
            ]);
            $prospecteur = new Prospecteur();
            $prospecteur->name= $request->name;
            $prospecteur->civility= $request->civility;
            $prospecteur->type= $request->type;
            $prospecteur->code= $request->code;
            $prospecteur->email= $request->email;
            $prospecteur->ville= $request->ville;
            $prospecteur->adresse= $request->adresse;
            $prospecteur->pays= $request->pays;
            $prospecteur->province= $request->province;
            $prospecteur->tele= $request->tele;
            $prospecteur->familleCl= $request->familleCl;
            $prospecteur->modeReglement= $request->modeReglement;
            $prospecteur->modelivraison= $request->modelivraison;
            $prospecteur->salleTraite= $request->salleTraite;
            $prospecteur->save();

            if ($prospecteur->type =="client"){

                $client =new Client();
                $client->name=$prospecteur->name;
                $client->civility=$prospecteur->civility;
                $client->email=$prospecteur->email;
                $client->code=$prospecteur->code;
                $client->tele=$prospecteur->tele;
                $client->province=$prospecteur->province;
                $client->adresse=$prospecteur->adresse;
                $client->ville=$prospecteur->ville;
                $client->pays=$prospecteur->pays;
                $client->familleCl=$prospecteur->familleCl;
                $client->salleTraite=$prospecteur->salleTraite;
                $client->modeReglement=$prospecteur->modeReglement;
                $client->modelivraison=$prospecteur->modelivraison;
                $client->save();
               
                return redirect()->route('prospecteurs.index')
                ->with('success','cl ajouté avec success.');
            }
       
        else{
        return redirect()->route('prospecteurs.index')
        ->with('success','Prospecteur ajouté avec success.');}
       
    }
     
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospecteur $prospecteur
     * @return \Illuminate\Http\Response
     */
    public function show(Prospecteur $prospecteur)
    {
        return view('crm.show_prospecteur',compact('prospecteur'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospecteur $prospecteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $prospecteur =Prospecteur::find($id);
        return view('crm.edit_prospecteur',compact('prospecteur'));

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospecteur  $prospecteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospecteur $prospecteur)
    {
        $request->validate([
            'name'  => 'required',
            'civility'=> 'nullable',
            'type'=>'required',
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
            'client_id'=>'nullable'
               
        ]);

        $prospecteur->update($request->all());

        return redirect()->route('prospecteurs.index')
                        ->with('success','Prospecteur modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospecteur  $prospecteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospecteur $prospecteur)
    {
        $prospecteur->delete();
  
        return redirect()->route('prospecteurs.index')
                        ->with('success','prospecteur supprimé avec success');
    }

    public function export() 
    {
        return Excel::download(new ProspecteurExport, 'prospecteurs.xlsx');
    }

   
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new ProspecteurImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $prospecteurs = Prospecteur::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
    
        return view('crm.search_prospecteurs', compact('prospecteurs'));
    }

    public function pdf()
    {
        $prospecteur = DB::select('select * from prospecteurs');
        $date = date('Y-m-d');
        $count= collect($prospecteur)->count();
    	$data = ['title' => 'prospecteurs','date'=>$date,'count'=>$count,'elements'=>$prospecteur];
        $pdf = PDF::loadView('pdf_prospecteur', $data);
        $pdf->setPaper('A4', 'landscape');
        $pdf->stream();
        return $pdf->download('liste_prospecteurs.pdf');
    }

 
}


