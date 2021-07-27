@extends('layouts.app')

@section('title', 'Ajout utilisateur - Aksam Labs')

@section('links')
<li class="nav-item active">
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
<li class="nav-item ">
    <a href="/standards">
        <i class="la la-key"></i>
        <p>Standards Rapports</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>
        Formulaire</b></div>
@endsection

@section('content')
<div>
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
   
</div>
<form action="{{ route('users.store') }}" method="POST">
@csrf
    <div class="form-group">
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter le nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="email">Adresse électronique</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter l'Email ">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Entrer le mot de passe">
    </div>
    <div class="form-group">
        <label for="ref">Référence</label>
        <input type="text" class="form-control" name="Reference"  value="{{ old('Reference') }}" placeholder="Entrer la référence">
    </div>


    <div class="form-check">
        <label>Type </label></br>
        <center>
            <label class="form-radio-label">
                <input class="form-radio-input" type="radio" name="type" value="Admin" checked="">
                <span class="form-radio-sign">Administrateur</span>
            </label>
            <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="type" value="User">
                <span class="form-radio-sign">Utilisateur</span>
            </label>

        </center>
    </div>

    <div class="card-action">
        <center><button type="submit"  class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection