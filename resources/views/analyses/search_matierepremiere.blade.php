@extends('layouts.app')
@section('title', 'Matieres Premieres - Aksam Labs')
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
<div class="card-title"><b><i class="la la-cart-arrow-down"></i>
        Matieres Premieres</b></div>
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

<div>
    <form action="{{ route('search_mp') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-row  col-sm-6  align-items-right" style="float:right;">

            <div class="input-group mb-2">

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
                        <option value="produit">Produit</option>
                        <option value="fournisseur">Fournisseur</option>
                        <option value="origine">Origine</option>
                        <option value="navire">Navire</option>
                        <option value="multiple">Recherche multiple</option>

                    </select>
                </div>

                <div class="form-row" id="produit" style="float: right;display:none;">

                    <div class="form-group col-md-8">
                        <label for="produits">Produit :</label>

                        <input type='text' placeholder="Choisir .." class="tags_products form-control"
                            name="produit_name" />
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <label for="start">De : </label>
                        <input type="date" class="form-control" name="date_start_p">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_reception"> Jusqu'?? : </label>
                        <input type="date" class="form-control" name="date_end_p">
                    </div>

                    <div style=" float: right;
    text-align: right;" class="form-group col-md-7">

                        <button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                    </div>
                </div>
                <div class="form-row" id="fournisseur" style="float: right;display:none;">
                    <br>

                    <div class="form-group col-md-8">
                        <label for="fournisseur">Fournisseur :</label>

                        <input type='text' placeholder="Choisir .." class="tags_fournisseurs form-control"
                            name="fournisseur_name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">De : </label>
                        <input type="date" class="form-control" name="date_start_f">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_reception"> Jusqu'?? : </label>
                        <input type="date" class="form-control" name="date_end_f">
                    </div>

                    <div style=" float: right;
    text-align: right;" class="form-group col-md-7">

                        <button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                    </div>

                </div>

                <div class="form-row" id="submit_div" style="display:none;">


                    &nbsp;&nbsp;<button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                </div>

                <div class="form-row" id="navire" style="float: right;display:none;">
                    <div class="form-group col-md-8">
                        <label for="navires">Navire :</label>

                        <input type='text' placeholder="Choisir .." class="tags_navires form-control"
                            name="navire_name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">De : </label>
                        <input type="date" class="form-control" name="date_start_n">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_reception"> Jusqu'?? : </label>
                        <input type="date" class="form-control" name="date_end_n">
                    </div>

                    <div style=" float: right;
    text-align: right;" class="form-group col-md-7">

                        <button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                    </div>
                </div>
                <div class="form-row" id="origine" style="float: right;display:none;">
                    <div class="form-group col-md-8">
                        <label for="origine">Origine :</label>

                        <input type='text' placeholder="Choisir .." class="tags_origines form-control"
                            name="origine_name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">De : </label>
                        <input type="date" class="form-control" name="date_start_o">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_reception"> Jusqu'?? : </label>
                        <input type="date" class="form-control" name="date_end_o">
                    </div>

                    <div style=" float: right;
    text-align: right;" class="form-group col-md-7">

                        <button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                    </div>
                </div>
                <div class="form-row" id="multiple" style="float: right;display:none;">

                    <div class="form-group col-md-4">
                        <label for="start">De : </label>
                        <input type="date" class="form-control" name="date_start_m">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="date_reception"> Jusqu'?? : </label>
                        <input type="date" class="form-control" name="date_end_m">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="navire">Produit</label>
                        <input class="tags_products form-control" name='produit_name_m'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fournisseur">Fournisseur</label>
                        <input type="text" class="tags_fournisseurs form-control" name="fournisseur_name_m">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="navire">Navire</label>
                        <input type="text" class="tags_navires form-control" name="navire_name_m">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="navire">Origine</label>
                        <input type="text" class="tags_origines form-control" name="origine_name_m">
                    </div>

                    <div style=" float: right;
    text-align: right;" class="form-group col-md-7">

                        <button type="submit" style=" float: right;
    text-align: right;" class="btn btn-secondary">- Chercher -</button>
                    </div>
                </div>
            </div>

        </div>

</div>
<br><br>
</form>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-1"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('mprapports.create') }}">Ajouter
                MP</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="/add_mp_m">Insertion multiple</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " id="edit_m" name="edit_m">Modification
                multiple</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button id="example1" type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="export-excel" name="export-excel">Excel</a>
            <a class="dropdown-item" id="export-pdf" name="export-pdf">PDF</a>
            <a class="dropdown-item" id="export-pdf-mycotoxine" name="export-pdf-mycotoxine">PDF ( Rapport Mycotoxine )
            </a>

        </div>
    </div>

</div>
</div>
<div id="example" style=" margin: 0 auto;" class="display-none">
    <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcelMP') }}"
        class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-secondary">Importer Fichier</button>
        <a class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>

    </form>
    <br>
