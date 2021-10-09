@extends('layouts.app')

@section('title', 'formules - Aksam Labs')

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
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-clipboard"></i>
        <p>Rapport de  Visite</p>
    </a>
</li>
<li class="nav-item  active">
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
<div class="card-title"><b><i class="la la-file-text"></i>Formules</b></div>
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
<form  action="{{route('search_formules')}}" method="GET">

    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

         

            <div class="input-group-prepend">
                <div class="input-group-text " style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>

            <input type="text"  class="form-control"
                style="border: 1px solid #ced4da"  name="client_name"  id="client_name" placeholder="Chercher ...">


        </div>
        </form>

    </div>
</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{route('formules.create')}}">Ajouter une formule</a></button>
    </div>

    <div class="col-auto">
        <br>

        <button id="example1" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>

    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Excel</a>
            <a class="dropdown-item" href="#">PDF</a>
        </div>
    </div>
    <br>
</div>

</div>
<div id="example" style=" margin: 0 auto;" class="display-none">

    <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;"
        action="{{ URL::to('importExcelFormule') }}" class="form-horizontal" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-secondary">Importer Fichier</button>
        <a  class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>
    </form>
</div>
<!---------->
<div class="table-responsive">
    <table class="table "  id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center> #</center>
                </th>
                <th>
                    <center>Date creation</center>
                </th>
                <th>
                    <center>Client</center>
                </th>
                <th>
                    <center>Ensilage</center>
                </th>
                <th>
                    <center>Foin</center>
                </th>
                <th>
                    <center>Paille</center>
                </th>
                <th>
                    <center>Fourrage</center>
                </th>
                <th>
                    <center>Aliment</center>
                </th>
                <th>
                    <center>Trx soja</center>
                </th>
                <th>
                    <center>Coque Soja</center>
                </th>
                <th>
                    <center>CMV</center>
                </th>
                <th>
                    <center>Mais broyé</center>
                </th>
                <th>
                    <center>PSB</center>
                </th>
                <th>
                    <center>Bicarbonate</center>
                </th>
                <th>
                    <center>Niveau Ensilage</center>
                </th>
                <th>
                    <center>Niveau Production</center>
                </th>
                <th>
                    <center>Autre</center>
                </th>
                <th>
                    <center>Valeur MS</center>
                </th>
                <th>
                    <center>Action</center>
                </th>

            </tr>
        </thead>
        <tbody>
            @if ($formules->count() == 0)
            <tr>
                <td colspan="7">
                    <center>Aucun résultat à afficher.</center>
                </td>
            </tr>
            @endif
            @foreach ($formules as $formule)
            <tr>
                <td>
                    <center>{{ $formule->id }}</center>
                </td>
                <td>
                    <center>{{ $formule->date_creation}}</center>
                </td>
                @if(!is_null($formule->client))
                <td>
                    <center> {{ $formule->client->name}} </center>
                </td>
                @else
                <td>
                    <center>-</center>
                </td>
                @endif

                <td>
                    <center>{{ $formule->ensilage}}</center>
                </td>

                <td>
                    <center>{{ $formule->foin}}</center>
                </td>

                <td>
                    <center>{{ $formule->paille}}</center>
                </td>
                <td>
                    <center>{{ $formule->fourrage}}</center>
                </td>
                <td>
                    <center>{{ $formule->aliment}}</center>
                </td>

                <td>
                    <center>{{ $formule->trxSoja}}</center>
                </td>

                <td>
                    <center>{{ $formule->coqueSoja}}</center>
                </td>
                <td>
                    <center>{{ $formule->cmv}}</center>
                </td>
                <td>
                    <center>{{ $formule->maisbroye}}</center>
                </td>

                <td>
                    <center>{{ $formule->psb}}</center>
                </td>
                <td>
                    <center>{{ $formule->bicarbonate}}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauensilage }}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauproduction }}</center>
                </td>
                <td>
                    <center>{{ $formule->autre}}</center>
                </td>

                <td>
                    <center>{{ $formule->valeurms}}</center>
                </td>
                <td>
                    <center>
                    <form action="{{ route('formules.destory',$formule->id)}}" method="POST">
            
                    <button class="btn btn-link"  type="submit">  <a href="{{ route('formules.edit',$formule->id) }}"><i style="color:#3EB805;" class="la la-edit"></i></a>
                    @csrf
                   @method('delete')

                    <button class="btn btn-link" type="submit"><i style="color:#C1130B;" class="la la-trash-o"></i></button>
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


@endsection
