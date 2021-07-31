<?php

namespace App\Http\Controllers;

use App\Analysetype;
use Illuminate\Http\Request;
use App\Standardtype;
use App\Nutriment;

class AnalysetypeController extends Controller
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
    public function index()
    {
       
        $analysestype = Analysetype::all();
      
        return view('users.standards',compact('analysestype'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analysetype  $analysetype
     * @return \Illuminate\Http\Response
     */
    public function show(Analysetype $analysetype,$id)
    {
     
        $analysetype = Analysetype::find($id);

        
        return view('users.show_standards',compact('analysetype'));

    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analysetype  $analysetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Analysetype $analysetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analysetype  $analysetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analysetype $analysetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analysetype  $analysetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analysetype $analysetype)
    {
        //
    }
}
