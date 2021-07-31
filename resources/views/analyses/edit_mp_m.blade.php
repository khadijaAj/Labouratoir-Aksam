@extends('layouts.app')
@section('title', 'Modifier Matiere Premiere - Aksam Labs')

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
<div class="card-title"><b><i class="la la-plus"></i> Modification Multiple</b></div>
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



<form action="{{ route('mprapports.update_multiple') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
            @php
            $i = 1
            @endphp
            @foreach ($mprapports as $mprapport)

           
                <tr class="rows" data-id="{{$i}}">
                    <td>
                        <input type="hidden" name="line[]" value="L{{$i}}">
                        <input type="hidden" value="{{ $mprapport->id }}" name="L{{$i}}_id">

                        <input type="date" value="{{ $mprapport->date_reception }}" name="L{{$i}}_date_reception">
                    </td>
                    <td>
                    <input class="tags_products" value='{{ $mprapport->produit->name }}' name="L{{$i}}_produit_id">

                    </td>
                    <td>
                        <input type="text" autocomplete="off" name="L{{$i}}_num" value="{{ $mprapport->Num }}">
                    </td>
                    <td>
                        <input type="text" autocomplete="off" name="L{{$i}}_nbon" value="{{ $mprapport->Num_bon }}">
                    </td>
                    
                        
                        @if(!is_null($mprapport->fournisseur)) 
                        <td>
                        <input class="tags_fournisseurs" value='{{ $mprapport->fournisseur->name }}' name="L{{$i}}_fournisseur_id">

                        </td>
                        @else 
                        <td>
                        <input class="tags_fournisseurs"  name="L{{$i}}_fournisseur_id">

                        </td>
                        @endif
                       
                    
                           @if(!is_null($mprapport->origine)) 
                           <td>  
                           <input class="tags_origines" value='{{ $mprapport->origine->name }}' name="L{{$i}}_origine_id">

                            </td>
                            @else 
                            <td>  
                            <input class="tags_origines"  name="L{{$i}}_origine_id">

                        </td>
                            @endif
                          
                            @if(!is_null($mprapport->navire)) 
                           <td>  
                           <input class="tags_navires" value='{{ $mprapport->navire->name }}' name="L{{$i}}_navire_id">

                            </td>
                            @else 
                            <td>  
                            <input class="tags_navires" name="L{{$i}}_navire_id">

                        </td>
                            @endif

                     @inject('value','App\Value') {{-- inject before foreach --}}
                     @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                    @foreach($standards->nutriments as $nutriment)
                    <td> <input name="L{{$i}}_nutriment_id[]" value="{{ $nutriment->id }}" hidden />

                        <input data-id='{{ $nutriment->id }}' type="text"
                            name="L{{$i}}_valeur_surbrute_{{ $nutriment->id }}" value="{{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}" />
                    </td>
                    </td>
                    @endforeach
                    <td>
                        <select name="L{{$i}}_commentaire">
                        <option selected value="{{ $mprapport->commentaire }}">{{ $mprapport->commentaire }}</option>

                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </td>
                    <td>
                        <select name="L{{$i}}_conformite">
                        <option selected value="{{ $mprapport->conformite }}">{{ $mprapport->conformite }}</option>

                            <option value="Conforme">Conforme</option>
                            <option value="Non Conforme">Non Conforme</option>
                        </select>
                    </td>
                    <td>
                       <center> <input type="checkbox" name="L{{$i}}_certificat" value="1" checked> </center>
                    </td>
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