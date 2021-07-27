<?php

namespace App\Http\Controllers;
use App\Mprapport;
use App\Pfrapport;
use App\Enrapport;
use App\Produit;
use App\Origine;
use App\Navire;
use App\Fournisseur;
use App\Nutriment;
use App\Standardtype;
use App\Value;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $produits=Produit::all();
        $nutriments=Nutriment::all();
        $values = Value::all();
        $navires = Navire::all();
        $origines = Origine::all();
        $fournisseurs = Fournisseur::all();
        $mprapports = Mprapport::all();
        $pfrapports = Pfrapport::all();
        $enrapports = Enrapport::all();
        $standardsmp=Standardtype::find(1);;
        $standardspf = Standardtype::find(2);
        $standardsen = Standardtype::find(4);

        $data = [
            'produits'  => $produits,
            'nutriments'  => $nutriments,
            'fournisseurs'  => $fournisseurs,
            'origines'  => $origines,
            'values'  => $values,
            'navires'  => $navires,
            'pfrapports'  => $pfrapports,
            'mprapports'  => $mprapports,
            'enrapports'  => $enrapports,
            'standardsmp'=>  $standardsmp,
            'standardspf'=> $standardspf,
            'standardsen' =>  $standardsen

        ];
        return view('evolutionproteine')->with($data);

    }
}
