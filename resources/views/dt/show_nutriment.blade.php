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

  


    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_nutriment">Nom de nutriment</label>
            <input type="text" class="form-control" name="name"  value="{{ $nutriment->name }}"  disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="ref_nutriment">Référence</label>
            <input type="text" class="form-control" name="Reference" value="{{ $nutriment->Reference }}" disabled>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="cout">Coût</label>
            <input type="text" class="form-control" name="cout"  value="{{ $nutriment->cout}}"  disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="Incertitude">Incertitude</label>
            <input type="text" class="form-control" name="incertitude" value="{{ $nutriment->incertitude }}"  disabled>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="méthode">Méthode</label>
            <input type="text" class="form-control" name="methode" value="{{ $nutriment->methode }}"disabled >
        </div>
        <div class="form-group col-md-6">
            <label for="cible">Cible</label>
            <input type="text" class="form-control" name="cible" value="{{ $nutriment->cible }}" disabled>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="calculé">Calculé</label>

            <select class="form-control" name="calcule" disabled>
            <option selected>{{ $nutriment->calcule}}</option>
                <option>oui</option>
                <option>non</option>

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="eq">Equation</label>
            <input type="text" class="form-control" name="equation" value="{{ $nutriment->equation }}"  disabled>
        </div>
        <div class="form-group col-md-12">
            <label for="unit">Unité</label>
            <input type="text" class="form-control" name="unite" value="{{ $nutriment->unite }}"  disabled>
        </div>

    </div>
    <br>

   
@endsection