</div>
<div class="table-responsive">

    <table class="table " id="dataTable" width="100%" cellspacing="0">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center> <input type="checkbox" onclick="toggle(this);" /></center>
                </th>
                <th>
                    <center>D Reception</center>
                </th>
                <th>
                    <center>Produit</center>
                </th>
                <th>
                    <center>N?? bon</center>
                </th>
                <th>
                    <center>Fournisseur</center>
                </th>
                @inject('value','App\Value') {{-- inject before foreach --}}
                @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                @foreach($standards->nutriments as $nutriment)
                @if(strpos($nutriment->name, 'NIR') !== false || $nutriment->name=="Amidon")
                <th>
                    <center>{{ $nutriment->name }}</center>
                </th>
                @endif
                @endforeach

                <th>
                    <center>Operations</center>
                </th>

            </tr>
        </thead>
        <tbody>
            @if ($Mprapports->count() == 0)
            <tr>
                <td colspan="12">
                    <center>Aucun r??sultat ?? afficher.</center>
                </td>
            </tr>
            @endif
            @foreach ($Mprapports as $mprapport)
            <tr>
                <td>
                    <center> <input type="checkbox" class="id" name="id" value="{{ $mprapport->id}}">
                    </center>
                </td>

                <td>
                    <center>{{ $mprapport->date_reception}}</center>
                </td>

                <td>
                    <center>{{ $mprapport->produit->name}}</center>
                </td>
                <td>
                    <center>{{ $mprapport->Num_bon}}</center>
                </td>
                @if(!is_null($mprapport->fournisseur))
                <td>
                    <center>{{ $mprapport->fournisseur->name}}</center>
                </td>
                @else
                <td></td>
                @endif

                @inject('value','App\Value') {{-- inject before foreach --}}
                @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                @foreach($standards->nutriments as $nutriment)

                @if(strpos($nutriment->name, 'NIR') !== false || $nutriment->name=="Amidon")
                <th>
                    <center>
                        {{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}
                    </center>
                </th>
                @endif
                @endforeach

                <td>
                    <center>
                        <form action="{{ route('mprapports.destroy',$mprapport->id) }}" method="POST">


                            <a href="{{ route('mprapports.show',$mprapport->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('mprapports.edit',$mprapport->id) }}"><i style="color:#3EB805;"
                                    class="la la-edit"></i></a>

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
            $("#produit").hide();
            $("#fournisseur").hide();
            $("#navire").hide();
            $("#origine").hide();
            $("#submit_div").show();
            document.getElementById('search').type = 'date';


        } else if ($val == "multiple") {
            document.getElementById("search").disabled = true;

            $("#produit").hide();
            $("#fournisseur").hide();
            $("#navire").hide();
            $("#origine").hide();
            $("#multiple").show();
            $("#submit_div").hide();
            document.getElementById('search').type = 'text';


        } else {
            document.getElementById("search").disabled = true;

            $("#multiple").hide();
            $("#submit_div").hide();
            document.getElementById('search').type = 'text';

            if ($val == "produit") {
                $("#produit").show();
                $("#fournisseur").hide();
                $("#navire").hide();
                $("#origine").hide();


            } else if ($val == "fournisseur") {
                $("#produit").hide();
                $("#fournisseur").show();
                $("#navire").hide();
                $("#origine").hide();

            } else if ($val == "origine") {
                $("#produit").hide();
                $("#fournisseur").hide();
                $("#navire").hide();
                $("#origine").show();


            } else if ($val == "navire") {
                $("#produit").hide();
                $("#fournisseur").hide();
                $("#navire").show();
                $("#origine").hide();
                $("#submit_div").hide();


            }


        }


    });
});
$('.datepicker').datepicker();

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
        @foreach($fournisseurs as $fournisseur)
        "<?=$fournisseur['name']?>",
        @endforeach
    ];
    $(".tags_fournisseurs").autocomplete({
        source: availableTags1
    });

    var availableTags2 = [
        @foreach($origines as $origine)
        "<?=$origine['name']?>",
        @endforeach
    ];
    $(".tags_origines").autocomplete({
        source: availableTags2
    });

    var availableTags3 = [
        @foreach($navires as $navire)
        "<?=$navire['name']?>",
        @endforeach
    ];
    $(".tags_navires").autocomplete({
        source: availableTags3
    });
});
</script>


<script>
$(document).ready(function(even) {
    $("#export-pdf").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });
        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_MP?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_MP");

        }


    });
    return false;
});

$(document).ready(function(even) {
    $("#export-pdf-mycotoxine").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });
        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_MP_Mycotoxine?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_MP_Mycotoxine");

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
            window.open("{{URL::to('/')}}/exportmp?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/exportmp");

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
            window.open("{{URL::to('/')}}/edit_mp_m?ids=" + checkvalue, "_self");
        } else {
            alert(" Choisir au moins un rapport ?? modifier");

        }


    });
    return false;
});
</script>

@endsection