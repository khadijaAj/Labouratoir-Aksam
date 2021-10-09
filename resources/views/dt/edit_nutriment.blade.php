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

<form action="{{ route('Nutriment.update',$nutriment->id) }}" method="POST">
    @csrf
    @method('PUT')



    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_nutriment">Nom de nutriment</label>
            <input type="text" class="form-control" name="name" value="{{ $nutriment->name }}">
        </div>
        <div class="form-group col-md-6">
            <label for="ref_nutriment">Référence</label>
            <input type="text" class="form-control" name="Reference" value="{{ $nutriment->Reference }}"
                placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="cout">Coût</label>
            <input type="text" class="form-control" name="cout" value="{{ $nutriment->cout}}"
                placeholder="Enter le coût ">
        </div>
        <div class="form-group col-md-6">
            <label for="Incertitude">Incertitude</label>
            <input type="text" class="form-control" name="incertitude" value="{{ $nutriment->incertitude }}"
                placeholder="Entrer l'incertitude">
        </div>
        <div class="form-group col-md-6">
            <label for="cible">Cible</label>
            <input type="text" class="form-control" name="cible" value="{{ $nutriment->cible }}"
                placeholder="Entrer la cible">
        </div>


    </div>

    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection