<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\ReadXmlController;
use App\Http\Middleware\AdminMiddleware;

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

/* Resource Route Parameters */
Route::resource('users','UserController');
Route::resource('home','HomeController');
Route::resource('chart','ChartController');

Route::resource('navires','NavireController');
Route::resource('fournisseurs','FournisseurController');
Route::resource('origines','OrigineController');
Route::resource('categories','CategorieController');
Route::resource('produits','ProduitController');
Route::resource('commercials','CommercialController');
Route::resource('clients','ClientController');
Route::resource('Nutriment','NutrimentController');
Route::resource('Analysetype','AnalysetypeController');
Route::resource('crapports','CrapportController');
Route::resource('pfrapports','PfrapportController');
Route::resource('mprapports','mprapportController');
Route::resource('enrapports','EnrapportController');

/* Login */
Route::get('/', 'Auth\AuthController@showFormLogin')->name('login');
Route::get('login', 'Auth\AuthController@showFormLogin')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

});

Route::post('/chart', 'ChartController@index' )->name('charts.index');

/* Administration*/
Route::get('/users','UserController@index' )->name('users.index')->middleware(AdminMiddleware::class);


Route::get('/add_mp_m', 'MprapportController@create_multiple' );
Route::post('/add_mp_m', 'MprapportController@store_multiple' )->name('mprapports.store_multiple');
Route::get('/edit_mp_m', 'MprapportController@edit_multiple' )->name('mprapports.edit_multiple');
Route::post('/update_mp_m', 'MprapportController@update_multiple' )->name('mprapports.update_multiple');


Route::get('/add_pf_m', 'PfrapportController@create_multiple' );
Route::post('/add_pf_m', 'PfrapportController@store_multiple' )->name('pfrapports.store_multiple');
Route::get('/edit_pf_m', 'PfrapportController@edit_multiple' )->name('pfrapports.edit_multiple');
Route::post('/update_pf_m', 'PfrapportController@update_multiple' )->name('pfrapports.update_multiple');


Route::get('/add_ra_m', 'CrapportController@create_multiple' );
Route::post('/add_ra_m', 'CrapportController@store_multiple' )->name('crapports.store_multiple');
Route::get('/edit_ra_m', 'CrapportController@edit_multiple' )->name('crapports.edit_multiple');
Route::post('/update_ra_m', 'CrapportController@update_multiple' )->name('crapports.update_multiple');


Route::get('/add_en_m', 'EnrapportController@create_multiple' );
Route::get('/edit_en_m', 'EnrapportController@edit_multiple' )->name('enrapports.edit');
Route::post('/update_en_m', 'EnrapportController@update_multiple' )->name('enrapports.update_multiple');

/* Dashboard*/
Route::get('/home', 'HomeController@index' )->name('home.index');
Route::get('/diagramme_ensilage', function () {
    return view('diagrammeensilage');
});
Route::get('/formulaire_arp', function () {
    return view('formulairearp');
});


/* Partenaires*/
Route::get('/clients', 'ClientController@index' )->name('clients.index');
Route::get('/commerciaux', 'CommercialController@index')->name('commercials.index');
Route::get('/fournisseurs', 'FournisseurController@index')->name('fournisseurs.index');
Route::get('/navires', 'NavireController@index')->name('navires.index');

/* Données techniques*/
Route::get('/produits', 'ProduitController@index')->name('produits.index');
Route::get('/nutriments', 'NutrimentController@index')->name('Nutriment.index');
Route::get('/origines', 'OrigineController@index')->name('origines.index');
Route::get('/categories','CategorieController@index' )->name('categories.index');

/* Analyses*/
Route::get('/matieres_premieres', 'MprapportController@index')->name('mprapports.index');
Route::get('/rapport_ensilage', 'EnrapportController@index')->name('enrapports.index');
Route::get('/rapport_analyse',  'CrapportController@index' )->name('crapports.index');
Route::get('/rapport_pf',  'PfrapportController@index' )->name('pfrapports.index');

/* Actions : Export EXCEL */
Route::get('exportc', 'CommercialController@export')->name('exportc');
Route::get('exportl', 'ClientController@export')->name('exportcl');
Route::get('exportf', 'FournisseurController@export')->name('exportf');
Route::get('exportn', 'NavireController@export')->name('exportn');
Route::get('exportnt', 'NutrimentController@export')->name('exportnt');
Route::get('/exportpf', 'PfrapportController@export')->name('exportpf');
Route::get('/exportmp', 'MprapportController@export')->name('exportmp');
Route::get('/exportrc', 'CrapportController@export')->name('exportrc');
Route::get('/exporten', 'EnrapportController@export')->name('exporten');
Route::get('exportp', 'ProduitController@export')->name('exportp');
Route::get('exporto', 'OrigineController@export')->name('exporto');
Route::get('exportct', 'CategorieController@export')->name('exportct');

