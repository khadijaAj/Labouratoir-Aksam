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
    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text" style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>

            </div>

            <input type="text" class="form-control" style="border: 1px solid #ced4da" id="myInput" onkeyup="myFunction()"
                placeholder="Chercher ...">
            <div class="input-group-btn search-panel" style="background-color:#FAFAFA;border: 1px solid #ced4da;">
                <select name="search_param" id="search_param" class="btn btn-light dropdown-toggle"
                    data-toggle="dropdown">
                    <option value="all">Filtrer par</option>
                    <option value="">Commercial</option>
                    <option value="">produit</option>
                    <option value="">Code</option>
                </select>
            </div>
        </div>
    </div>

</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('crapports.create') }}">Ajouter une
                RA</a></button>
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
            <a class="dropdown-item" href="{{ route('exportrc') }}">Excel</a>
            <a class="dropdown-item" id="export-pdf" name="export-pdf" >PDF</a>
        </div>
    </div>



</div>
</div>
<div id="example" style=" margin: 0 auto;"  class="display-none">
<form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcelRC') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="file" />
		<button class="btn btn-secondary">Importer Fichier</button>
        <a  class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>

	</form>
    <br>
</div>
<div class="table-responsive">

    <table id="ra" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>#</th>
                <th><center>N° d’échantillon</center></th>
                <th><center>Client</center></th>
                <th><center>Commercial</center></th>

                <th><center>Produit</center></th>
                <th><center>Date de reception</center></th>

                <th><center>Date d'analyse</center></th>

                <th>
                    <center>Operations</center>
                </th>

            </tr>
        </thead>
        <tbody>
        @foreach ($Crapports as $crapport)
            <tr>
                <td>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <center> &nbsp;&nbsp; <input class="idradio" type="radio" name="id"  value="{{ $crapport->id}}" id="flexRadioDefault1">
</center>
                </td>



               
                <td><center>{{ $crapport->Num}}</center></td>
                <td>{{ $crapport->client->name}}</td>
                <td>{{ $crapport->commercial->name  }}</td>
                <td>{{ $crapport->produit->name  }}</td>
                <td><center>{{ $crapport->date_reception }}</center></td>
                <td><center>{{ $crapport->date_analyse }}</center></td>
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



$("#example1").click(function(){

$("#example").toggleClass('display-none');

});



</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style type="text/css">

    .display-none{

        display: none;

    }

</style>

<script>  
            $(document).ready(function(){  
                    $('#export-pdf').click(function(){  
                        var id = $('.idradio:checked').val(); 
                        window.open("{{URL::to('/')}}/PDF_RC?id="+id, "_blank");
                   
                    });  
            });  
    </script>  
@endsection