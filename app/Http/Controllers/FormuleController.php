<?php

namespace App\Http\Controllers;

use App\Formule;
use Illuminate\Http\Request;
use App\Client;
use App\Exports\FormuleExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use App\Imports\FormuleImport; 

class FormuleController extends Controller
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
            $clients = Client::all();
            $formules = Formule::paginate(30);
    
            $data = [
                'formules'  => $formules,
                'clients'   => $clients
            ];    
            return view('crm.formules')->with($data);
   }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        
        $data = [
            'clients'=> $clients,

        ];
       
        return view('crm.add_formule')->with($data);

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

            'ensilage'=> 'nullable',
            'foin'    => 'nullable' ,
            'paille'  => 'nullable',
            'fourrage'=> 'nullable',
            'aliment' => 'nullable',
            'trxSoja' => 'nullable',
            'cmv'     => 'nullable',
            'maisbroye'=> 'nullable',
            'coqueSoja'=> 'nullable',
            'psb'      => 'nullable', 
            'bicarbonate'=>'nullable' ,
            'niveauensilage'=> 'nullable',
            'niveauproduction'=>'nullable' ,
            'autre'=> 'nullable',
            'date_creation'=>'nullable',
            'valeurms'=> 'nullable',
            'client_id'=> 'nullable'
            
        ]);
  
        Formule::create([
    
            'ensilage'=> $request->ensilage,
            'foin'=> $request->foin,
            'paille'=> $request->paille,
            'fourrage'=> $request->fourrage,
            'aliment'=> $request->aliment,
            'trxSoja'=> $request->rxSoja,
            'cmv'=> $request->cmv,
            'maisbroye' => $request->maisbroye,
            'coqueSoja'=> $request->coqueSoja,
            'psb'=> $request->psb, 
            'bicarbonate' => $request->bicarbonate,
            'niveauensilage'=> $request->niveauensilage,
            'niveauproduction' => $request->niveauproduction,
            'autre'=> $request->autre,
            'date_creation'=>$request->date_creation,
            'valeurms'=> $request->valeurms,
            'client_id'=> $request->client_id

           
        ]);
        return redirect()->route('formules.index')
                        ->with('success','Formule ajouté avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function show(Formule  $formule)
    {
        return view('crm.show_formule',compact('formule'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formule =Formule::find($id);
        $clients=Client::all();

        return view('crm.edit_formule',compact('formule'))->with('clients',$clients);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formule  $formule)
    {
        $request->validate([
            'ensilage'=> 'nullable',
            'foin'=> 'nullable' ,
            'paille'=> 'nullable',
            'fourrage'=> 'nullable',
            'aliment' => 'nullable',
            'trxSoja'=> 'nullable',
            'cmv' => 'nullable',
            'maisbroye'=> 'nullable',
            'coqueSoja'=> 'nullable',
            'psb'=> 'nullable', 
            'bicarbonate'=>'nullable' ,
            'niveauensilage'=> 'nullable',
            'niveauproduction'=>'nullable' ,
            'autre'=> 'nullable',
            'date_creation'=>'nullable',
            'valeurms'=> 'nullable',
            'client_id'=> 'nullable'
        ]);
       
        $formule->update($request->all());
  
        return redirect()->route('formules.index')
                        ->with('success','Formule modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formule  $formule)
    {
        $formule->delete();
  
        return redirect()->route('formules.index')
                        ->with('success','Formule supprimé avec success');
    }

    public function export() 
    {
        return Excel::download(new FormuleExport, 'formules.xlsx');
    }

   
    public function import(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

  	$file = $request->file('file');
        Excel::import(new FormuleImport, $file);
        return redirect()->back()->with('success', 'les données sont importées avec success!');
    }



    public function search(Request $request){
        $id_client = Client::where('name','=',$request->input('client_name'))->first()->id;
        $formules= Formule::where('client_id', '=',$id_client)->get();
        
        $clients=Client::all();
        
        $data = [
            'formules'  => $formules,
            'clients' => $clients,
          

        ];

        return view('crm.search_formules')->with($data);
    } 

    public function generatePDF(Request $request)
    {
        $ids = $request->input('ids');
        if($request->has('ids')){
            $ids_array = explode(",",$request->get('ids'));
            $formules=Formule::findMany($ids_array);
        }else{
            $formules=Formule::all();
        }
   
        
        $date = date('Y-m-d');
        $clients=Client::all();

        $data = [
        'formules' => $formules,
        'clients'=>$clients, 
        'date'=>$date


        ];
        $pdf = PDF::loadView('PDFtemplate.PDF_Formule', $data);
        $pdf->setPaper('A4', 'landscape');
        return  $pdf->download('formules.pdf'); ; 
    }


 

}

