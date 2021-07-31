@extends('layouts.app')

@section('title', 'Modifier Rapports ensilage - Aksam Labs')

@section('links')
<li class="nav-item">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item  ">
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
<li class="nav-item active ">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
    </a>
</li>


@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-plus"></i> Modification Multiple </b></div>
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

<form action="{{ route('enrapports.update_multiple') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="table-responsive">
        <table class="table table-bordered" id="tableAnalyse">
            <thead>
                <tr>
                <input name="row_id[]"  hidden />
                    
                <th>
                        <center>Interpretation</center>
                    </th>
                <th>
                        <center>Date de Reception</center>
                    </th>
                    <th>
                        <center>Identifiant</center>
                    </th>
                  
                    <th>
                        <center>Client</center>
                    </th>
                    <th>
                        <center>Commercial</center>
                    </th> 
                    <th>
                        <center>Produit</center>
                    </th> 
                    <th>
                        <center>N Ech</center>
                    </th>
                   
                    @foreach($xml_keys->getAttributes() as $key => $value )
                <th><center>{{ $key }}</center></t>
    
                @endforeach
                </tr>
            </thead>
            <tbody>
            @php
            $i = 1
            @endphp

            @foreach ($enrapports as $enrapport)
            
                <tr class="rows" data-id="{{$i}}">

                <td>
                <input type="hidden" name="line[]" value="L{{$i}}">
                        <input type="hidden" value="{{ $enrapport->id }}" name="L{{$i}}_id">

                        <input type="text" autocomplete='off' name="L{{$i}}_interpretation" value="{{ $enrapport->Interpretation }}">
                    </td>
                    <td>
                       
                        <input type="date" value="{{ $enrapport->date_reception }}" name="L{{$i}}_date_reception">
                    </td>
                   
                    <td>
                        <input type="text" autocomplete='off' name="L{{$i}}_identifiant" value="{{ $enrapport->Identifiant }}">
                    </td>
                    
                    @if(!is_null($enrapport->client)) 
                    <td>
                    <input class="tags_clients"  value="{{ $enrapport->client->name }}" name="L{{ $i }}_client_id">
</td>
                    @else

                    <td>
                    <input class="tags_clients"   name="L{{ $i }}_client_id">

                    </td>
                    @endif
                    @if(!is_null($enrapport->commercial)) 
                    <td>
                    <input class="tags_commerciaux"  value="{{ $enrapport->commercial->name }}" name="L{{ $i }}_commercial_id">
                       
                    </td>
                    @else 
                    <td>
                    <input class="tags_commerciaux"   name="L{{ $i }}_commercial_id">

                </td>
                    @endif
                    <td>
                    <input class="tags_produits"  value="{{ $enrapport->produit->name }}"  name="L{{$i}}_produit_id"/>

                     
                    </td>
                    <td>
                        <input type="text" autocomplete="off" name="L{{$i}}_num_ech" value="{{ $enrapport->num_ech }}">
                    </td>
                    @foreach($enrapport->xml->getAttributes() as $key => $value )
                <td><center>{{ $value }}</center></td>
    
                @endforeach
                </tr>
                
                @php
                $i += 1
                @endphp
@endforeach
            </tbody>
        </table>
        <div class="card-action">
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
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