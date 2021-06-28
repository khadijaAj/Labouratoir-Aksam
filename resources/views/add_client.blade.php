@extends('layouts.app')

@section('title', 'Ajout client - Aksam Labs')

@section('links')
<li class="nav-item active">
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
<form action="#" method="post">
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_client">Nom du Client</label>
            <input type="text" class="form-control" id="nom_client" placeholder="Enter le nom d'utilisateur">
        </div>
        <div class="form-group col-md-6">
            <label for="ref_client">Référence</label>
            <input type="text" class="form-control" id="ref_client" placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="adresse_client">Adresse</label>
            <input type="text" class="form-control" id="adresse_client" placeholder="Enter l'adresse">
        </div>
        <div class="form-group col-md-6">
            <label for="numtele_client">Numéro téléphone</label>
            <input type="text" class="form-control" id="numtele_client" placeholder="Entrer le numéro du téléphone">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="commercial">Commercial</label>
            <select class="custom-select mr-sm-2" id="commercial">
                <option selected>Choisir un commercial ...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="region_client">Région</label>
            <input type="text" class="form-control" id="region_client" placeholder="Entrer la région">
        </div>

    </div>
    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection