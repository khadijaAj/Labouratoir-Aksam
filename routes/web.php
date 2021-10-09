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
Route::resource('prospecteurs','ProspecteurController');
Route::resource('formules','FormuleController');
Route::resource('commandes','CommandeController');
Route::resource('vrapports','VrapportController');
Route::resource('geolocalisations','GeolocalisationController');
Route::resource('detailscommande','DetailscommandeController');
Route::resource('bovin','BovinController');
Route::resource('ovin','OvinController');
Route::resource('vl','VachelaitiereController');
Route::resource('standardsbv','StandardsbovinController');
Route::resource('standardsov','StandardsovinController');
Route::resource('standardsvl','StandardsVlController');


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

Route::get('/add_commande_m', 'CommandeController@create_multiple' );
Route::post('/add_commande_m', 'CommandeController@store_multiple' )->name('commandes.store_multiple');

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

Route::get('/ovin', 'OvinController@index')->name('ovin.index');
Route::get('/ovin/create', 'OvinController@create')->name('ovin.create');
Route::post('/ovin','OvinController@store')->name('ovin.store');
Route::get('/ovin/{id}/edit', 'OvinController@edit')->name('ovin.edit');
Route::get('/ovin/{id}','OvinController@show')->name('ovin.show');
Route::delete('/ovin/{id}','OvinController@destory')->name('ovin.destory');

Route::get('/bovin', 'BovinController@index')->name('bovin.index');
Route::get('/bovin/create', 'BovinController@create')->name('bovin.create');
Route::post('/bovin','BovinController@store')->name('bovin.store');
Route::get('/bovin/{id}/edit', 'BovinController@edit')->name('bovin.edit');
Route::get('/bovin/{id}','BovinController@show')->name('bovin.show');
Route::delete('/bovin/{id}','BovinController@destory')->name('bovin.destory');

Route::get('/vl', 'VachelaitiereController@index')->name('vl.index');
Route::get('/vachelaitiere/create', 'VachelaitiereController@create')->name('vachelaitiere.create');
Route::post('/vachelaitiere','VachelaitireController@store')->name('vachelaitiere.store');
Route::get('/vachelaitiere/{id}/edit', 'VachelaitiereController@edit')->name('vachelaitiere.edit');
Route::get('/vachelaitiere/{id}','VachelaitiereController@show')->name('vachelaitiere.show');
Route::delete('/vachelaitiere/{id}','VachelaitiereController@destory')->name('vachelaitiere.destory');

/* Analyses*/
Route::get('/matieres_premieres', 'MprapportController@index')->name('mprapports.index');
Route::get('/rapport_ensilage', 'EnrapportController@index')->name('enrapports.index');
Route::get('/rapport_analyse',  'CrapportController@index' )->name('crapports.index');
Route::get('/rapport_pf',  'PfrapportController@index' )->name('pfrapports.index');

/*CRM*/
Route::get('/prospecteurs', 'ProspecteurController@index')->name('prospecteurs.index');
Route::get('/prospecteurs/create','ProspecteurController@create')->name('prospecteurs.create');
Route::post('/prospecteurs','ProspecteurController@store')->name('prospecteurs.store');
Route::get('/prospecteurs/{id}/edit', 'ProspecteurController@edit')->name('prospecteurs.edit');
Route::get('/prospecteurs/{id}','Prospecteur@show')->name('prospecteurs.show');
Route::get('/prospecteurs/{id}','Prospecteur@update')->name('prospecteurs.update');
Route::delete('/prospecteurs/{id}','Prospecteur@destory')->name('prospecteurs.destory');

Route::get('/formules', 'FormuleController@index')->name('formules.index');
Route::get('/formules/create', 'FormuleController@create')->name('formules.create');
Route::post('/formules','FormuleController@store')->name('formules.store');
Route::get('/formules/{id}/edit', 'FormuleController@edit')->name('formules.edit');
Route::get('/formules/{id}','FormuleController@show')->name('formules.show');
Route::delete('/formules/{id}','FormuleController@destory')->name('formules.destory');

Route::get('/commandes', 'CommandeController@index')->name('commandes.index');
Route::get('/commandes/create', 'CommandeController@create')->name('commandes.create');
Route::post('/commandes', 'CommandeController@store')->name('commandes.store');
Route::get('/commandes/{id}','CommandeController@show')->name('commandes.show');
Route::get('/commandes/{id}','CommandeController@update')->name('commandes.update');
Route::get('/commandes/{id}/edit', 'CommandeController@edit')->name('commandes.edit');
Route::delete('commandes/{id}','CommandeController@destory')->name('commandes.destory');


