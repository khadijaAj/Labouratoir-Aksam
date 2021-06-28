@extends('layouts.app')

@section('title', 'Formulaire Arp - Aksam Labs')

@section('links')
<li class="nav-item">
    <a href="/evolution_proteine">
        <i class="la la-random"></i>
        <p>Evolution Proteine</p>
    </a>
</li>
<li class="nav-item active">
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

@section('Page_infos')
<div class="card-title"><b><i class="la la-object-group"></i>
        Diagramme Ensilage</b></div>
@endsection