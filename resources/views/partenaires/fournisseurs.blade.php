@extends('layouts.app')

@section('title', 'Fournisseurs - Aksam Labs')

@section('links')
<li class="nav-item ">
    <a href="/commerciaux">
        <i class="la la-user-plus"></i>
        <p>Commerciaux</p>
    </a>
</li>

<li class="nav-item ">
    <a href="/clients">
        <i class="la la-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/fournisseurs">
        <i class="la la-industry"></i>
        <p>Fournisseurs</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/navires">
        <i class="la la-ship"></i>
        <p>Navires</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-industry"></i>
        Fournisseurs</b></div>
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
    <div class="form-row  col-sm-6  align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text" style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>

            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" style="border: 1px solid #ced4da" id="search_fournisseur"
                placeholder="Chercher ...">

        </div>
    </div>

</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('fournisseurs.create') }}">Ajouter un
                fournisseur</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button type="submit" id="example1" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="#">Importer</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;"
            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('exportf') }}">Excel</a>
            <a class="dropdown-item" href="/PDF_Fournisseur">PDF</a>

        </div>
    </div>



</div>
</div>
<div id="example" style=" margin: 0 auto;"  class="display-none">
<form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcelFournisseur') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                    <center>#</center>
                </th>
                <th>
                    <center>Nom</center>
                </th>
                <th>
                    <center>Référence</center>
                </th>
                <th>
                    <center>Adresse</center>
                </th>

                <th>
                    <center>Actions</center>
                </th>

            </tr>
        </thead>
        <tbody>
        @foreach ($fournisseurs as $fournisseur)
            <tr>
                <th scope="row">
                    <center>{{ $fournisseur->id }}</center>
                </th>


                <td>
                    <center>{{ $fournisseur->name }}</center>
                </td>
                <td>
                    <center>{{ $fournisseur->Reference }}</center>
                </td>
                <td>
                    <center>{{ $fournisseur->adresse }}</center>
                </td>
                <td>
                        <center>
                            <form action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="POST">

                                <a href="{{ route('fournisseurs.show',$fournisseur->id) }}"><i style="color:#000;"
                                        class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                                <a href="{{ route('fournisseurs.edit',$fournisseur->id) }}"><i style="color:#3EB805;"
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

@endsection