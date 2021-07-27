@extends('layouts.app')

@section('title', 'Ajout Produits finis - Aksam Labs')

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
<div class="card-title"><b><i class="la la-plus"></i> Insertion Multiple </b></div>
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

<form action="{{ route('pfrapports.store_multiple') }}" method="POST" enctype="multipart/form-data">
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

                <tr class="rows" data-id="1">

                    <td>
                        <input type="hidden" name="line[]" value="L1">
                        <input type="date" value="{{ old('date_reception') }}" name="L1_date_fabrication">
                    </td>
                    <td>
                        <select name="L1_produit_id">
                            <option selected></option>
                            @foreach( $produits as $produit)
                            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="L1_num" value="{{ old('num') }}">
                    </td>
                    <td>
                        <input type="text" name="L1_identification" value="{{ old('identification') }}">
                    </td>
                    @foreach($standards->nutriments as $nutriment)


                    <td>                    <input name="L1_nutriment_id[]" value="{{ $nutriment->id }}" hidden />

                                    <input
                                            data-id='{{ $nutriment->id }}'  type="text"
                                            
                                            name="L1_valeur_surbrute_{{ $nutriment->id }}" />
                                </td>
                    </td>
                    @endforeach
                    <td>
                        <input type="text" name="L1_ACE" value="{{ old('ACE') }}">
                    </td>
                    <td>
                        <input type="text" name="L1_MSR" value="{{ old('MSR') }}">
                    </td>
                    <td>
                        <select name="L1_commentaire">
                            <option selected>Choisir ..</option>
                            <option value="intern">Interne</option>
                            <option value="extern">Externe</option>
                        </select>
                    </td>
                    <td>
                        <select name="L1_conformite">
                            <option value="Conforme">Conforme</option>
                            <option value="Non Conforme">Non Conforme</option>
                        </select>
                    </td>
                </tr>


            </tbody>
        </table>
        <div class="card-action">
        <center><button type="button" id="addLines" class="btn btn-secondary" style="margin-right: 10px">Ajouter un ligne</button><button type="submit" class="btn btn-success">Enregistrer</button></center>
    </div>
    <br>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>

		$("#addLines").click(function(e){
            var last_tr = $('#tableAnalyse tbody tr:last-child').html();
            var last_id = $('#tableAnalyse tbody tr:last-child').attr("data-id");
            var next_id = parseInt(last_id) + 1;
            var new_line = last_tr.split("L"+last_id).join("L"+next_id);
            $('#tableAnalyse tbody').append('<tr class="rows" data-id="'+next_id+'">'+new_line+'</tr>');
     
        });

   
 
	</script>
@endsection