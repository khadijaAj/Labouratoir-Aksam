@extends('layouts.app')

@section('title', 'Rapport Ensilage - Aksam Labs')

@section('links')

<li class="nav-item ">
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
<div class="card-title"><b><i class="la la-database"></i>
        Rapport d'Ensilage</b></div>
@endsection

@section('content')

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
<div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<form action="{{ route('search_en') }}" method="POST">
        {{ csrf_field() }}

    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group  mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text" style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>

            </div>


            <input type="text" class="form-control" style="border: 1px solid #ced4da" id="search" name="search"
                placeholder="Chercher ...">

            <div class="input-group-btn search-panel" style="background-color:#FAFAFA;border: 1px solid #ced4da;">
                <select id='purpose' name="search_param" id="search_param" class="btn btn-light dropdown-toggle"
                    data-toggle="dropdown">
                    <option value="all">Filtrer par</option>
                    <option value="date_reception">Date de reception</option>
                    <option value="identifiant">Identifiant</option>
                    <option value="multiple">Recherche Multiple</option>


                </select>
            </div>
            <div class="form-row" id="submit_div" style="display:none;">


&nbsp;&nbsp;<button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">-  Chercher -</button>
</div>
        </div>




      

    </div>
    
    <div class="form-row" id="multiple" style="float: right;display:none;">

<div class="form-group col-md-2">
    <label for="start">De : </label>
    <input type="date" class="form-control" name="date_start_m">

</div>
<div class="form-group col-md-2">
    <label for="date_reception"> Jusqu'à : </label>
    <input type="date" class="form-control" name="date_end_m">
</div>
<div class="form-group col-md-2">
    <label for="produit">Produit</label>
    <input class="tags_products form-control" name='produit_name_m'>
</div>
<div class="form-group col-md-2">
    <label for="client">Client</label>
    <input type="text" class="tags_clients form-control" name="client_name_m">

</div>
<div class="form-group col-md-2">
    <label for="commercial">Commercial</label>
    <input type="text" class="tags_commerciaux form-control" name="commercial_name_m">
</div>

<div style=" float: right;
text-align: right;" class="form-group col-md-7">

    <button type="submit" style=" float: right;
text-align: right;" class="btn btn-secondary">- Chercher -</button>
</div>

</div>
   <div class="form-row" id="submit_div" style="display:none;">


&nbsp;&nbsp;<button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">-  Chercher -</button>
</div>
</div>
</form>
<br><br><br>
<div class="form-row align-items-right" style="float:left;">


    <div class="col-auto">
        <br>
        <button id="example1" type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " id="edit_m" name="edit_m">Modification
                multiple</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="export-excel" name="export-excel" href="#">Excel</a>
            <a class="dropdown-item" id="export-pdf_fourrages">Rapport fourrage ( PDF)</a>
            <a class="dropdown-item" id="export-pdf_rations">Rapport rations ( PDF)</a>
            <a class="dropdown-item" id="export-pdf_tritical">Rapport Ensilage de Tritical ( PDF)</a>
        </div>
    </div>



</div>
</div>
<div id="example" style=" margin: 0 auto;" class="display-none">
    <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importEN') }}"
        class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input name="filenames[]" type="file" multiple="multiple" />

        <button class="btn btn-secondary">Importer Fichier</button>

    </form>
    <br>
</div>
<div class="table-responsive">

    <table id="re" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center> <input type="checkbox" onclick="toggle(this);" /></center>
                </th>
                <th>
                    <center>Date de reception</center>
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
                    <center>Operations</center>
                </th>

            </tr>
        </thead>
        <tbody>
            @if ($Enrapports->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
            @foreach ($Enrapports as $enrapport)
            <tr>
                <td>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <center><input type="checkbox" class="id" name="id" value="{{ $enrapport->id }}">
                    </center>
                </td>

                <td>
                    <center>{{ $enrapport->date_reception}}</center>
                </td>
                <td>
                    <center>{{ $enrapport->Identifiant }}</center>
                </td>
                <td>
                    <center>{{ $enrapport->client->name}}</center>
                </td>
                @if(!is_null($enrapport->commercial))
                <td>
                    <center> {{ $enrapport->commercial->name }} </center>
                </td>
                @else
                <td>
                    <center>-</center>
                </td>
                @endif

                <td>
                    <center>{{ $enrapport->produit->name}}</center>
                </td>



                <td>
                    <center>
                        <form action="{{ route('enrapports.destroy',$enrapport->id) }}" method="POST">


                            <a href="{{ route('enrapports.show',$enrapport->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>



                            @csrf
                            @method('DELETE')

                            <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                    class="la la-trash-o"></i></button>
                        </form>
                    </center>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
   
</div>

<script type="text/javascript">
$("#example1").click(function() {

    $("#example").toggleClass('display-none');

});
</script>

<style type="text/css">
.display-none {

    display: none;

}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $('#purpose').on('change', function() {
        $val = $('#purpose option:selected').val();
        if ($val == "date_reception") {
            document.getElementById("search").disabled = false;
            $("#multiple").hide();
            $("#submit_div").show();

            document.getElementById('search').type = 'date';


        } else if ($val == "multiple") {
            document.getElementById("search").disabled = true;

            $("#submit_div").hide();
            $("#multiple").show();


            document.getElementById('search').type = 'text';


        } else {
            $("#multiple").hide();
            $("#submit_div").show();

            document.getElementById("search").disabled = false;

            document.getElementById('search').type = 'text';

        }

    });
});

$(function() {
    var availableTags = [
        @foreach($produits as $produit)
        "<?=$produit['name']?>",
        @endforeach
    ];
    $(".tags_products").autocomplete({
        source: availableTags

    });

    var availableTags1 = [
        @foreach($clients as $client)
        "<?=$client['name']?>",
        @endforeach
    ];
    $(".tags_clients").autocomplete({
        source: availableTags1

    });


    var availableTags3 = [
        @foreach($commerciaux as $commercial)
        "<?=$commercial['name']?>",
        @endforeach
    ];
    $(".tags_commerciaux").autocomplete({
        source: availableTags3

    });
});
</script>




<script>
$(document).ready(function(even) {
    $("#export-pdf_rations").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });

        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_EN_RATION?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_EN_RATION");

        }


    });
    return false;
});
$(document).ready(function(even) {
    $("#export-pdf_fourrages").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });

        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_EN_FOURRAGE?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_EN_FOURRAGE");

        }


    });
    return false;
});

$(document).ready(function(even) {
    $("#export-pdf_tritical").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });

        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_EN_TRITICAL?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_EN_TRITICAL");

        }


    });
    return false;
});

$(document).ready(function(even) {
    $("#export-excel").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });
        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/exporten?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/exporten");

        }


    });
    return false;
});


$(document).ready(function(even) {
    $("#edit_m").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });
        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/edit_en_m?ids=" + checkvalue, "_self");
        } else {
            alert(" Choisir au moins un rapport à modifier");

        }


    });
    return false;
});
</script>

@endsection