@extends('layouts.app')

@section('title', 'Ajout Categorie - Aksam Labs')

@section('links')

<li class="nav-item">
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
<li class="nav-item active">
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
        <label for="categorie">Nom de catégorie</label>
        <input type="categorie" class="form-control" id="nom_categorie" placeholder="Enter le nom de catégorie">
    </div>

    <div class="form-group">
        <label for="ref">Référence</label>
        <input type="text" class="form-control" id="ref_categorie" placeholder="Entrer la référence">
    </div>

    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection