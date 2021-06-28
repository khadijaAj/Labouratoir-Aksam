@extends('layouts.app')

@section('title', 'Ajout Rapport Analyse - Aksam Labs')

@section('links')

<li class="nav-item ">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/produits_finis">
        <i class="la la-cart-plus"></i>
        <p>Produits finis</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/rapport_analyse">
        <i class="la la-eyedropper"></i>
        <p>Rapport D'analyse</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
    </a>
</li>


@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>
        Formulaire</b></div>
@endsection

@section('content')
<form action="#" method="post">

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de produit</label>
            <select class="custom-select mr-sm-2" id="produit">
                <option selected>Choisir un produit ...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="ref">Réference </label>
            <input type="text" class="form-control" id="ref" placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de Commercial</label>
            <select class="custom-select mr-sm-2" id="commercial">
                <option selected>Choisir un commercial ...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="commentaire">Commentaire</label>
            <input type="text" class="form-control" id="commentaire" placeholder="Entrer le commentaire">
        </div>
    </div>

    <div class="form-row">


        <div class="form-group col-md-6">
            <label for="date_reception"> Date de reception </label>
            <input type="date" class="form-control" id="date_reception">
        </div>
        <div class="form-group col-md-6">
            <label for="date_analyse"> Date d'analyse</label>
            <input type="date" class="form-control" id="date_analyse">
        </div>


    </div>
    <br>

    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-toggle="tab">Analyses</a>
            </li>
            <li class="nav-item">
                <a href="#profile" class="nav-link" data-toggle="tab">Ressources</a>
            </li>

        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <br>
                <div class="form-row align-items-right" style="float:right;">


                    <div class="col-auto">

                        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                                style="color: #ffffff; text-decoration: none; ">Ajouter un ligne</a></button>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Nature D'analyse</center>
                                </th>
                                <th>
                                    <center>Unité</center>
                                </th>
                                <th>
                                    <center>Incertitude</center>
                                </th>
                                <th>
                                    <center>Méthode</center>
                                </th>
                                <th>
                                    <center>Sur brute</center>
                                </th>
                                <th>
                                    <center>Sur séche</center>
                                </th>
                                <th>
                                    <center>Cible</center>
                                </th>


                                <th>
                                    <center>Prix</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    <center><input type="text" id="nature_analyse" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="unite" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="incertitude" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="methode" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="value_surbrute" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id=value_surseche /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="cible" /></center>
                                </td>
                                <td>
                                    <center><input type="text" id="prix" /></center>
                                </td>


                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile">
                Emptyy
            </div>
            <div class="card-action">
                <center><button  type="submit"  class="btn btn-success">Enregistrer</button></center>
            </div>


        </div>
    </div>
</form>
@endsection