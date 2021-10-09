@extends('layouts.app')

@section('title', 'standardsvl - Aksam Labs')


@section('links')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<li class="nav-item ">
    <a href="/users">
        <i class="la la-users"></i>
        <p>Utilisateurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/logs">
        <i class="la la-save"></i>
        <p>Journalisation</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/standards">
        <i class="la la-key"></i>
        <p>Standards Rapports</p>
    </a>
</li>

@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-key"></i>
        Standards</b></div>
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
</div>
@endif
<div class="form-row col-sm-6  align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{ route('standardsvl.create') }}">Ajouter un critère</a></button>
    </div>
</div>
</div>
<div class="table-responsive">

    <table id="myTable"  class="table table-bordered">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center>Libellé</center>
                </th>
                <th>
                    <center>Valeur</center>
                </th>
                <th>
                    <center>Actions</center>
                </th>

            </tr>
        </thead>
        <tbody>
        @if ($standardsvl->count() == 0)
            <tr>
                <td ><center>Aucun résultat à afficher.</center></td>
            </tr>
            @endif
            @foreach($standardsvl as $sl)
            <tr>
                <td>
                    <center>{{$sl->libelle}}</center>
                </td>
            
                <td>
                    <center>{{$sl->valeur}}</center>
                </td>
                <td>
                <form action="{{ route('standardsvl.destroy',$sl->id)}}" method="POST">
                      
                            @method('DELETE')
                            @csrf
                            <center> <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                        class="la la-trash-o"></i></button></center>
                 </form> 
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $standardsvl->links() !!}
        </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style type="text/css">
.display-none {

    display: none;

}
</style>

<script type="text/javascript">
$("#example1").click(function() {

    $("#example").toggleClass('display-none');

});
</script>
@endsection