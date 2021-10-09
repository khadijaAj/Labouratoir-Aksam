@extends('layouts.app')

@section('title', 'vrapports - Aksam Labs')

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
<div class="card-title"><b><i class="la la-file-text"></i>Rapport visite </b></div>
@endsection

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

</div>
<form action="{{ route('vrapports.store') }}" method="POST">

    @csrf
  
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="client">Client</label>
            <select class="custom-select mr-sm-2" name="client_id">
                <option selected value="">Choisir un client...</option>
                @foreach( $clients as $client)
                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                @endforeach
            </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="date_debut"> Date Début</label>
            <input type="text" class="form-control" value="<?php echo date('Y-m-d H:i:s');?>" name="date_debut">
        </div>
        <div class="form-group col-md-6">
            <label for="date_debut"> Date Fin</label>
            <input type="text" class="form-control" value="<?php echo date('Y-m-d H:i:s',strtotime('+1 hours'));?>" name="date_fin">
        </div>
    </div>
    
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="type">Type visite </label>
            <select name="typevisite"  id="purpose" onchange="changeListener()" class="custom-select mr-sm-2">
                <option>choisir...</option>
                <option value="BV">BV</option> 
                <option value="OV">OV</option>  
                <option value="VL">VL</option>                 
            </select> 
        </div>  
        <div class="form-group col-md-6">
            <label for="observation">Observation </label>
            <input type="text" class="form-control" name="observation" value="{{ old('observation') }}">   
        </div>
    </div>
    <br>
<!---table elevages-->
    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-toggle="tab" ><b>Elevages<b></a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
          
                <br>

        <div class="tab-content">
            <div  id="elevages" hidden>
                <br>

                <div class="table-responsive">
                <table class="table table-bordered" id="ovin">
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
                        <tbody >
                            @foreach($standardsov as $standardsov )
                            <tr id="rows">
                                <td>
                                <center>{{ $standardsov ->libelle }}</center>
                                </td>
                               <td><input name="standardsov_id[]" value="{{$standardsov ->id}}" hidden />
                                <center> <input list="browsers" class='typeD data-analyse-id-brut-{{ $standardsov ->id }}'
                                    data-id='{{$standardsov ->id}}' data-count="false" type="text"name="value_cr[]"  id="value_cr" autocomplete="off"/>
                                    <datalist  id="browsers">
                                        <select name="value_cr[]">
                                        <option value="Vaccin">
                                        <option value="Traitement">
                                        <option value="Respect">
                                        <option value="Non respect">
                                        <option value="Présence">
                                        <option value="Absence">
                                        <option value="Fait">
                                        <option value="N'est pas fait">
                                        <option value="Oui">
                                        <option value="Non">
                                        <option value="Alaite">
                                        <option value="Fletshing">
                                        <option value="Raisonée">
                                        <option value="Stiming">
                                        <option value="20-25%">
                                        <option value="25-30%">
                                        <option value="<25%">
                                        <option value="<20%">
                                        <option value=">30%">
</select>
                                    </datalist>
                                    </center>
                                 </td>     
                            </tr>
                           @endforeach
                        </tbody>
                        </table>
                        <!---Pour  Gamme BV--->
                      <table class="table table-bordered" id="bovin">
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
                        <tbody >
                            @foreach($standardsbv as $bv )
                            <tr id="rows">
                                <td>
                                <center>{{ $bv ->libelle }}</center>
                                </td>
                               <td><input name="standardsbv_id[]" value="{{$bv ->id}}" hidden />
                                <center> <input list="browsersbv" class='typeD data-analyse-id-brut-{{ $bv ->id }}'
                                    data-id='{{$bv ->id}}' data-count="false" type="text"name="value_cr[]"  id="value_cr" autocomplete="off"/>
                                    <datalist  id="browsersbv">
        
                                        <option value="Vaccin">
                                        <option value="Traitement">  
                                        <option value="Respect">
                                        <option value="Non respect">
                                        <option value="Présence">
                                        <option value="Absence">
                                        <option value="Fait">
                                        <option value="N'est pas fait">
                                        <option value="Oui">
                                        <option value="Non">
                                        <option value="Alaite">
                                        <option value="Fletshing">
                                        <option value="Raisonée">
                                        <option value="Stiming">
                                        <option value="20-25%">
                                        <option value="25-30%">
                                        <option value="<25%">
                                        <option value="<20%">
                                        <option value=">30%">
                                       </datalist>
        
                                    </center>
                                 </td>
                                
                                 
                            </tr>
                           @endforeach
                        </tbody>
                        </table>
                        
                    <!---- pour Gamme Vl--->
                    <table class="table table-bordered" id="VL">
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
                        <tbody >
                            @foreach($standardsvl as $vl )
                            <tr id="rows">
                                <td>
                                <center>{{ $vl->libelle }}</center>
                                </td>
                               <td><input name="standardsvl_id[]" id="libelle" value="{{$vl ->id}}" hidden />
                                <center> <input list="browsersvl" class='typeD data-analyse-id-brut-{{ $vl ->id }}'
                                    data-id='{{$vl ->id}}' data-count="false" type="text"name="value_cr[]"  id="value_cr" autocomplete="off"/>
                                    
                                    <datalist  id="browsersvl">
                                        <option  value="Respect">
                                        <option  value="Non respect">
                                        <option  value="Présence">
                                        <option  value="Absence">
                                        <option  value="Faible">
                                        <option   value="Moyenne">
                                        <option   value="Elevée">
                                        <option   value="Oui">
                                        <option   value="Non">
                                        <option value="20-25%">
                                        <option value="25-30%">
                                        <option value="<25%">
                                        <option value="<20%">
                                        <option value=">30%">
                                    </datalist>
                                    </center>
                                 </td>
                            </tr>
                           @endforeach
                        </tbody>
                        </table>
                   
                               
</div>
</div>
</div>

        <br>
    <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
    <br>
</form>
<style type="text/css">
        .display-none {

            display: none;

        }
        </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script src="dist/jquery.simple-checkbox-table.min.js"></script>

<script type="text/javascript">
        $("#example1").click(function() {

            $("#example").toggleClass('display-none');

        });
</script>
<script >

    function changeListener(){
        
            var  elevages= document.getElementById('elevages');
            var select = document.getElementById('purpose');
			var value = document.getElementById('purpose').value;
            console.log(value);// en
            elevages.hidden=false;

                if (value=="BV") {

                    $("#VL").hide();
                    $("#ovin").hide();
                    $("#bovin").show();
        
                } else if (value=="OV") {

                    $("#ovin").show();
                    $("#bovin").hide();
                    $('#VL').hide();
        

                }
                else{
                    $('#ovin').hide();
                    $("#bovin").hide();
                    $('#VL').show();
        
                }
    
     }
     var  libelle= document.getElementById('libelle').value;
     if (libelle==1) {

$("#browsersvl").hide();

$("#browsersvl1").show();
     }
    
</script>
@endsection