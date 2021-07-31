@extends('layouts.app')

@section('title', 'Ajout client - Aksam Labs')

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


    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_client">Nom du Client</label>
            <input type="text" class="form-control" name="name"  value="{{ $client->name }}" placeholder="Enter le nom d'utilisateur" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="ref_client">Référence</label>
            <input type="text" class="form-control" name="Reference" value="{{ $client->Reference }}" placeholder="Entrer la référence" disabled>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="adresse_client">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="{{ $client->adresse }}"
                placeholder="Enter l'adresse" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="numtele_client">Numéro téléphone</label>
            <input type="text" class="form-control" name="tele" value="{{ $client->tele }}"
                placeholder="Entrer le numéro du téléphone"disabled>
        </div>

    </div>
    <div class="form-row">
    @if(!is_null($client->commercial)) 

<div class="form-group col-md-6">
    <label for="date_reception"> Commercial</label>
    <input type="text" class="form-control" name="commercial" value="{{ $client->commercial->name }}" disabled>
</div>
   
    @else
    <div class="form-group col-md-6">
<label for="date_reception"> Commercial</label>
<input type="text" class="form-control" name="commercial" value="-" disabled>
</div>               
    @endif
        <div class="form-group col-md-6">
            <label for="region_client">Région</label>
            <input type="text" class="form-control" name="Region" value="{{ $client->Region }}"
                placeholder="Entrer la région" disabled>
        </div>

       
    </div>
    <br>


@endsection