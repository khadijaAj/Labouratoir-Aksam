@extends('layouts.app')

@section('title', 'Ajout prospecteur- Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/commandes">
        <i class=""></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-eyedropper"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/formules">
    <i class='la la-file-text'></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/geolocalisation ">
    <i class='la la-map-pin'></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-users"></i>
        Formules</b></div>

@endsection
@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>
        Formules</b></div>
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

<form action="{{ route('prospecteurs.store') }}" method="POST">
    @csrf
    
        <div class="form-group col-md-6">
            <label for="type">Type tiers</label>
            <select name="type"  class="custom-select mr-sm-2">
                <option value="prospect">Prospecteur</option>
                <option value="client">Client</option>            
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" value="{{ old('code') }}"  placeholder="Entrer un code">
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="civility">Civilité</label>
            <select name="civlity"  class="custom-select mr-sm-2">
                <option value="Madame">Mme</option>
                <option value="Monsieur">M.</option>            
            </select>
        
        </div>
        <div class="form-group col-md-6 ">
            <label for="nom_prespecteur">Nom du Prespecteur</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Entrer le nom complet">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="adresse_client">Adresse 1</label>
            <input type="text" class="form-control"  id="inputAddress" name="adresse" value="{{ old('adresse') }}"
                placeholder="Enter l'adresse">
        </div>
        <div class="form-group col-md-6">
            <label for="ville">Ville</label>
            <input type="text" class="form-control"  name="ville" value="{{ old('ville') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pays">Pays</label>
            <input type="text" class="form-control"  name="pays" value="{{ old('pays') }}">
        </div>
        <div class="form-group col-md-6 ">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" value="{{ old('province') }}"  >
       </div>
    </div>
    <div class="form-row">
       <div class="form-group col-md-6">
            <label for="tele">Numéro téléphone</label>
            <input type="text" class="form-control" name="tele" value="{{ old('tele') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="mail">Email</label>
            <input type="mail" class="form-control" name="email" value="{{ old('email') }}"
                placeholder="exemple@gmail.com">
        </div>   
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
           <label for="modeRegelement">Mode de régelement</label>
           <select name="modeRegelement"  class="custom-select mr-sm-2">
                <option value="cheque">Chèque</option>
                <option value="espece">Espèce</option> 
                <option value="EFFET">EFFTET</option>              
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="mode_livraison">Mode de livraison</label>
            <select name="modelivraison"  class="custom-select mr-sm-2">
                <option value="Camion_aksam">Camion Aksam</option>
                <option value="Camion_propre">Camion Propre</option>               
            </select>
        </div>
    </div>
     <div class="form-row">
       <div class="form-group col-md-6">
            <label for="familleCl">Famille Client</label>
            <select name="familleCl"  class="custom-select mr-sm-2">
                <option value="cooperative">Coopérative</option>
                <option value="eleveur">Eleveur</option>   
                <option value="revendeur">Revendeur</option>                           
            </select> 
        </div>
        <div class="form-group col-md-6">
        <label for="salleTraite">Salle de Traite</label>
            <select name="salleTraite"  class="custom-select mr-sm-2">
                <option value="oui">Oui</option>
                <option value="non">Non</option>                           
            </select> 
        </div>   
    </div>
    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection