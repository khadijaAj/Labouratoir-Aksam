@extends('layouts.app')

@section('title', 'Afficher utilisateur - Aksam Labs')

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
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>
        Formulaire</b></div>
@endsection

@section('content')


    <div class="form-group">
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter le nom d'utilisateur" disabled>
    </div>
    <div class="form-group">
        <label for="email">Adresse électronique</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter l'Email " disabled>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password"  placeholder="Entrer le mot de passe" disabled>
    </div>
    <div class="form-group">
        <label for="ref">Référence</label>
        <input type="text" class="form-control" name="Reference"  value="{{ $user->Reference }}" placeholder="Entrer la référence" disabled>
    </div>

  
    <div class="form-check">
        <label>Type </label></br>
     
        @if($user->type == "Admin")
        <center>
            <label class="form-radio-label">
                <input class="form-radio-input" type="radio" name="type" value="Admin" checked=""  disabled>
                <span class="form-radio-sign">Administrateur</span>
            </label>
            <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="type" value="User" disabled>
                <span class="form-radio-sign">Utilisateur</span>
            </label>

        </center>
        @else
        <center>
            <label class="form-radio-label">
                <input class="form-radio-input" type="radio" name="type" value="Admin"  disabled>
                <span class="form-radio-sign">Administrateur</span>
            </label>
            <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="type" value="User" checked="" disabled>
                <span class="form-radio-sign">Utilisateur</span>
            </label>

        </center>
        @endif
    </div>

    <div class="card-action">
        <center><button type="submit"  class="btn btn-success">Enregistrer</button></center>
    </div>
@endsection