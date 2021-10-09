@extends('layouts.app')

@section('title', 'Modifier produit - Aksam Labs')

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
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ouups !</strong> Il y a eu quelques problèmes avec les champs saisis.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('produits.update',$produit->id) }}" method="POST">
    @csrf
    @method('PUT')



    <div class="form-group">
        <label for="nom_produit">Nom du produit</label>
        <input type="text" class="form-control" name="name" value="{{ $produit->name }}"
            placeholder="Enter le nom du produit">
    </div>
    <div class="form-group">
        <label for="prixu">Prix Unitaire HT</label>
        <input type="number" class="form-control" name="prixu" value="{{ $produit->prixu }}"
            placeholder="Entrer le prix de ce produit">
    </div>
    <div class="form-group">
    <label for="taxe">Taxe</label>
            <select name="taxe"  class="custom-select mr-sm-2">
                <option value="0.1">10%</option>
                <option value="0.14">14%</option> 
                <option value="0.2">20%</option>                           
            </select> 
    </div>  
    <div class="form-group">
        <label for="ref_produit">Référence</label>
        <input type="text" class="form-control" name="Reference" value="{{ $produit->Reference }}"
            placeholder="Entrer la référence">
    </div>

    @if(!is_null($produit->categorie)) 
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="custom-select mr-sm-2" name="categorie_id">
            <option selected>{{ $produit->categorie->name }}</option>
            @foreach( $categories as $cat)
            <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
            @endforeach
        </select>
    </div>
    @else
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="custom-select mr-sm-2" name="categorie_id">
            <option selected value="" >Choisir une catégorie..</option>
            @foreach( $categories as $cat)
            <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
            @endforeach
        </select>
    </div>
    @endif



    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection