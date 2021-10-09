@extends('layouts.app')

@section('title', 'Modifier client - Aksam Labs')

@section('links')
<li class="nav-item ">
    <a href="/commerciaux">
        <i class="la la-user-plus"></i>
        <p>Commerciaux</p>
    </a>
</li>
<li class="nav-item active">
    <a href="/clients">
        <i class="la la-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/fournisseurs">
        <i class="la la-industry"></i>
        <p>Fournisseurs</p>
    </a>
</li>
<li class="nav-item  ">
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

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="nom_client">Nom du Client</label>
            <input type="text" class="form-control" name="name" value ="{{ $client->name }}" placeholder="Enter le nom d'utilisateur" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="code_client">Code</label>
            <input type="text" class="form-control" name="code"  value ="{{ $client->code }}" disabled >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="province_client">Province</label>
            <input type="text" class="form-control" name="province" value ="{{ $client->province }}" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="adresse_client">Adresse</label>
            <input type="text" class="form-control" name="adresse" value ="{{ $client->adresse }}"
                placeholder="Enter l'adresse"  disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
           <label for="ville_client">Ville</label>
           <input type="text" class="form-control" name="ville" value ="{{ $client->ville }}"placeholder="Enter la ville" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="pays_client">Pays</label>
            <input type="text" class="form-control" name="pays" value ="{{ $client->pays }}" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email_client">Email</label>
          <input type="mail" class="form-control" name="email" value ="{{ $client->email}}" disabled>
        </div>
        <div class="form-group col-md-6">
          <label for="numtele_client">Numéro téléphone</label>
           <input type="text" class="form-control" name="tele" value ="{{ $client->tele }}" placeholder="Entrer le numéro du téléphone" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
           <label for="modeRegelement">Mode de régelement</label>
           <input type="text" class="form-control" name="modeRegelement" value ="{{ $client->modeRegelement}}" placeholder="vide" disabled>             
        </div>
        <div class="form-group col-md-6">
            <label for="mode_livraison">Mode de livraison</label>
            <input type="text" class="form-control" name="modelivraison" value ="{{ $client->modelivraison }}" placeholder="vide" disabled>
        </div>
    </div>
    <div class="form-row">
       <div class="form-group col-md-6">
            <label for="familleCl">Famille Client</label>
            <input type="text" class="form-control" name="familleCl" value ="{{ $client->familleCl }}" placeholder="vide" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="salleTraite">Salle de Traite</label>
            <input type="text" class="form-control" name="salleTraite" value ="{{ $client->salleTraite }}" placeholder="vide" disabled>
        </div>   
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="typeElevage">Type de l'élevage :</label><br>
            <input type="text" class="form-control" name="typeElevage" value ="{{ $client->typeElevage }}" placeholder="vide" disabled>
        </div>
@if ($client->commercial()->exists())                  
    <div class="form-group col-md-6">
        <label for="commercial">Commercial</label>
        <input type="text" class="form-control" name="commercial_id" value =" {{ $client->commercial->name }}" placeholder="vide" disabled>
    </div>
@else
    <div class="form-group col-md-6">
        <label for="commercial">Commercial</label>
        <input type="text" class="form-control" name="commercial_id" value ="" placeholder="vide" disabled>
    </div>
@endif
</div>
    <br>
    <br>
</form>
<hr style=" border: 1px solid green;border-radius: 2px; width:100%;"> 
<!---suivi client-->

<nav class="navbar navbar-light"  style="margin-left :30%;text-align:center;">

  <form class="form-inline">
    <input type="button" class="btn btn-outline-success"      id="analyse"       onclick="annalyseTable()" value="Rapports annalyses">
    <input   type="button" class="btn btn-outline-success"    id="formule"     onclick="formuleTable()" value="Demande de Formules">
    <input   type="button" class="btn btn-outline-success"   id="commande"    onclick="commandeTable()" value="Commandes">
    <input  type="button" class="btn btn-outline-success"    id="visite"       onclick="visiteTable()" value="Rapport de visite">
  </form>
</nav>
<hr> 

