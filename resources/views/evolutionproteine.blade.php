@extends('layouts.app')

@section('title', 'Diagramme Ensilage - Aksam Labs')

@section('links')
<li class="nav-item active">
    <a href="/home">
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
@section('Page_infos')
<div class="card-title"><b><i class="la la-random"></i>
        Evolution Proteine</b></div>
@endsection

@section('content')
<div>


    <form>
        <div class="form-row align-items-center" style="float:right;">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="produit">
                    <option selected>Choisir un produit ...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="client">
                    <option selected>Choisir un client ...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </div>
            <div class="col-auto my-1">
                <button type="submit" style="border-radius: 20px ;background-color:#3A9341;" class="btn mb-2"><a
                        style="color: #ffffff; text-decoration: none; " href="#">Chercher</a></button>
            </div>


        </div>

    </form>
    <br>
    <br<br><br><br>

</div>

@endsection