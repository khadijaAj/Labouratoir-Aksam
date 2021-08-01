<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@extends('layouts.app')

@section('title', 'Commerciaux - Aksam Labs')

@section('links')

<li class="nav-item active">
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
<li class="nav-item ">
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

<div class="card-title"><b><i class="la la-user-plus"></i>
        Commerciaux</b></div>
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
<form action="{{ route('search_commercial') }}" method="GET">

    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text " style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>
            <input type="text"  class="form-control"
                style="border: 1px solid #ced4da" name="search" id="search" placeholder="Chercher ...">

        </div>
    </div>


</div>
</form>

<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('commercials.create') }}">Ajouter un
                commercial</a></button>
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
            <a class="dropdown-item" href="{{ route('exportc') }}">Excel</a>
            <a class="dropdown-item" href="{{ route('pdf_g') }}">PDF</a>
        </div>
    </div>

    <br>

</div>

</div>
<div id="example" style=" margin: 0 auto;" class="display-none">

    <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;"
        action="{{ URL::to('importExcelCommercial') }}" class="form-horizontal" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-secondary">Importer Fichier</button>
        <a  class="btn btn-danger" href="{{ asset('pdf/guide.pdf') }}">Guide d'importation</a>

</a>
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
                    <center>Actions</center>
                </th>

            </tr>
        </thead>
        <tbody>
      
        @if($commerciaux->isNotEmpty())

            @foreach ($commerciaux as $commercial)
            <tr>
                <th scope="row">
                    <center>{{ $commercial->id }}</center>
                </th>


                <td>
                    <center>{{ $commercial->name }}</center>
                </td>
                <td>
                    <center>{{ $commercial->Reference }}</center>
                </td>

                <td>
                    <center>
                        <form action="{{ route('commercials.destroy',$commercial->id) }}" method="POST">

                            <a href="{{ route('commercials.show',$commercial->id) }}"><i style="color:#000;"
                                    class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{ route('commercials.edit',$commercial->id) }}"><i style="color:#3EB805;"
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
        @else 
        <tr>
            <td colspan="4"><center>Aucun résultat à afficher.</center></td>
        </tr>
@endif
    </table>
     
    
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style type="text/css">
.display-none {

    display: none;

}
</style>

<script>

    
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>





<script type="text/javascript">
     
$("#example1").click(function() {

    $("#example").toggleClass('display-none');

});


</script>
<script>
   $(document).ready(function() {
    $('#example').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );



    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/bootstrap-table-pagination.js"></script>
<script src="js/pagination.js"></script>
@endsection