<!---rapport d'annalyse-->
<span id="Annalyse" hidden >
<di id="annalysetable"   >
@foreach($client->crapports as $crapport)
<div class="table-responsive">
    <table class="table table-bordered "   style="width:100%" >
        <thead style="background-color:#FAFAFA;">
        <tr>
            <th>
                <center>N° Ech</center>
            </th>
            
            <th>
                <center>Date de reception</center>
            </th>
            <th>
                <center>Date d'analyse</center>
            </th>
            <th>
                <center>Produit</center>
            </th>
            <th>
                <center>Cout</center>
            </th>

            <th>
                <center>Operations</center>
            </th>

        </tr>
    </thead>
    <tbody>
     @if ($crapport->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
           <tr>
            
            <td>
                <center>{{ $crapport->Num}}</center>
            </td>
            <td>
                <center>{{ $crapport->date_reception }}</center>
            </td>
            <td>
                <center>{{ $crapport->date_analyse }}</center>
            </td>
            <td>{{ $crapport->produit->name  }}</td>
            <td>
                <center>{{ $crapport->Cout  }}</center>
            </td>

            <td>
                <center>
                    <form action="{{ route('crapports.destroy',$crapport->id) }}" method="POST">


                        <a href="{{ route('crapports.show',$crapport->id) }}"><i style="color:#000;"
                                class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a href="{{ route('crapports.edit',$crapport->id) }}"><i style="color:#3EB805;"
                                class="la la-edit"></i></a>

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                class="la la-trash-o"></i></button>
                    </form>
                </center>
            </td>
        </tr>
    </tbody>
</table>

<br>
<hr>
</div>
@endforeach
</div>
</span>

<!--table formules-->

<span id="Formule" hidden >
<div  id="formuletable" >
@foreach($client->formule as $formule)
<div class="table-responsive">
    <table class="table "  width="100%" cellspacing="0" >
        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center>Date creation</center>
                </th>
               
                <th>
                    <center>Ensilage</center>
                </th>
                <th>
                    <center>Foin</center>
                </th>
                <th>
                    <center>Paille</center>
                </th>
                <th>
                    <center>Fourrage</center>
                </th>
                <th>
                    <center>Aliment</center>
                </th>
                <th>
                    <center>Trx soja</center>
                </th>
                <th>
                    <center>Coque Soja</center>
                </th>
                <th>
                    <center>CMV</center>
                </th>
                <th>
                    <center>Mais broyé</center>
                </th>
                <th>
                    <center>PSB</center>
                </th>
                <th>
                    <center>Bicarbonate</center>
                </th>
                <th>
                    <center>Niveau Ensilage</center>
                </th>
                <th>
                    <center>Niveau Production</center>
                </th>
                <th>
                    <center>Autre</center>
                </th>
                <th>
                    <center>Valeur MS</center>
                </th>
                <th>
                    <center>Action</center>
                </th>

            </tr>
        </thead>
        <tbody>
         @if ($formule->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
            <tr>
                <td>
                    <center>{{ $formule->date_creation}}</center>
                </td>

                <td>
                    <center>{{ $formule->ensilage}}</center>
                </td>

                <td>
                    <center>{{ $formule->foin}}</center>
                </td>

                <td>
                    <center>{{ $formule->paille}}</center>
                </td>
                <td>
                    <center>{{ $formule->fourrage}}</center>
                </td>
                <td>
                    <center>{{ $formule->aliment}}</center>
                </td>

                <td>
                    <center>{{ $formule->trxSoja}}</center>
                </td>

                <td>
                    <center>{{ $formule->coqueSoja}}</center>
                </td>
                <td>
                    <center>{{ $formule->cmv}}</center>
                </td>
                <td>
                    <center>{{ $formule->maisbroye}}</center>
                </td>

                <td>
                    <center>{{ $formule->psb}}</center>
                </td>
                <td>
                    <center>{{ $formule->bicarbonate}}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauensilage }}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauproduction }}</center>
                </td>
                <td>
                    <center>{{ $formule->autre}}</center>
                </td>

                <td>
                    <center>{{ $formule->valeurms}}</center>
                </td>
                <td>
                    <center>
                    <form action="{{ route('formules.destory',$formule->id)}}" method="POST">
                        <a href="{{ route('formules.show',$formule->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('formules.edit',$formule->id) }}"><i style="color:#3EB805;"
                                    class="la la-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                    class="la la-trash-o"></i></button>
                        </form>
                    </center>
                       
                </td>
            </tr>
        </tbody>
     </table>
     <br><hr>
</div>
@endforeach
</div>
</span>   


<!--table Commandes-->

<span id="Commande" hidden >
<div id="commandetable">
@php $i=1 @endphp
@foreach($client->commande as $commande)
<p style="margin-left:90%;">Commande N° {{$i}}</p> 
<hr style=" border: 1px solid;border-radius: 2px; width:100%;"> 

