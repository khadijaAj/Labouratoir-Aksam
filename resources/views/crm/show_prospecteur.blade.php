@extends('layouts.app')

@section('title', 'showprospecteur- Aksam Labs')

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
<li class="nav-item  active">
    <a href="/add_formule">
    <i class='fas fa-map-marked-alt'></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/geolocalisation">
    <i class='fas fa-map-marked-alt'></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b>
        Informations de prospecteur</b></div>
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
            <label for="type">Type tiers</label>
            <input type="text" class="form-control" name="code" value="{{$prospecteur->type}}"  disabled placeholder="vide" >
           
        </div>
        <div class="form-group col-md-6">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" value="{{$prospecteur->code}}"  disabled placeholder="vide">
        </div>
</div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="civility">Civilité</label>
            <input type="text" class="form-control" name="civility" value="{{$prospecteur->civility}}" disabled placeholder="vide" >
           
        </div>
        <div class="form-group col-md-6 ">
            <label for="nom_prespecteur">Nom du Prespecteur</label>
            <input type="text" class="form-control" name="name" value="{{ $prospecteur->name }}"  disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="adresse_client">Adresse 1</label>
            <input type="text" class="form-control"   name="adresse" value="{{ $prospecteur->adresse }}"
                placeholder="vide" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="ville">Ville</label>
            <input type="text" class="form-control"  name="ville" value="{{ $prospecteur->ville}}" placeholder="vide"> 
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pays">Pays</label>
            <input type="text" class="form-control"  name="pays" value="{{ $prospecteur->pays }}" placeholder="vide" disabled>
        </div>
        <div class="form-group col-md-6 ">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" value="{{ $prospecteur->province }}" placeholder="vide" disabled >
       </div>
    </div>
    <div class="form-row">
       <div class="form-group col-md-6">
            <label for="tele">Numéro téléphone</label>
            <input type="number" class="form-control" name="tele" value="{{$prospecteur->tele}}" placeholder="vide" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="mail">Email</label>
            <input type="mail" class="form-control" name="email" value="{{$prospecteur->email}}" placeholder="vide" disabled>
        </div>   
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
           <label for="modeRegelement">Mode de régelement</label>
           <input type="text" class="form-control" name="modeRegelement" value="{{$prospecteur->modeRegelement}}"  placeholder="aucun selectionner" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="mode_livraison">Mode de livraison</label>
            <input type="text" class="form-control" name="modelivraison" value="{{$prospecteur->modelivraison}}"  placeholder="Entre le mode de livraison" disabled>
            
        </div>
    </div>
     <div class="form-row">
       <div class="form-group col-md-6">
            <label for="familleCl">Famille Client</label>
            <input type="text" class="form-control" name="familleCl" value="{{$prospecteur->familleCl}}"  placeholder="vide" disabled>
        </div>
        <div class="form-group col-md-6">
        <label for="salleTraite">Salle de Traite</label>
        <input type="text" class="form-control" name="salleTraite" value="{{$prospecteur->salleTraite}}"  placeholder="vide" disabled>
        </div>   
    </div>
</form>
@endsection