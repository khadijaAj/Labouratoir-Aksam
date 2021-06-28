@extends('layouts.app')

@section('title', 'Ajout Nutriment - Aksam Labs')

@section('links')

<li class="nav-item">
    <a href="/produits">
        <i class="la la-dropbox"></i>
        <p>Produits</p>
    </a>
</li>
<li class="nav-item active  ">
    <a href="/nutriments">
        <i class="la la-yelp"></i>
        <p>Nutriments</p>
    </a>
</li>
<li class="nav-item">
    <a href="/origines">
        <i class="la la-server"></i>
        <p>Origines</p>
    </a>
</li>
<li class="nav-item">
    <a href="/categories">
        <i class="la la-sliders"></i>
        <p>Catégories</p>
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
            <label for="nom_nutriment">Nom de nutriment</label>
            <input type="text" class="form-control" id="nom_nutriment" placeholder="Enter le nom de nutriment">
        </div>
        <div class="form-group col-md-6">
            <label for="ref_nutriment">Référence</label>
            <input type="text" class="form-control" id="ref_nutriment" placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="cout">Coût</label>
            <input type="text" class="form-control" id="cout" placeholder="Enter le coût ">
        </div>
        <div class="form-group col-md-6">
            <label for="Incertitude">Incertitude</label>
            <input type="text" class="form-control" id="incertitude" placeholder="Entrer l'incertitude">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="méthode">Méthode</label>
            <input type="text" class="form-control" id="methode" placeholder="Enter la méthode">
        </div>
        <div class="form-group col-md-6">
            <label for="cible">Cible</label>
            <input type="text" class="form-control" id="cible" placeholder="Entrer la cible">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="calculé">Calculé</label>

            <select class="form-control" id="exampleFormControlSelect1">
                <option>oui</option>
                <option>non</option>

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="eq">Equation</label>
            <input type="text" class="form-control" id="equation" placeholder="Entrer l'equation">
        </div>
        <div class="form-group col-md-12">
            <label for="unit">Unité</label>
            <input type="text" class="form-control" id="unit" placeholder="Entrer l'unité">
        </div>

    </div>
    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection