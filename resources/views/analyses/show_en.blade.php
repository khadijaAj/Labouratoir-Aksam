@extends('layouts.app')

@section('title', 'Visualiser Rapport Ensilage - Aksam Labs')

@section('links')
<li class="nav-item">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/rapport_pf">
        <i class="la la-cart-plus"></i>
        <p>Produits finis</p>
    </a>
</li>
<li class="nav-item  ">
    <a href="/rapport_analyse">
        <i class="la la-eyedropper"></i>
        <p>Rapport D'analyse</p>
    </a>
</li>
<li class="nav-item active">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
    </a>
</li>


@endsection

@section('Page_infos')
<h5 style="float:right;color:black;font-size:10px;padding-left: 20px;"  > Rapport Id : {{ $enrapport->id}}  </h5> 

<div class="card-title" style="color:#F19818;"><b><i class="la la-plus"></i> Produit : </b>{{ $enrapport->produit->name}}

<a id="export-pdf"  name="export-pdf"><button
        style="float:right;background-color:#11B247;color:white;"  class="btn ">Imprimer le rapport </button></a></div>

        @endsection

@section('content')


<div class="form-row">

    <div class="form-group col-md-6">
        <label for="date_reception">Date de reception</label>
        <input type="text" class="form-control"  value="{{ $enrapport->date_reception }}"
             disabled>

    </div>
    <div class="form-group col-md-6">
        <label for="Identifiant"> Identifiant </label>
        <input type="text" class="form-control" name="Identifiant" value="{{ $enrapport->Identifiant }}" disabled>
    </div>


</div>
<div class="form-row">

    <div class="form-group col-md-6">
        <label for="num_ech">Num  Echantillon</label>
        <input type="text" class="form-control" name="num_ech" value="{{ $enrapport->num_ech }}"
             disabled>

    </div>
    <div class="form-group col-md-6">
        <label for="produit"> Produit   </label>
        <input type="text" class="form-control" name="produit" value="{{ $enrapport->produit->name}}" disabled>
    </div>


</div>
<div class="form-row">

    <div class="form-group col-md-6">
        <label for="PS">Client</label>
        <input type="text" class="form-control" name="client" value="{{ $enrapport->client->name}}"
             disabled>

    </div>

    @if(!is_null($enrapport->commercial)) 

            <div class="form-group col-md-6">
                <label for="Commercial"> Commercial</label>
                <input type="text" class="form-control" name="commercial" value="{{ $enrapport->commercial->name }}" disabled>
            </div>
               
                @else
                <div class="form-group col-md-6">
        <label for="Commercial"> Commercial</label>
        <input type="text" class="form-control" name="commercial" value="-" disabled>
    </div>               
                @endif

   


</div>

<br>
<div class="table-responsive">

    <table id="re" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
              
                @foreach($xml_data->getAttributes() as $key => $value)
                <th><center>{{ $key }}</center></th>
    
                @endforeach
               

            </tr>
        </thead>
        <tbody>
           
          
            <tr>
               

               
                
                @foreach($xml_data->getAttributes() as $key => $value)
                <th><center>{{ $value }}</center></th>
    
                @endforeach
                
            </tr>

     
        </tbody>
    </table>

</div>

@endsection