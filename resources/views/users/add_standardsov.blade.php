@extends('layouts.app')

@section('title', ' ajout standrdsov - Aksam Labs')

@section('links')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<li class="nav-item ">
    <a href="/users">
        <i class="la la-users"></i>
        <p>Utilisateurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/logs">
        <i class="la la-save"></i>
        <p>Journalisation</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/standards">
        <i class="la la-key"></i>
        <p>Standards Rapports</p>
    </a>
</li>

@endsection
@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>
        Ajoute un critère</b></div>
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
<form action="{{ route('standardsov.store')}}" method="POST">
    @csrf

    <div class="form-group row">
        <label for="libelle" class="col-sm-2 col-form-label">Libellé</label>
        <input type="text" class="form-control" name="libelle"  value="{{ old('libelle')}}" id="libelle" autocomplete="off"/>
    </div> 
    <div class="form-group row"> 
    <label for="valeur" class="col-sm-2 col-form-label">Valeur</label>
    <input list="browsers" class="form-control" name="valeur" autocomplete="off"/>
    <datalist id="browsers">
  
         <option value="Traitement">
         <option value="Vaccin">
         <option value="Respect">
         <option value="Non respect">
         <option value="Fait">
         <option value="N'est pas fait">
         <option value="Alaite">
         <option value="Fletshing">
         <option value="Raisonée">
         <option value="Stiming"> 
         <option   value="Oui">
         <option   value="Non">
        <option value="20-25%">
        <option value="25-30%">
        <option value="<25%">
        <option value="<20%">
        <option value=">30%"> 
                                              
    </datalist>
</div>
   <br>
    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>


@endsection