@extends('layouts.app')

@section('title', 'Ajout navire - Aksam Labs')

@section('links')
<li class="nav-item ">
    <a href="/clients">
        <i class="la la-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/fournisseurs">
        <i class="la la-industry"></i>
        <p>Fournisseurs</p>
    </a>
</li>
<li class="nav-item active ">
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

    <div class="form-group">
        <label for="nom_navire">Nom de navire</label>
        <input type="text" class="form-control" id="nom_navire" placeholder="Enter le nom de navire">
    </div>

    <div class="form-group">
        <label for="ref_navire">Référence</label>
        <input type="text" class="form-control" id="ref_navire" placeholder="Entrer la référence">
    </div>

    <br>

    <div class="card-action">
        <center><button type="submit"  class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection