@extends('layouts.app')

@section('title', 'Rapport Analyse - Aksam Labs')

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
<div class="card-title"><b><i class="la la-eyedropper"></i>
        Rapport d'Analyse</b></div>
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
    <form action="{{ route('search_ra') }}" method="POST">
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
                        <option value="multiple">Recherche Multiple</option>


                    </select>
                </div>

            </div>
          
            <div class="form-row" id="multiple" style="float: right;display:none;">

            <div class="form-group col-md-4">
            <div>
  <input type="radio" id="type_date" name="type_date" value="date_analyse"
         checked>
  <label for="type_d">Date d'analyse</label>
</div>

<div>
  <input type="radio" id="type_date" name="type_date" value="date_reception">
  <label for="type_d">Date de reception</label>
</div>
</div>

<div class="form-group col-md-4">
    <label for="start">De : </label>
    <input type="date" class="form-control" name="date_start_m">

</div>
<div class="form-group col-md-4">
    <label for="date_reception"> Jusqu'à : </label>
    <input type="date" class="form-control" name="date_end_m">
</div>
<div class="form-group col-md-4">
    <label for="produit">Produit</label>
    <input class="tags_products form-control" name='produit_name_m'>
</div>
<div class="form-group col-md-4">
    <label for="client">Client</label>
    <input type="text" class="tags_clients form-control" name="client_name_m">

</div>
<div class="form-group col-md-4">
    <label for="commercial">Commercial</label>
    <input type="text" class="tags_commerciaux form-control" name="commercial_name_m">
</div>

<div style=" float: right;
text-align: right;" class="form-group col-md-7">

    <button type="submit" style=" float: right;
text-align: right;" class="btn btn-secondary">- Chercher -</button>
</div>
<div class="form-row" id="submit_div" style="display:none;">


    &nbsp;&nbsp;<button type="submit" style=" float: right;
text-align: right;" class="btn btn-secondary">- Chercher -</button>
</div>





</div>  
            </div>
</form>
            <br><br>
            <div class="form-row align-items-right" style="float:left;">

                <div class="col-auto">
                    <br>
                    <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                            style="color: #ffffff; text-decoration: none; "
                            href="{{ route('crapports.create') }}">Ajouter
                            RA</a></button>
                </div>
                <div class="col-auto">
                    <br>
                    <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                            style="color: #ffffff; text-decoration: none; " href="/add_ra_m">Insertion
                            multiple</a></button>
                </div>
                <div class="col-auto">
                    <br>
                    <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                            style="color: #ffffff; text-decoration: none; " id="edit_m" name="edit_m">Modification
                            multiple</a></button>
                </div>
                <div class="col-auto">
                    <br>
                    <button id="example1" type="submit" style="border-radius: 40px ;background-color:#3A9341;"
                        class="btn mb-2"><a style="color: #ffffff; text-decoration: none; "
                            href="#">Importer</a></button>
                </div>
                <div class="col-auto">
                    <br>
                    <button class="btn btn-secondary dropdown-toggle"
                        style="border-radius: 40px ;background-color:#3A9341;" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Exporter
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="export-excel" name="export-excel">Excel</a>
                        <a class="dropdown-item" id="export-pdf" name="export-pdf">PDF</a>
                    </div>
                </div>



            </div>
        </div>
        <div id="example" style=" margin: 0 auto;" class="display-none">
            <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;"
                action="{{ URL::to('importExcelRC') }}" class="form-horizontal" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" />
                <button class="btn btn-secondary">Importer Fichier</button>
                <a class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>

            </form>
            <br>
        </div>
        <div class="table-responsive">

            <table id="ra" class="table">

                <thead style="background-color:#FAFAFA;">
                    <tr>
                        <th>
                            <center> <input type="checkbox" onclick="toggle(this);" /></center>
                        </th>
                        <th>
                            <center>N° Ech</center>
                        </th>
                        <th>
                            <center>Client</center>
                        </th>
                        <th>
                            <center>Commercial</center>
                        </th>
                        <th>
                            <center>Date de reception</center>
                        </th>
                        <th>
                            <center>Date d'analyse</center>
                        </th>
                        <th>
                            <center>Produit</center>
                        </th>
                        <th>
                            <center>Cout</center>
                        </th>

                        <th>
                            <center>Operations</center>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if ($Crapports->count() == 0)
                    <tr>
                        <td colspan="9">
                            <center>Aucun résultat à afficher.</center>
                        </td>
                    </tr>
                    @endif
                    @foreach ($Crapports as $crapport)
                    <tr>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <center><input type="checkbox" class="id" name="id" value="{{ $crapport->id }}">
                            </center>
                        </td>




                        <td>
                            <center>{{ $crapport->Num}}</center>
                        </td>
                        <td>{{ $crapport->client->name}}</td>
                        <td>{{ $crapport->commercial->name  }}</td>
                        <td>
                            <center>{{ $crapport->date_reception }}</center>
                        </td>
                        <td>
                            <center>{{ $crapport->date_analyse }}</center>
                        </td>
                        <td>{{ $crapport->produit->name  }}</td>
                        <td>
                            <center>{{ $crapport->Cout  }}</center>
                        </td>

                        <td>
                            <center>
                                <form action="{{ route('crapports.destroy',$crapport->id) }}" method="POST">


                                    <a href="{{ route('crapports.show',$crapport->id) }}"><i style="color:#000;"
                                            class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                                    <a href="{{ route('crapports.edit',$crapport->id) }}"><i style="color:#3EB805;"
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

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
            $("#export-pdf").click(function() {
                var checkvalue = [];
                $.each($("input[name='id']:checked"), function() {
                    checkvalue.push($(this).val());
                });

                if (checkvalue.length > 0) {
                    window.open("{{URL::to('/')}}/PDF_RC?ids=" + checkvalue, "_blank");
                } else {
                    window.open("{{URL::to('/')}}/PDF_RC");

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
                    window.open("{{URL::to('/')}}/exportrc?ids=" + checkvalue, "_blank");
                } else {
                    window.open("{{URL::to('/')}}/exportrc");

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
                    window.open("{{URL::to('/')}}/edit_ra_m?ids=" + checkvalue, "_self");
                } else {
                    alert(" Choisir au moins un rapport à modifier");

                }


            });
            return false;
        });
        </script>



        @endsection