/* Actions : Export PDF */
Route::get('/PDF_RC','CrapportController@generatePDF');
Route::get('/PDF_Client', 'ClientController@pdf')->name('pdfcl');
Route::get('/PDF_Fournisseur', 'FournisseurController@pdf')->name('pdff');
Route::get('/PDF_Navire', 'NavireController@pdf')->name('pdfn');
Route::get('/PDF_Produit', 'ProduitController@pdf')->name('pdfp');
Route::get('/PDF_Origine', 'OrigineController@pdf')->name('pdfo');
Route::get('/PDF_Categorie', 'CategorieController@pdf')->name('pdfct');
Route::get('/PDF_Nutriment', 'NutrimentController@pdf')->name('pdfn');
Route::get('/pdf_g','CommercialController@pdf')->name('pdf_g');
Route::get('/PDF_MP', 'MprapportController@generatePDF');
Route::get('/PDF_MP_UNIQUE/{id}', 'MprapportController@PDF')->name('mprapports.pdf'); // Generate PDF For Specific Report 
Route::get('/PDF_PF_UNIQUE/{id}', 'PfrapportController@PDF')->name('pfrapports.pdf'); // Generate PDF For Specific Report 
Route::get('/PDF_MP_Mycotoxine', 'MprapportController@generatePDF_mycotoxine');
Route::get('/PDF_PF', 'PfrapportController@generatePDF');
Route::get('/PDF_PF_Mycotoxine', 'PfrapportController@generatePDF_mycotoxine');
Route::get('/PDF_EN', 'EnrapportController@generatePDF');
Route::get('/PDF_EN_RATION', 'EnrapportController@generate_rations');
Route::get('/PDF_EN_FOURRAGE', 'EnrapportController@generate_fourrages');
Route::get('/PDF_EN_TRITICAL', 'EnrapportController@generate_tritical');

/* Actions : IMPORT EXCEL */
Route::post('importExcelNavire', 'NavireController@import');
Route::post('importExcelNutriment', 'NutrimentController@import');
Route::post('importExcelCommercial', 'CommercialController@import');
Route::post('importExcelCategorie', 'CategorieController@import');
Route::post('importExcelOrigine', 'OrigineController@import');
Route::post('importExcelFournisseur', 'FournisseurController@import');
Route::post('importExcelClient', 'ClientController@import');
Route::post('importExcelProduit', 'ProduitController@import');
Route::post('importExcelPF', 'PfrapportController@import');
Route::post('importExcelMP', 'MprapportController@import');
Route::post('importExcelRC', 'CrapportController@import');
Route::post('importEN', 'EnrapportController@import');


/* Standards Section */
Route::get('/standards', 'AnalysetypeController@index')->name('Analysestype.index');
Route::get('standardtype/{standardtype}', 'StandardtypeController@show')->name('Standardstype.show');
Route::get('standardtype/{standardtype}/add', 'StandardtypeController@create')->name('Standardstype.create');
Route::post('standardtype/store', 'StandardtypeController@store')->name('Standardstype.store');
Route::post('standardtype/delete', 'StandardtypeController@destroy')->name('Standardstype.destroy');


Route::match(["get", "post"], "read-xml", 'XMLController@index')->name('xml-upload');


Route::get('/search_commerciaux/', 'CommercialController@search')->name('search_commercial');
Route::get('/search_clients/', 'ClientController@search')->name('search_client');

Route::get('/search_navires/', 'NavireController@search')->name('search_navire');
Route::get('/search_origine/', 'OrigineController@search')->name('search_origine');
Route::get('/search_nutriments/', 'NutrimentController@search')->name('search_nutriment');
Route::get('/search_fournisseurs/', 'FournisseurController@search')->name('search_fournisseur');
Route::get('/search_produits/', 'ProduitController@search')->name('search_produit');
Route::get('/search_categories/', 'CategorieController@search')->name('search_categorie');
Route::post('/search_mp/', 'MprapportController@search')->name('search_mp');
Route::post('/search_pf/', 'PfrapportController@search')->name('search_pf');
Route::post('/search_en/', 'EnrapportController@search')->name('search_en');
Route::post('/search_ra/', 'CrapportController@search')->name('search_ra');
