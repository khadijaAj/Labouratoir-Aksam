@extends('layouts.app')

@section('title', 'Ajout Matiere Premiere - Aksam Labs')

@section('links')
<li class="nav-item active">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item ">
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
<div class="card-title"><b><i class="la la-plus"></i> Formulaire</b></div>
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

<form action="{{ route('mprapports.update',$mprapport->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de produit</label>
            <select class="custom-select mr-sm-2" name="produit_id">
                <option selected value="{{ $mprapport->produit->id}}">{{ $mprapport->produit->name}}</option>
                @foreach( $produits as $produit)
                <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="date_reception"> Date de reception </label>
            <input type="date" class="form-control" name="date_reception" value="{{ $mprapport->date_reception }}">
        </div>


    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="num_ech"> N° d’échantillon </label>
            <input type="text" class="form-control" name="num" value="{{ $mprapport->Num }}"
                placeholder="Entrer le num d’échantillon">
        </div>
        <div class="form-group col-md-6">
            <label for="num_bon">N° de bon</label>
            <input type="text" class="form-control" name="num_bon" value="{{ $mprapport->Num_bon }}"
                placeholder="Entrer le num de bon">
        </div>



    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fournisseur">Fournisseur</label>
            <select class="custom-select mr-sm-2" name="fournisseur_id">
            @if(!is_null($mprapport->fournisseur))     
            <option selected value="{{ $mprapport->fournisseur->id}}">{{ $mprapport->fournisseur->name}}</option>
            @else 
            <option selected value=""></option>

            @endif
            @foreach( $fournisseurs as $fournisseur)
                <option value="{{ $fournisseur['id'] }}">{{ $fournisseur['name'] }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group col-md-6">
            <label for="origne">Origine </label>
            <select class="custom-select mr-sm-2" name="origine_id">
                @if(!is_null($mprapport->origine))     
                <option selected value="{{ $mprapport->origine->id}}">{{ $mprapport->origine->name}}</option>
                @else 
                <option selected value=""></option>

                @endif
                @foreach( $origines as $origine)
                <option value="{{ $origine['id'] }}">{{ $origine['name'] }}</option>
                @endforeach
            </select>
        </div>



    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="navire">Navire</label>
            <select class="custom-select mr-sm-2" name="navire_id">
               @if(!is_null($mprapport->navire))     
                <option selected value="{{ $mprapport->navire->id}}">{{ $mprapport->navire->name}}</option>
                @else 
                <option selected value=""></option>

                @endif
                @foreach( $navires as $navire)
                <option value="{{ $navire['id'] }}">{{ $navire['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="PS">Poids Spécifique</label>
            <input type="text" class="form-control" name="PS" value="{{ $mprapport->PS }}"
                placeholder="Entrer la valeur du poids">


        </div>
        <div class="form-group col-md-6">
            <label for="conformite">Conformité </label>
            <select class="custom-select mr-sm-2" name="conformite">
                <option selected value="{{ $mprapport->conformite}}">{{ $mprapport->conformite}}</option>
                <option value="Conforme">Conforme</option>
                <option value="Non Conforme">Non Conforme</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="commentaire">Commentaire</label>
            <select class="custom-select mr-sm-2" name="commentaire">
                <option selected value="{{ $mprapport->commentaire}}">{{ $mprapport->commentaire}}</option>
                <option value="interne">Intern</option>
                <option value="externe">Extern</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            Certificat : &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            <input class="form-check-input" type="checkbox" name="certificat" {{  ($mprapport->certificat == '1' ? ' checked' : '') }}  />

        </div>
        <div class="form-group col-md-6">
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
            <li><a href="#b" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;Ressources</a></li>

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




                            </tr>
                        </thead>
                        <tbody>
                            @inject('value','App\Value') {{-- inject before foreach --}}
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

                                    <center><input class='typeD data-analyse-id-brut-{{ $nutriment->id }}'
                                            data-id='{{ $nutriment->id }}' data-count="false" type="text"
                                            data-valeur="{{ $nutriment->cout }}"
                                            name="valeur_surbrute_{{ $nutriment->id }}"
                                            value="{{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}" />
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                                    </center>
                                </td>
                                <input name="nutriment_id[]" value="{{ $nutriment->id }}" hidden />
                                <input name="value_id_{{ $nutriment->id }}"
                                    value="{{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('id') }}"
                                    hidden />


                                <td>
                                    <center>{{ $nutriment->cible }}</center>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane" id="b">
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Nom du piece jointe</center>
                                </th>
                                <th>
                                    <center>Actions</center>
                                </th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr id="rows">

                                <td>
                                    <center>{{ $mprapport->path }}</center>
                                </td>
                                <td>
                                    <center> <a href="{{ asset('public/pj/' . $mprapport->path . '') }}"><i
                                                style="color:#000;" class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </center>
                                </td>


                            </tr>

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
</form>
@endsection