@extends('layouts.app')

@section('title', 'Standards - Aksam Labs')

@section('links')

<li class="nav-item">
    <a href="/users">
        <i class="la la-users"></i>
        <p>Utilisateurs</p>
    </a>
</li>
<li class="nav-item  ">
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

<div>
    <br>
    <div class="form-row align-items-left" style="float:left;">

        <div class="col-auto">
            <button type="submit" style="border-radius: 20px ;background-color:#3A9341;" class="btn mb-2"><a href="{{ route('Standardstype.create',$standardtype->id) }}"
                    style="color: #ffffff; text-decoration: none; " >Ajouter un nutriment</a></button>
            <br><br>
        </div>
    </div>
    <div class="table-responsive">

        <table id="logs" class="table">

            <thead style="background-color:#FAFAFA;">
                <tr>
                    
                    <th>
                        <center>Nutriment</center>
                    </th>
                   
                    <th>
                        <center>Methode</center>
                    </th>
                    <th>
                        <center>Unite</center>
                    </th>
                    <th>
                        <center>Equation</center>
                    </th>
                    <th>
                        <center>Actions</center>
                    </th>

                </tr>
            </thead>
            <tbody>
            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
            @foreach($standardtype->nutriments as $nutriment)
                <tr>
             
                    
    

                    <td><center> {{ $nutriment->name }}
                    </center></td>
                
                    <td><center> {{ $mesure->where('standardtype_id','=',$standardtype->id)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                    </center></td>
                    <td><center> {{ $mesure->where('standardtype_id','=',$standardtype->id)->where('nutriment_id','=',$nutriment->id,)->value('unite') }}
                    <td><center> {{ $mesure->where('standardtype_id','=',$standardtype->id)->where('nutriment_id','=',$nutriment->id,)->value('equation') }}

                    <td>
                        <center>
                            <form action="{{ route('Standardstype.destroy') }}" method="POST">
                            @csrf

                                <input name="standard" value="{{ $standardtype->id }}" hidden/>
                                <input name="nutriment" value="{{ $nutriment->id }}" hidden/>

                              

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
    @endsection