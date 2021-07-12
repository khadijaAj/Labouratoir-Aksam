@extends('layouts.app')

@section('title', 'Modifier commercial - Aksam Labs')

@section('links')
<li class="nav-item active ">
    <a href="/commerciaux">
        <i class="la la-user-plus"></i>
        <p>Commerciaux</p>
    </a>
</li>
<li class="nav-item">
    <a href="/clients">
        <i class="la la-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item  ">
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

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_commercial">Nom du commercial</label>
            <input type="text" class="form-control" name="name" value ="{{ $commercial->name }}" placeholder="Enter le nom d'utilisateur" disabled >
        </div>
        <div class="form-group col-md-6">
            <label for="ref_commercial">Référence</label>
            <input type="text" class="form-control" name="Reference"  value ="{{ $commercial->Reference }}" placeholder="Entrer la référence" disabled >
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="adresse_commercial">Adresse</label>
            <input type="text" class="form-control" name="adresse" value ="{{ $commercial->adresse }}" placeholder="Enter l'adresse" disabled >
        </div>
        <div class="form-group col-md-6">
            <label for="numtele_commercial">Numéro téléphone</label>
            <input type="text" class="form-control" name="tele" value ="{{ $commercial->tele }}" placeholder="Entrer le numéro du téléphone" disabled >
        </div>

    </div>
    <br>

    

@endsection