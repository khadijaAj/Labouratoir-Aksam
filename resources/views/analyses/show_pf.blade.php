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

<div class="form-row">

    <div class="form-group col-md-6">
        <label for="produit">Nom de produit</label>
        <select class="custom-select mr-sm-2" name="produit_id" disabled>
        <option selected>{{ $pfrapport->produit->name}}</option>
              
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="num_ech"> N° d’échantillon </label>
        <input type="text" class="form-control" name="num" value="{{ $pfrapport->Num}}" placeholder="Entrer le num d’échantillon" disabled>
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="identification">Identification</label>
        <input type="text" class="form-control" name="identification" value="{{ $pfrapport->Identification}}" placeholder="Entrer l'identification" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="commentaire">Commentaire</label>
        <input type="text" class="form-control" name="commentaire" value="{{ $pfrapport->commentaire}}" placeholder="Enter le nom du commentaire" disabled>
    </div>


</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="oonformité">Conformité </label>
        <select class="custom-select mr-sm-2" name="conformite" disabled>
            <option selected>{{ $pfrapport->conformite}}</option>
       
        </select>
    </div>
    <div class="form-group col-md-6">
            <label for="date_reception"> Date de fabrication </label>
            <input type="date" class="form-control" value="{{ $pfrapport->date_fabrication}}" name="date_fabrication" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="PJ">Piece jointe</label>
                    <input type="file" class="form-control-file" name="path" id="path" aria-describedby="fileHelp" disabled>
                    <small id="fileHelp" class="form-text text-muted">Veuillez choisir un fichier valide. La taille ne doit pas dépasser 2 Mo.</small>
                

        </div>
      
</div>

<br>
<div  >
<ul style = "margin-left:20px;color: red;" class="nav nav-tabs">
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
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                                    </center>
                                </td>
                                <input name="nutriment_id[]" value="{{ $nutriment->id }}" hidden />
                                <input name="value_id_{{ $nutriment->id }}"
                                    value="{{ $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('id') }}"
                                    hidden />
                                <td>

                                    <center><input class='typeD data-analyse-id-brut-{{ $nutriment->id }}'
                                            data-id='{{ $nutriment->id }}' data-count="false" type="text"
                                            data-valeur="{{ $nutriment->cout }}"
                                            name="valeur_surbrute_{{ $nutriment->id }}"
                                            value="{{ $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}" disabled />
                                    </center>
                                </td>
                                <td>
                                    <center><input class='typeD data-analyse-id-seche-{{ $nutriment->id }}'
                                            data-id='{{ $nutriment->id }}' data-count="false" type="text"
                                            data-valeur="{{ $nutriment->cout }}"
                                            name="valeur_surseche_{{ $nutriment->id }}"
                                            value="{{ $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche') }}" disabled />
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
                <div class="form-row">

<div  style="margin-left:20px;" class="form-group col-md-6">
        <label for="PS">Activité d'eau</label>
        <input type="text" class="form-control" name="ACE" value="{{ $pfrapport->ACE }}" placeholder="Entrer la valeur du poids" disabled>


    </div>
    <div class="form-group col-md-5">
        <label for="PS">Moisissure</label>
        <input type="text" class="form-control" name="MSR" value="{{ $pfrapport->MSR }}" placeholder="Entrer la valeur du poids" disabled>


    </div>
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
                               <center>{{ $pfrapport->path }}</center>
                           </td>
                           <td>
                               <center>    <a href="{{ asset('public/pj/' . $pfrapport->path . '') }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;</center>
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
@endsection