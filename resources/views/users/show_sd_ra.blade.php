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
<form action="" method="POST">
@csrf

<input name="id" value="" hidden/>
<div class="form-group">
            <label for="commercial">id1 {{ $id }}  id2{{ $id2 }}</label>
           
            
        </div>
    <div class="form-group">
        <label for="methode">Methode</label>
        <input type="text" class="form-control" name="methode" value="{{ old('methode') }}" placeholder="Enter l'Email ">
    </div>
    <div class="form-group">
        <label for="equation">Equation</label>
        <input type="text" class="form-control" name="equation" placeholder="Entrer l'equation">
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