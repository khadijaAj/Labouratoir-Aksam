@extends('layouts.app')

@section('title', 'Ajout Rapports clients - Aksam Labs')

@section('links')
<li class="nav-item">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item">
    <a href="/rapport_pf">
        <i class="la la-cart-plus"></i>
        <p>Produits finis</p>
    </a>
</li>
<li class="nav-item active ">
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
<div class="card-title"><b><i class="la la-plus"></i> Insertion Multiple </b></div>
@endsection

@section('content')
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
<style>
div.inline {
    width: 100%;
    display: table;
}

div.inline div {
    display: table-cell;
}

div.inline div:nth-child(n+2) {
    padding-left: 10px;
}
</style>
<form action="{{ route('crapports.store_multiple') }}" method="POST">
    @csrf

    <div class="table-responsive">
        <table class="table table-bordered" id="tableAnalyse">
            <thead>
                <tr>
                    <input name="row_id[]" hidden />
                    <th>
                        <center>N°</center>
                    </th>
                    <th>
                        <center>Client</center>
                    </th>
                    <th>
                        <center>Commercial</center>
                    </th>
                    <th>
                        <center>Date Reception</center>
                    </th>
                    <th>
                        <center>Date Analyse</center>
                    </th>
                    <th>
                        <center>Produit</center>
                    </th>
                    <th>
                        <center>Cout d'Analyse</center>
                    </th>
                    @foreach($standards->nutriments as $nutriment)


                    <th>
                        <center>{{ $nutriment->name }}</center>
                    </th>
                    @endforeach



                </tr>
            </thead>
            <tbody>

                <tr class="rows" data-id="1">

                    <td>
                        <input type="hidden" name="line[]" value="L1">
                        <input type="text" autocomplete="off" name="L1_num" value="{{ old('num') }}">
                    </td>
                    <td>
                    <input class="tags_clients" name="L1_client_id"/>
                 
                    </td>
                    <td>
                    <input class="tags_commerciaux" name="L1_commercial_id" />
                       
                    </td>
                    <td><input type="date" autocomplete="off" value="{{ old('date_reception') }}" name="L1_date_reception">
                    </td>
                    <td><input type="date" value="{{ old('date_analyse') }}" name="L1_date_analyse">
                    </td>

                    <td>
                    <input class="tags_products" name="L1_produit_id"/>
                    </td>
                    <td><input type="text" CLASS="L1_cout_total" name="L1_cout">
                    </td>
                    @foreach($standards->nutriments as $nutriment)
                            @if($nutriment->name == 'CB' || $nutriment->name == 'Pb' )
                            <td>

                        <div class="inline">
                            <input name="L1_nutriment_id[]" value="{{ $nutriment->id }}" hidden />

                            <div>
                                <input data-line="L1_"
                                    class='typeD L1_typeD L1_data-analyse-id-brut-{{ $nutriment->id }}'
                                    data-count="false" data-valeur="{{ $nutriment->cout }}"
                                    data-id='{{ $nutriment->id }}' type="text"
                                    name="L1_valeur_surbrute_{{ $nutriment->id }}" placeholder="Valeur sur brute" />
                            </div>
                            <div>
                                <input data-line="L1_"
                                    class='typeD L1_typeD L1_data-analyse-id-seche-{{ $nutriment->id }}'
                                    data-count="false" type="text" data-valeur="{{ $nutriment->cout }}"
                                    data-id='{{ $nutriment->id }}' type="text"
                                    name="L1_valeur_surseche_{{ $nutriment->id }}" placeholder="Valeur sur seche" />
                            </div>
                        </div>



                    </td>
                    @else <td>

<div class="inline">
    <input name="L1_nutriment_id[]" value="{{ $nutriment->id }}" hidden />

    <div>
        <input data-line="L1_"
            class='typeD L1_typeD L1_data-analyse-id-brut-{{ $nutriment->id }}'
            data-count="false" data-valeur="{{ $nutriment->cout }}"
            data-id='{{ $nutriment->id }}' type="hidden"
            name="L1_valeur_surbrute_{{ $nutriment->id }}" placeholder="Valeur sur brute" />
    </div>
    <div>
        <input data-line="L1_"
            class='typeD L1_typeD L1_data-analyse-id-seche-{{ $nutriment->id }}'
            data-count="false" type="text" data-valeur="{{ $nutriment->cout }}"
            data-id='{{ $nutriment->id }}' type="text"
            name="L1_valeur_surseche_{{ $nutriment->id }}" placeholder="Valeur sur seche" />
    </div>
</div>



</td>
                            @endif
                   

                    @endforeach


                </tr>


            </tbody>
        </table>
        <div class="card-action">
            <center><button type="button" id="addLines" class="btn btn-secondary" style="margin-right: 10px">Ajouter un
                    ligne </button><button type="submit" class="btn btn-success">Enregistrer</button></center>
        </div>
        <br>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        @foreach( $commerciaux as $commercial)
                             "<?=$commercial['name']?>",
                            @endforeach
    ];
    $( ".tags_commerciaux" ).autocomplete({
      source: availableTags1
    });

    var availableTags2 = [
        @foreach( $clients as $client)
                             "<?=$client['name']?>",
                            @endforeach
    ];
    $( ".tags_clients" ).autocomplete({
      source: availableTags2
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
        @foreach( $commerciaux as $commercial)
                             "<?=$commercial['name']?>",
                            @endforeach
    ];
    $( ".tags_commerciaux" ).autocomplete({
      source: availableTags1
    });

    var availableTags2 = [
        @foreach( $clients as $client)
                             "<?=$client['name']?>",
                            @endforeach
    ];
    $( ".tags_clients" ).autocomplete({
      source: availableTags2
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

// Counting ' Cout '
$(document).ready(function(){
    var typingTimer; //timer identifier
    var doneTypingInterval = 500; //time in ms (5 second )
    
    
//on keyup, start the countdown


$(document).on('keyup', '.typeD', function(){
    
    var line = $(this).attr('data-line');
    clearTimeout(typingTimer);
    
    typingTimer = setTimeout(function() {
        var counting = 0;
        
        $("." + line + "typeD").each(function() {
            var prix = $(this).attr('data-valeur');

            var id_input = $(this).attr('data-id');
            var count_status_seche = $("." + line + "data-analyse-id-seche-" + id_input).attr(
                'data-count');
            var count_status_brut = $("." + line + "data-analyse-id-brut-" + id_input).attr(
                'data-count');
            var value_inpt_sech = $("." + line + "data-analyse-id-seche-" + id_input).val();
            var value_inpt_brut = $("." + line + "data-analyse-id-brut-" + id_input).val();
            if (count_status_brut === "false") {
                if (value_inpt_brut !== "" || value_inpt_sech !== "") {
                    counting += Number(prix);
                    $("." + line + "data-analyse-id-brut-" + id_input).attr('data-count',
                        'true');

                }
            }


        });
        $("." + line + "cout_total").val(counting);
        $(".typeD").attr('data-count', "false");
        
    }, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown',  function() {
    clearTimeout(typingTimer);
});

});

</script>

@endsection