@extends('layouts.app')

@section('title', 'Ajout formule - Aksam Labs')

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
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-clipboard"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item  active">
    <a href="/formules">
    <i class="la la-file-text"></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/geolocalisation">
    <i class='la la-map-pin'></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-file-text"></i>
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

<form action="{{ route('formules.store') }}" method="POST">

    @csrf
  
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="date_creation"> Date de creation</label>
            <input type="date" class="form-control" value="{{ old('date_creation') }}" name="date_creation">
        </div>
        <div class="form-group col-md-6">
            <label for="client">Client</label>
            <select class="custom-select mr-sm-2" name="client_id">
                <option selected value="">Choisir un client...</option>
                @foreach( $clients as $client)
                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group col-md-6">
            <label for="ensilage">Ensilage</label>
            <input type="text" class="form-control" name="ensilage" value="{{ old('ensilage') }}"
                placeholder="Entrer un valeur">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="foin">Foin </label>
            <input type="text" class="form-control" name="foin" value="{{ old('foin') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="paille">Paille</label>
            <input type="text" class="form-control" name="paille" value="{{ old('paille') }}"
                placeholder="Entrer un valeur">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fourrage">Fourrage </label>
            <input type="text" class="form-control" name="fourrage" value="{{ old('fourrage') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="aliment">Aliment</label>
            <input type="text" class="form-control" name="aliment" value="{{ old('aliment') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="trxSoja">Trx de soja</label>
            <input type="text" class="form-control" name="trxSoja" value="{{ old('trxSoja') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="coqueSoja">Coque Soja</label>
            <input type="text" class="form-control" name="coqueSoja" value="{{ old('coqueSoja') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cmv">CMV</label>
            <input type="text" class="form-control" name="cmv" value="{{ old('cmv') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="maisbroye">Mais broyé</label>
            <input type="text" class="form-control" name="maisbroye" value="{{ old('maisbroye') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="psb">PSB</label>
            <input type="text" class="form-control" name="psb" value="{{ old('psb') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="bicarbonate">Bicarbonate</label>
            <input type="text" class="form-control" name="bicarbonate" value="{{ old('bicarbonate') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="niveauensilage">Niveau d'ensilage(max permis)</label>
            <input type="text" class="form-control" name="niveauensilage" value="{{ old('niveauensilage') }}">   
        </div>
        <div class="form-group col-md-6">
            <label for="niveauproduction">Niveau de production des hautes productice</label>
            <input type="text" class="form-control" name="niveauproduction" value="{{ old('niveauproduction') }}">
        </div>
    </div>

    <div class="form-row">

        <div  class="form-group col-md-4">
            <label for="autre">Autre</label>
            <input type="text" class="form-control" name="autre" value="{{ old('Autre') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="valeurms">Valeur MS</label>
            <input type="text" class="form-control" name="valeurms" value="{{ old('valeurms') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="formule">Piece jointe</label>
            <input type="file" class="form-control-file" name="path" id="path" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Veuillez choisir un fichier valide. La taille ne doit pas
                dépasser 2 Mo.</small>
        </div>
    </div>
  
    <br>
    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>


@endsection