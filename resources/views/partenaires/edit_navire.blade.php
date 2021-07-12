@extends('layouts.app')

@section('title', 'Modifier navire - Aksam Labs')

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

<form action="{{ route('navires.update',$navire->id) }}" method="POST"> 
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom_navire">Nom de navire</label>
        <input type="text" class="form-control" name="name" value="{{ $navire->name }}"
            placeholder="Enter le nom de navire">
    </div>

    <div class="form-group">
        <label for="ref_navire">Référence</label>
        <input type="text" class="form-control" name="Reference" value="{{ $navire->Reference }}"
            placeholder="Entrer la référence">
    </div>

    <br>

    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
</form>
@endsection