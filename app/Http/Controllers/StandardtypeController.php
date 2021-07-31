<?php

namespace App\Http\Controllers;

use App\Standardtype;
use Illuminate\Http\Request;
use App\Nutriment;
use App\Mesure;

use DB;

class StandardtypeController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('admin');

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($standard_id,$nutriment_id)
    {      
        $id = $standard_id;
        $id2 = $nutriment_id;
        $methodes = DB::select('SELECT methode, unite FROM mesures INNER JOIN nutriments ON mesures.nutriment_id=nutriments.id INNER JOIN analyse_standards
      ON mesures.standardtype_id=winneranalyse_standards.id');

        return view('users.show_sd_ra', compact('id','id2'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sd_id=$id;
        $nutriments=Nutriment::all();
        return view('users.add_standard',compact('sd_id'))->with('nutriments',$nutriments);
     
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $nutriment_id = $request->nutriment_id;
        $id=$request->id;
        $Standardtype = Standardtype::find($id);
        $Standardtype->nutriments()->attach($nutriment_id);
        $methode = $request->methode;
        $unite = $request->unite;
        $equation = $request->equation;
        $equation1 = $request->equation1;
        $xml_equivalent = $request->xml_equivalent;
        DB::insert('insert into mesures (methode,equation,equation1,xml_equivalent,unite,standardtype_id,nutriment_id) values(?,?,?,?,?,?,?)',[$methode,$equation,$unite,$id,$nutriment_id]);

        return redirect()->route('Analysestype.index')
        ->with('success','Opération faite avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Standardtype  $standardtype
     * @return \Illuminate\Http\Response
     */
    public function show(Standardtype $standardtype)
    {

        $mesures = DB::table('mesures')->get();

        return view('users.show_standards', compact('standardtype','mesures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Standardtype  $standardtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Standardtype $standardtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Standardtype  $standardtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standardtype $standardtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Standardtype  $standardtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $nutriment_id = $request->nutriment;
        $id=$request->standard;
        $Standardtype = Standardtype::find($id);
        $Standardtype->nutriments()->detach($nutriment_id);
  
        return redirect()->route('Analysestype.index')
                        ->with('success','Element supprimé avec success');
    }
}