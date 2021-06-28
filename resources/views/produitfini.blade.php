@extends('layouts.app')

@section('title', 'Produits Finis - Aksam Labs')

@section('links')

<li class="nav-item ">
    <a href="/matieres_premieres">
        <i class="la la-cart-arrow-down"></i>
        <p>Matieres Premieres</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/produits_finis">
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
<li class="nav-item ">
    <a href="/rapport_ensilage">
        <i class="la la-database"></i>
        <p>Rapport D'ensilage</p>
    </a>
</li>

@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-cart-cart-plus"></i>
        Produits finis</b></div>
@endsection

@section('content')
<div>
    <div class="form-row col-sm-6 align-items-right" style="float:right;">

        <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text" style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>

            </div>

            <input type="text" class="form-control" style="border: 1px solid #ced4da" id="inlineFormInputGroup"
                placeholder="Chercher ...">
            <div class="input-group-btn search-panel" style="background-color:#FAFAFA;border: 1px solid #ced4da;">
                <select name="search_param" id="search_param" class="btn btn-light dropdown-toggle"
                    data-toggle="dropdown">
                    <option value="all">Filtrer par</option>
                    <option value="">produit</option>
                    <option value="">Identification</option>
                </select>
            </div>
        </div>
    </div>

</div>
<br>
<div class="form-row align-items-right" style="float:left;">

    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="/add_pf">Ajouter une PF</a></button>
    </div>
    <div class="col-auto">
        <br>
        <button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="">Importer</a></button>
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



</div>
</div>
<div class="table-responsive">

    <table id="pf" class="table">

        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>#</th>
                <th>N° d’échantillon</th>
                <th>Produit</th>
                <th>Identification</th>
                <th>Commentaire</th>
                <th>Date de fabrication</th>

                <th>
                    <center>Operations</center>
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">1</label>
                    </div>
                </td>



                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
				<td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="la la-trash-o"></i>&nbsp;&nbsp;<i style="color:#000;" class="la la-eye"></center></td>	

            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">2</label>
                    </div>
                </td>



                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>

                <td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="la la-trash-o"></i>&nbsp;&nbsp;<i style="color:#000;" class="la la-eye"></center></td>	
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">3</label>
                    </div>
                </td>


                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>
                <td>Table cell</td>

                <td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="la la-trash-o"></i>&nbsp;&nbsp;<i style="color:#000;" class="la la-eye"></center></td>	
            </tr>
        </tbody>
    </table>

</div>
@endsection