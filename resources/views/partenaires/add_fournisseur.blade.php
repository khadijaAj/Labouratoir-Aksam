@extends('layouts.app')

@section('title', 'Ajout fournisseur - Aksam Labs')

@section('links')


<li class="nav-item ">
    <a href="/commerciaux">
        <i class="la la-user-plus"></i>
        <p>Commerciaux</p>
    </a>
</li>

<li class="nav-item ">
    <a href="/clients">
        <i class="la la-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/fournisseurs">
        <i class="la la-industry"></i>
        <p>Fournisseurs</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/navires">
        <i class="la la-ship"></i>
        <p>Navires</p>
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
   
<form action="{{ route('fournisseurs.store') }}" method="POST">
@csrf
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_fournisseur">Nom du Fournisseur</label>
            <input type="text" class="form-control" name="name" value ="{{ old('name') }}" placeholder="Enter le nom du fournisseur">
        </div>
        <div class="form-group col-md-6">
            <label for="ref_fournisseur">Référence</label>
            <input type="text" class="form-control" name="Reference" value ="{{ old('Reference') }}" placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="numtele_fournisseur">Numéro téléphone</label>
            <input type="text" class="form-control" name="tele" value ="{{ old('tele') }}"
                placeholder="Entrer le numéro du téléphone">
        </div>
        <div class="form-group col-md-6">
            <label for="adresse_fournisseur">Adresse</label>
            <input type="text" class="form-control" name="adresse" value ="{{ old('adresse') }}" placeholder="Enter l'adresse">
        </div>


    </div>

    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection