@extends('layouts.app')

@section('title', 'Diagramme Ensilage - Aksam Labs')

@section('links')

<li class="nav-item ">
<a href="/home">

<i class="la la-random"></i>
        <p> Evolution Proteine</p>
</a>
</li>

<li class="nav-item ">
    <a href="/diagramme_ensilage">
        <i class="la la-object-group"></i>
        <p>Diagramme Ensilage</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/formulaire_arp">
        <i class="la la-keyboard-o"></i>
        <p>Formulaire Arp</p>
    </a>
</li>

@endsection
@section('Page_infos')
<div class="card-title"><b><i class="la la-random"></i>
        Evolution Proteine</b></div>
@endsection

@section('content')
<style>
.nav-pills>li>a.active {
    background-color: #8a8a8a !important;
}
</style>
<script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
  <script src="http://www.chartjs.org/samples/latest/utils.js"></script>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
<div>
    
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="#mp" class="nav-link active" data-toggle="tab">Rapport Matieres Premieres</a>
            </li>
            <li class="nav-item">
                <a href="#pf" class="nav-link" data-toggle="tab">Rapport Produits finis </a>
            </li>
            <li class="nav-item">
                <a href="#en" class="nav-link" data-toggle="tab">Rapport Ensilage</a>
            </li>
        </ul>

        <hr width="100%">
        <div class="tab-content">
        <div class="tab-pane fade show active" id="mp">
            <br>
            <form action="{{ route('charts.index') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="MP" name="type">
                <div class="form-row align-items-center" style="display: flex; justify-content: flex-end">
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-toggle="dropdown" name="produit_id">
                            <option selected>Choisir un produit ...</option>
                            @foreach( $produits as $produit)
                            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-bs-toggle="dropdown" name="nutriment_id">
                            <option selected>Choisir un nutriment ...</option>
                            @foreach($standardsmp->nutriments as $nutriment)
                            <option value="{{ $nutriment['id'] }}">{{ $nutriment['name'] }}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="input-group-btn search-panel">
                        <select id='purpose' name='filter_name' class="custom-select mr-sm-2" data-toggle="dropdown">

                            <option value="date_range">Période</option>
                            <option value="origines">Origine</option>
                            <option value="navires">Navire</option>
                            <option value="fournisseurs">Fournisseur</option>

                        </select>
                    </div>

                    <div class="col-auto my-1">
                        <button type="submit" style="margin-top:8px;border-radius: 2px ;background-color:#3A9341;"
                            class="btn mb-2"><a style="color: #ffffff; text-decoration: none; ">Générer
                                graphe</a></button>
                    </div>



                    <br>







                    <div class="form-row" id="date_picker" style="text-align: left;">

                        <div class="form-group col-md-6">
                            <label for="start">De : </label>
                            <input type="date" class="form-control" name="date_start">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_reception"> Jusqu'à : </label>
                            <input type="date" class="form-control" name="date_end">
                        </div>


                    </div>


                </div>


            </form>

        </div>


        <div class="tab-pane fade" id="pf">
            <br>
            <form action="{{ route('charts.index') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="PF" name="type">
                <div class="form-row align-items-center" style="display: flex; justify-content: flex-end">
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-toggle="dropdown" name="produit_id">
                            <option selected>Choisir un produit ...</option>
                            @foreach( $produits as $produit)
                            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-bs-toggle="dropdown" name="nutriment_id">
                            <option selected>Choisir un nutriment ...</option>
                            @foreach($standardspf->nutriments as $nutriment)
                            <option value="{{ $nutriment['id'] }}">{{ $nutriment['name'] }}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="input-group-btn search-panel">
                        <select id='purpose1' name='filter_name' class="custom-select mr-sm-2" data-toggle="dropdown">

                            <option value="date_range">Période</option>
                            

                        </select>
                    </div>

                    <div class="col-auto my-1">
                        <button type="submit" style="margin-top:8px;border-radius: 2px ;background-color:#3A9341;"
                            class="btn mb-2"><a style="color: #ffffff; text-decoration: none; ">Générer
                                graphe</a></button>
                    </div>



                    <br>







                    <div class="form-row" id="date_picker2" style="text-align: left;">

                        <div class="form-group col-md-6">
                            <label for="start">De : </label>
                            <input type="date" class="form-control" name="date_start">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_reception"> Jusqu'à : </label>
                            <input type="date" class="form-control" name="date_end">
                        </div>


                    </div>


                </div>


            </form>

        </div>
        <div class="tab-pane fade" id="en">
            <br>
            <form action="{{ route('charts.index') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="EN" name="type">
                <div class="form-row align-items-center" style="display: flex; justify-content: flex-end">
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-toggle="dropdown" name="produit_id">
                            <option selected>Choisir un produit ...</option>
                            @foreach( $produits as $produit)
                            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2" data-bs-toggle="dropdown" name="nutriment_id">
                            <option selected>Choisir un nutriment ...</option>
                            @foreach($standardsen->nutriments as $nutriment)
                            <option value="{{ $nutriment['id'] }}">{{ $nutriment['name'] }}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="input-group-btn search-panel">
                        <select id='purpose2' name='filter_name' class="custom-select mr-sm-2" data-toggle="dropdown">

                            <option value="commerciaux">Commercial</option>
                            <option value="clients">Client</option>
                            

                        </select>
                    </div>

                    <div class="col-auto my-1">
                        <button type="submit" style="margin-top:8px;border-radius: 2px ;background-color:#3A9341;"
                            class="btn mb-2"><a style="color: #ffffff; text-decoration: none; ">Générer
                                graphe</a></button>
                    </div>



                    <br>







                    <div class="form-row" id="date_picker3" style="text-align: left;">

                        <div class="form-group col-md-6">
                            <label for="start">De : </label>
                            <input type="date" class="form-control" name="date_start">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_reception"> Jusqu'à : </label>
                            <input type="date" class="form-control" name="date_end">
                        </div>


                    </div>


                </div>


            </form>

        </div>
    </div><br>
    
    <div id="container" style="width: 75%;margin: 0 auto; ">
    <canvas id="canvas"></canvas>
    </div>
    <script>
    
    
    var chartdata = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode($names); ?>,
    
    datasets: [
    {
    label: "Nutriment :<?php echo $Nutriment; ?> " ,
    fill: false,
    borderColor: "#039735",
    borderWidth: 2,
    data: <?php echo json_encode($Data); ?>
    }
    ]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }, responsive: true,
                title: {
                    display: true,
                    text: 'Produit : <?php echo $produit_name; ?> | Analyse du Nutriment <?php echo $Nutriment; ?> par <?php echo $Filter; ?> | Entre : <?php echo $date_start; ?> - <?php echo $date_end; ?>  '
                }
    }
   
    }
    var ctx = document.getElementById('canvas').getContext('2d');
    var Chart = new Chart(ctx, chartdata);
    
    </script>
    <br>
    <br<br><br><br>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function() {
    $('#purpose').on('change', function() {
        
        $("#date_picker").show();
        

    });
});
$('.datepicker').datepicker();
</script>


@endsection
  
  
 