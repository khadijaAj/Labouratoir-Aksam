@extends('layouts.app')

@section('title', ' Ajout commande - Aksam Labs')

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
        <i class="la la-eyedropper"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item  active">
    <a href="/formules">
    <i class='la la-file-text'></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/geolocalisation">
    <i class='la la-map-pin'></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-cart-arrow-down"></i>
        Commandes</b></div>
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
<form  method="POST" action="{{route('commandes.store')}}">
@csrf
<div class="form-row">
   <div class="form-group col-md-6">
        <label for="client"class= "control-label">Client</label>
            <select class="custom-select mr-sm-2" name="client_id">
                <option name="client_id"  value="{{$clients->id}}">{{$commande->client->name}}</option>
                @foreach( $clients as $client)
                @if($client['statut'] =='bloque')
                <center></center>
                @else
                <option  name="client_id" value="{{$client->id}}">{{ $client['name'] }}</option>
                @endif
                @endforeach
               </select> 
                                       
  </div>
  <div class="form-group col-md-6">
        <label for="reference"class="control-label">Réference </label>
        <input name="reference"  class="form-control datepicker" type="text" value="{{$commande->reference}}">
     </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-6">
        <label for="date_devis"class="control-label">Date de demande </label>
        <input name="date"  value="{{$commande->date}}" class="form-control datepicker" type="date">
     </div>
   <div class="form-group col-md-6">
        <label for="conditionRegelment" class="control-label">Condition de Regelment </label>
        <input name="conditionReglement" class="form-control datepicker" type="number"  value="{{$commande->conditionReglement}}"  min="15" max="60">
      </div>
</div>
<div class="card">
  <div class="card-header">
            Produits
  </div>
  <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantity</th>
                        <th >Unité</th>
                    
                    </tr>
                </thead>
                <tbody  class="resultbody">
                    <tr  id="product" >
                    @foreach($commande->detailscommande as $item)
                       <td> 
                            <select name="produit_id[]" class="form-control productname" >
                            <option selected value="{{ $item->produit->id}}">{{ $item->produit->name}}</option>
                            @foreach($produits as $produit)
                            <option name="produit_id[]" value="{{$produit->id}}">{{$produit->name}}</option>
                            @endforeach
                            </select>
                        </td>
    
                        <td>
                            <input type="number" name="quantity[]" class="form-control" value="{{$item->quantity}}"/>
                        </td>
                        <td>
                        <select name="unite[]"  class="form-control">
                           <option  name="unite[]" selected value="{{ $item->unite}}">{{ $item->unite}}</option>
                            <option name="unite[]" value="l">l</option>
                            <option  name="unite[]" value="Kg">Kg</option> 
                         </select> 
                        </td>
        @endforeach
                      
                    </tr>
                </tbody>
            </table>
            <center><input type="button" class="btn btn-lg btn-default add" value="Ajouter un ligne">   
                        <input type="submit" class="btn btn-lg btn-default" value="Enregistrer" style="color:white;background-color:#3A9341;"></center>
            </div>
  </div>  
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">

  $(function () {
        $('.add').click(function () {
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr><td> <select name="produit_id[]" class="form-control productname" ><option>choisir...</option>@foreach($produits as $produit)<option name="produit_id[]" value="{{$produit->id}}">{{$produit->name}}</option> @endforeach</select></td>' +
                    '<td> <input type="number" name="quantity[]" class="form-control"  /></td>'+
                   '<td><select name="unite[]"  class="form-control"><option>choisir...</option><option value="l">l</option><option value="Kg">Kg</option></select></td></tr>';
            $('.resultbody').append(tr);
        });

        $('.resultbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });
  });
</script>

@endsection