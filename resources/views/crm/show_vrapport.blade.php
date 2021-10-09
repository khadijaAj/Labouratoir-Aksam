@extends('layouts.app')

@section('title', 'Ajout formule - Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/commandes">
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item  active">
    <a href="/vrapports">
        <i class="la la-clipboard"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item  active">
    <a href="/formules">
    <i class="la la-file-text"></i>
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
<div class="card-title"><b><i class="la la-file-text"></i>
        Formules</b></div>

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
        @if(!is_null($vrapport->client)) 

<div class="form-group col-md-6">
    <label for="client"> Client</label>
     <input type="text" class="form-control" name="client" value="{{ $vrapport->client->name }}" disabled>
</div>
@else
 <div class="form-group col-md-6">
     <label for="client">Client</label>
     <input type="text" class="form-control" name="client" value="-" disabled>
 </div>               
 @endif
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="date_debut"> Date Début</label>
            <input type="datetime-local" class="form-control" value="{{ $vrapport->date_debut}}" name="date_debut" disabled> 
        </div>
        <div class="form-group col-md-6">
            <label for="date_debut"> Date Fin</label>
            <input type="datetime-local" class="form-control" value="{{ $vrapport->date_datet}}" name="date_fin" disabled>
        </div>

    </div>
    
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="type">Type visite </label>
            <input type="text" class="form-control" value="{{ $vrapport->typevisite}}" name="typevisite" disabled>
        </div>  
        <div class="form-group col-md-6">
            <label for="observation">Observation </label>
            <input type="text" class="form-control" name="observation" value="{{ $vrapport->observation}}"  disabled placeholder='vide'>   
        </div>
    </div>
    <br>
    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-toggle="tab" ><b>Gamme {{ $vrapport->typevisite }}<b></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
          
                <br>

        <div class="tab-content">
            <div  id="elevages">
                <br>

                <div class="table-responsive">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Libellé</center>
                                </th>
                                <th>
                                    <center>Valeur</center>
                                </th>
                            </tr>
                        </thead>
                      @if($vrapport['typevisite']=='OV')
                        <tbody >
                        @if ($vrapport->elevages()->count() == 0)
                        <tr>
                          <td colspan="4"><center>Aucun résultat à afficher.</center></td>
                        </tr>
                       @endif
                       
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsov()->exists())
                                   <center>{{ $item->standardsov->libelle}}</center>
                                  </td>
                                 @endif
                                   
                                <td>
                                    <center>{{$item->value_cr}}</center>
                                </td>
                                
                    
                            </tr>
                            @endforeach
                        </tbody>
                        @elseif($vrapport['typevisite']=='BV')
                        <tbody >
                        @if ($vrapport->elevages()->count() == 0)
                        <tr>
                          <td colspan="4"><center>Aucun résultat à afficher.</center></td>
                        </tr>
                       @endif
                       
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsbv()->exists())
                                   <center>{{ $item->standardsbv->libelle}}</center>
                                  </td>
                                 @endif
                                   
                                <td>
                                    <center>{{$item->value_cr}}</center>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody >
                        @if ($vrapport->elevages()->count() == 0)
                        <tr>
                          <td colspan="4"><center>Aucun résultat à afficher.</center></td>
                        </tr>
                       @endif
                       
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsvl()->exists())
                                   <center>{{ $item->standardsvl->libelle}}</center>
                                  </td>
                                 @endif
                                   
                                <td>
                                    <center>{{$item->value_cr}}</center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif

</table>
  @endsection