Route::get('/vrapports', 'VrapportController@index')->name('vrapports.index');
Route::get('/vrapports/create', 'VrapportController@create')->name('vrapports.create');
Route::post('/vrapports','VrapportController@store')->name('vrapports.store');
Route::get('/vrapports/{id}/edit', 'VrapportController@edit')->name('vrapports.edit');
Route::get('/vrapports/{id}','VrapportController@show')->name('vrapports.show');
Route::delete('/vrapports/{id}','VrapportController@destory')->name('vrapports.destory');

Route::get('/geolocalisation', 'GeolocalisationController@index')->name('geolocalisations.index');
Route::get('/geolocalisation/create', 'GeolocalisationController@create')->name('geolocalisations.create');
Route::post('/geolocalisation','GeolocalisationController@store')->name('geolocalisations.store');


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
Route::get('exportpr', 'ProspecteurController@export')->name('exportpr');
Route::get('exportformule', 'FormuleController@export')->name('exportfr');




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
Route::get('/PDF_Prospecteur', 'ProspecteurController@pdf')->name('pdf_p');
Route::get('/PDF_Formule','FormuleController@pdf')->name('pdfformule');
Route::get('/PDF_Commande/{id}', 'CommandeController@PDF')->name('commandes.pdf');
Route::get('/PDF_Commande', 'CommandeController@generatePDF'); 
Route::get('/PDF_Formule/{id}', 'FormuleController@PDF')->name('formules.pdf');
Route::get('/PDF_Formule', 'FormuleController@generatePDF'); 
Route::get('/PDF_VR/{id}', 'VrapportController@PDF')->name('visitesrapports.pdf');
Route::get('/PDF_VR', 'VrapportController@generatePDF'); 


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
Route::post('importExcelProspecteur', 'ProspeteurController@import');
Route::post('importExcelFormule', 'FormuleController@import');


/* Standards Section */
Route::get('/standards', 'AnalysetypeController@index')->name('Analysestype.index');
Route::get('standardtype/{standardtype}', 'StandardtypeController@show')->name('Standardstype.show');
Route::get('standardtype/{standardtype}/add', 'StandardtypeController@create')->name('Standardstype.create');
Route::post('standardtype/store', 'StandardtypeController@store')->name('Standardstype.store');
Route::post('standardtype/delete', 'StandardtypeController@destroy')->name('Standardstype.destroy');

Route::get('/standardsbv', 'StandardsbovinController@index')->name('standardsbv.index');
Route::get('standardsbv/create', 'StandardsbovinController@create')->name('standardsbv.create');
Route::post('standardsbv/store', 'StandardsbovinController@store')->name('standardsbv.store');
Route::post('standardsbv/delete', 'StandardsbovinControllerr@destroy')->name('standardsbv.destroy');

Route::get('/standardsov', 'StandardsovinController@index')->name('standardsov.index');
Route::get('standardsov/create', 'StandardsovinController@create')->name('standardsov.create');
Route::post('standardsov/store', 'StandardsovinController@store')->name('standardsov.store');
Route::delete('standardsov/{id}', 'StandardsovinControllerr@destroy')->name('standardsov.destroy');

Route::get('/standardsvl', 'StandardsVlController@index')->name('standardsvl.index');
Route::get('standardsvl/create', 'StandardsVlController@create')->name('standardsvl.create');
Route::post('standardsvl/store', 'StandardsVlController@store')->name('standardsvl.store');
Route::delete('standardsvl/{id}', 'StandardsVlController@destroy')->name('standardsvl.destroy');


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
Route::get('/search_bovin/', 'BovinController@search')->name('search_bovin');
Route::get('/search_ovin/', 'OvinController@search')->name('search_ovin');
Route::get('/search_vl/', 'VolailleController@search')->name('search_vl');
Route::get('/search_prospecteurs/', 'ProspecteurController@search')->name('search_prospecteurs');
Route::get('/search_formules/', 'FormuleController@search')->name('search_formules');
Route::get('/search_commandes/', 'CommandeController@search')->name('search_commandes');
Route::get('/search_vrapports/', 'VrapportController@search')->name('search_vrapports');


Route::get('/', function () {
    return view('app');
});
