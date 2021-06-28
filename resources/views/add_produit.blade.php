@extends('layouts.app')

@section('title', 'Ajout produit - Aksam Labs')

@section('links')
<li class="nav-item active">
    <a href="/produits">
        <i class="la la-dropbox"></i>
        <p>Produits</p>
    </a>
</li>
<li class="nav-item  ">
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

    <div class="form-group">
        <label for="nom_produit">Nom du produit</label>
        <input type="text" class="form-control" id="nom_produit" placeholder="Enter le nom du produit">
    </div>
    <div class="form-group">
        <label for="ref_produit">Référence</label>
        <input type="text" class="form-control" id="ref_produit" placeholder="Entrer la référence">
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="custom-select mr-sm-2" id="categorie">
            <option selected>Choisir une catégorie ...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>




    <div class="card-action">
        <center><button type="submit"  class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection