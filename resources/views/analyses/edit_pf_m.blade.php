@extends('layouts.app')

@section('title', 'Modifier Produits finis - Aksam Labs')

@section('links')
<li class="nav-item">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item active ">
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

<form action="{{ route('pfrapports.update_multiple') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="table-responsive">
        <table class="table table-bordered" id="tableAnalyse">
            <thead>
                <tr>
                <input name="row_id[]"  hidden />
                    <th>
                        <center>Date Fabrication</center>
                    </th>
                    <th>
                        <center>Produit</center>
                    </th>
                    <th>
                        <center>N° Ech</center>
                    </th>
                    <th>
                        <center>Identification</center>
                    </th>
                    @foreach($standards->nutriments as $nutriment)


                    <th>
                        <center>{{ $nutriment->name }}</center>
                    </th>
                    @endforeach
                    <th>
                        <center>Activité d'eau</center>
                    </th>
                    <th>
                        <center>Moisissure</center>
                    </th>

                    <th>
                        <center>Commentaire</center>
                    </th>
                    <th>
                        <center>Conformité</center>
                    </th>

                </tr>
            </thead>
            <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($pfrapports as $pfrapport)
                <tr class="rows" data-id="{{$i}}">

                    <td>
                        <input type="hidden" name="line[]" value="L{{$i}}">
                        <input type="hidden" value="{{ $pfrapport->id }}" name="L{{$i}}_id">

                        <input type="date" value="{{ $pfrapport->date_fabrication }}" name="L{{$i}}_date_fabrication">
                    </td>
                    <td>
                    <input class="tags_products" value='{{ $pfrapport->produit->name }}' name="L{{$i}}_produit_id">

                    </td>
                    <td>
                        <input type="text" name="L{{$i}}_num" value="{{ $pfrapport->Num }}">
                    </td>
                    <td>
                        <input type="text" name="L{{$i}}_identification" value="{{ $pfrapport->Identification }}">
                    </td>
                    @inject('value','App\Value') {{-- inject before foreach --}}
                    @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                    @foreach($standards->nutriments as $nutriment)


                    <td>                    <input name="L{{$i}}_nutriment_id[]" value="{{ $nutriment->id }}" hidden />

                                    <input
                                            data-id='{{ $nutriment->id }}'  type="text" value="{{ $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}"
                                            
                                            name="L{{$i}}_valeur_surbrute_{{ $nutriment->id }}" />
                                </td>
                    </td>
                    @endforeach
                    <td>
                        <input type="text" name="L{{$i}}_ACE" value="{{ $pfrapport->ACE }}">
                    </td>
                    <td>
                        <input type="text" name="L{{$i}}_MSR" value="{{ $pfrapport->MSR }}">
                    </td>
                    <td>
                        <select name="L{{$i}}_commentaire">
                            <option selected value="{{ $pfrapport->Commentaire }}">{{ $pfrapport->Commentaire }}</option>
                            <option value="intern">Interne</option>
                            <option value="extern">Externe</option>
                        </select>
                    </td>
                    <td>
                        <select name="L{{$i}}_conformite">
                            <option selected value="{{ $pfrapport->conformite }}">{{ $pfrapport->conformite }}</option>
                            <option value="Conforme">Conforme</option>
                            <option value="Non Conforme">Non Conforme</option>
                        </select>
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