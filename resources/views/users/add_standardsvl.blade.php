@extends('layouts.app')

@section('title', ' ajout standrdsvl - Aksam Labs')

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
<form action="{{ route('standardsvl.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" class="form-control" name="libelle"  value="{{ old('libelle')}}"  autocomplete="off"/>
    </div>
    <div class="form-group">
        <label for="valeur">Valeur</label>
        <input type="text" list="browsersvl" class="form-control" name="valeur"   value="{{old('valeur') }} "  autocomplete="off"/>
        <datalist  id="browsersvl">
            <option value="Respect">
            <option value="Non respect">
            <option value="Présence">
            <option value="Absence">
            <option value="Faible">
            <option value="Moyenne">
           <option value="Elevée">
           <option   value="Oui">
           <option   value="Non">
           <option value="20-25%">
           <option value="25-30%">
           <option value="<25%">
          <option value="<20%">
           <option value=">30%"> 
        </datalist>
    </div>
   

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>


@endsection