<div class="table-responsive">

    <table class="table" style="width:100%"  >
        <thead style="background-color:#FAFAFA;">
            <tr>
                <th> 
                    <center>Réference</center>
                </th>
                <th>
                    <center>Date de Commande</center>
                </th>
                <th>
                    <center>Total</center>
                </th>
                <th>
                    <center>Condition de réglement</center></th>
               <th>
                    <center>Actions</center>
                </th>
            </tr>
        </thead>
        <tbody>
        @if ($commande->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
             <!-- Initialisation du total général à 0 -->
    @php $prixtotal = 0 @endphp
    @php $subtotal=0 @endphp
    @php $ttc=0 @endphp
    @php $grandprix=0 @endphp
    <!-- On parcourt les produits du panier en session : session('basket') -->
    @foreach($commande->detailscommande as  $item)
    
    <!-- On incrémente le total général par le total de chaque produit du panier -->
    @php $prixtotal += ($item->quantity) * ($item->produit->prixu) @endphp<!--prix total sans tva pour chaque produit-->
    @php $subtotal += $prixtotal @endphp
    @php $ttc +=  $prixtotal*$item->produit->taxe @endphp
    @php $grandprix =$ttc +$subtotal @endphp
    @endforeach
            <tr>
                <td>
                    <center>{{$commande->reference }}</center>
                </td>
                <td>
                    <center>{{ $commande->date}}</center>
                </td>
                <td>
                    <center> {{$grandprix}} </center>
                </td>
                <td>
                    <center>{{$commande->conditionReglement }} jours</center>
                </td>
                <td>
                    <center>
                        <form action="{{ route('commandes.destroy',$commande->id) }}" method="POST">
                        <a href="{{ route('commandes.show',$commande->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('commandes.edit',$commande->id) }}"><i style="color:#3EB805;"
                                    class="la la-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                    class="la la-trash-o"></i></button>
                       </form>
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
<hr><br>
</div>
@php $i++ @endphp 
@endforeach
</div>
</span>

<!--table Visites-->
<span id="Visite" hidden>
<div id="visitetable">
@foreach($client->vrapport as $vrapport)
<div class="table-responsive">
<table class="table " width="100%" >
        <thead style="background-color:#FAFAFA;">
            <tr>
                
                <th>
                    <center>Date debut</center>
                </th>
                <th>
                    <center>Date Fin</center>
                </th>
                <th>
                    <center>Type de visite</center>
                </th>
                <th>
                    <center>Observation</center>
                </th>
                <th>
                    <center>Action</center>
                </th>
            </tr>
        </thead>
        <tbody>
        @if ($vrapport->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
            <tr>
                
                <td>
                    <center>{{ $vrapport->date_debut }}</center>
                </td>
                <td>
                    <center>{{ $vrapport->date_fin }}</center>
                </td>
                <td>
                    <center>{{ $vrapport->typevisite}}</center>
                </td>

                <td>
                    <center>{{ $vrapport->observation}}</center>
                </td>

                <td>

                    <center>
                    <form action="{{ route('vrapports.destory',$vrapport->id)}}" method="POST">
                    <a href="{{ route('vrapports.show',$vrapport->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('vrapports.edit',$vrapport->id) }}"><i style="color:#3EB805;"
                                    class="la la-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                    class="la la-trash-o"></i></button>
            
                   </form>
                    </center>
                       
                </td>
            </tr>
        </tbody>
    </table>
    <hr></br>

</div>
@endforeach
</div>
</span>
@endsection
<script>

function commandeTable(){
    document.getElementById("Commande").hidden=false;
    document.getElementById("commandetable").hidden=false; 
    document.getElementById("annalysetable").hidden=true;
    document.getElementById("formuletable").hidden=true;
    document.getElementById("visitetable").hidden=true;  
/*
  $("#commandetable").show();
  $("#formuletable").hide();
  $("#visitetable").hide();
  $("#annalysetable").hide(); */ 

}
function formuleTable(){
  
  document.getElementById("Formule").hidden=false;
   document.getElementById("commandetable").hidden=true; 
    document.getElementById("annalysetable").hidden=true;
    document.getElementById("formuletable").hidden=false;
    document.getElementById("visitetable").hidden=true;   

}
function annalyseTable(){
  
    document.getElementById("Annalyse").hidden=false; 
    document.getElementById("commandetable").hidden=true; 
    document.getElementById("annalysetable").hidden=false;
    document.getElementById("formuletable").hidden=true;
    document.getElementById("visitetable").hidden=true;   

}
function visiteTable(){
  
    document.getElementById("Visite").hidden=false;  
    document.getElementById("commandetable").hidden=true; 
    document.getElementById("annalysetable").hidden=true;
    document.getElementById("formuletable").hidden=true;
    document.getElementById("visitetable").hidden=false;  

}   
</script>

