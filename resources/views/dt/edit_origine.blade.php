@extends('layouts.app')

@section('title', 'Modifier Origine - Aksam Labs')

@section('links')

<li class="nav-item ">
    <a href="/produits">
        <i class="la la-dropbox"></i>
        <p>Produits</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/nutriments">
        <i class="la la-yelp"></i>
        <p>Nutriments</p>
    </a>
</li>
<li class="nav-item active">
    <a href="/origines">
        <i class="la la-server"></i>
        <p>Origines</p>
    </a>
</li>
<li class="nav-item">
    <a href="/categories">
        <i class="la la-sliders"></i>
        <p>Catégories</p>
    </a>
</li>

@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i>Formulaire</b></div>
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

<form action="{{ route('origines.update',$origine->id) }}" method="POST">
    @csrf
    @method('PUT')



    <div class="form-group">
        <label for="nom_origine">Nom d'origine</label>
        <input type="text" class="form-control" name="name" value="{{ $origine->name }}"
            placeholder="Enter le nom d'origine">
    </div>

    <div class="form-group">
        <label for="ref_origine">Référence</label>
        <input type="text" class="form-control" name="Reference" value="{{ $origine->Reference }}"
            placeholder="Entrer la référence">
    </div>

    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection