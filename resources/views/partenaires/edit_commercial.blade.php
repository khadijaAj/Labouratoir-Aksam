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

<form action="{{ route('commercials.update',$commercial->id) }}" method="POST"> 
    @csrf
    @method('PUT')
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_commercial">Nom du commercial</label>
            <input type="text" class="form-control" name="name" value ="{{ $commercial->name }}" placeholder="Enter le nom d'utilisateur">
        </div>
        <div class="form-group col-md-6">
            <label for="ref_commercial">Référence</label>
            <input type="text" class="form-control" name="Reference"  value ="{{ $commercial->Reference }}" placeholder="Entrer la référence">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="adresse_commercial">Adresse</label>
            <input type="text" class="form-control" name="adresse" value ="{{ $commercial->adresse }}" placeholder="Enter l'adresse">
        </div>
        <div class="form-group col-md-6">
            <label for="numtele_commercial">Numéro téléphone</label>
            <input type="text" class="form-control" name="tele" value ="{{ $commercial->tele }}" placeholder="Entrer le numéro du téléphone">
        </div>

    </div>
    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection