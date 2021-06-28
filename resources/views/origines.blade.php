@extends('layouts.app')

@section('title', 'Nutriments - Aksam Labs')

@section('links')

<li class="nav-item ">
							<a href="/produits">
								<i class="la la-dropbox"></i>
								<p>Produits</p>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="/nutriments">
								<i class="la la-yelp"></i>
								<p>Nutriments</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="/origines">
								<i class="la la-server"></i>
								<p>Origines</p>
							</a>
						</li><li class="nav-item">
							<a href="/categories">
								<i class="la la-sliders"></i>
								<p>Catégories</p>
							</a>
						</li>
						
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-server"></i>
								Origines</b></div>
@endsection

@section('content')
<div >

<div class="form-row col-sm-6  align-items-right" style="float:right;">

<div class="input-group mb-2">

<div class="input-group-prepend">
<div class="input-group-text" style="background-color:#FAFAFA;" ><i class="la la-search"> </i></div>
</div>

<input type="text" class="form-control" style="border: 1px solid #ced4da" id="inlineFormInputGroup" placeholder="Chercher ...">

</div>
</div>

</div>
 <br>
<div class="form-row align-items-right" style="float:left;">

<div class="col-auto">
<br>
<button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a  style="color: #ffffff; text-decoration: none; "href="/add_origine">Ajouter une origine</a></button>
</div>
<div class="col-auto">
<br>
<button type="submit" style="border-radius: 40px ;background-color:#3A9341;" class="btn mb-2"><a  style="color: #ffffff; text-decoration: none; "href="#s">Importer</a></button>
</div>
<div class="col-auto">
<br>
<button class="btn btn-secondary dropdown-toggle" style="border-radius: 40px ;background-color:#3A9341;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Exporter
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="#">Excel</a>
<a class="dropdown-item" href="#">PDF</a>
</div>    </div>



</div>
										</div>
										<div class="table-responsive">
											
										<table id="origines" class="table" >
                                            
											<thead style="background-color:#FAFAFA;">
                                            <tr>
														<th><center>#</center></th>
														<th><center>Nom</center></th>
														<th><center>Réference</center></th>
														
														<th><center>Actions</center></th>
													
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row"><center>1</center></th>
														
														
														<td><center>Table cell</center></td>
														<td><center>Table cell</center></td>
														
													<td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="
la la-trash-o"></i></center></td>
													</tr>
													<tr>
														<th scope="row"><center>2</center></th>
														
														
														<td><center>Table cell</center></td>
														<td><center>Table cell</center></td>
														
															<td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="
la la-trash-o"></i></center></td>
													</tr>
													<tr>
														<th scope="row"><center>3</center></th>
														
													<td><center>Table cell</center></td>
														<td><center>Table cell</center></td>
														
															<td><center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style ="color:#C1130B;" class="
la la-trash-o"></i></center></td>
													</tr>
												</tbody>
											</table>
											
										</div>
@endsection

