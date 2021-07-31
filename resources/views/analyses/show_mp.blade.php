@extends('layouts.app')

@section('title', 'Visualiser Matiere Premiere - Aksam Labs')

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
<h5 style="float:right;color:black;font-size:10px;padding-left: 20px;"  > Rapport Id : {{ $mprapport->id}}  </h5> 

<div class="card-title" style="color:#F19818;"><b><i class="la la-plus"></i> Produit : </b>{{ $mprapport->produit->name}}

<a id="export-pdf" href="{{ route('mprapports.pdf',$mprapport->id) }}" name="export-pdf"><button
        style="float:right;background-color:#11B247;color:white;"  class="btn ">Imprimer le rapport </button></a></div>

        @endsection

@section('content')


<div class="form-row">

    <div class="form-group col-md-6">
        <label for="PS">Poids Spécifique</label>
        <input type="text" class="form-control" name="PS" value="{{ $mprapport->PS }}"
            placeholder="Entrer la valeur du poids" disabled>

    </div>
    <div class="form-group col-md-6">
        <label for="date_reception"> Date de reception </label>
        <input type="date" class="form-control" name="date_reception" value="{{ $mprapport->date_reception}}" disabled>
    </div>


</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="num_ech"> N° d’échantillon </label>
        <input type="text" class="form-control" name="num" value="{{ $mprapport->Num}}"
            placeholder="Entrer le num d’échantillon" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="num_bon">N° de bon</label>
        <input type="text" class="form-control" name="num_bon" value="{{ $mprapport->Num_bon}}"
            placeholder="Entrer le num de bon" disabled>
    </div>



</div>
@if(!is_null($mprapport->fournisseur)) 
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fournisseur">Fournisseur</label>
        <select class="custom-select mr-sm-2" name="fournissueur_id" disabled>
            <option selected>{{ $mprapport->fournisseur->name}}</option>

        </select>
    </div>
    @else
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="fournisseur">Fournisseur</label>
        <select class="custom-select mr-sm-2" name="fournissueur_id" disabled>
            <option selected>-</option>

        </select>
    </div>
    @endif
    @if(!is_null($mprapport->origine)) 
    <div class="form-group col-md-6">
        <label for="origne">Origine </label>
        <select class="custom-select mr-sm-2" name="origine_id" disabled>
            <option selected>{{ $mprapport->origine->name}}</option>

        </select>
    </div>



</div>
@else
<div class="form-group col-md-6">
        <label for="origne">Origine </label>
        <select class="custom-select mr-sm-2" name="origine_id" disabled>
            <option selected>-</option>

        </select>
    </div>



</div>
@endif
@if(!is_null($mprapport->navire)) 

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="navire">Navire</label>
        <select class="custom-select mr-sm-2" name="navire_id" disabled>
            <option selected>{{ $mprapport->navire->name}}</option>

        </select>
    </div>
@else
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="navire">Navire</label>
        <select class="custom-select mr-sm-2" name="navire_id" disabled>
            <option selected>-</option>

        </select>
    </div>
@endif
    <div class="form-group col-md-6">
        <label for="conformite">Conformité </label>
        <select class="custom-select mr-sm-2" name="conformite" disabled>
            <option selected>{{ $mprapport->conformite}}</option>

        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="commentaire">Commentaire</label>
        <input type="text" class="form-control" name="commentaire" value="{{ $mprapport->commentaire}}"
            placeholder="Entrer le commentaire" disabled>
    </div>
    <div class="form-group col-md-6">
        Certificat : &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
        <input class="form-check-input" type="checkbox" name="certificat" {{  ($mprapport->certificat == '1' ? ' checked' : '') }} disabled />

    </div>
    <div class="form-group col-md-6">
        <label for="PJ">Piece jointe</label>
        <input type="file" class="form-control-file" name="path" id="path" aria-describedby="fileHelp" disabled>
        <small id="fileHelp" class="form-text text-muted">Veuillez choisir un fichier valide. La taille ne doit pas
            dépasser 2 Mo.</small>


    </div>


</div>
<br>

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
                                    data-valeur="{{ $nutriment->cout }}" name="valeur_surbrute_{{ $nutriment->id }}"
                                    value="{{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}"
                                    disabled />
                            </center>
                        </td>
                        <td>
                            <center>
                                {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                            </center>
                        </td>

                        <input name="nutriment_id[]" value="{{ $nutriment->id }}" hidden />
                        <input name="value_id_{{ $nutriment->id }}"
                            value="{{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('id') }} "
                            disabled hidden />


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
                            <center> <a href="{{ asset('public/pj/' . $mprapport->path . '') }}"><i style="color:#000;"
                                        class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>


                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
<br>




</div>
</div>
</form>

@endsection