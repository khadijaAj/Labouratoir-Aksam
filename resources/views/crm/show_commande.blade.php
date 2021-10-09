@extends('layouts.app')

@section('title', ' show commandes - Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/commandes">
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-clipboard"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/formules">
    <i class="la la-file-text"></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/geolocalisation">
    <i class="la la-map-pin"></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection
@section('Page_infos')
<div class="card-title"><b>
     Commande</b></div>

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
<style>
    
body{
    font-size :14px;
    font-style: normal;


}


.panel {
     margin-bottom: 20px;
    background-color: #fff;
     border: 1px solid transparent;
     border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .panel-default {
                border-color: #ddd;
            }
            .panel-body {
                padding: 15px;
            }

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}



table {
width: 100%; }
  td, th {border: solid 1px black;}
  h1 {text-align: center;}
  span {float: right;}
}


</style>
<body>
<main>
<center> <input type="checkbox" class="id" name="id" value="{{ $commande->id}}" hidden>
                    </center>
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                <h5> <b>Adresse de Facturation:</b></h5>
                    <div class="panel panel-default">
                    <div class="panel-body">
                            
                       <strong>  Nom: </strong>{{$commande->client->name }}<br />
                       <strong> Adresse:</strong>  {{$commande->client->adresse}}<br />
                       <strong>  N° téléphone:</strong>    {{$commande->client->tele}} <br />
                       <strong> Email :</strong>     {{$commande->client->email}}<br />
                    </div>
                    </div>
                   
                </div>
                <div style="margin-left: 70%;  width:250pt">
                    <div class="panel panel-default">
                    <div class="panel-body">
                     
                        <strong>  Réference :</strong>   {{$commande->reference }}<br />
                        <strong>  Date : </strong>   {{$commande->date}}<br />
                        <strong>    Condition de régelement :</strong>  {{$commande->conditionReglement}} jours 
                    <br />
                     </div>        
                     </div>
            </div>
            <br><br>
        <h5 style="margin :20px 0px">N° de commande {{$commande->num}} </h5>
     
      <table border="0"  class="table table-bordered"style="margin-top:20px; width=90%">
        <thead>
          <tr style="border-collapse: collapse;">
            <th class="desc"><center>Produit</center></th>
            <th class="qty"><center>Qty</center></th>
            <th class="prixu"><center>Prix unitaire </center></th>
            <th class="taxe"><center>TVA</center></th>
            <th class="total"><center>Prix total</center></th>
          </tr>
        </thead>
        <tbody>
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
   

    <tr>
            <td class="desc"><center>{{$item->produit->name}}</center></td>
            <td class="qty"><center>{{$item->quantity}}  {{$item->unite}}</center></td>
            <td class="prixu"><center>{{$item->produit->prixu}}</center></td>
            <td class="taxe"><center>{{$item->produit->taxe *100}}%</center></td>
            <td class="totla"><center>{{ $prixtotal }} DH</center></td>
           <!-- Le total du produit = prix * quantité -->
            
         </tr>
    @endforeach

     </tbody>
    </table>
    <div style="margin-left:70%; width=100px;   margin-top:20px;border:none;">
                    <h5>Total:</h5>
                    <table class="table table-hover">
                        <tbody>
                            <tr  style="">
                                <td  style="" ><b>Total net :</b></td>
                                <td  style="">{{$subtotal}} DH</td>
                            </tr>
                           
                                <tr  style="">
                                    <td  style=""><b>TTC</b></td>
                                    <td  style="">{{$ttc}} DH</td>
                                </tr>
                            
                            <tr  style="">
                                <td   style=""><b>TOTAL</b></td>
                                <td  style="color:green;">{{ $grandprix }} DH</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
  
  </body>

@endsection
