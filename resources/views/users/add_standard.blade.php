@extends('layouts.app')

@section('title', 'Ajout utilisateur - Aksam Labs')

@section('links')
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
<form action="{{ route('Standardstype.store') }}" method="POST">
@csrf

<input name="id" value="{{ $sd_id }}" hidden/>
<div class="form-group">
            <label for="commercial">Nom du nutriment </label>
            <select class="custom-select mr-sm-2" name="nutriment_id">
                <option selected>Choisir un nutriment ...</option>
                @foreach( $nutriments as $nutriment)
                <option value="{{ $nutriment['id'] }}">{{ $nutriment['name'] }}</option>
                @endforeach
            </select>
            </select>
        </div>
    <div class="form-group">
        <label for="methode">Methode</label>
        <input type="text" class="form-control" name="methode" value="{{ old('methode') }}" placeholder="Enter la méthode ">
    </div>
    <div class="form-group">
        <label for="equation">Equation ( Type = CORN SILAGE )</label>
        <input type="text" class="form-control" name="equation" placeholder="Entrer l'equation">
    </div>
    <div class="form-group">
        <label for="equation1">Equation ( Type = SMALL GRAIN SILAGE )</label>
        <input type="text" class="form-control" name="equation1" placeholder="Entrer l'equation">
    </div>
    <div class="form-group">
        <label for="xml_equivalent">Element Equivalent ( XML ) </label>
        <input type="text" class="form-control" name="xml_equivalent" placeholder="Entrer l'element equivalent ">
    </div>
    <div class="form-group">
        <label for="unite">Unite</label>
        <input type="text" class="form-control" name="unite" placeholder="Entrer l'unite'">
    </div>
   

    <div class="card-action">
        <center><button type="submit"  class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection