@extends('layouts.app')

@section('title', 'Ajout Rapport Analyse - Aksam Labs')

@section('links')

<li class="nav-item ">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/rapport_pf">
        <i class="la la-cart-plus"></i>
        <p>Produits finis</p>
    </a>
</li>
<li class="nav-item active ">
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
 
<form action="{{ route('crapports.store') }}" method="POST">
    @csrf


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="num">Num</label>
            <input type="text" class="form-control" name="num" value="{{ old('num') }}" placeholder="Entrer le num">
        </div>

        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de produit</label>
            <select class="custom-select mr-sm-2" name="produit_id">
                <option selected>Choisir un produit ...</option>
                @foreach( $produits as $produit)
                <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                @endforeach
            </select>
        </div>


    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nom_produit">Nom du client</label>
            <select class="custom-select mr-sm-2" name="client_id">
                <option selected>Choisir un client ...</option>
                @foreach( $clients as $client)
                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de Commercial</label>
            <select class="custom-select mr-sm-2" name="commercial_id">
                <option selected value>Choisir un commercial ...</option>
                @foreach( $commerciaux as $commercial)
                <option value="{{ $commercial['id'] }}">{{ $commercial['name'] }}</option>
                @endforeach

            </select>
        </div>

    </div>

    <div class="form-row">


        <div class="form-group col-md-6">
            <label for="date_reception"> Date de reception </label>
            <input type="date" class="form-control" value="{{ old('date_reception') }}" name="date_reception">
        </div>
        <div class="form-group col-md-6">
            <label for="date_analyse"> Date d'analyse</label>
            <input type="date" class="form-control" value="{{ old('date_analyse') }}" name="date_analyse">
        </div>


        <div class="form-group col-md-6">
            <label for="commentaire">Commentaire</label>
            <select class="custom-select mr-sm-2"  name="commentaire">
                <option selected>Choisir ..</option>
                <option value="intern">Intern</option>
                <option value="extern">Extern</option>
            </select>     </div>
        <div class="form-group col-md-6">
            <label for="commentaire">Cout</label>
            <input type="text" class="form-control" name="Cout" id="cout_total"  placeholder="le cout total" >
        </div>

    </div>
    <br>

    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-toggle="tab">Analyses</a>
            </li>


        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <br>

                <div class="table-responsive">
                    <br>
                    <table id="maintable" class="table table-bordered">
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
                                    <center>Méthode</center>
                                </th>
                                <th>
                                    <center>Sur brute</center>
                                </th>
                                <th>
                                    <center>Sur séche</center>
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
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                                    </center>
                                </td>
                                <td><input name="nutriment_id[]" value="{{ $nutriment->id }}" hidden />
                                    <center><input class='typeD data-analyse-id-brut-{{ $nutriment->id }}' data-id='{{ $nutriment->id }}' data-count="false" type="text" data-valeur="{{ $nutriment->cout }}" name="valeur_surbrute_{{ $nutriment->id }}" /></center>
                                </td>
                                <td>
                                    <center><input class='typeD data-analyse-id-seche-{{ $nutriment->id }}' data-id='{{ $nutriment->id }}' data-count="false" type="text" data-valeur="{{ $nutriment->cout }}" name="valeur_surseche_{{ $nutriment->id }}" /></center>
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
            <div class="tab-pane fade" id="profile">
                Emptyy
            </div>
            <br>
            <div class="card-action">
                <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
            </div>


        </div>
    </div>
</form>

@endsection