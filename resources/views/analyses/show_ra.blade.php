@extends('layouts.app')

@section('title', 'Ajout Rapport Analyse - Aksam Labs')

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
<li class="nav-item active ">
    <a href="/rapport_analyse">
        <i class="la la-eyedropper"></i>
        <p>Rapport D'analyse</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
    </a>
</li>


@endsection

@section('Page_infos')
<h5 style="float:right;color:black;font-size:10px;padding-left: 20px;"  > Rapport Id : {{ $crapport->id}}  </h5> 

<div class="card-title" style="color:#F19818;"><b><i class="la la-plus"></i> Produit : </b>{{ $crapport->produit->name}} 
 <button style="float:right;background-color:#11B247;color:white;" class="btn ">Imprimer le rapport </button></div>
       
@endsection

@section('content')


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="num">Num</label>
            <input type="text" class="form-control" value="{{ $crapport->Num}}" name="num" placeholder="Entrer le num" disabled>
        </div>

        <div class="form-group col-md-6">
            <label for="nom_produit">Nom du client</label>
            <select class="custom-select mr-sm-2" name="client_id" disabled>
            <option selected>{{ $crapport->client->name}}</option>


            </select>
        </div>


    </div>
    <div class="form-row">
    
        <div class="form-group col-md-6">
            <label for="nom_produit">Nom de Commercial</label>
            <select class="custom-select mr-sm-2" name="commercial_id" disabled>
            <option selected>{{ $crapport->commercial->name}}</option>


            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="date_reception"> Date de reception </label>
            <input type="date" class="form-control" value="{{ $crapport->date_reception}}" name="date_reception" disabled>
        </div>
    </div>

    <div class="form-row">


        
        <div class="form-group col-md-6">
            <label for="date_analyse"> Date d'analyse</label>
            <input type="date" class="form-control" name="date_analyse" value="{{ $crapport->date_analyse}}" disabled>
        </div>

        <div class="form-group col-md-6">
            <label for="commentaire">Cout</label>
            <input type="text" class="form-control" name="Cout" id="cout_total" value="{{ $crapport->Cout}}"  placeholder="le cout total" disabled >
        </div>
        <div class="form-group col-md-6">
            <label for="commentaire">Commentaire</label>
            <input type="text" class="form-control" name="commentaire" value="{{ $crapport->Commentaire}}" placeholder="Entrer le commentaire" disabled>
        </div>
       

    </div>
    <br>

    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-toggle="tab">Analyses</a>
            </li>


        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <br>

                <div class="table-responsive">
                    <br>
                    <table id="maintable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Nature D'analyse</center>
                                </th>
                                <th>
                                    <center>Unité</center>
                                </th>
                                <th>
                                    <center>Incertitude</center>
                                </th>
                                <th>
                                    <center>Méthode</center>
                                </th>
                                <th>
                                    <center>Sur brute</center>
                                </th>
                                <th>
                                    <center>Sur séche</center>
                                </th>
                                <th>
                                    <center>Cible</center>
                                </th>


                                <th>
                                    <center>Prix</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @inject('value','App\Value') {{-- inject before foreach --}}
                            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
                            @foreach($standards->nutriments as $nutriment)
                            <tr id="rows">
                          
                                <td>
                                    <center>{{ $nutriment->name }}</center>
                                </td>
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('unite') }}
                                    </center>
                                </td>
                                <td>
                                    <center>{{ $nutriment->incertitude }}</center>
                                </td>
                                <td>
                                    <center>
                                        {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}
                                    </center>
                                </td>
                                <td><input name="nutriment_id" value="{{ $nutriment->id }}" hidden />
                                    <center>{{ $value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}</center>
                                </td>
                                <td>
                                    <center>{{ $value->where('crapport_id','=',$crapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche') }}</center>
                                </td>
                                <td>
                                    <center>{{ $nutriment->cible }}</center>
                                </td>
                                <td>
                                    <center>{{ $nutriment->cout }}</center>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile">
                Emptyy
            </div>
            <br>
            <div class="card-action">
                <center><button type="submit" class="btn btn-success">Enregistrer</button></center>
            </div>


        </div>
    </div>
</form>

@endsection