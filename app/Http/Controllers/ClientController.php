<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commercial;
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
            'name' => 'required',
            'Reference' => 'nullable',
            'adresse' => 'nullable',
            'Region' => 'nullable',
            'commercial_id' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            
        ]);
  
        Client::create([
            'name' => $request->name,
            'Reference' => $request->Reference,
            'adresse' => $request->adresse,
            'tele' => $request->tele,
            'commercial_id' => $request->commercial_id,
            'Region' => $request->Region
           
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
            'name' => 'required',
            'Reference' => 'nullable',
            'adresse' => 'nullable',
            'Region' => 'nullable',
            'commercial_id' => 'nullable',
            'tele' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
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
