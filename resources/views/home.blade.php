@extends('layouts.app')

@section('title', 'Tableau de bord - Aksam Labs')

@section('links')
<li class="nav-item active">
    <a href="/evolution_proteine">
        <i class="la la-random"></i>
        <p>Evolution Proteine</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/diagramme_ensilage">
        <i class="la la-object-group"></i>
        <p>Diagramme Ensilage</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/formulaire_arp">
        <i class="la la-keyboard-o"></i>
        <p>Formulaire Arp</p>
    </a>
</li>

@endsection

@section('Name', 'Dashboard - Aksam Labs')