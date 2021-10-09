@extends('layouts.app')

@section('title', 'vrapports - Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/commandes">
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item  active">
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
<div class="card-title"><b><i class="la la-file-text"></i>Rapport visite </b></div>
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
<form  action="{{route('search_vrapports')}}" method="GET">

    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text " style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>
            <input type="text"  class="form-control"
                style="border: 1px solid #ced4da" name="client_name" id="client_name" placeholder="Chercher ...">

        </div>
        </form>

    </div>
</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{route('vrapports.create')}}">Ajouter Rapport</a></button>
    </div>

    <div class="col-auto">
        <br>

        <button id="example1" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>

    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter<a id="export-pdf" name="export-pdf">PDF</a>
   </button>
   
    </div>
    <br>
</div>

</div>
<!---------->
<div class="table-responsive">
    <table class="table "  id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center> <input type="checkbox" onclick="toggle(this);" /></center>
                </th>
                <th>
                    <center>Client</center>
                </th>
                <th>
                    <center>Date debut</center>
                </th>
                <th>
                    <center>Date Fin</center>
                </th>
                <th>
                    <center>Type de visite</center>
                </th>
                <th>
                    <center>Observation</center>
                </th>
                <th>
                    <center>Action</center>
                </th>
              

            </tr>
        </thead>
        <tbody>
            @if ($vrapports->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
            @foreach ($vrapports as $vrapport)
            <tr>
               <td>
                    <center> <input type="checkbox" class="id" name="id" value="{{ $vrapport->id}}">
                    </center>
                </td>
                @if(!is_null($vrapport->client))
                <td>
                    <center> {{ $vrapport->client->name}} </center>
                </td>
                @else
                <td>
                    <center>-</center>
                </td>
                @endif
                <td>
                    <center>{{ $vrapport->date_debut }}</center>
                </td>
                <td>
                    <center>{{ $vrapport->date_fin }}</center>
                </td>
                <td>
                    <center>{{ $vrapport->typevisite}}</center>
                </td>

                <td>
                    <center>{{ $vrapport->observation}}</center>
                </td>

               
                <td>

                    <center>
                    <form action="{{ route('vrapports.destory',$vrapport->id)}}" method="POST">
                    <a href="{{ route('vrapports.show',$vrapport->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    

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
        {!! $vrapports->links() !!}
    </div>
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
<script>
$(document).ready(function(even) {
    $("#export-pdf").click(function() {
        var checkvalue = [];
        $.each($("input[name='id']:checked"), function() {
            checkvalue.push($(this).val());
        });
        if (checkvalue.length > 0) {
            window.open("{{URL::to('/')}}/PDF_VR?ids=" + checkvalue, "_blank");
        } else {
            window.open("{{URL::to('/')}}/PDF_VR");

        }


    });
    return false;
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

