@extends('layouts.app')

@section('title', 'Ajout Produit Fini - Aksam Labs')

@section('links')

<li class="nav-item ">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/rapport_pf">
        <i class="la la-cart-plus"></i>
        <p>Produits finis</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/rapport_analyse">
        <i class="la la-eyedropper"></i>
        <p>Rapport D'analyse</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
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

<form action="{{ route('pfrapports.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
    <div class="form-group col-md-6">
            <label for="date_reception"> Date de fabrication </label>
            <input type="date" class="form-control" value="{{ old('date_reception') }}" name="date_fabrication">
        </div>
        <div class="form-group col-md-6">
            <label for="produit">Nom de produit</label>
            <select class="custom-select mr-sm-2" name="produit_id">
                <option selected>Choisir un produit ...</option>
                @foreach( $produits as $produit)
                <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="num_ech"> N° d’échantillon </label>
            <input type="text" class="form-control" name="num" value="{{ old('num') }}"
                placeholder="Entrer le num d’échantillon">
        </div>
        <div class="form-group col-md-6">
            <label for="identification">Identification</label>
            <input type="text" class="form-control" name="identification" value="{{ old('identification') }}"
                placeholder="Entrer l'identification">
        </div>
    </div>
    <div class="form-row">
       
        <div class="form-group col-md-6">
            <label for="commentaire">Commentaire</label>
            <select class="custom-select mr-sm-2" name="commentaire">
                <option selected>Choisir ..</option>
                <option value="interne">Interne</option>
                <option value="externe">Externe</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="oonformité">Conformité </label>
            <select class="custom-select mr-sm-2" name="conformite">
                <option value="Conforme">Conforme</option>
                <option value="Non Conforme">Non Conforme</option>
            </select>
        </div>
    </div>
    <div class="form-row">

                    <div  class="form-group col-md-4">
                        <label for="PS">Activité d'eau</label>
                        <input type="text" class="form-control" name="ACE" value="{{ old('ACE') }}"
                            placeholder="Entrer la valeur ">


                    </div>
                    <div class="form-group col-md-4">
                        <label for="PS">Moisissure</label>
                        <input type="text" class="form-control" name="MSR" value="{{ old('MSR') }}"
                            placeholder="Entrer la valeur">


                    </div>
                    <div class="form-group col-md-4">
            <label for="PJ">Piece jointe</label>
            <input type="file" class="form-control-file" name="path" id="path" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Veuillez choisir un fichier valide. La taille ne doit pas
                dépasser 2 Mo.</small>


        </div>
                </div>
  
    <br>
    <div>
        <ul style="margin-left:20px;color: red;" class="nav nav-tabs">
            <li><a href="#a" data-toggle="tab">&nbsp;Analyses</a></li>

        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="a">
                <br>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Nature D'analyse</center>
                                </th>
                                <th>
                                    <center>Unité</center>
                                </th>
                                <th>
                                    <center>Incertitude</center>
                                </th>
                                <th>
                                    <center>Valeur</center>
                                </th>
                                <th>
                                    <center>Méthode</center>
                                </th>
                                
                               
                                <th>
                                    <center>Cible</center>
                                </th>


                                <th>
                                    <center>Prix</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                            @foreach($standards->nutriments as $nutriment)
                            <tr id="rows">

                                <td>
                                    <center>{{ $nutriment->name }}</center>
                                </td>
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('unite') }}
                                    </center>
                                </td>
                                <td>
                                    <center>{{ $nutriment->incertitude }}</center>
                                </td>
                                <td><input name="nutriment_id[]" value="{{ $nutriment->id }}" hidden />
                                    <center><input class='typeD data-analyse-id-brut-{{ $nutriment->id }}'
                                            data-id='{{ $nutriment->id }}' data-count="false" type="text"
                                            data-valeur="{{ $nutriment->cout }}"
                                            name="valeur_surbrute_{{ $nutriment->id }}" /></center>
                                </td>
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                                    </center>
                                </td>
                              
                             
                                <td>
                                    <center>{{ $nutriment->cible }}</center>
                                </td>
                                <td>
                                    <center>{{ $nutriment->cout }}</center>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                
            </div>

        </div>
    </div>
    <br>


    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
    <br>

    </div>
    </div>
    @endsection