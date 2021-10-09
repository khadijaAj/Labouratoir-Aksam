@extends('layouts.app')

@section('title', 'commandes - Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/commandes">
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-clipboard"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/formules">
    <i class="la la-file-text"></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/geolocalisation">
    <i class="la la-map-pin"></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-users"></i>
        Commandes</b></div>
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
<form action="{{route('search_commandes')}}" method="GET">
    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text " style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>

            <input type="text"  class="form-control"
                style="border: 1px solid #ced4da" name="client_name" id="client_name" placeholder="Chercher ...">


        </div>
    </div>
</form>
</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('commandes.create') }}">Ajouter</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button id="example1" type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter<a id="export-pdf" name="export-pdf">PDF</a>
   </button>
    </div>



</div>
</div>
<div id="example" style=" margin: 0 auto;"  class="display-none">
<form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="file" />
		<button class="btn btn-secondary">Importer Fichier</button>
        <a  class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>

	</form>
    <br>
</div>
<div class="table-responsive">

    <table id="myTable" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center> <input type="checkbox" onclick="toggle(this);" /></center>
                </th>
    
                <th>
                    <center>Client</center>
                </th>
                <th>
                    <center>Réference</center>
                </th>
                <th>
                    <center>Date de Demande</center>
                </th>
                <th>
                    <center>Actions</center>
                </th>

            </tr>
        </thead>
        <tbody>
        @if ($commandes->count() == 0)
        <tr>
            <td colspan="4"><center>Aucun résultat à afficher.</center></td>
        </tr>
        @endif
        @foreach ($commandes as $commande)
            <tr>
                <td>
                    <center> <input type="checkbox" class="id" name="id" value="{{ $commande->id}}">
                    </center>
                </td>
            
                @if(!is_null($commande->client))
                <td>
                    <center> {{ $commande->client->name}} </center>
                </td>
                @else
                <td>
                    <center>-</center>
                </td>
                @endif
                <td>
                    <center>{{$commande->reference }}</center>
                </td>
                <td>
                    <center>{{ $commande->date}}</center>
                </td>
                <td>
                    <center>
                        <form action="{{ route('commandes.destroy',$commande->id) }}" method="POST">
                        <a href="{{ route('commandes.show',$commande->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('commandes.edit',$commande->id) }}"><i style="color:#3EB805;"
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
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $commandes->links() !!}
        </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style type="text/css">

    .display-none{

        display: none;

    }

</style>
<script type="text/javascript">



$("#example1").click(function(){

$("#example").toggleClass('display-none');

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
            window.open("{{URL::to('/')}}/PDF_Commande?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_Commande");

        }


    });
    return false;
});


</script>

@endsection
