@extends('layouts.app')

@section('title', 'Standards - Aksam Labs')

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
    @endif

</div>

<div class="row">
@foreach ($analysestype as $analysetype)
	<div class="col-md-3 col-sm-4">
	<div class="wrimagecard wrimagecard-topimage">
          <a href="{{ route('Standardstype.show',$analysetype->id) }}">
          <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
            <center><i class="fa fa-table" style="color:#BB7824"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h6>{{ $analysetype->name }}</h6>
          </div>
        </a>
      </div>
      </div>
    @endforeach
    
	
	
	
</div>
    @endsection