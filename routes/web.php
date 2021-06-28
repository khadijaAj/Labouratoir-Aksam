<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('evolutionproteine');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/home', function () {
    return view('evolutionproteine');
});

/* Administration*/
Route::get('/users', function () {
    return view('users');
});
Route::get('/logs', function () {
    return view('logs');
});

/* Dashboard*/
Route::get('/home', function () {
    return view('evolutionproteine');
});
Route::get('/diagramme_ensilage', function () {
    return view('diagrammeensilage');
});
Route::get('/formulaire_arp', function () {
    return view('formulairearp');
});


/* Partenaires*/
Route::get('/clients', function () {
    return view('clients');
});

Route::get('/fournisseurs', function () {
    return view('fournisseurs');
});

Route::get('/navires', function () {
    return view('navires');
});

/* Données techniques*/
Route::get('/produits', function () {
    return view('produits');
});
Route::get('/nutriments', function () {
    return view('nutriments');
});
Route::get('/origines', function () {
    return view('origines');
});
Route::get('/categories', function () {
    return view('categories');
});

/* Analyses*/
Route::get('/matieres_premieres', function () {
    return view('matierepremiere');
});
Route::get('/produits_finis', function () {
    return view('produitfini');
});
Route::get('/rapport_ensilage', function () {
    return view('rapportensilage');
});
Route::get('/rapport_analyse', function () {
    return view('rapportanalyse');
});

/* Actions*/

Route::get('/adduser', function () {
    return view('add_user');
});

Route::get('/add_client', function () {
    return view('add_client');
});

Route::get('/add_fournisseur', function () {
    return view('add_fournisseur');
});

Route::get('/add_navire', function () {
    return view('add_navire');
});
Route::get('/add_produit', function () {
    return view('add_produit');
});
Route::get('/add_nutriment', function () {
    return view('add_nutriment');
});
Route::get('/add_origine', function () {
    return view('add_origine');
});
Route::get('/add_categorie', function () {
    return view('add_categorie');
});

Route::get('/add_mp', function () {
    return view('add_mp');
});
Route::get('/add_pf', function () {
    return view('add_pf');
});
Route::get('/add_ra', function () {
    return view('add_ra');
});