@extends('layouts.app')

@section('title', 'Modifier client - Aksam Labs')

@section('links')
<li class="nav-item ">
    <a href="/commerciaux">
        <i class="la la-user-plus"></i>
        <p>Commerciaux</p>
    </a>
</li>
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

<form action="{{ route('clients.update',$client->id) }}" method="POST"> 
    @csrf
    @method('PUT')

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_client">Nom du Client</label>
            <input type="text" class="form-control" name="name" value ="{{ $client->name }}" placeholder="Enter le nom d'utilisateur">
        </div>
        <div class="form-group col-md-6">
            <label for="code_client">Code</label>
            <input type="text" class="form-control" name="code"  value ="{{ $client->code }}" >
        </div>

    </div>
    <div class="form-row">

   
       
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="province_client">Province</label>
            <input type="text" class="form-control" name="province" value ="{{ $client->province }}">
        </div>
        <div class="form-group col-md-6">
        <label for="adresse_client">Adresse</label>
            <input type="text" class="form-control" name="adresse" value ="{{ $client->adresse }}"
                placeholder="Enter l'adresse">
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
           <label for="ville_client">Ville</label>
           <input type="text" class="form-control" name="ville" value ="{{ $client->ville }}"placeholder="Enter la ville">
        </div>
        <div class="form-group col-md-6">
            <label for="pays_client">Pays</label>
            <input type="text" class="form-control" name="pays" value ="{{ $client->pays }}">
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
        <label for="email_client">Email</label>
          <input type="mail" class="form-control" name="email" value ="{{ $client->email}}">
        </div>
        <div class="form-group col-md-6">
          <label for="numtele_client">Numéro téléphone</label>
           <input type="text" class="form-control" name="tele" value ="{{ $client->tele }}" placeholder="Entrer le numéro du téléphone">
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
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="typeElevage">Type de l'élevage :</label><br>
        <input type="checkbox"    name="typeElevage[]" value="{{('vl')}}"> <label>VL</label><br>
        <input type="checkbox"    name="typeElevage[]" value="{{old('bv')}}"> <label>BV</label><br>
        <input type="checkbox"    name="typeElevage[]" value="{{old('ov')}}"> <label>OV</label><br>
        <input type="checkbox"    name="typeElevage[]" value="{{old('caprin')}}"> <label>Caprin</label><br>
   
</div>
@if(!is_null($client->commercial)) 

<div class="form-group col-md-6">
        <label for="commercial">Commercial</label>
        <select class="custom-select mr-sm-2" name="commercial_id">
            <option selected value="{{ $client->commercial->id }}">{{ $client->commercial->name }}</option>
            @foreach( $commercials as $comm)
            <option value="{{ $comm['id'] }}">{{ $comm['name'] }}</option>
            @endforeach
        </select>
        </select>
    </div>

@else
<div class="form-group col-md-6">
        <label for="commercial">Commercial</label>
        <select class="custom-select mr-sm-2" name="commercial_id">
            <option selected value="">Choisir un commercial..</option>
            @foreach( $commercials as $comm)
            <option value="{{ $comm['id'] }}">{{ $comm['name'] }}</option>
            @endforeach
        </select>
        </select>
    </div>               
@endif

</div>
    
    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection