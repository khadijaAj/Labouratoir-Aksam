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
    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group  mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text" style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>

            </div>

            <input type="text" class="form-control" style="border: 1px solid #ced4da" id="search_en"
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
        <button id="example1" type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button></div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Excel</a>
            <a class="dropdown-item" href="#">Rapport fourrage ( PDF)</a>
            <a class="dropdown-item" href="#">Rapport rations ( PDF)</a>
            <a class="dropdown-item" href="#">Rapport Ensilage de Tritical ( PDF)</a>
        </div>
    </div>



</div>
</div>
<div id="example" style=" margin: 0 auto;"  class="display-none">
<form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importEN') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
    
		<input type="file" name="file" />
		<button class="btn btn-secondary">Importer Fichier</button>

	</form>
    <br>
</div>
<div class="table-responsive">

    <table id="re" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th><center>#</center></th>
                <th><center>Date de reception</center></th>
                <th><center>Identifiant</center></th>
                <th><center>Client</center></th>
                <th><center>Commercial</center></th>
                <th><center>Produit</center></th>
           
                <th>
                    <center>Operations</center>
                </th>

            </tr>
        </thead>
        <tbody>
            @if ($Enrapports->count() == 0)
            <tr>
                <td colspan="7"><center>Aucun résultat à afficher.</center></td>
            </tr>
            @endif
            @foreach ($Enrapports as $enrapport)
            <tr>
                <td>
                    <center> <input type="checkbox" class="id" name="id" value="{{ $enrapport->id}}">
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
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('enrapports.edit',$enrapport->id) }}"><i style="color:#3EB805;"
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
@endsection