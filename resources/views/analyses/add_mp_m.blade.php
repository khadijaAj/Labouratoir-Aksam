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
<div class="card-title"><b><i class="la la-plus"></i> Insertion Multiple</b></div>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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



<form action="{{ route('mprapports.store_multiple') }}" method="POST" enctype="multipart/form-data">
    @csrf
 
</head>
<body>

    <div class="table-responsive">
        <table class="table table-bordered" id="tableAnalyse">
            <thead>
                <tr>
                    <input name="row_id[]" hidden />

                    <th>
                        <center>Date Reception</center>
                    </th>
                    <th>
                        <center>Produit</center>
                    </th>
                    <th>
                        <center>N° Ech</center>
                    </th>
                    <th>
                        <center>N° Bon</center>
                    </th>
                    <th>
                        <center>Fournisseur</center>
                    </th>

                    <th>
                        <center>Origine</center>
                    </th>
                    <th>
                        <center>Navire</center>
                    </th>

                    @foreach($standards->nutriments as $nutriment)
                    <th>
                        <center>{{ $nutriment->name }}</center>
                    </th>
                    @endforeach
                    <th>
                        <center>Commentaire</center>
                    </th>
                    <th>
                        <center>Conformité</center>
                    </th>
                    <th>
                        <center>Certificat</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="rows" data-id="1">
                    <td>
                        <input type="hidden" name="line[]" value="L1">
                        <input type="date" value="{{ old('date_reception') }}" name="L1_date_reception">
                    </td>
                    
                    <td>

                   <input class="tags_products" name="L1_produit_id"/>
                
                   
                    </td>
                    <td>
                        <input type="text" autocomplete="off" name="L1_num" value="{{ old('num') }}">
                    </td>
                    <td>
                        <input type="text"  autocomplete="off" name="L1_nbon" value="{{ old('nbon') }}">
                    </td>
                    <td>
                    <input class="tags_fournisseurs"  name="L1_fournisseur_id" />
                       
                    </td>
                    <td>
                    <input class="tags_origines"  name="L1_origine_id"/>
                          
                    </td>
                    <td>
                    <input class="tags_navires"  name="L1_navire_id" />
                          
                    </td>
                    @foreach($standards->nutriments as $nutriment)
                    
                    <td> <input name="L1_nutriment_id[]"  autocomplete="off" value="{{ $nutriment->id }}" hidden />

                        <input autocomplete="off" data-id='{{ $nutriment->id }}' type="text"
                            name="L1_valeur_surbrute_{{ $nutriment->id }}" />
                    </td>
                    </td>
                    @endforeach
                    <td>
                        <select name="L1_commentaire">
                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </td>
                    <td>
                        <select name="L1_conformite">
                            <option value="Conforme">Conforme</option>
                            <option value="Non Conforme">Non Conforme</option>
                        </select>
                    </td>
                    <td>
                       <center> <input type="checkbox" name="L1_certificat" value="1" checked> </center>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card-action">
            <center><button type="button" id="addLines" class="btn btn-secondary" style="margin-right: 10px">Ajouter un ligne</button> <button type="submit" class="btn btn-success">Enregistrer</button></center>
        </div>
        <br>
</form>



<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
    var availableTags = [
        @foreach( $produits as $produit)
                             "<?=$produit['name']?>",
                            @endforeach
    ];
    $( ".tags_products" ).autocomplete({
      source: availableTags
    });

    var availableTags1 = [
        @foreach( $fournisseurs as $fournisseur)
                             "<?=$fournisseur['name']?>",
                            @endforeach
    ];
    $( ".tags_fournisseurs" ).autocomplete({
      source: availableTags1
    });

    var availableTags2 = [
        @foreach( $origines as $origine)
                             "<?=$origine['name']?>",
                            @endforeach
    ];
    $( ".tags_origines" ).autocomplete({
      source: availableTags2
    });

    var availableTags3 = [
        @foreach( $navires as $navire)
                             "<?=$navire['name']?>",
                            @endforeach
    ];
    $( ".tags_navires" ).autocomplete({
      source: availableTags3
    });
  } );

 

$("#addLines").click(function(e) {
    var last_tr = $('#tableAnalyse tbody tr:last-child').html();
    var last_id = $('#tableAnalyse tbody tr:last-child').attr("data-id");
    var next_id = parseInt(last_id) + 1;
    var new_line = last_tr.split("L" + last_id).join("L" + next_id);
    $('#tableAnalyse tbody').append('<tr class="rows" data-id="' + next_id + '">' + new_line + '</tr>');
    var availableTags = [
        @foreach( $produits as $produit)
                             "<?=$produit['name']?>",
                            @endforeach
    ];
    $( ".tags_products" ).autocomplete({
      source: availableTags
    });
    var availableTags1 = [
        @foreach( $fournisseurs as $fournisseur)
                             "<?=$fournisseur['name']?>",
                            @endforeach
    ];
    $( ".tags_fournisseurs" ).autocomplete({
      source: availableTags1
    });

    var availableTags2 = [
        @foreach( $origines as $origine)
                             "<?=$origine['name']?>",
                            @endforeach
    ];
    $( ".tags_origines" ).autocomplete({
      source: availableTags2
    });

    var availableTags3 = [
        @foreach( $navires as $navire)
                             "<?=$navire['name']?>",
                            @endforeach
    ];
    $( ".tags_navires" ).autocomplete({
      source: availableTags3
    });
});

$(document).on("keydown","input",function (e) {

var cellindex = $(this).parents('td').index();

if (e.which == 40) {
          $(e.target).closest('tr').nextAll('tr').find('td').eq(cellindex).find(':text').focus();
}
if (e.which == 38) {
$(e.target).closest('tr').prevAll('tr').first().find('td').eq(cellindex).find(':text').focus();
}

});
</script>
    

  
  
  



@endsection

