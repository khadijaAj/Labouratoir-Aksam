@extends('layouts.app')

@section('title', 'Fournisseur - Aksam Labs')

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

   
 <div class="form-row">

<div class="form-group col-md-6">
    <label for="nom_fournisseur">Nom du Fournisseur</label>
    <input type="text" class="form-control" name="name" value="{{ $fournisseur->name }}" disabled  placeholder="Enter le nom du fournisseur">
</div>
<div class="form-group col-md-6">
    <label for="ref_fournisseur">Référence</label>
    <input type="text" class="form-control" name="Reference" value="{{ $fournisseur->Reference }}" disabled  placeholder="Entrer la référence">
</div>

</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="numtele_fournisseur">Numéro téléphone</label>
    <input type="text" class="form-control" name="tele" value="{{ $fournisseur->tele }}" disabled 
        placeholder="Entrer le numéro du téléphone">
</div>
<div class="form-group col-md-6">
    <label for="adresse_fournisseur">Adresse</label>
    <input type="text" class="form-control" name="adresse" value="{{ $fournisseur->adresse }}" disabled  placeholder="Enter l'adresse">
</div>


</div>

<br>



@endsection